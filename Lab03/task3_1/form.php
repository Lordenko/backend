<form method="post">
    <label for="name">Введіть ім'я:</label>
    <input type="text" name="name">

    <label for="comment">Введіть коментар:</label>
    <input type="text" name="comment">

    <input type="submit" value="Відправити">
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["name"]) && isset($_POST["comment"])) {
        $name = $_POST["name"];
        $comment = $_POST["comment"];

        if (!file_exists('comments.txt')) {
            fclose(fopen('comments.txt', 'w'));
        }

        $comments = fopen('comments.txt', 'a');
        fwrite($comments, "$name::$comment\n");
        fclose($comments);
    }
}

?>