<?php

namespace Fc\Debug;

/**
 * Author: Szymon Wygnański
 * Date: 06.09.11
 * Time: 02:31
 */
class Debug
{

    static public function dump($var)
    {
        echo '<pre>' . print_r($var, true) . '</pre>';
    }

}
