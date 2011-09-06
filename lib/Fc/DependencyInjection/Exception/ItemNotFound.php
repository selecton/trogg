<?php

namespace Fc\DependencyInjection\Exception;

use \Fc\DependencyInjection\Exception as DependencyInjectionException;

/**
 * Author: Szymon Wygnański
 * Date: 06.09.11
 * Time: 05:33
 */
class ItemNotFound extends \InvalidArgumentException  implements DependencyInjectionException
{

}
