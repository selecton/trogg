<?php

namespace Fc\Layout;

use \Fc\Options\OptionsAbstract as OptionsAbstract;
use \Fc\Layout as Layout;

/**
 * Author: Szymon Wygnański
 * Date: 06.09.11
 * Time: 04:49
 */
abstract class LayoutAbstract extends OptionsAbstract implements Layout
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
     * @var string
     */
    protected $content = '';

    /**
     * @param $value
     * @return \App\Admin\Layout
     */
    public function set_di($value)
    {
        $this->di = $value;
        return $this;
    }

    /**
     * @param \Fc\Action\Helper\Broker $broker
     * @return \Fc\Layout\LayoutAbstract
     */
    public function set_helper_broker($broker)
    {
        $this->broker = $broker;
        return $this;
    }

    /**
     * @param $value
     * @return \App\Admin\Layout
     */
    public function set_content($value)
    {
        $this->content = $value;
        return $this;
    }

}
