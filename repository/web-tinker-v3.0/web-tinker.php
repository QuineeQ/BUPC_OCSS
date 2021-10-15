<?php

	/**
	 * 
	 * @author Keanno Manuel R. Regino
	 * @version 3.0 
	 * @since June 19, 2021	
	 * 
	 * update: July 16, 2021
	 * 
	 */

	define('WT_VERSION', '3.0');

	$link = create_connection();

	require_once('validator_list.php');

	function create_connection() {
		GLOBAL $link;

		$link = mysqli_connect(WT_DATABASE_HOST, WT_DATABASE_USERNAME, 
							   WT_DATABASE_PASSWORD, WT_DATABASE_NAME);

		if($link === false)
			die("ERROR: Could Not Connect!" . mysqli_connect_error());

		return $link;
	}

	function load_css($name, $path='') {
		echo '<link rel="stylesheet" type="text/css" href="'.$path.'repository/styles/'.$name.'.css">';
	}

	function load_script($name, $path='') {
		echo '<script type="text/javascript" src="'.$path.'repository/scripts/'.$name.'.js"></script>';
	}

	function get_png($file_name) {
		if(WT_PROJECT_STATE == 1)
			return '../repository/assets/images/png/'.$file_name.'.png';
		else if(WT_PROJECT_STATE == 2)
			return 'repository/assets/images/png/'.$file_name.'.png';
	}

	function get_svg($file_name) {	
		if(WT_PROJECT_STATE == 1)
			return '../repository/assets/images/svg/'.$file_name.'.svg';
		else if(WT_PROJECT_STATE == 2)
			return 'repository/assets/images/svg/'.$file_name.'.svg';
	}

	function get_jpg($file_name) {	
		if(WT_PROJECT_STATE == 1)
			return '../repository/assets/images/jpg/'.$file_name.'.jpg';
		else if(WT_PROJECT_STATE == 2)
			return 'repository/assets/images/jpg/'.$file_name.'.jpg';
	}


	function render_empty($name, $path='') {
		require_once($path.'pages/empty/empty-'.$name.'.php');
	}
	function render_list($name, $path='') {	
		require_once($path.'pages/list/'.$name.'-list.php');
	}
	function render_navbar($name, $path='') {
		require_once($path.'pages/navbar/'.$name.'-navbar.php');
	}
	function render_sidebar($name, $path='') {
		require_once($path.'pages/sidebar/'.$name.'-sidebar.php');
	}

   	/**
   	 * This method is used to read the given session but it's not required
   	 * It will return NULL if the given session name can't find the session.
   	 * 
   	 * @param $session_name The session name
   	 * @return session This returns session
   	 * 
   	 */

	function not_required_session($session_name) {
		if(issetsession($session_name))
			return session($session_name);
		else
			return NULL;
	}

	/**
   	 * This method is used to read the given session and it's required
   	 * It will authenticate to the given page if the given session name can't find the session.
   	 * 
   	 * @param $session_name The session name
   	 * @param $page_name The authentication page
   	 * @return session This returns session
   	 * 
   	 */

	function auth_session($session_name, $page_name) {
		if(issetsession($session_name)) {
			return $session_name = session($session_name);
		} else {
			header('location: '.$page_name.'.php');
			exit();
		}
	}

	function auth_post($name, $page_name) {
		if(issetpost($name)) {
			return post($name);
		} else {
			header('location: '.$page_name.'.php');
			exit();
		}
	}

	function auth_get($name, $page_name) {
		if(issetget($name)) {
			return get($name);
		} else {
			header('location: '.$page_name.'.php');
			exit();
		}
	}

	function builtinerror() {
		GLOBAL $error;

		if(!is_empty($error) || issetsession('session_error')) {
			echo '<ul class="error-list">';
			echo '    <p class="error-title"><i class="fas fa-exclamation-triangle mr-2"></i>Your input has an error, please check it</p>';
			echo '    <hr>';
					foreach($error as $key => $value) {
						if(!empty($value))
							echo '<li>'.$value.'</li>';	
					}
					if(issetsession('session_error')) {

						$session_error = session('session_error');

						foreach($session_error as $key => $value) {
							if(!empty($value))
								echo '<li>'.$value.'</li>';	
						}
						
						unset($_SESSION['session_error']);

					}
			echo '</ul>';	
		}
	}

	function builtinsuccess() {

		if(issetsession('success')) {

			$success = session('success');

			if(!is_empty($success)) {
				echo '<ul class="success-list">';
				echo '    <p class="success-title"><i class="fas fa-check-circle mr-2"></i>System Message</p>';
				echo '    <hr>';
						foreach($success as $value) {
							if(!empty($value))
								echo '<li>'.$value.'</li>';	
						}
				echo '</ul>';	
			}

			unset($_SESSION['success']);

		}
		
	}

	/**
   	 * This method is used to check if the given array is empty.
   	 * 
   	 * @param $arr The given array
   	 * @return boolean This return results of checking array
   	 *
   	 */
	
	function is_empty($arr) {
		
		$result = true;

		foreach($arr as $value => $key)
			if(!empty($arr[$value])) {
				$result = false;
				break;
			}

		return $result;
	}

	function condition($value, $target, $return_value) {
		if($value == $target)
			return $return_value;
	}

	//SQL

	function sql_data_exist($table, $column, $data) {
		GLOBAL $link;

		$sql = 'SELECT * FROM '.$table.' WHERE '.$column.' = "'.$data.'"';

		if($result = mysqli_query($link, $sql))
			if(mysqli_num_rows($result) >= 1)
				return true;

		return false;
	}

	function sql_result_to_array($sql) {
		GLOBAL $link;

		$count = 0;
		$arr = array();

		if($result = mysqli_query($link, $sql))
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			    $arr[$count] = $row;
			    $count++;
			}

		return $arr;
	}

	function sql_result_to_solo($sql) {
		GLOBAL $link;

		if($result = mysqli_query($link, $sql))
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			    return $row;
			}

		return NULL;
	}

	function sql_count_rows($sql) {
		GLOBAL $link;

		if($result = mysqli_query($link, $sql))
			return mysqli_num_rows($result);

		return 0;
	}

	function get($arg) {
		return $_GET[$arg];
	}

	function issetget($arg) {
		return isset($_GET[$arg]);
	}

	function issetpost($arg) {
		return isset($_POST[$arg]);
	}

	function issetsession($arg) {
		return isset($_SESSION[$arg]);
	}

	function post($arg) {
		return $_POST[$arg];
	}

	function session($session_name) {
		return $_SESSION[$session_name];
	}

	function server($arg) {
		return $_SERVER[$arg];
	}

	function getaction() {
		return trim($_GET['req_action']);
	}

	function postaction() {
		return trim($_POST['req_action']);
	}

	function trimget($arg) {
		if($arg !== 'req_action')
			return trim($_GET[$arg]);
	}

	function trimpost($arg) {
		if($arg !== 'req_action')
			return trim($_POST[$arg]);
	}

	function trimsession($arg) {
		return trim($_SESSION[$arg]);
	}

	/**
   	 * This method is used to validate the form data
   	 * 
   	 * @return void
   	 * 
   	 */

	function validator() {
		GLOBAL $user;
		GLOBAL $input;
		GLOBAL $error;
		GLOBAL $validator_list;

		foreach($input as $key => $value) {
			$validate = $validator_list[$key];

			switch($validate['type']) {

				case WT_NUMERICAL:

					if(!preg_match('/^[0-9]*$/', $value)) {
						$error[$key] = 'Numerical values only'.' at ['.$key.']';
					} elseif($value < $validate['min']) {
						$error[$key] = 'Please input atleast '.$validate['min'].' characters at ['.$key.']';
					} elseif($validate['max'] != 'INFINITY' && $value > $validate['max']) {
						$error[$key] = 'Input doesn\'t exceed at '.$validate['max'].' characters at ['.$key.']';
					} else {
						$error[$key] = '';
						$user[$key] = $value;
					}

					break;

				case WT_STRING:

					if(strlen($value) < $validate['min']) {
						$error[$key] = 'Please input atleast '.$validate['min'].' characters at ['.$key.']';
					} elseif(strlen($value) > $validate['max']) {	
						$error[$key] = 'Input doesn\'t exceed at '.$validate['max'].' characters at ['.$key.']';
					} elseif(($validate['regexp'] !== 'none') && !preg_match($validate['regexp'], $value)) {
						$error[$key] = $validate['definition'].' at ['.$key.']';
					} else {
						$error[$key] = '';
						$user[$key] = htmlspecialchars($value);
					}

					break;

			}

		}

	}

	function upload_image($param) {
		
		GLOBAL $user;
		GLOBAL $error;

   		try {
   
		    // Undefined | Multiple Files | $_FILES Corruption Attack
		    // If this request falls under any of them, treat it invalid.
		    if (!isset($_FILES[$param]['error']) || is_array($_FILES[$param]['error'])) {

		        $error['image_location'] = 'Please upload a valid image. ' . '['.$param.']';
		        return FALSE;

		    }

		    // Check $_FILES['upfile']['error'] value.
		    switch ($_FILES[$param]['error']) {

		        case UPLOAD_ERR_OK:
		             break;

		        case UPLOAD_ERR_NO_FILE:

		       		 $error['image_location'] = 'No file sent. ' . '['.$param.']';
		             return FALSE;

		        case UPLOAD_ERR_INI_SIZE:
		        case UPLOAD_ERR_FORM_SIZE:

		             $error['image_location'] ='Exceeded filesize limit. ' . '['.$param.']';
		             return FALSE;

		        default:

		            $error['image_location'] ='Error File. ' . '['.$param.']';
		            return FALSE;

		    }

		    // You should also check filesize here.
		    if ($_FILES[$param]['size'] > 9000000) {

		        $error['image_location'] = 'Exceed filesize limit. ' . '['.$param.']';
		        return FALSE;

		    }

		    // DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
		    // Check MIME Type by yourself.
		    $finfo = new finfo(FILEINFO_MIME_TYPE);

		    if (false === $ext = array_search(
		        $finfo->file($_FILES[$param]['tmp_name']),
		        array(
		            'jpg' => 'image/jpeg',
		            'png' => 'image/png',	
		            'gif' => 'image/gif'
		        ),
		        true
		    )) {

		         $error['image_location'] = 'Invalid file format. ' . '['.$param.']';
		         return FALSE;
		   
		    }

		    // You should name it uniquely.
		    // DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
		    // On this example, obtain safe unique name from its binary data.
		    if (!move_uploaded_file($_FILES[$param]['tmp_name'], sprintf('uploads/%s', $_FILES[$param]['name']))){

		        $error['image_location'] = 'Failed to move upload. ' . '['.$param.']';
		        return FALSE;

		    }

		    $user['image_location'] = sprintf('uploads/%s', $_FILES[$param]['name']);

		} catch (RuntimeException $e) {

			$error['image_location'] = $e->getMessage() . ' ['.$param.']';
			return FALSE;

		}

		return TRUE;
   	}

	function upload_files($param, $directory) {
		GLOBAL $error;

		$target = count($_FILES[$param]['name']);

		for($i = 0; $i < $target; $i++) {

			try {

				if(!isset($_FILES[$param]['error'][$i])) {
					$error[$param] = 'Please upload a valid image.';
		        	return FALSE;
				}

				switch ($_FILES[$param]['error'][$i]) {

					case UPLOAD_ERR_OK:
						 break;
	
					case UPLOAD_ERR_NO_FILE:
	
							$error[$param] = 'No file sent.';
						 return FALSE;
	
					case UPLOAD_ERR_INI_SIZE:
					case UPLOAD_ERR_FORM_SIZE:
	
						 $error[$param] ='Exceeded filesize limit.';
						 return FALSE;
	
					default:
	
						$error[$param] ='Error File.';
						return FALSE;
	
				}
	
				// You should also check filesize here.
				if ($_FILES[$param]['size'][$i] > 5000000) {
					$error[$param] = 'Exceed filesize limit.';
					return FALSE;
				}
	
				// DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
				// Check MIME Type by yourself.
				
				/*
				$finfo = new finfo(FILEINFO_MIME_TYPE);
	
				if (false === $ext = array_search(
					$finfo->file($_FILES[$param]['tmp_name'][$i]),
					array(
						'jpg' => 'image/jpeg',
						'png' => 'image/png',
						'gif' => 'image/gif',
						'jar' => 'application/jar',

					),
					true
				)) {	
	
					 $error[$param] = 'Invalid file format. ';
					 return FALSE;
			   
				}

				*/
	
				// You should name it uniquely.
				// DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
				// On this example, obtain safe unique name from its binary data.
				if (!move_uploaded_file($_FILES[$param]['tmp_name'][$i], sprintf( $directory.'/%s', $_FILES[$param]['name'][$i]))){
					$error[$param] = 'Failed to move upload.';
					return FALSE;
				}

			} catch(RuntimeException $e) {
				$error[$param] = $e->getMessage();
				return FALSE;
			}

		}

		return TRUE;
   	}

	function not_bound($num, $bound, $format) {
		if($num == 0)
			return "Empty";
		else if($num > $bound)
			return $bound . $format;
		else
			return $num;
		
	}

	function not_bound_string($arg, $bound, $format) {
		$len = strlen($arg);

		if($len == 0) {
			return "";
		} else if($len > $bound) {
			$diff = $len - $bound;
			$result = substr($arg, 0, -$diff);
			return $result . $format;
		} else {
			return $arg;
		}

	}

	function render_get($arg) {
		if(isset($_GET[$arg]))
			return $_GET[$arg];
		
		return "";
	}

	function render_post($arg) {
		if(isset($_POST[$arg]))
			return $_POST[$arg];

		return "";
	}

	function session_stamp($name, $pages) {
		$scope = 0;

		$url = '/'.strtolower(WT_PROJECT_NAME).'/';

		foreach($pages as $value)
			if(($url . $value . '.php') === $_SERVER['PHP_SELF']) {
				$scope = 1;	
				break;
			}

		if($scope == 0)
			unset($_SESSION[$name]);
	}

	function self() {
		return htmlspecialchars($_SERVER['PHP_SELF']);
	}

	function to_name($arr, $type=1) {
		if($type == 1)
			return $arr['first_name'] . ' ' . $arr['middle_name'] . ' ' . $arr['last_name'];
	}

	function to_associative($arr) {
		$associative = NULL;

		for($i = 0; $i < count($arr); $i++)
			$associative[$arr[$i]] = '';

		return $associative;
	}

	function hash_str($str) {
		return password_hash($str, PASSWORD_DEFAULT);
	}

	function military_to_normal($arg) {
		return date('h:i a', strtotime($arg));
	}

	function get_date() {
		return date('F j, Y');
	}

	function get_time() {
		return date('g:i a');
	}

?>