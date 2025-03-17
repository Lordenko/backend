<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['name'], $data['email'], $data['password'])) {

    $username = htmlspecialchars($data['name']);
    $email = htmlspecialchars($data['email']);
    $password = htmlspecialchars($data['password']);

    $password_min_length = 8;

    if (strlen($password) < $password_min_length) {
        echo json_encode([
            "message" => "Помилка: Пароль занадто маленький!"
        ]);
        exit;
    }

    $pdo = new PDO('mysql:host=localhost;dbname=Lab06;charset=utf8', 'homeuser', '');

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    $users = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($users) {
        echo json_encode([
            "message" => "Помилка: логін уже використовується!"
        ]);
        exit;
    }


    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $users = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($users) {
        echo json_encode([
            "message" => "Помилка: пошта уже використовується!"
        ]);
        exit;
    }

    $sql = "INSERT INTO users (username, email, password) VALUES (?,?,?)";
    $pdo->prepare($sql)->execute([$username, $email, $password]);

    echo json_encode([
        "message" => "Користувач $username успішно зареєстрований!"
    ]);
} else {
    echo json_encode([
        "message" => "Будь ласка, заповніть всі поля!"
    ]);
}
