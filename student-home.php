<!DOCTYPE html>
<html lang="en">
    <?php

        $title = 'Welcome'; //Title of Web Application
        $page_index = 1;
        require_once('utility/header.php'); //required libraries and settings
        load_css('index-navbar'); //stylesheet
        load_css('home-index'); //stylesheet

    ?>
    <body>  
        <?php render_navbar('home') ?>
        <?php

            auth_student();
        
            $error = array();

        ?>
        <section>
            <div class="wrapper">
                <div class="ui-alert ui-alert-warning">
                    <p class="ui-alert-title"><i class="fas fa-exclamation-circle mr-2"></i>The enrollment of school year 2021 is ongoing, please inform your friends, classmate and schoolmates</p>
                </div>
                <?php
                    builtinsuccess();
                    builtinerror();
                ?>
            </div>
        </section>
        <footer class="d-flex justify-content-center align-items-center">
             <p class="text-white mb-0">BUPC Online Clientele Satisfaction Survey &copy; 2021</p>
        </footer>

        <?php

            require_once('utility/footer.php'); //required script libraries
            //load_script('template'); //scripts

        ?>
    </body>
</html>