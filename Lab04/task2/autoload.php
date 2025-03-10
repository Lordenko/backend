<?php

class Loader
{
    public function autoload($class_name)
    {
        $baseDir = __DIR__ . '/';

        $file = $baseDir . str_replace('\\', '/', $class_name) . '.php';

        if (file_exists($file)) {
            require $file;
        } else {
            die("Autoload error: File not found -> " . $file);
        }
    }

    public function run()
    {
        spl_autoload_register([$this, 'autoload']);
    }
}

