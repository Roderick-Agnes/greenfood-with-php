<?php
    session_start();

    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json; charset=UTF-8');
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    require_once ('../config/libs/jwt.php');
    require_once ('../core/utils/utility.php');
    require_once ('../config/dbhelper.php');

    
    $action = getPOST('action');
    switch($action){
        case 'register' :
            register();
            break;
        case 'login' :
            login();
            break;
    }
    function getToken($data = []){
        $token = array();
        $token['id'] = $data['id'];
        $token['fullname'] = $data['fullname'];
        $token['email'] = $data['email'];
        $token['phone'] = $data['phone'];
        $token['address'] = $data['address'];
        $token['sex'] = $data['sex'];
        $token['username'] = $data['username'];
        $token['password'] = $data['password'];
        $secret_key = "KEY_API_GREENFOOD";
        return JWT::jsonEncode(JWT::encode($token, $secret_key));
    }
    function AddTokenToData($id, $token){
        $sql = "UPDATE customer SET token = '".$token."' WHERE id = " . $id;
        execute($sql);
        return $data;
    }
    function login() {
        $username = getPOST('username');
        $password = getPOST('password');
        $sql = "SELECT * FROM customer WHERE username = '" . $username ."'";
        $data = executeResult($sql, true);
        http_response_code(200);
        
        //echo JWT::jsonEncode(JWT::decode($jwt, $secret_key));
        if($data != null) {
            if(strcmp($password, $data['password']) == 0) {
                
                $token = getToken($data);
                AddTokenToData($data['id'], $token);
                $res = array(
                    $res['status'] => 200,
                    $res['message'] => 'Ok',
                    $res['token'] => $token
                );
                echo json_encode('abc', JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
            }
            else {
                $res = array(
                    $res['status'] => 400,
                    $res['message'] => 'Password incorrect.',
                    $res['token'] => ''
                );
                echo json_encode($res, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
            }
        } else {
            $res = array();
            http_response_code(400);
            $res = getRes($data, 400, "Not found customer with username = " . $username);
            echo json_encode($res, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        }
        
    }
    function register() {
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