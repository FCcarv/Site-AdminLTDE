<?php

require 'environment.php';

global $config;
$config = array();

if (ENVIRONMENT == 'development') {
    define("BASE", "http://localhost/Portal-News/");
    define("BASEADMIN", "http://localhost/Portal-News/admin/");
    // DEFINE SERVIDOR DE E-MAIL ##################
    define('MAILUSER','');
    define('MAILPASS','');//EMAIL FTP
    define('MAILPORT','587');
    define('MAILHOST','smtp.institutozfriggi.com.br');
        // CONTANTES BANCO ##################
    $config['dbname'] = 'banco-zfg';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
} else{
    define("BASE", "https://www.institutozfriggi.com.br/");
    define("BASEADMIN", "https://www.institutozfriggi.com.br/admin/");
    // DEFINE SERVIDOR DE E-MAIL ##################
    define('MAILUSER','frcarv@institutozfriggi.com.br');
    define('MAILPASS','frcarv270');//EMAIL FTP
    define('MAILPORT','497');
    define('MAILHOST','smtp.institutozfriggi.com.br');
    // CONTANTES BANCO ##################
    $config['dbname'] = 'institu5_bd-zfriggi';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'institu5_admin';
    $config['dbpass'] = 'franxco3244';
}


