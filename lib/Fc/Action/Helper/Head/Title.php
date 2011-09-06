<?php

namespace Fc\Action\Helper\Head;

use \Fc\Action\Helper\HelperAbstract as HelperAbstract;

/**
 * Author: Szymon Wygnański
 * Date: 06.09.11
 * Time: 05:46
 */
class Title extends HelperAbstract
{

    private $titles = array();

    /**
     * @throws InvalidArgumentException
     * @param $param
     * @return Title
     */
    public function __invoke($param = null)
    {
        if(is_string($param)) {
            $this->titles[] = $param;
        } else if(is_array($param) || $param instanceof \Fc\Options\Options) {
            $this->set_options($param);
        } else if($param !== null) {
            throw new \InvalidArgumentException('Wrong type of Title __invoke param');
        }
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return join($this->get_separator(), $this->titles);
    }

    /**
     * @param $value
     * @return \Fc\Action\Helper\Head\Title
     */
    public function set_separator($value)
    {
        $this->options['separator'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function get_separator()
    {
        return isset($this->options['separator']) ? $this->options['separator'] : ' - ';
    }

}
