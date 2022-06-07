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
        case 'getFoodList' :
            getFoodList();
            break;
        case 'getFoodById' :
            getFoodById();
            break;
        case 'getFoodByCategoryId' :
            getFoodByCategoryId();
            break;
    }
    function getFoodList() {
        $sql = "SELECT * FROM food ORDER BY id DESC";
        $data = executeResult($sql);
        $res = getRes($data);
        http_response_code(200);
        echo json_encode($res, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
    function getFoodById() {
        $id = getPOST('id');
        $sql = "SELECT * FROM food WHERE id = " . $id;
        $data = executeResult($sql, true);
        http_response_code(200);
        
        if($data != null) {
            $res = getRes($data);
        } else {
            http_response_code(400);
            $res = getRes($data, 400, "Not found food with id = " . $id);
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    }
    function getFoodByCategoryId() {
        $id = getPOST('id');
        $sql = "SELECT * FROM food WHERE categoryId = " . $id;
        $data = executeResult($sql);
        http_response_code(200);
        
        if($data != null) {
            $res = getRes($data);
        } else {
            http_response_code(400);
            $res = getRes($data, 400, "Not found food with category id = " . $id);
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

?>