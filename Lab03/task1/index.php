<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<?php
if (isset($_GET['font-size'])){
    setcookie("font-size", $_GET['font-size'], time() + (86400 * 30), "/");
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>
<style>
    body{
        font-size: <?php echo $_COOKIE['font-size']; ?>;
    }
</style>
<body>
<a href="index.php?font-size=small">Маленький текст</a>
<a href="index.php?font-size=medium">Середній текст</a>
<a href="index.php?font-size=large">Великий текст</a>
<br><br>
<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusamus animi aperiam dicta dolores eaque, harum in mollitia non sequi sit soluta suscipit tempora voluptate voluptates? Error libero nulla officia?</div>
</body>
</html>