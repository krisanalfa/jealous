<?php

use Norm\Schema\String;
use Norm\Schema\Password;

return array(
    'schema' => array(
        'title'    => String::getInstance('title')->filter('trim|required'),
        'content'    => String::getInstance('content')->filter('trim|required'),
        'user'    => String::getInstance('user')->filter('trim'),
    ),
);
