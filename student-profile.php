<!DOCTYPE html>
<html lang="en">
    <?php

        $title = 'Profile'; //Title of Web Application
        $page_index = 2;
        require_once('utility/header.php'); //required libraries and settings
        load_css('index-navbar'); //stylesheet
        load_css('home-profile'); //stylesheet

    ?>
    <body>  
        <?php render_navbar('home') ?>
        <?php

            auth_student();

            $session = auth_session('session', 'sign-out.php');

        ?>
        <section>
            <div class="wrapper">
                <div class="ui-alert ui-alert-warning">
                    <p class="ui-alert-title"><i class="fas fa-exclamation-circle mr-2"></i>The enrollment of school year 2021 is ongoing, please inform your friends, classmate and schoolmates</p>
                </div>
                <div class="profile-wrapper">
                    <img src="<?php echo $general_path.$session['image_location'] ?>" class="photo">
                    <div class="information">
                        <h1><?php echo to_name($session) ?></h1>
                        <p><?php echo $option_gender[$session['gender']] ?></p>
                        <p><?php echo $session['age'] ?></p>
                        <p><?php echo $session['contact_number'] ?></p>
                        <p><?php echo $session['email_address'] ?></p>
                        <a href="#"><i class="fas fa-image mr-2"></i>Change Photo</a>
                        <a href="#"><i class="fas fa-edit mr-2"></i>Edit Profile</a>
                    </div>
                </div>
            </div>
        </section>
        <footer class="d-flex justify-content-center align-items-center">
            <p class="text-white mb-0"> &copy; 2021</p>
        </footer>

        <?php

            require_once('utility/footer.php'); //required script libraries
            //load_script('template'); //scripts

        ?>
    </body>
</html>