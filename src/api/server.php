<?php
header("Content-Type: application/json");
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestMethod = $_SERVER['REQUEST_METHOD'];

try {
    include "../config/db.php";

    
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
