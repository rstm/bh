<?php
session_start();
if ( empty($_SESSION['authorized'])
	|| $_SESSION['ip'] != $_SERVER['REMOTE_ADDR'] ) {
	die("Доступ закрыт."); 
} 

$path = $_SERVER['DOCUMENT_ROOT'];
$table_name = 'prices';

include ($path.'/lib/functions.php');


$post = post_escape($_POST);

$return_path = '/admin/prices.php';


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