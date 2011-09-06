<?php

namespace Fc\Action;
use \Fc\Action\Action;
use \Fc\Options\OptionsAbstract;

/**
 * Author: Szymon Wygnański
 * Date: 06.09.11
 * Time: 03:28
 */
abstract class ActionAbstract extends OptionsAbstract implements Action
{

    /**
     * @var \Fc\DependencyInjection\Container
     */
    protected $di;

    /**
     * @var \Fc\Action\Helper\Broker
     */
    protected $broker;

    /**
     * @var \Fc\Action\Dispatcher
     */
    protected $dispatcher;

    
    public function __invoke()
    {
        echo $this;
        return $this;
    }

    public function __toString()
    {
        return '';
    }
    


    /**
     * @param \Fc\DependencyInjection\Container $value
     * @return \App\Admin\Articles\Index
     */
    public function set_di($value)
    {
        $this->di = $value;
        return $this;
    }

    /**
     * @param $broker
     * @return ActionAbstract
     */
    public function set_helper_broker($broker)
    {
        $this->broker = $broker;
        return $this;
    }

    /**
     * @param $dispatcher
     * @return ActionAbstract
     */
    public function set_action_dispatcher($dispatcher)
    {
        $this->dispatcher = $dispatcher;
        return $this;
    }

}
