<?php

namespace Fc\Router;

use \Fc\Debug\Debug as Debug;

use \Fc\Action\Action as Action;

/**
 * Author: Szymon Wygnański
 * Date: 06.09.11
 * Time: 01:50
 */
class Router implements \ArrayAccess
{

    /**
     * @var Function[]
     */
    private $routes;

    /**
     * @var string[]
     */
    private $routes_names_exploded;

    private function find_route($route_to_find)
    {
        foreach ($this->routes as $route => $action) {
            if ($this->test_route($route_to_find, $route)) {
                return $this->routes[$route];
            }
        }
        return '';
    }

    private function test_route($route_name, $pattern)
    {
        $pattern_array = $this->routes_names_exploded[$pattern];
        $route_array = explode('/', $route_name);

        $max_items = count($pattern_array) > count($route_array) ? count($pattern_array) : count($route_array);

        for ($i = 0; $i < $max_items; $i++) {
            if(!isset($pattern_array[$i]) || !isset($route_array[$i])) {
                return false;
            }
            $pattern_part = $pattern_array[$i];
            $route_part = $route_array[$i];
            if (!empty($pattern_part[0]) && $pattern_part[0] == ':') {
                continue;
            }
            if ($pattern_part != $route_part) {
                return false;
            }
        }
        return true;
    }

    public function action($class_name, $options = null)
    {
        return function() use($class_name, $options)
        {
            $action_object = new $class_name($options);
            if(!$action_object instanceof Action) {
                throw new \InvalidArgumentException('Action class should implement \Fc\Action interface');
            }
            if (is_callable($action_object)) {
                return $action_object();
            }
        };
    }

    public function inline($callback)
    {
        $router = $this;
        return function() use($callback, $router)
        {
            return $callback($router);
        };
    }

    // --------------------------
    // ArrayAccess Implementation
    // --------------------------

    public function offsetSet($route, $action)
    {
        if (is_null($route)) {
            $this->routes[] = $action;
        } else {
            $this->routes[$route] = $action;
            $this->routes_names_exploded[$route] = explode('/', $route);
        }
    }

    public function offsetExists($route)
    {
        return isset($this->routes[$route]);
    }

    public function offsetUnset($route)
    {
        unset($this->routes[$route]);
    }

    public function offsetGet($route)
    {
        $pattern = $this->find_route($route);
        if (empty($pattern)) {
            throw new \Fc\Router\Exception\RouteNotFound();
        }
        if (!is_callable($pattern)) {

            Debug::dump($pattern);

            throw new \Fc\Router\Exception\RouteNotCallable();
        }
        return $pattern;
    }


}
