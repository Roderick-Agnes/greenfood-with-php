<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');

    include_once("../../core/libs/jwt.php");
    $token = array();
    $token['id'] = "4";
    $token['username'] = "cuong";
    $token['password'] = "123456";
    $secret_key = "KEY_API_GREENFOOD";
    $jwt = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjEiLCJ1c2VybmFtZSI6ImN1b25nIiwicGFzc3dvcmQiOiIxMjM0NTYifQ.9uYoiMKOl59hYZenlvEulkzv9Qan3Sd4zxrWgLbTaG4";
    echo JWT::jsonEncode(JWT::encode($token, $secret_key));
    echo JWT::jsonEncode(JWT::decode($jwt, $secret_key));

    $content = file_get_contents("http://localhost/greenfood/api/food/getFoodById.php?id=1");  
    $result = json_decode($content, true);
    $food_array = array();
    //echo $result['Status'];
    foreach($result['Data'] as $item) {
        $food_item = array(
            'id' => $item['id'],
            'foodName' => $item['foodName']
        );
        array_push($food_array, $food_item);

    }
    //print_r($food_array);
?>  