<?php
header("Content-Type: application/json");
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestMethod = $_SERVER['REQUEST_METHOD'];

try {
    include "../config/db.php";
    $json = file_get_contents("php://input");
    $json && $data = json_decode($json, true);
    
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
