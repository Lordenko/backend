<?php
session_start();
header('Content-Type: application/json; charset=UTF-8');

if (!empty($_SESSION['id'])) {
    $pdo = new PDO('mysql:host=localhost;dbname=Lab06;charset=utf8', 'homeuser', '');
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['id']]);

    session_destroy();

    echo json_encode(["status" => "success", "message" => "Акаунт видалено."]);
} else {
    echo json_encode(["status" => "failed", "message" => "Користувач не знайдений."]);
}
