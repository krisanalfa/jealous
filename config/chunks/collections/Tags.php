<?php

use Norm\Schema\String;
use Norm\Schema\Password;

return array(
    'schema' => array(
        'name'    => String::getInstance('name')->filter('trim|required'),
    ),
);
