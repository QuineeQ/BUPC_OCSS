<?php

session_start();

/*
if(!file_exists('uploads')) {
    mkdir('uploads', 0777, true);
}
*/      

$option_gender = array(1 => 'Male', 2 => 'Female');
$option_schoolyear = array(1 => '1st Semester, SY 2020-2021',
                           2 => '2nd Semester, SY 2020-2021');
$forms = array(
    array('id' => 1, 'title' => 'Clientele Satisfaction Survey')
);
    
//session_stamp('view_user', array('view-profile, edit-profile, delete-profile, update-profile'));

function constructGraph($first_sem_list, $second_sem_list, $survey_inputs) {
    
    $sample = array('one' => 0, 'two' => 0, 'three' => 0, 'four' => 0, 'five' => 0);
    $collections = array();

    foreach($survey_inputs as $input) {
        foreach($first_sem_list as $first_sem) {
            $sample = array('one' => 0, 'two' => 0, 'three' => 0, 'four' => 0, 'five' => 0);
            switch($first_sem[$input]) {
                case 1:
                    $sample['one']++;
                    break;
                case 2:
                    $sample['two']++;
                    break;
                case 3:
                    $sample['three']++;
                    break;
                case 4:
                    $sample['four']++;
                    break;
                case 5:
                    $sample['five']++;
                    break;
            }
        }
        array_push($collections, array('index' => $input, 'sample' => $sample, 'semester' => 1, 'value' => 0));
    }
    foreach($survey_inputs as $input) {
        foreach($second_sem_list as $second_sem) {
            $sample = array('one' => 0, 'two' => 0, 'three' => 0, 'four' => 0, 'five' => 0);
            switch($second_sem[$input]) {
                case 1:
                    $sample['one']++;
                    break;
                case 2:
                    $sample['two']++;
                    break;
                case 3:
                    $sample['three']++;
                    break;
                case 4:
                    $sample['four']++;
                    break;
                case 5:
                    $sample['five']++;
                    break;
            }
    
        }
        array_push($collections, array('index' => $input, 'sample' => $sample, 'semester' => 2, 'value' => 0));
    }
    foreach($collections as &$collection) {
        $sample = $collection['sample'];
        $isEmpty = true;
        foreach($sample as $value) {
            if($value != 0) {
                $isEmpty = false;
                break;
            }
        }
        if(!$isEmpty) {
            $collection['value'] = floor(( 5 * $sample['five']  + 4 * $sample['four'] + 3 * $sample['three'] + 2 * $sample['two'] + 1 * $sample['one']) / ($sample['five'] + $sample['four'] + $sample['three'] + $sample['two'] + $sample['one']));   
        } else {
            $collection['value'] = 0;
        }
    }

    return $collections;

}

function itexmo($number, $message) {
    
    $apicode = 'ST-PRINC107033_C7HF9';
    $passwd = 'da{59@vq5w';

            $ch = curl_init();
            $itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
            curl_setopt($ch, CURLOPT_URL,"https://www.itexmo.com/php_api/api.php");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, 
                      http_build_query($itexmo));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            return curl_exec ($ch);
            curl_close ($ch);

}

//START: AUTH

function auth_outside() {

    $session = not_required_session('session');

    if($session) {

        if($session['type'] == 1) {

            header('location: admin-dashboard.php');
            exit();

        } elseif($session['type'] == 2) {

            header('location: student-home.php');
            exit();

        }

    }

}

function auth_admin() {

    $session = not_required_session('session');

    if($session) {

        if($session['type'] == 2) {

            header('location: student-home.php');
            exit();

        }

    } else {

        header('location: index.php');
        exit();

    }

}

function auth_student() {
    
    $session = not_required_session('session');

    if($session) {

        if($session['type'] == 1) {

            header('location: admin-dashboard.php');
            exit();

        }

    } else {

        header('location: index.php');
        exit();

    }

}

//END: AUTH

//START: RESPONDENT

function insert_respondent($respondent) {
    GLOBAL $link;
    $sql = "INSERT respondents (survey_id, name, course_year, school_year_id) VALUES (?, ?, ?, ?)";
    if($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "issi", $param_survey_id, $param_name, $param_course_year, $param_school_year_id);
        $param_survey_id = $respondent["survey_id"];
        $param_name = $respondent["name"];
        $param_course_year = $respondent["course_year"];
        $param_school_year_id = $respondent["school_year_id"];

        if(mysqli_stmt_execute($stmt)) {
            return true;
        }
    }
    return false;
}
function read_respondent($id) {
    GLOBAL $link;
    $respondent = to_associative(array("id", "survey_id", "name", "course_year", "school_year_id"));
    $sql = 'SELECT * FROM respondents WHERE id = "'. $id . '"';
    if($result = mysqli_query($link, $sql)) {
        while($row = mysqli_fetch_array($result)) {
    	    foreach($respondent as $key => $value) {
    	        $respondent[$key] = $row[$key];
            }
        }
    }
    return $respondent;
}
function read_respondent_latest() {
    GLOBAL $link;
    $respondent = to_associative(array("id", "survey_id", "name", "course_year", "school_year_id"));
    $sql = 'SELECT * FROM respondents ORDER BY id DESC LIMIT 1';
    if($result = mysqli_query($link, $sql)) {
        while($row = mysqli_fetch_array($result)) {
    	    foreach($respondent as $key => $value) {
    	        $respondent[$key] = $row[$key];
            }
        }
    }
    return $respondent;
}
function read_respondents() {
    GLOBAL $link;
    $respondents = array();
    $index = 0;
    $sql = 'SELECT id, survey_id, name, course_year, school_year_id FROM respondents';
    if($result = mysqli_query($link, $sql)) {
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $respondents[$index] = $row;
            $index++;
        }
    }
    return $respondents;
}
function count_respondents() {
    GLOBAL $link;
    $sql = 'SELECT * FROM respondents';
    if($result = mysqli_query($link, $sql)) {
        return mysqli_num_rows($result);
    }
    return 0;
}
function delete_respondent($id) {
    GLOBAL $link;
    if(sql_data_exist('respondents', 'id', $id)) {
        $sql = 'DELETE FROM respondents WHERE id = "'.$id.'"';
        if(mysqli_query($link, $sql)) {
            return true;
        }
    }
    return false;
}

//END: RESPONDENT

//START: FORM1

function insert_form1($form1) {
    GLOBAL $link;
    $sql = "INSERT form1_list (respondent_id, survey_id, school_year_id, radio_1, radio_2, radio_3, radio_4, radio_5, radio_6, radio_7, radio_8, radio_9, radio_10, radio_11, radio_12, radio_13, radio_14, radio_15, radio_16, radio_17, radio_18, radio_19, radio_20, radio_21, remarks_1, remarks_2, remarks_3, remarks_4, remarks_5, remarks_6, remarks_7, remarks_8, remarks_9, remarks_10, remarks_11) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    if($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "iiiiiiiiiiiiiiiiiiiiiiiisssssssssss", $param_respondent_id, $param_survey_id, $param_school_year_id, $param_radio_1, $param_radio_2, $param_radio_3, $param_radio_4, $param_radio_5, $param_radio_6, $param_radio_7, $param_radio_8, $param_radio_9, $param_radio_10, $param_radio_11, $param_radio_12, $param_radio_13, $param_radio_14, $param_radio_15, $param_radio_16, $param_radio_17, $param_radio_18, $param_radio_19, $param_radio_20, $param_radio_21, $param_remarks_1, $param_remarks_2, $param_remarks_3, $param_remarks_4, $param_remarks_5, $param_remarks_6, $param_remarks_7, $param_remarks_8, $param_remarks_9, $param_remarks_10, $param_remarks_11);
        $param_respondent_id = $form1["respondent_id"];
        $param_survey_id = $form1["survey_id"];
        $param_school_year_id = $form1["school_year_id"];
        $param_radio_1 = $form1["radio_1"];
        $param_radio_2 = $form1["radio_2"];
        $param_radio_3 = $form1["radio_3"];
        $param_radio_4 = $form1["radio_4"];
        $param_radio_5 = $form1["radio_5"];
        $param_radio_6 = $form1["radio_6"];
        $param_radio_7 = $form1["radio_7"];
        $param_radio_8 = $form1["radio_8"];
        $param_radio_9 = $form1["radio_9"];
        $param_radio_10 = $form1["radio_10"];
        $param_radio_11 = $form1["radio_11"];
        $param_radio_12 = $form1["radio_12"];
        $param_radio_13 = $form1["radio_13"];
        $param_radio_14 = $form1["radio_14"];
        $param_radio_15 = $form1["radio_15"];
        $param_radio_16 = $form1["radio_16"];
        $param_radio_17 = $form1["radio_17"];
        $param_radio_18 = $form1["radio_18"];
        $param_radio_19 = $form1["radio_19"];
        $param_radio_20 = $form1["radio_20"];
        $param_radio_21 = $form1["radio_21"];
        $param_remarks_1 = $form1["remarks_1"];
        $param_remarks_2 = $form1["remarks_2"];
        $param_remarks_3 = $form1["remarks_3"];
        $param_remarks_4 = $form1["remarks_4"];
        $param_remarks_5 = $form1["remarks_5"];
        $param_remarks_6 = $form1["remarks_6"];
        $param_remarks_7 = $form1["remarks_7"];
        $param_remarks_8 = $form1["remarks_8"];
        $param_remarks_9 = $form1["remarks_9"];
        $param_remarks_10 = $form1["remarks_10"];
        $param_remarks_11 = $form1["remarks_11"];

        if(mysqli_stmt_execute($stmt)) {
            return true;
        }
    }
    return false;
}
function read_form1($id) {
    GLOBAL $link;
    $form1 = to_associative(array("id", "respondent_id", "survey_id", "school_year_id", "radio_1", "radio_2", "radio_3", "radio_4", "radio_5", "radio_6", "radio_7", "radio_8", "radio_9", "radio_10", "radio_11", "radio_12", "radio_13", "radio_14", "radio_15", "radio_16", "radio_17", "radio_18", "radio_19", "radio_20", "radio_21", "remarks_1", "remarks_2", "remarks_3", "remarks_4", "remarks_5", "remarks_6", "remarks_7", "remarks_8", "remarks_9", "remarks_10", "remarks_11"));
    $sql = 'SELECT * FROM form1_list WHERE id = "'. $id . '"';
    if($result = mysqli_query($link, $sql)) {
        while($row = mysqli_fetch_array($result)) {
    	    foreach($form1 as $key => $value) {
    	        $form1[$key] = $row[$key];
            }
        }
    }
    return $form1;
}
function read_form1_list() {
    GLOBAL $link;
    $form1_list = array();
    $index = 0;
    $sql = 'SELECT id, respondent_id, survey_id, school_year_id, radio_1, radio_2, radio_3, radio_4, radio_5, radio_6, radio_7, radio_8, radio_9, radio_10, radio_11, radio_12, radio_13, radio_14, radio_15, radio_16, radio_17, radio_18, radio_19, radio_20, radio_21, remarks_1, remarks_2, remarks_3, remarks_4, remarks_5, remarks_6, remarks_7, remarks_8, remarks_9, remarks_10, remarks_11 FROM form1_list';
    if($result = mysqli_query($link, $sql)) {
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $form1_list[$index] = $row;
            $index++;
        }
    }
    return $form1_list;
}
function count_form1_list() {
    GLOBAL $link;
    $sql = 'SELECT * FROM form1_list';
    if($result = mysqli_query($link, $sql)) {
        return mysqli_num_rows($result);
    }
    return 0;
}
function delete_form1($id) {
    GLOBAL $link;
    if(sql_data_exist('form1_list', 'id', $id)) {
        $sql = 'DELETE FROM form1_list WHERE id = "'.$id.'"';
        if(mysqli_query($link, $sql)) {
            return true;
        }
    }
    return false;
}

//END: FORM1

//START: SURVEY

function insert_survey($survey) {
    GLOBAL $link;
    $sql = "INSERT survey_list (survey_form_id, date) VALUES (?, ?)";
    if($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "is", $param_survey_form_id, $param_date);
        $param_survey_form_id = $survey["survey_form_id"];
        $param_date = $survey["date"];

        if(mysqli_stmt_execute($stmt)) {
            return true;
        }
    }
    return false;
}
function read_survey($id) {
    GLOBAL $link;
    $survey = to_associative(array("id", "survey_form_id", "date"));
    $sql = 'SELECT * FROM survey_list WHERE id = "'. $id . '"';
    if($result = mysqli_query($link, $sql)) {
        while($row = mysqli_fetch_array($result)) {
    	    foreach($survey as $key => $value) {
    	        $survey[$key] = $row[$key];
            }
        }
    }
    return $survey;
}
function read_survey_list() {
    GLOBAL $link;
    $survey_list = array();
    $index = 0;
    $sql = 'SELECT id, survey_form_id, date FROM survey_list';
    if($result = mysqli_query($link, $sql)) {
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $survey_list[$index] = $row;
            $index++;
        }
    }
    return $survey_list;
}
function count_survey_list() {
    GLOBAL $link;
    $sql = 'SELECT * FROM survey_list';
    if($result = mysqli_query($link, $sql)) {
        return mysqli_num_rows($result);
    }
    return 0;
}
function delete_survey($id) {
    GLOBAL $link;
    if(sql_data_exist('survey_list', 'id', $id)) {
        $sql = 'DELETE FROM survey_list WHERE id = "'.$id.'"';
        if(mysqli_query($link, $sql)) {
            return true;
        }
    }
    return false;
}
function read_survey_latest() {
    GLOBAL $link;
    $survey = to_associative(array("id", "survey_form_id"));
    $sql = 'SELECT * FROM survey_list ORDER BY id DESC LIMIT 1';
    if($result = mysqli_query($link, $sql)) {
        while($row = mysqli_fetch_array($result)) {
    	    foreach($survey as $key => $value) {
    	        $survey[$key] = $row[$key];
            }
        }
    }
    return $survey;
}

//END: SURVEY

//START: SETTING

function insert_setting($settings) {
    GLOBAL $link;
    $sql = "INSERT settings (admin_id, survey_form_id) VALUES (?, ?)";
    if($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "ii", $param_admin_id, $param_survey_form_id);
        $param_admin_id = $settings["admin_id"];
        $param_survey_form_id = $settings["survey_form_id"];

        if(mysqli_stmt_execute($stmt)) {
            return true;
        }
    }
    return false;
}
function read_setting($id) {
    GLOBAL $link;
    $setting = to_associative(array("id", "admin_id", "survey_form_id"));
    $sql = 'SELECT * FROM settings WHERE id = "'. $id . '"';
    if($result = mysqli_query($link, $sql)) {
        while($row = mysqli_fetch_array($result)) {
    	    foreach($setting as $key => $value) {
    	        $setting[$key] = $row[$key];
            }
        }
    }
    return $setting;
}
function read_setting_by_admin($id) {
    GLOBAL $link;
    $setting = to_associative(array("id", "admin_id", "survey_form_id"));
    $sql = 'SELECT * FROM settings WHERE admin_id = "'. $id . '"';
    if($result = mysqli_query($link, $sql)) {
        while($row = mysqli_fetch_array($result)) {
    	    foreach($setting as $key => $value) {
    	        $setting[$key] = $row[$key];
            }
        }
    }
    return $setting;
}
function read_settings() {
    GLOBAL $link;
    $settings = array();
    $index = 0;
    $sql = 'SELECT id, admin_id, survey_form_id FROM settings';
    if($result = mysqli_query($link, $sql)) {
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $settings[$index] = $row;
            $index++;
        }
    }
    return $settings;
}
function count_settings() {
    GLOBAL $link;
    $sql = 'SELECT * FROM settings';
    if($result = mysqli_query($link, $sql)) {
        return mysqli_num_rows($result);
    }
    return 0;
}
function delete_setting($id) {
    GLOBAL $link;
    if(sql_data_exist('settings', 'id', $id)) {
        $sql = 'DELETE FROM settings WHERE id = "'.$id.'"';
        if(mysqli_query($link, $sql)) {
            return true;
        }
    }
    return false;
}

//END: SETTING

//START: ADMIN

function insert_admin($admins) {
    GLOBAL $link;
    $sql = "INSERT admins (username, password, type) VALUES (?, ?, ?)";
    if($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssi", $param_username, $param_password, $param_type);
        $param_username = $admins["username"];
        $param_password = $admins["password"];
        $param_type = $admins["type"];

        if(mysqli_stmt_execute($stmt)) {
            return true;
        }
    }
    return false;
}
function read_admin($id) {
    GLOBAL $link;
    $admin = to_associative(array("id", "username", "password", "type"));
    $sql = 'SELECT * FROM admins WHERE id = "'. $id . '"';
    if($result = mysqli_query($link, $sql)) {
        while($row = mysqli_fetch_array($result)) {
    	    foreach($admin as $key => $value) {
    	        $admin[$key] = $row[$key];
            }
        }
    }
    return $admin;
}
function read_admin_by_username($username) {
    GLOBAL $link;
    $admin = to_associative(array("id", "username", "password", "type"));
    $sql = 'SELECT * FROM admins WHERE username = "'. $username . '"';
    if($result = mysqli_query($link, $sql)) {
        while($row = mysqli_fetch_array($result)) {
    	    foreach($admin as $key => $value) {
    	        $admin[$key] = $row[$key];
            }
        }
    }
    return $admin;
}
function read_admins() {
    GLOBAL $link;
    $admins = array();
    $index = 0;
    $sql = 'SELECT id, username, password, type FROM admins';
    if($result = mysqli_query($link, $sql)) {
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $admins[$index] = $row;
            $index++;
        }
    }
    return $admins;
}
function count_admins() {
    GLOBAL $link;
    $sql = 'SELECT * FROM admins';
    if($result = mysqli_query($link, $sql)) {
        return mysqli_num_rows($result);
    }
    return 0;
}
function delete_admin($id) {
    GLOBAL $link;
    if(sql_data_exist('admins', 'id', $id)) {
        $sql = 'DELETE FROM admins WHERE id = "'.$id.'"';
        if(mysqli_query($link, $sql)) {
            return true;
        }
    }
    return false;
}

//END: ADMIN

?>