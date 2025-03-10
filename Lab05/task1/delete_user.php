<?php
session_start();
require_once 'DataBaseManager.php';
DataBaseManager::deleteUser($_SESSION['id']);
unset($_SESSION['id']);
header('Location: login.php');