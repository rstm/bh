<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include ($path.'/lib/db_connect.php');

function check_login() {
	if(isset($_COOKIE['remember_token'])) {

		$query = "SELECT remember_token FROM users WHERE id = '".intval($_COOKIE['id'])."' LIMIT 1";

		$result = mysql_query($query,Database::$mConnect);

		//echo mysql_error();

		$data = mysql_fetch_assoc($result);

		$remember_token = md5($_SERVER['REMOTE_ADDR'].$_COOKIE['remember_token']);


		//echo $remember_token.'</br>';

		//echo $data['remember_token']; 

		if ($data['remember_token'] !== $remember_token) {
			header("Location: /admin");
			exit();
		} else {
			$_SESSION['authorized'] = true;  
	  		$_SESSION['ip'] = $_SERVER['REMOTE_ADDR']; 
		}
	} else {
		header("Location: /admin");
		exit();
	}
}

function show($method, $result) {
	global $path; 
	include $path.'/app/views/'.$method;
}

function show_v2($method, $data) {
	global $path;
	include $path.'/app/views/'.$method;
}

function sign_in() {
	if ( !empty($_SESSION['authorized'])
		&& $_SESSION['ip'] == $_SERVER['REMOTE_ADDR'] ) {
		return true;
	} else return false;//die("Доступ закрыт."); 
}

function rudate($format, $timestamp = 0, $nominative_month = false)
{
	 if(!$timestamp) $timestamp = time();
	 elseif(!preg_match("/^[0-9]+$/", $timestamp)) $timestamp = strtotime($timestamp);
	 
		$F = $nominative_month ? array(1=>"Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь") : array(1=>"Января", "Февраля", "Марта", "Апреля", "Мая", "Июня", "Июля", "Августа", "Сентября", "Октября", "Ноября", "Декабря");
		$M = array(1=>"Янв", "Фев", "Мар", "Апр", "Май", "Июн", "Июл", "Авг", "Сен", "Окт", "Ноя", "Дек");
		$l = array("Воскресенье", "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота");
		$D = array("Вс", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб");

		$format = str_replace("F", $F[date("n", $timestamp)], $format);
		$format = str_replace("M", $M[date("n", $timestamp)], $format);
		$format = str_replace("l", $l[date("w", $timestamp)], $format);
		$format = str_replace("D", $D[date("w", $timestamp)], $format);
	 
	 return date($format, $timestamp);
}

function post_escape($input) {
	foreach ($input as $key => $value) {
		if (is_array($value)) {
			foreach ($value as $sub_key => $sub_value) {
				$result[$key][$sub_key] = mysql_real_escape_string($sub_value);
			}
		}
		else $result[$key] = mysql_real_escape_string($value);
	}
	return $result;
}

function rrmdir($dir) {
	foreach(glob($dir . '/*') as $file) {
		if (is_dir($file)) rrmdir($file);
		else unlink($file);
	}
	rmdir($dir);
}

function create($data,$table_name) {
	$keys = implode(",", array_keys($data));
	$values = implode("', '", $data);
	$sql = "
		INSERT INTO $table_name 
		($keys) VALUES ('$values');		
	";
	$result=mysql_query($sql,Database::$mConnect);
}

function update($data,$id,$table_name) {
	$convert = implode(", ", array_map(function ($v, $k) { return $k." = '".$v."'"; }, $data, array_keys($data)));
	$sql = "
		UPDATE $table_name SET
		$convert
		WHERE id = $id;		
	";
	$result=mysql_query($sql,Database::$mConnect);
}

function delete($id,$table_name) {
	$sql = "DELETE FROM $table_name WHERE id = $id";
	$result=mysql_query($sql,Database::$mConnect);
}

?>