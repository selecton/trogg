<?php

namespace Fc\Action\Helper;

/**
 * Author: Szymon Wygnański
 * Date: 06.09.11
 * Time: 05:12
 */
class Broker extends \Fc\DependencyInjection\Container
{


    public function __invoke($helper_name = null)
    {
        if($helper_name == null) {
            return $this;
        }

        return $this->$helper_name;
    }

    public function __call($helper_name, $arguments)
    {
        $helper = $this->$helper_name;
        return $helper(array_pop($arguments));
    }

    public function helper($callable, $options = null)
    {
        return function ($di) use ($callable, $options)
        {
            return new $callable($options);
        };
    }

}
