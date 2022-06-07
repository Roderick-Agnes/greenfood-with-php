<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    include_once '../../config/db_connect.php';
    include_once('../../model/category.php');
    $database = new db();
    $db = $database->connectDb();
    
    $cat = new Category($db);
    
    $id = isset($_GET['id']) ? $_GET['id'] : die();


    $response = [];
    $response['Status'] = 200;
    $response['Message'] = "Ok";
    $response['Data'] = [];
    

    if(!is_null($id)) {
        $getCategoriesById = $cat->getCategoriesById($id);
        $num = $getCategoriesById->rowCount();
        if($num > 0){
            $result = $getCategoriesById -> fetch();
            $categoriesItem = (object)[
                "id" => $result['id'],
                "categoryName" => $result['categoryName'],
                "createDate" => $result['createDate'],
                "updateDate" => $result['updateDate']
            ];
            http_response_code(200);
            array_push($response['Data'], $categoriesItem);
        }  
        else {
            http_response_code(400);
            $response['Status'] = 400;
            $response['Message'] =  "Not category found with id = " . $id;
        }
    }
    else {
        http_response_code(400);
        $response['Status'] = 400;
        $response['Message'] =  "Category id emtry";
    }
    
    
    echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
     
    
    
?>