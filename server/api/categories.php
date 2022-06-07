<?php
    session_start();

    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json; charset=UTF-8');
    //header("Access-Control-Allow-Methods: POST");
    //header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    require_once ('../config/dbhelper.php');
    require_once ('../core/utils/utility.php');

    
    $action = getPOST('action');
    switch($action){
        case 'getCategoryList' :
            getCategoryList();
            break;
        case 'getCategoriesById' :
            getCategoriesById();
            break;
    }
    function getCategoryList() {
        $sql = "SELECT * FROM category";
        $data = executeResult($sql);
        $res = getRes($data);
        http_response_code(200);
        echo json_encode($res, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
    function getCategoriesById() {
        $id = getPOST('id');
        $sql = "SELECT * FROM category WHERE id = " . $id;
        $data = executeResult($sql, true);
        http_response_code(200);
        
        if($data != null) {
            $res = getRes($data);
        } else {
            http_response_code(400);
            $res = getRes($data, 400, "Not found categories with id = " . $id);
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    }

?>