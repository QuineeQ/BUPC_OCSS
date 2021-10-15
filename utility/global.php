<?php

    /**
    *
    * 1 - Development
    * 2  - Production
    *
    **/

    //project

    define('WT_PROJECT_NAME', 'bupc');
    define('WT_PROJECT_TITLE', 'BUPC Online Survey');
    define('WT_PROJECT_FRAMEWORK_VERSION', '3.0');
    define('WT_PROJECT_STATE', 2);

    //database

    define('WT_DATABASE_HOST', 'localhost');
    define('WT_DATABASE_USERNAME', 'root');
    define('WT_DATABASE_PASSWORD', '');
    define('WT_DATABASE_NAME', 'bupc');

    $framework_path;
    $res_path;

    if(WT_PROJECT_STATE == 1) {
        $framework_path = 'C:xampp/htdocs/';
        $res_path = '/';
    }
    elseif(WT_PROJECT_STATE == 2) {
        $framework_path = '../';
        $res_path = '';
    }
        
    date_default_timezone_set('Asia/Manila');
    
?>