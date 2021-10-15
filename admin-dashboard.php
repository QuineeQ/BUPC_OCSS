<!DOCTYPE html>
<html lang="en">
    <?php
        $page_index = 1;
        $title = 'Admin Dashboard'; //Title of Web Application
        $page_index = 1;
        require_once('utility/header.php'); //required libraries and settings   
        load_css('admin-sidebar'); //stylesheet
        load_css('admin-dashboard'); //stylesheet
        load_css('admin-wrapper'); //stylesheet
    ?>
    <body>
        <section>
            <?php render_sidebar('admin') ?>
            <?php
                $session = auth_session('session', 'sign-out');
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
                        render_empty('survey-dashboard');
                    }
                    else {
                        render_list('survey-dashboard');
                    }
                ?>
            </div>
        </section>
        <?php
            require_once('utility/footer.php'); //required script libraries
            load_script('admin-sidebar'); //scripts
            load_script('admin-dashboard'); //scripts
            load_script('async'); //scripts
        ?>
    </body>

</html>