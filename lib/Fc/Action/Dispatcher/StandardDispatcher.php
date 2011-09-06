<?php

namespace Fc\Action\Dispatcher;

/**
 * Author: Szymon Wygnański
 * Date: 06.09.11
 * Time: 06:24
 */
class StandardDispatcher extends \Fc\Options\OptionsAbstract implements \Fc\Action\Dispatcher
{


    /**
     * @var \Fc\Router\Router
     */
    protected $router;

    public function __construct($param= array())
    {
        if($param instanceof \Fc\Router\Router) {
            $this->router = $param;
        } else {
            parent::__construct($param);
        }
    }
    
    public function dispatch_uri($uri)
    {
        return $this->router[$uri]();
    }

    public function dispatch_action($action, $options = null)
    {
        $action_object = new $action($options);
        if (!($action_object instanceof \Fc\Action)) {
            throw new InvalidArgumentException('Actions should implement \Fc\Action interface');
        }
        return $action_object();
    }

    /**
     * @param \Fc\Router\Router $router
     * @return StandardDispatcher
     */
    public function set_router(\Fc\Router\Router $router)
    {
        $this->router = $router;
        return $this;
    }


}
