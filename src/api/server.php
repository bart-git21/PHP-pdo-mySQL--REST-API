<?php
header("Content-Type: application/json");

try {
    include "./../config/db.php";

    $json = file_get_contents("php://input");
    $data = json_decode($json, true);

    if ($_GET["action"] === "getList" && $_SERVER["REQUEST_METHOD"] === "GET") {
        $stmt = $conn->prepare("SELECT list FROM english WHERE id = :id");
        $stmt->bindParam(":id", $data["id"]);
        $stmt->execute();
        $list = $stmt->fetch(PDO::FETCH_ASSOC);

        echo json_encode($list);
    }

    if ($_GET["action"] === "addList" && $_SERVER["REQUEST_METHOD"] === "POST") {
        $list = $data["list"];
        $stmt = $conn->prepare("INSERT INTO english (list) VALUES (:list)");
        $stmt->bindParam(":list", $list);
        $stmt->execute();
        http_response_code(201);
        echo json_encode(["success: ", true]);
    }

    if ($_GET["action"] === "editList" && $_SERVER["REQUEST_METHOD"] === "PUT") {
    }

    if ($_GET["action"] === "deleteList" && $_SERVER["REQUEST_METHOD"] === "DELETE") {
    }
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}