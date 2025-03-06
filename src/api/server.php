<?php
header("Content-Type: application/json");
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestMethod = $_SERVER['REQUEST_METHOD'];

try {
    include "../config/db.php";
    $json = file_get_contents("php://input");
    $json && $data = json_decode($json, true);

    switch($requestUri) {
        case '/':
            switch ($requestMethod)
        case preg_match('/\d+/', $requestUri, $matches) ? true : false:
            $id = $matches[0];
        default: 
            http_response_code(400);
            echo json_encode(["error"=>"Error 404! No route found!"]);
            break;
    }
    
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
