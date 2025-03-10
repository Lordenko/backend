<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    input {
        width: 300px;
    }
</style>
<body>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['text'], $_POST['find'], $_POST['edit'])) {
        $text = $_POST['text'];
        $find = $_POST['find'];
        $replace = $_POST['edit'];
        $result_text = str_replace($find, $replace, $text);
    }
    else if (isset($_POST['cities'])){
        $cities = $_POST['cities'];
        $cities = explode(' ', $cities);
        sort($cities, SORT_STRING);
        $cities = join($cities, ', ');
        $result_cities = $cities;
    }
    else if (isset($_POST['path'])) {
        $path = $_POST['path'];
        $path = explode('/', $path);
        $path = end($path);
        $path = explode('.', $path)[0];
        $result_path = $path;
    }
    else if (isset($_POST['date1']) && isset($_POST['date2'])) {
        $date1 = new DateTime($_POST['date1']);
        $date2 = new DateTime($_POST['date2']);

        $result_date = $date1->diff($date2);
        $result_date = $result_date->days;
    }
    else if (isset($_POST['password'])) {
        $amount_symbols = (int) $_POST['password'];

        $characters = [
            ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M",
            "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"],

            ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m",
            "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"],

            ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"],

            ["!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "-", "_", "=", "+",
            "[", "]", "{", "}", ";", ":", "'", "\"", ",", ".", "/", "<", ">", "?",
            "\\", "|", "`", "~"]
        ];


        $password = '';
        for ($i = 0; $i < $amount_symbols; $i++) {
            $rand1 = array_rand($characters);
            $rand2 = array_rand($characters[$rand1]);

            $password .= $characters[$rand1][$rand2];
        }

        $check = check_password($password, $characters);
        $result_password = $password . $check;
    }
}

function check_password($password, $characters){

    $has_big_latter = strpbrk($password, implode("", $characters[0])) ? True : False;
    $has_small_latter = strpbrk($password, implode("", $characters[1])) ? True : False;
    $has_number = strpbrk($password, implode("", $characters[2])) ? True : False;
    $has_symbol = strpbrk($password, implode("", $characters[3])) ? True : False;

    if ($has_small_latter && $has_big_latter && $has_number && $has_symbol) {
        return '<br>Пароль найдійний';
    }
    return '<br>Пароль не найдійний';
}

?>

<h2>Task1.1</h2>
<form method="POST">
    <input type="text" name="text" placeholder="Текст"> <br>
    <input type="text" name="find" placeholder="Знайти"> <br>
    <input type="text" name="edit" placeholder="Замінити на"> <br>
    <button type="submit">Результат</button>
    <p> <?= (isset($result_text) ? $result_text : '') ?> </p>
</form>

<h2>Task1.2</h2>
<form method="POST">
    <input type="text" name="cities" placeholder="Введіть міста через пробіл">
    <button type="submit">Сортувати</button>
    <p> <?= (isset($result_cities) ? $result_cities : '') ?> </p>
</form>

<h2>Task1.3</h2>
<form method="POST">
    <input type="text" name="path" placeholder="Введіть шлях до файлу">
    <button type="submit">Дізнатся назву файлу</button>
    <p> <?= (isset($result_path) ? $result_path : '') ?> </p>
</form>

<h2>Task1.4</h2>
<form method="POST">
    <input type="text" name="date1" placeholder="Введіть першу дату">
    <input type="text" name="date2" placeholder="Введіть другу дату">
    <button type="submit">Дізнатися різницю між датами</button>
    <p> <?= (isset($result_date) ? $result_date : '') ?> </p>
</form>

<h2>Task1.5</h2>
<form method="POST">
    <input type="number" name="password" placeholder="Введіть кількість символів в паролі">
    <button type="submit">Згенерувати пароль</button>
    <p> <?= (isset($result_password) ? $result_password : '') ?> </p>
</form>

</body>
</html>
