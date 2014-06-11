<?php

// BONO
return array(
    // Application Controller using Kraken Container
    'kraken.controllers' => array(
        'default' => '\\KrisanAlfa\\Kraken\\Controller\\NormController',
        'dependencies' => array(
        ),
        'mapping' => array(
            '/ask' => '\\App\\Controller\\AskController'
        )
    ),
);
