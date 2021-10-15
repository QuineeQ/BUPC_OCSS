<!DOCTYPE html>
<html lang="en">
    <?php

        $title = 'Administrator'; //Title of Web Application
        $page_index = 3;
        require_once('utility/header.php'); //required libraries and settings
        load_css('index-navbar'); //stylesheet
        load_css('index'); //stylesheet

    ?>
    <body>  
        <?php render_navbar('index') ?>
        <?php

            auth_outside();

            $user = to_associative(array('username', 'password'));
            $input = $user;
            $error = $user;

            if(server('REQUEST_METHOD') == 'POST') {

                foreach($user as $key => $value)
                    if(issetpost($key))
                        $input[$key] = trimpost($key);

                validator();

                if(is_empty($error)) {

                    $admins = sql_result_to_array('SELECT * FROM admins');

                    foreach($admins as $admin) {

                        if($admin['username'] == $user['username']) {

                            if(password_verify($user['password'], $admin['password'])) {

                                $admin['type'] = 1;
                                $admin['password'] = $user['password'];
                                $_SESSION['session'] = $admin;
                                header('location: admin-dashboard.php');
                                exit();

                            } else {

                                $error['password'] = 'Your password is wrong';
                                
                            }

                        }

                    }

                }

            }

        ?>
        <section style="background-image: url('bg.jpeg');background-repeat: no-repeat; background-size: cover;background-position: center;width: 100%;">
  
            <div class="wrapper">
                <?php
                    builtinsuccess();
                    builtinerror();
                ?>
                <form action="<?php echo self() ?>" method="post" class="card disappear-sm">
                    <div class="card-header">
                        <h1 class="card-header-title">Login</h1>
                        <p class="card-header-title-meta">Administrator</p>
                    </div>
                    <div class="card-body">
                        <div class="form-group val-username">
                            <div class="floating-label">
                                <input type="text" class="form-control" 
                                        name="username" 
                                        value="<?php echo render_post('username') ?>"
                                        required>
                            </div>
                        </div>
                        <div class="form-group val-password">
                            <div class="floating-label">
                                <input type="password" class="form-control" 
                                        name="password"
                                        value="<?php echo render_post('password') ?>"
                                        required>
                            </div>
                        </div>
                        <input type="submit" class="ui-btn ui-btn-primary btn-block" value="LOGIN">
                    </div>
                </form>
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