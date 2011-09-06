<?php

namespace App\Admin\Users;

/**
 * Author: Szymon Wygnański
 * Date: 06.09.11
 * Time: 06:45
 */
class Index extends \Fc\Action\ActionAbstract implements \Fc\Action\Action
{

    public function __invoke()
    {
        echo $this->di->admin_layout->set_content($this);
    }

    public function __toString()
    {
        return get_class($this);
    }


}
