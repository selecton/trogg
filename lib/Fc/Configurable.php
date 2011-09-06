<?php

namespace Fc;

interface Configurable
{

    function __construct($options = array());
    function set_options($options = array());
    function get_options();
    
}
