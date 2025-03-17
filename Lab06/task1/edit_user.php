<?php
session_start();
header('Content-Type: application/json; charset=UTF-8');

$data = json_decode(file_get_contents("php://input"), true);

if (!empty($_SESSION['id']) && isset($data['name'], $data['email'])) {
    $pdo = new PDO('mysql:host=localhost;dbname=Lab06;charset=utf8', 'homeuser', '');
    $name = htmlspecialchars($data['name']);
    $email = htmlspecialchars($data['email']);
    $password = !empty($data['password']) ? password_hash($data['password'], PASSWORD_DEFAULT) : null;

    if ($password) {
        $sql = "UPDATE users SET username = ?, email = ?, password = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $email, $password, $_SESSION['id']]);
    } else {
        $sql = "UPDATE users SET username = ?, email = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $email, $_SESSION['id']]);
    }

    echo json_encode(["status" => "success", "message" => "Дані успішно оновлено!"]);
} else {
    echo json_encode(["status" => "failed", "message" => "Помилка оновлення даних."]);
}
