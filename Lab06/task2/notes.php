<?php
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO('mysql:host=localhost;dbname=Lab06;charset=utf8', 'homeuser', '');
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Помилка підключення до бази даних']);
    exit;
}

header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'GET') {
    $stmt = $pdo->query("SELECT * FROM notes ORDER BY created_at DESC");
    $notes = $stmt->fetchAll();
    echo json_encode($notes);
}

elseif ($method == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if (empty($data['title']) || empty($data['content'])) {
        http_response_code(400);
        echo json_encode(['error' => 'Поля заголовок та текст є обов’язковими']);
        exit;
    }
    $stmt = $pdo->prepare("INSERT INTO notes (title, content) VALUES (:title, :content)");
    $stmt->execute(['title' => $data['title'], 'content' => $data['content']]);
    echo json_encode(['message' => 'Замітку додано', 'id' => $pdo->lastInsertId()]);
}

elseif ($method == 'PUT') {
    $data = json_decode(file_get_contents('php://input'), true);
    if (empty($data['id']) || empty($data['title']) || empty($data['content'])) {
        http_response_code(400);
        echo json_encode(['error' => 'ID, заголовок та текст є обов’язковими']);
        exit;
    }
    $stmt = $pdo->prepare("UPDATE notes SET title = :title, content = :content WHERE id = :id");
    $stmt->execute(['title' => $data['title'], 'content' => $data['content'], 'id' => $data['id']]);
    echo json_encode(['message' => 'Замітку оновлено']);
}

elseif ($method == 'DELETE') {
    $data = json_decode(file_get_contents('php://input'), true);
    if (empty($data['id'])) {
        http_response_code(400);
        echo json_encode(['error' => 'ID є обов’язковим']);
        exit;
    }
    $stmt = $pdo->prepare("DELETE FROM notes WHERE id = :id");
    $stmt->execute(['id' => $data['id']]);
    echo json_encode(['message' => 'Замітку видалено']);
}

else {
    http_response_code(405);
    echo json_encode(['error' => 'Метод не дозволено']);
}
