<?php

    require_once('utility/header.php');

    $session = not_required_session('session');
    $url = 'location: root.php';

    if($session['type'] == 2)
        $url = 'location: index.php';

    session_destroy();

    header($url);
    exit();

?>