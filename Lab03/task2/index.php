<?php session_start(); ?>

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

<?php
    if (!isset($_SESSION['login']) || $_SESSION['login'] != 'success'){
        include 'login.php';
    }
?>

<?php
if (isset($_SESSION['login']) && $_SESSION['login'] == 'success'){
    include 'main_div.php';
}
?>

</body>
</html>