<?php
    GLOBAL $form;
?>
<div class="ui-card main">
    <div class="header">
        <h1><?php echo $form['title'] ?></h1>
        <p><i class="fas fa-check-circle mr-2"></i>Current Survey Used</p>
    </div>
    <div class="body">
        <?php

            switch($form['id']) {

                case 1: 

                    require_once(__DIR__.'/form1-dashboard-list.php');

                    break;

                default:

                    require_once(__DIR__.'/form1-dashboard-list.php');

                    break;

            }

        ?>
    </div>
</div>