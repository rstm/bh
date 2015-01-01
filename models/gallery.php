<?php
session_start();
if($_SESSION['in'] != 1) header("Location: index.php");

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

if ($_POST['action']=='delete') {
	$sql="delete from $table_name where id={$_POST['id']}";
	$result=mysql_query($sql,Database::$mConnect);	 
	rrmdir("$path/gallery/{$_POST['id']}");
	header("Location: $return_path");
}	

if ($_POST['action']=='new') {

	$sql="
		INSERT INTO $table_name
		( `title`) 
		VALUES ('{$_POST['title']}');
	";
	$result=mysql_query($sql,Database::$mConnect);
	$last_id=mysql_insert_id(Database::$mConnect);
	mkdir("$path/gallery/$last_id");

	header("Location: $return_path");
}