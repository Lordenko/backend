<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['email'], $data['password'])) {
    $email = htmlspecialchars($data['email']);
    $password = htmlspecialchars($data['password']);

    $pdo = new PDO('mysql:host=localhost;dbname=Lab06;charset=utf8', 'homeuser', '');

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && $password == $user['password']) {
        session_start();
        $_SESSION['id'] = $user['id'];
        echo json_encode([
            "status" => "success",
            "redirect" => "profile.php"
        ]);
    } else {
        echo json_encode([
            "status" => "failed",
            "message" => "Невірний email або пароль!"
        ]);
    }
} else {
    echo json_encode([
        "status" => "failed",
        "message" => "Будь ласка, заповніть всі поля!"
    ]);
}
