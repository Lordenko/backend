<?php
$month = 9;
if ($month == 12 || $month == 1 || $month == 2) {
    echo "Зима";
}
else if ($month >= 3 && $month <= 5) {
    echo "Весна";
}
else if ($month >= 6 && $month <= 8) {
    echo "Літо";
}
else {
    echo "Осінь";
}
