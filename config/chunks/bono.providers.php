<?php

// BONO
return array(
    // The providers
    'bono.providers' => array(
        '\\App\\Provider\\SiteProvider',
        '\\KrisanAlfa\\Kraken\\Provider\\KrakenProvider',
        '\\KrisanAlfa\\Blade\\Provider\\BladeProvider',
        '\\Norm\\Provider\\NormProvider',
        '\\Bono\\Lang\\Provider\\LangProvider',
    ),
);
