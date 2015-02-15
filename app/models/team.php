<?php
session_start();
if ( empty($_SESSION['authorized'])
	|| $_SESSION['ip'] != $_SERVER['REMOTE_ADDR'] ) {
	die("Доступ закрыт."); 
} 



$path = $_SERVER['DOCUMENT_ROOT'];
$table_name = 'team';

include ($path.'/lib/functions.php');


$post = post_escape($_POST);

$return_path = '/admin/team/show.php?id='.$post['data']['game_id'];


if ($_POST['action']=='delete') {
	$path = "$path/images/team/{$post['data']['avatar']}.png";
	unlink($path);
	delete($post['id'], $table_name);
	header("Location: $return_path");
}	

if ($_POST['action']=='update') {
	$delete_path = "$path/images/team/{$post['old_avatar']}.png";
	unlink($delete_path);
	$image_name = random_string();
	$uploaddir = "$path/images/team/";
	$uploadfile = $uploaddir.$image_name.'.png';
	load_image($uploaddir, $uploadfile);	
	$post['data']['avatar'] = $image_name;
	update($post['data'], $post['id'], $table_name);
	header("Location: $return_path");
}

if ($_POST['action']=='new') {
	$image_name = random_string();
	$post['data']['avatar'] = $image_name;
	create($post['data'], $table_name);
	//$last_id = mysql_insert_id(Database::$mConnect);

	$uploaddir = "$path/images/team/";
	//$uploadfile = $uploaddir.$last_id.$_FILES['userfile']['name'];
	$uploadfile = $uploaddir.$image_name.'.png';
	load_image($uploaddir, $uploadfile);

	header("Location: $return_path");
}

?>