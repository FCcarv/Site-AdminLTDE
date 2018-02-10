<?php

require 'environment.php';

global $config;
$config = array();

if (ENVIRONMENT == 'development') {
    define("BASE", "http://localhost/Fatiando-AdminLTE/");
    define("BASEADMIN", "http://localhost/Fatiando-AdminLTE/admin/");
    $config['dbname'] = 'grupo++';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
} else {
    define("BASE", "");
    define("BASEADMIN", "");
    $config['dbname'] = 'dbname';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'user';
    $config['dbpass'] = 'pass';
}


