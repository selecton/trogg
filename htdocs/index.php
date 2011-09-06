<?php

defined('ROOT_PATH') || define('ROOT_PATH', realpath(__DIR__ . '/../'));

require_once ROOT_PATH . '/lib/Fc/Loader/AutoLoader.php';

\Fc\Loader\AutoLoader::register_autoloader(ROOT_PATH . '/lib/');

$starter = new App\Starter();
$starter->start();
