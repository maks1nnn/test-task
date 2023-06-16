<?php

namespace helpers;


class Autoloader
{
    public static function register()
    {
       spl_autoload_register(function ($class) {
            $file = '..' . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
PR($file);
            
            if (file_exists($file)) {
                require  $file;

                return true;
            }
            die('not found');
            return false;
        });
    }
}
Autoloader::register();

