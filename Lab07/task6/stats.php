<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "lab07";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    http_response_code(500);
    exit("DB connection failed: " . $conn->connect_error);
}

// 📆 Запити за останні 24 години
$since = date('Y-m-d H:i:s', time() - 86400); // 86400 = 1 доба

$totalQuery = "SELECT COUNT(*) FROM traffic_log WHERE request_time >= ?";
$stmt = $conn->prepare($totalQuery);
$stmt->bind_param("s", $since);
$stmt->execute();
$stmt->bind_result($total);
$stmt->fetch();
$stmt->close();

$errorQuery = "SELECT COUNT(*) FROM traffic_log WHERE request_time >= ? AND status_code = 404";
$stmt = $conn->prepare($errorQuery);
$stmt->bind_param("s", $since);
$stmt->execute();
$stmt->bind_result($errors);
$stmt->fetch();
$stmt->close();

$conn->close();

echo "<h1>Статистика за останню добу</h1>";
echo "<p>Усього запитів: $total</p>";
echo "<p>404 помилок: $errors</p>";

if ($total > 0) {
    $percent = ($errors / $total) * 100;
    echo "<p>Відсоток 404: " . round($percent, 2) . "%</p>";

    if ($percent > 10) {
        echo "<p style='color:red;'>🚨 Увага! Частка 404 перевищує 10%!</p>";
    }
} else {
    echo "<p>За останню добу запитів не було.</p>";
}
