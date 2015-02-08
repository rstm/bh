<?php
session_start();
if ( empty($_SESSION['authorized'])
	|| $_SESSION['ip'] != $_SERVER['REMOTE_ADDR'] ) {
	die("Доступ закрыт."); 
} 

$path = $_SERVER['DOCUMENT_ROOT'];
$return_path = '/admin/media.php';
$table_name = 'media';

include ($path.'/lib/functions.php');

foreach ($_POST as $key => $value) {
	if (is_array($value)) {
		foreach ($value as $sub_key => $sub_value) {
			$post[$key][$sub_key] = mysql_real_escape_string($sub_value);
		}
	}
	else $post[$key] = mysql_real_escape_string($value);
}

if ($_POST['action']=='delete') {
	delete($post['id'], $table_name);
	header("Location: $return_path");
}	

if ($_POST['action']=='update') {
	update($post['data'], $post['id'], $table_name);
	header("Location: $return_path");
}

if ($_POST['action']=='new') {
	create($post['data'], $table_name);
	header("Location: $return_path");
}

?>