<?php

namespace Fc\Configurable;

/**
 * Author: Szymon Wygnański
 * Date: 06.09.11
 * Time: 04:08
 */
class OptionsAbstract implements  \Fc\Configurable
{

    public function __construct($options = array())
    {
        $this->set_options($options);
    }

    public function set_options($options = array())
    {
        \Fc\Options\StaticConfigurator::set_options($this, $options);
        return $this;
    }

    public function get_options()
    {
        return $this->options;
    }

}
