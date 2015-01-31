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

foreach ($_POST as $key => $value) {
	$post[$key] = mysql_real_escape_string($value);
}

if ($_POST['action']=='delete') {
	$sql="delete from `news` where id={$_POST['id']}";
	//echo $sql;
	$result=mysql_query($sql,Database::$mConnect);
		 
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

	$date=date("Y-m-d");
	$time=date("H:i:s");
	$sql="
		INSERT INTO `news` 
		(`title`, `pub_date`, `time`, `text`, 
			`main`, `category_id`, `tournament`) 
		VALUES ('{$post['title']}', '{$date}', '{$time}', 
			'{$post['text']}', 
			{$post['main']}, {$post['category_id']}, {$post['tournament']} )
	";
	//echo $sql;
	$result=mysql_query($sql,Database::$mConnect);

	header("Location: /admin/news.php");
}

?>