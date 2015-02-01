<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path.'/lib/nav.php';
$nav[3]['active'] = 'active';
include_once $path.'/header.php';

$id = mysql_real_escape_string($_GET['id']);
$sql = "select name from games where id = $id";
$result = mysql_query($sql,Database::$mConnect);
$game=mysql_fetch_assoc($result)
?>

<section>
		<div class='block team'>
			<div>
				<h1>BATTLE HALL КИБЕРСПОРТ | <?=$game['name']?></h1>
			 	<hr noshade class='block_header' > 
<div class='persons'>

<?php
$sql = "select * from team where game_id = $id";
$result = mysql_query($sql,Database::$mConnect);
show('team/show.php',$result);

include_once $path.'/footer.php';
?>