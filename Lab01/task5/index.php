<?php
# Голосні
$vowels = ['А', 'Е', 'Є', 'И', 'І', 'Ї', 'О', 'У', 'Ю', 'Я'];
# Приголосні
$consonants = ['Б', 'В', 'Г', 'Ґ', 'Д', 'Ж', 'З', 'Й', 'К', 'Л', 'М', 'Н', 'П', 'Р', 'С', 'Т', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ'];


$letter = 'у';
$letter = mb_strtoupper($letter, 'UTF-8');


foreach ($vowels as $vowel) {
    if ($vowel == $letter) {
        echo "Літера голосна";
    }
}

foreach ($consonants as $consonant) {
    if ($consonant == $letter) {
        echo "Літера приголосна";
    }
}