<?php

foreach ($files as $file) {
    echo fread(fopen($file, "r"), filesize($file)) . '<br>';
}
?>