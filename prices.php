<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path.'/lib/nav.php';
$nav[0]['active'] = 'active';
include_once $path.'/header.php'; 

$sql = "select * from prices";
$result = mysql_query($sql,Database::$mConnect);
show('prices/index.php', $result);
	
include_once $path.'/footer.php'; ?>