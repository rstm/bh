<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path.'/lib/nav.php';
$nav[0][2]['active'] = 'active';
include_once $path.'/header.php'; 

$sql="select * from streams where type = 1";
$data['old']=mysql_query($sql,Database::$mConnect);

show_v2('streams/old.php',$data);
				
include_once $path.'/footer.php'; 
?>