<div>
    Вітаю, Admin!
    <br>
    <a href="index.php?logout=true">Вийти з аккаунту</a>
</div>

<?php
if (isset($_GET['logout'])) {
    $_SESSION['login'] = 'logout';
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

