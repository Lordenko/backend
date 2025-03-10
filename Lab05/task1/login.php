<?php
session_start();
if (isset($_SESSION['id'])) {
    header('Location: profile.php');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<a href="register.php">Зареєструватися</a>

<h1>Логін</h1>

<form method="POST">
    <label for="login">Логін</label>
    <input type="text" id="login" name="login" required><br><br>

    <label for="password">Пароль</label>
    <input type="password" id="password" name="password" required><br><br>

    <button type="submit">Залогінитись</button>
</form>

</body>
</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['login'])) {
        $errors[] = "Логін є обов'язковим.";
    } else {
        $login = $_POST['login'];
    }

    if (empty($_POST['password'])) {
        $errors[] = "Пароль є обов'язковим.";
    } else {
        $password = $_POST['password'];
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    } else {
        require 'DataBaseManager.php';
        if (DataBaseManager::checkLogin($login, $password)){
            $_SESSION['id'] = DataBaseManager::getUserId($login);
            header('Location: profile.php');
        }
    }
}
?>