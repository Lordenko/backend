<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login'])) {
        $_SESSION['login'] = $_POST['login'];
    }

    if (isset($_POST['password']) && isset($_POST['confirm_password'])) {
        if ($_POST['password'] === $_POST['confirm_password']) {
            $_SESSION['password'] = $_POST['password'];
        } else {
            $_SESSION['password'] = 'Паролі не збігаються';
        }
    }

    if (isset($_POST['gender'])) {
        $_SESSION['gender'] = $_POST['gender'];
    }

    if (isset($_POST['city'])) {
        $_SESSION['city'] = $_POST['city'];
    }

    if (isset($_POST['games'])) {
        $_SESSION['games'] = $_POST['games'];
    }

    if (isset($_POST['about'])) {
        $_SESSION['about'] = $_POST['about'];
    }

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $fileName = $_FILES['photo']['name'];
        $tmpName = $_FILES['photo']['tmp_name'];
        $fileSize = $_FILES['photo']['size'];
        $fileType = $_FILES['photo']['type'];

        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($fileType, $allowedTypes)) {
            $uniqueName = uniqid() . '_' . $fileName;

            $uploadDir = 'images/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            $uploadPath = $uploadDir . $uniqueName;

            if (move_uploaded_file($tmpName, $uploadPath)) {
                $_SESSION['photo'] = $uploadPath;
            } else {
                $_SESSION['photo'] = 'Error';
            }
        } else {
            $_SESSION['photo'] = 'available types - JPEG, PNG, GIF.';
        }
    } else {
        $_SESSION['photo'] = 'Error';
    }

    header("Location: successful.php");
    exit;
}
