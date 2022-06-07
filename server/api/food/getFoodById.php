<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    include_once '../../config/db_connect.php';
    include_once '../../model/food.php';
    $database = new db();
    $db = $database->connectDb();
    $food = new Food($db);
    $id = isset($_GET['id']) ? $_GET['id'] : die();


    $response = [];
    $response['Status'] = 200;
    $response['Message'] = "Ok";
    $response['Data'] = [];
    

    if(!is_null($id)) {
        $getFoodById = $food->getFoodById($id);
        $num = $getFoodById->rowCount();
        if($num > 0){
            $result = $getFoodById -> fetch();
            $foodItem = (object)[
                "id" => $result['id'],
                "foodName" => $result['foodName'],
                "categoryId" => $result['categoryId'],
                "price" => $result['price'],
                "foodDescription" => $result['foodDescription'],
                "foodImage" => $result['foodImage'],
                "createDate" => $result['createDate'],
                "updateDate" => $result['updateDate']
            ];
            http_response_code(200);
            array_push($response['Data'], $foodItem);
        }  
        else {
            http_response_code(400);
            $response['Status'] = 400;
            $response['Message'] =  "Not food found with id = " . $id;
        }
    }
    else {
        http_response_code(400);
        $response['Status'] = 400;
        $response['Message'] =  "Food id emtry";
    }
    
    
    echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
     
    
    
?>