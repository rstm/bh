<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path.'/lib/nav.php';
$nav[0][2]['active'] = 'active';
include_once 'header.php'; 

$sql="select * from media";
$result=mysql_query($sql,Database::$mConnect);
show('media/index.php',$result);
				
include_once $path.'/footer.php'; 
?>