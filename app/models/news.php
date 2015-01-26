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

if ($_POST['action']=='delete') {
	$sql="delete from `news` where id={$_POST['id']}";
	//echo $sql;
	$result=mysql_query($sql,Database::$mConnect);
		 
	header("Location: /admin/news.php");
}	

if ($_POST['action']=='update') {
	$text = mysql_real_escape_string($_POST['text']);
	$title = mysql_real_escape_string($_POST['title']);
	$main = mysql_real_escape_string($_POST['main']);
	$sql="
		update news	set
		text = '$text',
		title = '$title',
		main = $main
		where 
		id={$_POST['id']};
	";
	//echo $sql;
	$result=mysql_query($sql,Database::$mConnect);
	header("Location: /admin/news.php");
}

if ($_POST['action']=='new') {
	//if(empty($_POST['news'])) header("Location: /admin/new.php");
	//mysql_real_escape_string
	$text = mysql_real_escape_string($_POST['text']);
	$title = mysql_real_escape_string($_POST['title']);
	$date=date("Y-m-d");
	$time=date("H:i:s");
	$sql="
		INSERT INTO `news` 
		(`title`, `pub_date`, `time`, `text`, `main`, `category_id`) 
		VALUES ('{$title}', '{$date}', '{$time}', '$text', 
			{$_POST['main']}, {$_POST['category_id']} )
	";
	//echo $sql;
	$result=mysql_query($sql,Database::$mConnect);

	header("Location: /admin/news.php");
}

?>