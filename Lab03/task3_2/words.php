<?php
$words_file1 = explode(' ', fread(fopen("file1.txt", "r"), filesize("file1.txt")));
$words_file2 = explode(' ', fread(fopen("file2.txt", "r"), filesize("file2.txt")));

$only_in_first = [];
$in_first_and_in_second = [];
$in_first_and_in_second_repeat_two = [];

foreach ($words_file1 as $word) {
    if (!in_array($word, $words_file2)) {
        $only_in_first[] = $word;
    }
    if (in_array($word, $words_file2)) {
        $in_first_and_in_second[] = $word;
    }
}

$repeat_symbols_file1 = array_filter(array_count_values($words_file1), fn($count) => $count > 2);
$repeat_symbols_file2 = array_filter(array_count_values($words_file2), fn($count) => $count > 2);

foreach ($repeat_symbols_file1 as $word => $count) {
    if (array_key_exists($word, $repeat_symbols_file2)) {
        $in_first_and_in_second_repeat_two[] = $word;
    }
}

$only_in_first = join(' ', $only_in_first);
$in_first_and_in_second = join(' ', $in_first_and_in_second);
$in_first_and_in_second_repeat_two = join(' ', $in_first_and_in_second_repeat_two);

$file_names = ['file_result_1.txt', 'file_result_2.txt', 'file_result_3.txt'];

$file_result_1 = fopen($file_names[0], "w");
fwrite($file_result_1, $only_in_first);

$file_result_2 = fopen($file_names[1], "w");
fwrite($file_result_2, $in_first_and_in_second);

$file_result_3 = fopen($file_names[2], "w");
fwrite($file_result_3, $in_first_and_in_second_repeat_two);