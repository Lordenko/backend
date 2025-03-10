<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["id"])) {

        $id = $_POST["id"];

        $pdo = new PDO('mysql:host=localhost;dbname=company_db;charset=utf8','homeuser','');

        $pdo->prepare("DELETE FROM employees WHERE id=?")->execute([$id]);

        header("Location: ../index.php");
    }
    else {
        header("Location: ../index.php");
    }
}