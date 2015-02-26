<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path.'/lib/nav.php';
$nav[2]['active'] = 'active';
include_once $path.'/header.php';

$id = mysql_real_escape_string($_GET['id']);
$sql = "select * from news where id = $id LIMIT 1";
$result = mysql_query($sql, Database::$mConnect);
$data['news'] = mysql_fetch_assoc($result);

$sql = "select title from category_news 
	where id = {$data['news']['category_id']} LIMIT 1";
$result2 = mysql_query($sql,Database::$mConnect);
$category = mysql_fetch_assoc($result2);
$data['category_title'] = mb_strtoupper($category['title'], 'UTF-8');
$timestamp = strtotime($data['news']['tournament_date']);

$day = date('j', $timestamp);
$i = date('n', $timestamp) - 1;
$data['year'] = date('o', $timestamp);

$data['date'] = $day.' '.mb_strtolower(rudate('F', $timestamp, false), 'UTF-8');


$sql = "select * from event_info where event_id = $id LIMIT 1";
$result2 = mysql_query($sql, Database::$mConnect);
$data['event_info'] = mysql_fetch_assoc($result2);

if($data['news']['tournament'] == 1) {
	$sql = "select * from photos where gallery_id = $id LIMIT 3";
	$data['images'] = mysql_query($sql,Database::$mConnect);
	
	show_v2('news/event.php', $data);
}
else 
	show_v2('news/show.php', $data);

include_once $path.'/footer.php';
?>