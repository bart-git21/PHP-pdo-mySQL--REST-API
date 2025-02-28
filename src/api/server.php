<?php
header("Content-Type: application/json");

try {
    include "../config/db.php";

    
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
