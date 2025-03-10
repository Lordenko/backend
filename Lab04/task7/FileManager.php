<?php
class FileManager{
    static string $dir = 'text/';

    public static function readFile (string $filename)
    {
        $path = self::$dir . $filename;
        $file = file_get_contents($path);
        foreach (explode("\n", $file) as $line) {
            echo $line . "<br>";
        }
    }

    public static function writeFile (string $filename, string $content){
        $path = self::$dir . $filename;
        $file = fopen($path, 'a');
        fwrite($file, $content."\n");
        fclose($file);
    }

    public static function deleteContentFile (string $filename){
        $path = self::$dir . $filename;
        $file = fopen($path, 'w');
        fwrite($file, '');
        fclose($file);
    }
}