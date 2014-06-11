<?php

// BONO
return array(
    // The Middlewares
    'bono.middlewares' => array(
        '\\Bono\\Middleware\\ContentNegotiatorMiddleware',
        '\\KrisanAlfa\\Kraken\\Middleware\\ControllerMiddleware',
        '\\Bono\\Middleware\\NotificationMiddleware',
        '\\Bono\\Middleware\\SessionMiddleware',
        '\\Bono\\Middleware\\StaticPageMiddleware',
    ),
);
