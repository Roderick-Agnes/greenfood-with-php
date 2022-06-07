<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json; charset=UTF-8');
    //header("Access-Control-Allow-Methods: POST");
    //header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
    // database connection will be here
    include_once '../../config/db_connect.php';
    include_once '../../model/food.php';
    $database = new db();
    $db = $database->connectDb();

    $food = new Food($db);
    $getFoodList = $food->getFoodList();

    $food_array = [];
    $food_array['Status'] = 200;
    $food_array['Message'] = "Ok";
    $food_array['Data'] = [];
    
    $num = $getFoodList->rowCount();
    if($num > 0){
        $result = $getFoodList -> fetchAll();
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
        $food_array['Message'] = "FoodId not correct.";
    }  
    echo json_encode($food_array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
?>