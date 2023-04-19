<?php

// serch file inside a directory and return the directory path
function urlFor($dir, $file)
{
    $files = scandir($dir);
    foreach ($files as $key => $value) {
        $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
        $path = substr($path, 24);
        if (!is_dir($path)) {
            if ($file == $value) {
                return $path;
            }
        } else if ($value != "." && $value != "..") {
            urlFor($path, $file);
        }
    }
}