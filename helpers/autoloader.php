<?php

namespace helpers;


class Autoloader
{
    public static function register()
    {
        spl_autoload_register(function ($class) {
            $parts = explode('\\', $class); // Разбиваем строку по символу обратного слэша ("\")
            $className = end($parts); // Получаем последний элемент массива

            $className = lcfirst($className); // Заменяем заглавную первую букву на строчную

            // Возвращаем обработанную строку в переменную $class
            $class = implode('\\', array_slice($parts, 0, -1)) . '\\' . $className;
            $file = '..' . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

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
