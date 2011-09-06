<?php

namespace Fc\Action;

/**
 * Author: Szymon Wygnański
 * Date: 06.09.11
 * Time: 06:19
 */
interface Dispatcher
{

    function dispatch_uri($uri);

    function dispatch_action($action);

}
