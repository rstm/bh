<?php
session_start();
if ( empty($_SESSION['authorized'])
	|| $_SESSION['ip'] != $_SERVER['REMOTE_ADDR'] ) {
	die("Доступ закрыт."); 
} 



$path = $_SERVER['DOCUMENT_ROOT'];
$return_path = '/admin/media.php';
$table_name = 'media';

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
		title = '{$post['$title']},
		tournament = {$post['tournament']}
		main = {$post['main']}
		where 
		id={$_POST['id']};
	";
	//echo $sql;
	$result=mysql_query($sql,Database::$mConnect);
	header("Location: /admin/news.php");
}

if ($_POST['action']=='new') {
	$sql="
		INSERT INTO $table_name 
		(`title`, `anons`, `url`) 
		VALUES ('{$post['title']}','{$post['anons']}','{$post['url']}' )
	";
	//echo $sql;
	$result=mysql_query($sql,Database::$mConnect);
	header("Location: $return_path");
}

?>