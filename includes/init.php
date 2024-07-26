<?php
session_start();

// read .env INI file for configuration information
global $settings;
$settings = parse_ini_file('.env', true);

// include dependencies
require_once __DIR__ . "/../vendor/autoload.php";

// autoload required classes
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require_once __DIR__ . '/../classes/' . $class . '.php';
});


// setup PicoPDO
$GLOBALS['_PICO_PDO'] = new PDO('mysql:host='.$settings['database']['hostname'].';dbname=tghc-dev', $settings['database']['username'], $settings['database']['password']);


