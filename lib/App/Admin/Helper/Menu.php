<?php

namespace App\Admin\Helper;

/**
 * Author: Szymon Wygnański
 * Date: 06.09.11
 * Time: 06:31
 */
class Menu extends \Fc\Action\Helper\HelperAbstract implements \Fc\Action\Helper
{


    public function __invoke()
    {
        return $this;
    }

    public function __toString()
    {
        return '
        <ul>
            <li><a href="/admin/articles" >Artykuly</a></li>
            <li><a href="/admin/users">Uzytkownicy</a></li>
        </ul>
        ';
    }


}
