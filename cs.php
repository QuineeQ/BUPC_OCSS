<!DOCTYPE html>
<html lang="en">
    <?php

        $title = 'Welcome';
        require_once('utility/header.php');
        load_css('template');

    ?>
    <body>
        <?php 

            $users = array(array('name' => 'keanno', 'bag' => array('pen', 'scissor')));

            require_once('utility/footer.php');
            load_script('template');
        ?>
    </body>
</html>