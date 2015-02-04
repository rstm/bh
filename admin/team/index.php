<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path.'/admin/header.php';
?>
<div class='container'>
	<h1><span>Команды</span></h1>
<?php
	$sql="select * from games";
	$result=mysql_query($sql,Database::$mConnect);
	show('team/index.php',$result);	
?>
</div>
<? include_once  $path.'/admin/footer.php'; ?>