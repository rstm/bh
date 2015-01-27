<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path.'/lib/nav.php';
$nav[2]['active'] = 'active';
include_once $path.'/header.php';

$id = mysql_real_escape_string($_GET['id']);
$sql = "select * from news where id = $id LIMIT 1";
$result = mysql_query($sql,Database::$mConnect);
show('news/show.php',$result);

include_once $path.'/footer.php';
?>