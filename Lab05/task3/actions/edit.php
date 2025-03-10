<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["id"])) {
        $pdo = new PDO('mysql:host=localhost;dbname=company_db;charset=utf8','homeuser','');
        $sql = "SELECT * FROM employees WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_POST["id"]]);
        $employee = $stmt->fetch(PDO::FETCH_ASSOC);

        $id = $_POST["id"];
        $name = $_POST["name"] != '' ? $_POST["name"] : $employee['name'];
        $position = $_POST["position"] != '' ? $_POST["position"] : $employee['position'];
        $salary = $_POST["salary"] != '' ? $_POST["salary"] : $employee['salary'];


        $sql = "UPDATE employees SET name=?, position=?, salary=? WHERE id=?";
        $pdo->prepare($sql)->execute([$name, $position, $salary, $id]);

        header("Location: ../index.php");
    }
    else {
        header("Location: ../index.php");
    }
}