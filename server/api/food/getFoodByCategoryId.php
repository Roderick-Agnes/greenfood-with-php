<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    
    include_once '../../config/db_connect.php';
    include_once '../../model/food.php';
    $database = new db();
    $db = $database->connectDb();

    $food = new Food($db);
    $categoryId = isset($_GET['id']) ? $_GET['id'] : die();
    $getFoodByCategoryId = $food->getFoodByCategoryId($categoryId);

    $food_array = [];
    $food_array['Status'] = 200;
    $food_array['Message'] = "Ok";
    $food_array['Data'] = [];
    
    $num = $getFoodByCategoryId->rowCount();
    if($num > 0){
        $result = $getFoodByCategoryId -> fetchAll();
        foreach( $result as $item ) {
            $foodItem = (object)[
                "id" => $item['id'],
                "foodName" => $item['foodName'],
                "categoryId" => $item['categoryId'],
                "price" => $item['price'],
                "foodDescription" => $item['foodDescription'],
                "foodImage" => $item['foodImage'],
                "createDate" => $item['createDate'],
                "updateDate" => $item['updateDate']
            ];
            array_push($food_array['Data'], $foodItem);
        }
        http_response_code(200);
    } 
    else {
        http_response_code(400);
        $food_array['Status'] = 400;
        $food_array['Message'] = "CategoryId not correct.";
    }  
    
    echo json_encode($food_array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
?>