<?php
session_start();
if ( empty($_SESSION['authorized'])
	|| $_SESSION['ip'] != $_SERVER['REMOTE_ADDR'] ) {
	die("Доступ закрыт."); 
} 



$path = $_SERVER['DOCUMENT_ROOT'];
$return_path = '/admin/gallery';
$table_name = 'galleries';

include ($path.'/lib/db_connect.php');


function rrmdir($dir) {
	foreach(glob($dir . '/*') as $file) {
		if (is_dir($file)) rrmdir($file);
		else unlink($file);
	}
	rmdir($dir);
}

foreach ($_POST as $key => $value) {
	$post[$key] = mysql_real_escape_string($value);
}

if ($_POST['action']=='delete') {
	$sql="delete from `news` where id={$_POST['id']}";
	//echo $sql;
	$result=mysql_query($sql,Database::$mConnect);
	rrmdir("$path/images/gallery/{$_POST['id']}");	 
	header("Location: /admin/news.php");
}	

if ($_POST['action']=='update') {
	
	$sql="
		update news	set
		text = '{$post['text']}',
		anons = '{$post['anons']}',
		title = '{$post['title']}',
		tournament = {$post['tournament']},
		category_id = {$post['category_id']},
		main = {$post['main']}
		where 
		id = {$post['id']};
	";
	//echo $sql;
	$result=mysql_query($sql,Database::$mConnect);
	header("Location: /admin/news.php");
}

if ($_POST['action']=='new') {

	$date=date("Y-m-d");
	$time=date("H:i:s");
	$sql="
		INSERT INTO `news` 
		(`title`, `pub_date`, `time`, `text`, 
			`main`, `category_id`, `tournament`, `anons`) 
		VALUES ('{$post['title']}', '{$date}', '{$time}', 
			'{$post['text']}', 
			{$post['main']}, {$post['category_id']}, {$post['tournament']},
			'{$post['anons']}' )
	";
	//echo $sql;
	$result=mysql_query($sql,Database::$mConnect);

	if ($post['tournament'] == 1) {	
		$last_id=mysql_insert_id(Database::$mConnect);
		mkdir("$path/images/gallery/$last_id");
	}

	header("Location: /admin/news.php");
}

?>