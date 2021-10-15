<!DOCTYPE html>
<html lang="en">
    <?php
        $page_index = 2;
        $title = 'Surveys'; //Title of Web Application
        require_once('utility/header.php'); //required libraries and settings   
        load_css('admin-sidebar'); //stylesheet
        load_css('admin-wrapper'); //stylesheet
        load_css('admin-surveys'); //stylesheet
    ?>
    <body>
        <section>
            <?php render_sidebar('admin') ?>
            <?php

                $session = auth_session('session', 'sign-out');

                $user = to_associative(array('survey_form_id'));
                $input = $user;
                $error = $user;

                if(server('REQUEST_METHOD') === 'POST') {

                    foreach($user as $key => $value)
                        if(issetpost($key))
                            $input[$key] = trimpost($key);

                    validator();

                    if(is_empty($error)) {
                        
                        if(insert_survey($user)) {  

                            $sql = "UPDATE settings SET survey_form_id = ? WHERE admin_id = ?";

                            if($stmt = mysqli_prepare($link, $sql)) {

                                mysqli_stmt_bind_param($stmt, "ii", $param_survey_form_id, $param_admin_id);
                                $param_survey_form_id = $user['survey_form_id'];
                                $param_admin_id = $session["id"];

                                if(mysqli_stmt_execute($stmt)) {

                                    header('location: admin-dashboard.php');
                                    exit();

                                }

                            }

                        }

                    } 

                    }

            ?>
            <div class="wrapper">
                <?php
                    $setting = read_setting_by_admin($session['id']);
                    $form = array();
                    $survey = read_survey_latest();
                    foreach($forms as $temp) {
                        if($temp['id'] = $setting['id']) {
                            $form = $temp;
                            break;
                        }
                    }
                    if($setting['survey_form_id'] == 0) {
                        render_empty('survey');
                    }
                    else {
                        render_list('survey-2');
                    }
                ?>
            </div>
        </section>
        <?php
            require_once('utility/footer.php'); //required script libraries
            load_script('admin-sidebar'); //scripts
        ?>
    </body>

</html>