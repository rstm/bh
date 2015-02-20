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
	if ($post['tournament'] == 1) { 
		rrmdir("$path/images/gallery/{$post['id']}");	 
		$path = "$path/images/news/{$post['data']['anons_image']}.png";
		unlink($path);
	}	
	header("Location: $return_path");
}	

if ($_POST['action']=='update') {
	if($post['data']['tournament_date'] == '') {
	    unset($post['data']['tournament_date']);
	}	
	if ($_FILES['userfile']['size'] != 0) {	
		$delete_path = "$path/images/news/{$post['old_anons_image']}.png";
		unlink($delete_path);
		$image_name = random_string();
		$uploaddir = "$path/images/news/";
		$uploadfile = $uploaddir.$image_name.'.png';
		load_image($uploaddir, $uploadfile);	
		$post['data']['anons_image'] = $image_name;
	}

	if ($post['data']['tournament'] == 1) {
		$sql = "
			UPDATE event_info SET
			cost = '{$post['event_info']['cost']}',
			registration = '{$post['event_info']['registration']}',
			prizes = '{$post['event_info']['prizes']}',
			time = '{$post['event_info']['time']}'
			WHERE event_id = {$post['id']};		
		";
		echo $sql;
		$result = mysql_query($sql,Database::$mConnect) or die(mysql_error());
	}

	update($post['data'], $post['id'], $table_name);
	//header("Location: $return_path");
}

if ($_POST['action']=='new') {
	if ($post['data']['tournament'] == 1) {	
		$image_name = random_string();
		$post['data']['anons_image'] = $image_name;
	}

	$post['data']['pub_date'] = date("Y-m-d");
	$post['data']['time'] = date("H:i:s");
	if($post['data']['tournament_date'] == '') {
	    unset($post['data']['tournament_date']);
	}
	create($post['data'], $table_name);

	if ($post['data']['tournament'] == 1) {	
		$last_id = mysql_insert_id(Database::$mConnect);
		mkdir("$path/images/gallery/$last_id");
		$uploaddir = "$path/images/news/";
	//$uploadfile = $uploaddir.$last_id.$_FILES['userfile']['name'];
		$uploadfile = $uploaddir.$image_name.'.png';
		load_image($uploaddir, $uploadfile);

		$post['event_info']['event_id'] = $last_id;
		create($post['event_info'], 'event_info');
	}

	header("Location: $return_path");
}

?>