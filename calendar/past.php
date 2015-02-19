<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path.'/lib/nav.php';
$nav[1]['active'] = 'active';
include_once $path.'/header.php'; 

$data['next'] = NULL;

$sql = "
	select * from news where tournament = 1 
	ORDER BY tournament_date DESC
";
$data['all'] = mysql_query($sql,Database::$mConnect) or die(mysql_error());
show_v2('calendar/index.php',$data);

include_once $path.'/footer.php'; 
?>