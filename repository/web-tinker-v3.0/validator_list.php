<?php

	define('WT_NUMERICAL', 1);
    define('WT_STRING', 2);

	$validator_list = array(
        'age' => properties(WT_NUMERICAL, 1, 100),
        'business_name' => properties(WT_STRING, 1, 255),
        'contact_number' => properties(WT_STRING, 11, 11, '/^09\d{9}$/', 'Input a valid contact number and atleast 11 characters'),
        'cancel_reservation_id' => properties(WT_NUMERICAL, 1, 'INFINITY'),
        'course_year' => properties(WT_STRING, 2, 255),
        'course_year_id' => properties(WT_NUMERICAL, 1, 'INFINITY'),
        'details' => properties(WT_STRING, 1, 255),
        'description' => properties(WT_STRING, 1, 1000),
        'email' => properties(WT_STRING, 1, 255),
        'email_address' => properties(WT_STRING, 1, 255),
        'first_name' => properties(WT_STRING, 2, 255, '/^[a-zA-Z., ]*$/', 'Only letters and some special characters like [space][.][,][-]'),
        'folder_name' => properties(WT_STRING, 1, 255),
        'gender' => properties(WT_NUMERICAL, 1, 2),
        'home_address' => properties(WT_STRING, 2, 255),
        'image_location' => properties(WT_STRING, 1, 255),
        'id' => properties(WT_NUMERICAL, 1, 'INFINITY'),
        'is_accepted' => properties(WT_NUMERICAL, 1, 'INFINITY'),
        'is_done' => properties(WT_NUMERICAL, 1, 2),
        'item_id' => properties(WT_NUMERICAL, 1, 'INFINITY'),
        'last_name' => properties(WT_STRING, 2, 255, '/^[a-zA-Z., ]*$/', 'Only letters and some special characters like [space][.][,][-]'),
        'middle_name' => properties(WT_STRING, 2, 255, '/^[a-zA-Z., ]*$/', 'Only letters and some special characters like [space][.][,][-]'),
        'message' => properties(WT_STRING, 1, 255),
        'name' => properties(WT_STRING, 1, 255, '/^[a-zA-Z., ]*$/', 'Only letters and some special characters like [space][.][,][-]'),
        'password' => properties(WT_STRING, 4, 255, '/^[a-zA-Z0-9]*$/', 'Only letters and numbers'),
        'price' => properties(WT_NUMERICAL, 1, 999999),
        'reservation_id' => properties(WT_NUMERICAL, 1, 'INFINITY'),
        'reservation_id' => properties(WT_NUMERICAL, 1, 'INFINITY'),
        'schedule_date' => properties(WT_STRING, 1, 255),
        'school_year_id' => properties(WT_NUMERICAL, 1, 2),
        'schedule_time' => properties(WT_STRING, 1, 255),
        'survey_form_id' => properties(WT_NUMERICAL, 1, 'INFINITY'),
        'tin_number' => properties(WT_STRING, 15, 15, '/^\d{3}-\d{3}-\d{3}-\d{3}$/', 'Input a valid TIN Number e.g., (177-528-817-000)'),
        'title' => properties(WT_STRING, 1, 255),
        'target_date' => properties(WT_STRING, 1, 255),
        'target_time' => properties(WT_STRING, 1, 255),
        'type' => properties(WT_NUMERICAL, 1, 999999),
        'username' => properties(WT_STRING, 4, 255, '/^[a-zA-Z0-9]*$/', 'Only letters and numbers'),
        'zip_code' => properties(WT_STRING, 1, 255, '/^[0-9]*$/', 'Only numbers'),
    );
    
    function properties($type, $min=4, $max=255, $regexp='none', $definition='none') {

        return array('type' => $type, 
                     'min' => $min,
                     'max' => $max,
                     'regexp' => $regexp,
                     'definition' => $definition
                    );

    }

    function custom_validator($key, $properties) {

        GLOBAL $validator_list;

        $validator_list[$key] = $properties;

    }


?>