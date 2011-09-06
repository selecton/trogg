<?php

namespace App\Admin;

use \Fc\Layout\LayoutAbstract as LayoutAbstract;

/**
 * Author: Szymon Wygnański
 * Date: 06.09.11
 * Time: 03:58
 */
class Layout extends LayoutAbstract implements \Fc\Layout
{

    public function __toString()
    {
        try {
            ob_start();
            ?>
<html>
<head>
    <title><?php echo $this->broker->title; ?></title>

    <body>
    <h2>Admin</h2>
        <?php echo $this->broker->menu; ?>
    <hr/>
        <?php echo $this->content; ?>
    </body>
</head>
</html>
        <?php
        } catch(\Exception $e) {
            \Fc\Debug\Debug::dump($e);
        }

        return ob_get_clean();
    }

}
