<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"] ?? "");
    $price = trim($_POST["price"] ?? "");
    $amount = trim($_POST["amount"] ?? "");
    $description = trim($_POST["description"] ?? "");

    $pdo = new PDO('mysql:host=localhost;dbname=Lab05;charset=utf8', 'homeuser', '');

    $sql = "INSERT INTO tov (name, price, amount, description) VALUES (?,?,?,?)";
    $pdo->prepare($sql)->execute([$name, $price, $amount, $description]);

    header("Location: ../index.php");
}