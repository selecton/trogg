<?php

namespace Fc\Options;

/**
 * Author: Szymon Wygnański
 * Date: 06.09.11
 * Time: 04:03
 */
class StaticConfigurator
{

    static public function set_options($target, $options)
    {
        if($options instanceof Options) {
            $options = $options->get_options();
        }

        foreach($options as $opt => $optValue)  {
            $setter = 'set_' . $opt;
            if(method_exists($target, $setter)) {
                $target->$setter($optValue);
            }
        }
    }

}
