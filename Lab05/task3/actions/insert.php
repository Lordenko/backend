<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"] ?? "");
    $position = trim($_POST["position"] ?? "");
    $salary = trim($_POST["salary"] ?? "");

    $pdo = new PDO('mysql:host=localhost;dbname=company_db;charset=utf8', 'homeuser', '');

    $sql = "INSERT INTO employees (name, position, salary) VALUES (?,?,?)";
    $pdo->prepare($sql)->execute([$name, $position, $salary]);

    header("Location: ../index.php");
}