<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    include_once '../../config/db_connect.php';
    include_once('../../model/category.php');
    $database = new db();
    $db = $database->connectDb();
    
    $cat = new Category($db);
    $getCategoryList = $cat->getCategoryList();

    $category_array = [];
    $category_array['Status'] = 200;
    $category_array['Message'] = "Ok";
    $category_array['Data'] = [];
    
    $num = $getCategoryList->rowCount();
    if($num > 0){
        $result = $getCategoryList -> fetchAll();
        foreach( $result as $item ) {
            $categoryItem = (object)[
                "id" => $item['id'],
                "categoryName" => $item['categoryName'],
                "createDate" => $item['createDate'],
                "updateDate" => $item['updateDate']
            ];
            array_push($category_array['Data'], $categoryItem);
        }
    }   
    http_response_code(200);
    echo json_encode($category_array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
?>