<?php
session_start();
if($_SESSION['in'] != 1) header("Location: index.php");

$path = $_SERVER['DOCUMENT_ROOT'];

include ($path.'/lib/db_connect.php');


if ($_GET['action']=='out') {
	$_SESSION = array();
	if (isset($_COOKIE[session_name()])) {
   		setcookie(session_name(), '', time()-42000, '/');
	}
	session_destroy();
		 
	header("Location: /admin");
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
		text='{$_POST['news']}'
		where 
		id={$_POST['id']};
	";
	//echo $sql;
	$result=mysql_query($sql,Database::$mConnect);
	header("Location: /admin/news.php");
}

if ($_POST['action']=='add') {
	//if(empty($_POST['news'])) header("Location: /admin/new.php");

	$date=date("Y-m-d");
	$time=date("H:i:s");
	$sql="
		INSERT INTO `news` 
		( `pub_date`, `time`, `text`) 
		VALUES ('{$date}', '{$time}', '{$_POST['news']}');
	";
	//echo $sql;
	$result=mysql_query($sql,Database::$mConnect);

	header("Location: /admin/news.php");
}

