<?php
    include_once("libs/curl-helper.php");
    $username = $password = '';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];
        
    }
    if($_POST) {
        $method = "POST";
        $url = "http://localhost/greenfood-with-php/server/api/auth.php";
        $parameters = array(
            "action" => "login",
            "username" => $username,
            "password" => $password
        );
        echo "\nusername: ". $username;
        echo "\npassword: " . $password;
        $result = CurlHelper::perform_http_request($method, $url, $parameters);
        echo $result;
        //echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
    


?>