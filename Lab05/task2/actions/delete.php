<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["id"])) {

        $id = $_POST["id"];

        $pdo = new PDO('mysql:host=localhost;dbname=Lab05;charset=utf8','homeuser','');

        $pdo->prepare("DELETE FROM tov WHERE id=?")->execute([$id]);

        header("Location: ../index.php");
    }
}