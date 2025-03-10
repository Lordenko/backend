<?php

function find_repeat_symbols($array){
    echo "Масив:<br>";
    foreach ($array as $item) {
        echo $item . '<br>';
    }

    $repeat_symbols = array_count_values($array);
    $filtered = array_filter($repeat_symbols, fn($count) => $count > 1);

    if (!empty($filtered)) { echo '<br>Символи, які повторюються:<br>'; }
    else { echo '<br>Відсутні символи, які повторюються!'; }
    foreach ($filtered as $key => $value) {
        echo $key . '<br>';
    }
}

function create_pet_name($array) {
    $name = '';
    for ($i = 0; $i < rand(3, count($array)); $i++) {
        $name .= $array[rand(0, count($array) - 1)];
    }

    $name = mb_convert_case($name, MB_CASE_TITLE, "UTF-8");
    echo '<br> Імя улюбленця:<br>' . $name . '<br>';
}

function create_array() {
    $array = [];
    for ($i = 0; $i < rand(3, 7); $i++) {
        array_push($array, rand(10, 20));
    }
    return $array;
}

function view_array($array)
{
    foreach ($array as $item) {
        echo $item . '<br>';
    }
}

function array_func($array1, $array2) {
    echo '<br>array1:<br>';
    view_array($array1);

    echo '<br>array2:<br>';
    view_array($array2);

    $array = array_merge($array1, $array2);
    echo '<br>after marge:<br>';
    view_array($array);

    $repeat_symbols = array_count_values($array);
    $filtered = array_filter($repeat_symbols, fn($count) => $count == 1);
    $array = array_keys($filtered);

    echo '<br>without repeat elements:<br>';
    view_array($array);


    sort($array);
    echo '<br>sorted list:<br>';
    view_array($array);

    return $array;
}

function sort_dict($dict, $values = False, $keys = False)
{
    if ($values) {
        asort($dict, SORT_NUMERIC);
    }
    if ($keys) {
        ksort($dict, SORT_STRING);
    }

    return $dict;
}

$array = [1,2,3,4,4,3];
find_repeat_symbols($array);

$syllable = ['е', 'лек', 'тро', 'пер', 'фо', 'ра', 'тор'];
create_pet_name($syllable);

array_func(create_array(), create_array());

$dict = array(
    'Dmitriy' => 19,
    'Leon' => 20,
    'Tanya' => 18,
    'Denys' => 21
);

$dict_sort_by_keys = sort_dict($dict, false, true);
echo '<br>Dict sort by keys:<br>';
print_r($dict_sort_by_keys);

$dict_sort_by_values = sort_dict($dict, true, false);
echo '<br>Dict sort by values:<br>';
print_r($dict_sort_by_values);
