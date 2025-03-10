<?php
function degree($x, $y){
    return pow($x, $y);
}

function factorial($x){
    if ($x == 1 || $x == 0) return 1;
    return $x * factorial($x - 1);
}

function sinus($x){
    return sin($x);
}

function cosin($x){
    return cos($x);
}

function tang($x){
    return tan($x);
}

function my_tang($x){
    return sin($x) / cos($x);
}