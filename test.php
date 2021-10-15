<!DOCTYPE html>
<html lang="en">
    <?php

        $title = 'Survey'; //Title of Web Application
        $page_index = 1;
        require_once('utility/header.php'); //required libraries and settings
        load_css('index-navbar'); //stylesheet
        load_css('survey-form'); //stylesheet

    ?>
    <body formvalidation="on">  
        <?php render_navbar('index') ?>
        <?php

            auth_outside();

            $user = to_associative(array('first_name', 'middle_name', 'last_name', 'age', 'gender', 'contact_number', 'email_address', 'username', 'password'));
            $input = $user;
            $error = $user;

            if(server('REQUEST_METHOD') == 'POST') {

                foreach($user as $key => $value)
                    if(issetpost($key))
                        $input[$key] = trimpost($key);

                validator();

                if(is_empty($error)) {

                    if(sql_count_rows('SELECT * FROM students WHERE username = "'.$user['username'].'"') == 0) {

                        if(upload_image('image_location')) {

                            if(insert_student($user)) {

                                $success = array('<b>'.to_name($user).'</b> you\'re successfully registered!');
                                $_SESSION['success'] = $success;
                                header('location: index.php');
                                exit();

                            }

                        }

                    } else {

                        $error['username'] = 'The <b>'.$user['username'].'</b> is already been taken';

                    }

                }

            }

        ?>
        <section>
            <div class="wrapper">
                <?php
                    builtinerror();
                ?>
                <form action="<?php echo self() ?>" method="post" class="card elevation-off disappear-sm" enctype="multipart/form-data">
                    <div class="card-header">
                        <h1 class="card-header-title">Clientele Satisfaction Survey</h1>
                        <p class="card-header-title-meta">Title of survey form</p>
                    </div>
                    <div class="card-body">
                        <p class="announcement">
                            Our Dear Students,
                            <br/>
                            <br/>
                            We firmly believe that it is our duty to create an educational environment where each student is given a fair chance to live his student life. That is why we will do what is expected of us to make your stay in Bicol University a happy and rewarding experience. 
                            <br/>
                            <br/>
                            To realize this, we want you to help us determine the areas where our support services are strong and weak so that we can sustain our strengths and improve on our weaknesses, through an impartial feedback mechanism. This is our simple way of showing that we are committed to the continual improvement of the University.

                            Note: Rest assured that your response will be treated with utmost confidentiality.
                        </p>
                        <div class="row">
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group val-first_name">
                                    <div class="floating-label">
                                        <input type="text" class="form-control" 
                                                name="first_name"
                                                value="<?php echo render_post('first_name') ?>"
                                                required>
                                    </div>
                                    <label class="input-info"><i class="fas fa-asterisk mr-2"></i>Student's First Name <span>alphabets & some special characters...</span></label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group val-middle_name">
                                    <div class="floating-label">
                                        <input type="text" class="form-control" 
                                                name="middle_name"
                                                value="<?php echo render_post('middle_name') ?>"
                                                required>
                                    </div>
                                    <label class="input-info"><i class="fas fa-asterisk mr-2"></i>Student's Middle Name <span>alphabets & some special characters...</span></label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group val-last_name">
                                    <div class="floating-label">
                                        <input type="text" class="form-control" 
                                                name="last_name"
                                                value="<?php echo render_post('last_name') ?>"
                                                required>
                                    </div>
                                    <label class="input-info"><i class="fas fa-asterisk mr-2"></i>Student's Last Name <span>alphabets & some special characters...</span></label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-4">
                                <div class="form-group">
                                    <select class="custom-select" name="age">
                                        <?php
                                            for($i = 1; $i <= 100; $i++) {
                                            ?>
                                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                            <?php
                                            }
                                        ?>
                                    </select>
                                    <label class="input-info"><i class="fas fa-asterisk mr-2"></i>Student's Age <span>Numbers only</span></label>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-4">
                                <div class="form-group">
                                    <div class="ui-options">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="gender1" value="1" checked>
                                            <label class="form-check-label" for="gender1">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="gender2" value="2">
                                            <label class="form-check-label" for="gender2">Female</label>
                                        </div>
                                    </div>
                                    <label class="input-info"><i class="fas fa-asterisk mr-2"></i>Student's Gender</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group val-contact_number">
                                    <div class="floating-label">
                                        <input type="text" class="form-control" 
                                                name="contact_number"
                                                value="<?php echo render_post('contact_number') ?>" 
                                                required>
                                    </div>
                                    <label class="input-info"><i class="fas fa-asterisk mr-2"></i>Student's Contact Number <span>11 characters of number only</span></label>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group val-email_address">
                                    <div class="floating-label">
                                        <input type="text" class="form-control" 
                                                name="email_address"
                                                value="<?php echo render_post('email_address') ?>" 
                                                required>
                                    </div>
                                    <label class="input-info"><i class="fas fa-asterisk mr-2"></i>Student's Email Address <span>11 characters of number only</span></label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group val-username">
                                    <div class="floating-label">
                                        <input type="text" class="form-control" 
                                                name="username"
                                                value="<?php echo render_post('username') ?>" 
                                                required>
                                    </div>
                                    <label class="input-info"><i class="fas fa-asterisk mr-2"></i>Student's Username <span>alphabets & letters only</span></label>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group val-password">
                                    <div class="floating-label">
                                        <input type="password" class="form-control" 
                                                name="password"
                                                value="<?php echo render_post('password') ?>" 
                                                required>
                                    </div>
                                    <label class="input-info"><i class="fas fa-asterisk mr-2"></i>Student's Password <span>alphabets & letters only</span></label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <div class="image-upload-wrapper">
                                        <img src="no-image.jpg" class="uploaded-image" alt="No Image">
                                        <input type="file" name="image_location" id="uploadButton" accept="image/png, image/gif, image/jpeg" required>  
                                        <label class="upload-button" for="uploadButton"><i class="far fa-image mr-2"></i><span class="upload-name">Upload Photo</span></label>
                                    </div>
                                    <label class="input-info"><i class="fas fa-asterisk mr-2"></i>Profile Image <span>Image files only</span></label>
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="ui-btn ui-btn-primary btn-block" value="SIGN UP">
                        <a href="index.php" class="sign-up-link">Have an account? Sign In Here</a>
                    </div>
                </form>
            </div>
        </section>
        <footer class="d-flex justify-content-center align-items-center">
            <p class="text-white mb-0">BUPC Online Clientele Satisfaction Survey &copy; 2021</p>
        </footer>
        <?php
            require_once('utility/footer.php'); //required script libraries
            //load_script('sign-up'); //scripts

        ?>
        <script type="text/javascript" src="repository/scripts/sign-up.js"></script>
    </body>
</html>