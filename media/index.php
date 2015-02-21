<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path.'/lib/nav.php';
$nav[0][2]['active'] = 'active';
include_once $path.'/header.php'; 

$sql = "select * from media ORDER BY id DESC LIMIT 1 ";
$result = mysql_query($sql,Database::$mConnect) or die(mysql_error());
$data['video'] = mysql_fetch_array($result);

$sql = "select * from photos ORDER BY id DESC LIMIT 1 ";
$result = mysql_query($sql,Database::$mConnect) or die(mysql_error());
$data['image'] = mysql_fetch_array($result);

$sql = "select * from news where id = {$data['image']['gallery_id']} LIMIT 1 ";
$result = mysql_query($sql,Database::$mConnect) or die(mysql_error());
$data['image']['event'] = mysql_fetch_array($result);

$data['image']['event']['anons'] = strip_tags($data['image']['event']['anons']);

show_v2('media/index.php', $data);
				
include_once $path.'/footer.php'; 
?>