<?php
session_start();
if ( empty($_SESSION['authorized'])
	|| $_SESSION['ip'] != $_SERVER['REMOTE_ADDR'] ) {
	die("Доступ закрыт."); 
} 



$path = $_SERVER['DOCUMENT_ROOT'];
$return_path = '/admin/team/show.php';
$table_name = 'team';

include ($path.'/lib/functions.php');




$post = post_escape($_POST);

if ($_POST['action']=='delete') {
	delete($post['id'], $table_name);
	header("Location: $return_path?id={$post['game_id']}");
}	

if ($_POST['action']=='update') {
	
	$sql="
		update $table_name set
		first_field = '{$post['first_field']}',
		second_field = '{$post['second_field']}'
		where id = {$post['id']};
	";
	//echo $sql;
	$result=mysql_query($sql,Database::$mConnect);
	header("Location: $return_path?id={$post['game_id']}");
}

if ($_POST['action']=='new') {

	$sql="
		INSERT INTO $table_name 
		(first_field, second_field, game_id) 
		VALUES ('{$post['first_field']}',
			'{$post['second_field']}', {$post['game_id']} )
	";
	//echo $sql;
	$result=mysql_query($sql,Database::$mConnect);

	header("Location: $return_path?id={$post['game_id']}");
}

?>