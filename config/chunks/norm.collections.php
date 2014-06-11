<?php

$normPath      = __DIR__ . DIRECTORY_SEPARATOR . 'collections';
$defaultConfig = array('norm.collections' => array(
    'default' => array(
        'observers' => array(
            '\\Norm\\Observer\\Ownership' => array(),
            '\\Norm\\Observer\\Timestampable' => array(),
        ),
    ),
    'mapping' => array()
));

if ($directoryHandler = opendir($normPath)) {
    while (($fileName = readdir($directoryHandler)) !== false) {
        if (is_file($normPath . DIRECTORY_SEPARATOR . $fileName)) {
            $collections = require_once($normPath . DIRECTORY_SEPARATOR . $fileName);
            $fileName    = basename($fileName, '.php');

            $defaultConfig['norm.collections']['mapping'][$fileName] = $collections;
        }
    }

    closedir($directoryHandler);
}

return $defaultConfig;
