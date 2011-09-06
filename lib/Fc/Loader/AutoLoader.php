<?php

namespace Fc\Loader;

/**
 * Author: Szymon Wygnański
 * Date: 06.09.11
 * Time: 01:32
 */
class AutoLoader
{
    static private $path;

    public static function register_autoloader($library_path)
    {
        self::$path = $library_path;
        return spl_autoload_register(array(__CLASS__, 'include_class'));
    }

    public static function unregister_autoload()
    {
        return spl_autoload_unregister(array(__CLASS__, 'include_class'));
    }

    public static function include_class($class)
    {
        require self::$path . '/' . strtr($class, '_\\', '//') . '.php';
    }
}