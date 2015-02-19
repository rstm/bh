<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path.'/lib/nav.php';
$nav[1]['active'] = 'active';
include_once $path.'/header.php'; 

$sql = "
	select * from news where tournament = 1 
	and tournament_date > NOW()
	ORDER BY tournament_date ASC
	LIMIT 1
";
$result = mysql_query($sql,Database::$mConnect) or die(mysql_error());
	if ($next = mysql_fetch_array($result)) {
	$timestamp = strtotime($next['tournament_date']);
	$day = date('j', $timestamp);
	$i = date('n', $timestamp) - 1;
	//$next_year = date('o', $timestamp);
	$data['next'] = array (
			"date" => $day.' '.mb_strtoupper($month[$i], 'UTF-8'),
			"title" => $next['title'],
			"anons_image" => $next['anons_image'],
			"id" => $next['id']
		);
}	else $data['next'] = NULL;

$sql = "
	select * from news where tournament = 1 
	and tournament_date > NOW()
	ORDER BY tournament_date ASC
";
$data['all'] = mysql_query($sql,Database::$mConnect) or die(mysql_error());
show_v2('calendar/index.php',$data);

include_once $path.'/footer.php'; 
?>