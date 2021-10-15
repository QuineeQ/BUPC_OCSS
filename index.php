<!DOCTYPE html>
<html lang="en">
    <?php

        $title = 'Survey'; //Title of Web Application
        $page_index = 1;
        require_once('utility/header.php'); //required libraries and settings
        load_css('index-navbar'); //stylesheet
        load_css('survey-form'); //stylesheet

    ?>
     // Comment
    <body formvalidation="on">
        <?php render_navbar('index') ?>
        <?php

            auth_outside();

            $setting = read_setting(1);

            $user = to_associative(array('name', 'course_year', 'school_year_id'));
            
            for($i = 1; $i <= 21; $i++) {
                $user['radio_' . $i] =  '';
                custom_validator('radio_' . $i, properties(WT_NUMERICAL, 1, 5));
            }
            for($i = 1; $i <= 11; $i++) {
                $user['remarks_' . $i] =  '';
                custom_validator('remarks_' . $i, properties(WT_STRING, 1, 255));
            }
            
            $input = $user;
            $error = $user;

            if(server('REQUEST_METHOD') == 'POST') {

                foreach($user as $key => $value)
                    if(issetpost($key))
                        $input[$key] = trimpost($key);

                validator();

                if(is_empty($error)) {

                    $survey = read_survey_latest();
                    $respondent = array('survey_id' => $survey['id'],
                                        'name' => $user['name'],
                                        'course_year' => $user['course_year'],
                                        'school_year_id' => $user['school_year_id']);

                    if(sql_count_rows('SELECT * FROM respondents WHERE survey_id = "'.$survey['id'].'" AND name = "'.$user['name'].'"') == 0) {

                        if(insert_respondent($respondent)) {

                            $last = read_respondent_latest();

                            $user['survey_id'] = $survey['id'];
                            $user['respondent_id'] = $last['id'];

                            if(insert_form1($user)) {

                                $_SESSION['success'] = $success = array('Thankyou for your response.');
                                header('location: index.php');
                                exit();

                            }
                            
                        }

                    } else {

                        $error['name'] = 'The username <b>'.$user['name'].'</b> already taken.';

                    }

                }

            }

        ?>
        <section>
            <?php
                switch($setting['survey_form_id']) {
                    case 1: 
                        render_list('form1');
                        break;
                }
            ?>
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