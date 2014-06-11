<?php

use Norm\Schema\String;
use Norm\Schema\Password;

return array(
    'schema' => array(
        'username'    => String::getInstance('username')->filter('trim|required|unique:User,username'),
        'email'       => String::getInstance('email')->filter('trim|required|unique:User,email'),
        'first_name'  => String::getInstance('first_name')->filter('trim|required'),
        'middle_name' => String::getInstance('middle_name')->filter('trim'),
        'last_name'   => String::getInstance('last_name')->filter('trim|required'),
        'twitter'     => String::getInstance('twitter')->filter('trim|required'),
        'password'    => Password::getInstance('password')->filter('trim|required|confirmed'),
    ),
);
