<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path.'/admin/header.php';

$sql = "select * from prices";
$result = mysql_query($sql,Database::$mConnect);
show('admin/prices.php',$result);
include_once $path.'/admin/footer.php'; 
?>