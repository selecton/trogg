<?php

namespace App\Admin\Articles;

use \Fc\Action\ActionAbstract as ActionAbstract;
use \Fc\Action\Action as Action;

/**
 * Author: Szymon Wygnański
 * Date: 06.09.11
 * Time: 02:35
 */
class Index extends ActionAbstract implements Action
{

    public function __invoke($content = '')
    {
        $this->broker->title('Articles');

        echo $this->di->admin_layout->set_content($this);
    }

    public function __toString()
    {
        return 'Dziala Hurra!';
    }

}
