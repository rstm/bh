<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path.'/lib/nav.php';
$nav[3]['active'] = 'active';
include_once $path.'/header.php';

$sql="select * from games where id!=3";
$result=mysql_query($sql,Database::$mConnect);
show('team/index.php',$result);

include_once  $path.'/footer.php'; 
?>