<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path.'/admin/header.php';

$id = mysql_real_escape_string($_GET['id']);
$sql = "select * from games where id = $id";
$result = mysql_query($sql,Database::$mConnect);
$game=mysql_fetch_assoc($result)
?>
<h1><span><?=$game['name']?></span></h1>

<?php
$sql = "select * from team where game_id = $id";
$result = mysql_query($sql,Database::$mConnect);
show('admin/team/show.php',$result);
include_once $path.'/admin/footer.php'; 
?>