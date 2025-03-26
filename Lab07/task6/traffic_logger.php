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


ob_start();

//$statusCode = 200;
$statusCode = 404;
http_response_code($statusCode);

$ip = $_SERVER['REMOTE_ADDR'];
$time = date('Y-m-d H:i:s');
$url = $_SERVER['REQUEST_URI'];

$stmt = $conn->prepare("INSERT INTO traffic_log (ip, request_time, url, status_code) VALUES (?, ?, ?, ?)");
if (!$stmt) {
    die("❌ SQL Error: " . $conn->error);
}

$stmt->bind_param("sssi", $ip, $time, $url, $statusCode);
$stmt->execute();
$stmt->close();
$conn->close();

echo "<h1>Status $statusCode</h1>";
ob_end_flush();
