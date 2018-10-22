<?php

require 'environment.php';

global $config;
$config = array();

if (ENVIRONMENT == 'development') {
    define("BASE", "http://localhost/Portal-News/");
    define("BASEADMIN", "http://localhost/Portal-News/admin/");
    // DEFINE SERVIDOR DE E-MAIL ##################
    define('MAILUSER','contazf@institutozfriggi.com.br');
    define('MAILPASS','instz2017');//EMAIL FTP
    define('MAILPORT','587');
    define('MAILHOST','smtp.institutozfriggi.com.br');
        // CONTANTES BANCO ##################
    $config['dbname'] = 'banco-zfg';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
} else {
    define("BASE", "");
    define("BASEADMIN", "");
    // DEFINE SERVIDOR DE E-MAIL ##################
    define('MAILUSER','');
    define('MAILPASS','');//EMAIL FTP
    define('MAILPORT','');
    define('MAILHOST','');
    $config['dbname'] = 'dbname';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'user';
    $config['dbpass'] = 'pass';
}


