<?php
session_start();
echo '<a href="profile.php">Go to main</a> <br><br>';

echo 'login - ' . $_SESSION['login'] . '<br>';
echo 'password - ' . $_SESSION['password'] . '<br>';
echo 'gender - ' . $_SESSION['gender'] . '<br>';
echo 'city - ' . $_SESSION['city'] . '<br>';
echo 'games - '; print_r($_SESSION['games']); echo '<br>';
echo 'about - ' . $_SESSION['about'] . '<br>';
echo "<img src=" . $_SESSION['photo'] . ">";

