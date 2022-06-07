<?php
    include_once("libs/curl-helper.php");
    $fullname = $email = $phone = $sex = $address = $username = $password = '';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fullname = $_POST["fullname"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $sex = $_POST["sex"];
        $address = $_POST["address"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        //$result = send_request_to_server($fullname, $email, $phone, $sex, $address, $username, $password);
        
        
    }
    if($_POST) {
        $method = "POST";
        $url = "http://localhost/greenfood-with-php/server/api/categories.php";
        $parameters = array(
            "action" => "getCategoryList"
        );
        $result = CurlHelper::perform_http_request($method, $url, $parameters);
        echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
    


?>