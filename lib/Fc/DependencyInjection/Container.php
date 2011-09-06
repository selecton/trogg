<?php

namespace Fc\DependencyInjection;

use Fc\DependencyInjection\Exception\ItemNotFound as ItemNotFoundException;

/**
 * Author: Szymon Wygnański
 * Date: 06.09.11
 * Time: 03:48
 */
class Container
{

    protected $items = array();

    public function __set($key, $value)
    {
        $this->items[$key] = $value;
    }

    public function __get($key)
    {
        if (!isset($this->items[$key])) {
            throw new ItemNotFoundException(sprintf('Value "%s" is not defined.', $key));
        }

        return is_callable($this->items[$key]) ? $this->items[$key]($this) : $this->items[$key];
    }

    public function share($callable)
    {
        return function ($di) use ($callable)
        {
            static $object;
            if (is_null($object)) {
                $object = $callable($di);
            }
            return $object;
        };
    }

    public function configurable($callable, $options)
    {
        return function($di) use($callable, $options)
        {
            return $callable($options);
        };
    }
}
