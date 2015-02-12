<?php
session_start();
if ( empty($_SESSION['authorized'])
	|| $_SESSION['ip'] != $_SERVER['REMOTE_ADDR'] ) {
	die("Доступ закрыт."); 
} 

$path = $_SERVER['DOCUMENT_ROOT'];
$return_path = '/admin/news.php';
$table_name = 'news';

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
	if ($post['tournament'] == 1) rrmdir("$path/images/gallery/{$post['id']}");	 
	header("Location: $return_path");
}	

if ($_POST['action']=='update') {	
	update($post['data'], $post['id'], $table_name);
	header("Location: $return_path");
}

if ($_POST['action']=='new') {
	$post['data']['pub_date']=date("Y-m-d");
	$post['data']['time']=date("H:i:s");
	if($post['data']['tournament_date'] == '') {
	    unset($post['data']['tournament_date']);
	}
	create($post['data'], $table_name);

	if ($post['data']['tournament'] == 1) {	
		$last_id=mysql_insert_id(Database::$mConnect);
		mkdir("$path/images/gallery/$last_id");
	}

	header("Location: $return_path");
}

?>