<?php

use Norm\Schema\String;
use Norm\Schema\Password;

return array(
    'schema' => array(
        'tag_id'    => String::getInstance('tag_id')->filter('trim|required'),
        'question_id'    => String::getInstance('question_id')->filter('trim|required'),
    ),
);
