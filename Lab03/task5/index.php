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
<a href="delete.php">Go to delete.php</a> <br> <br>

<?php include 'form.php' ?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["nickname"]) && isset($_POST["password"])) {
        $nickname = $_POST["nickname"];

        if (is_dir($nickname)) {
            echo '<br>Dir already exists!';
        }
        else {
            mkdir($nickname);

            mkdir("{$nickname}/video");
            fclose(fopen("{$nickname}/video/video1.mp4", "w"));
            fclose(fopen("{$nickname}/video/video2.mp4", "w"));
            fclose(fopen("{$nickname}/video/video3.mp4", "w"));

            mkdir("{$nickname}/music");
            fclose(fopen("{$nickname}/music/music1.mp3", "w"));
            fclose(fopen("{$nickname}/music/music2.mp3", "w"));
            fclose(fopen("{$nickname}/music/music3.mp3", "w"));

            mkdir("{$nickname}/photo");
            fclose(fopen("{$nickname}/photo/image1.png", "w"));
            fclose(fopen("{$nickname}/photo/image2.png", "w"));
            fclose(fopen("{$nickname}/photo/image3.png", "w"));
        }
    }
}

?>

</body>
</html>