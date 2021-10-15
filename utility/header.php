<?php

    require_once('global.php');
    require_once('repository/web-tinker-v'.WT_PROJECT_FRAMEWORK_VERSION.'/web-tinker.php');

    GLOBAL $title;
    GLOBAL $general_path;

    echo '<head>';
    echo '  <meta name="viewport" content="width=device-width, initial-scale=1.0">';
    echo '  <meta charset="UTF-8">';
    echo '  <title>'.WT_PROJECT_TITLE.' | '. $title .'</title>';
    echo '  <link rel="icon" type="image/png" href="'.$general_path.'repository/images/logo.png">';
    echo '  <link rel="stylesheet" type="text/css" href="'.$res_path.'repository/assets/frameworks/fontawesome/css/all.css">';
    echo '  <link rel="stylesheet" type="text/css" href="'.$res_path.'repository/assets/frameworks/bootstrap/css/bootstrap.css">';
    echo '  <link rel="stylesheet" type="text/css" href="'.$res_path.'repository/assets/themes/web-tinker/theme.css">';
    echo '</head>';

    require_once('util.php');

?>