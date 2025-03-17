<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');

$pdo = new PDO('mysql:host=localhost;dbname=Lab06;charset=utf8', 'homeuser', '');

$sql = "SELECT * FROM users";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (!$users) {
    echo json_encode([
        "status" => "failed",
    ]);
    exit;
}

echo json_encode([
    "status" => "success",
    "message" => $users
]);