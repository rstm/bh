<?php include '../header.php'; ?>

<h1><span>Галереи</span></h1>
<div class='container'>
	<div class='actions'>
		<form method="post" action="/app/models/gallery.php">
			<input placeholder='Название события' type='text' name='title' />
			<input type='date' name='date' />
			<input type='hidden' name='action' value='new'/>
			<input type="submit" value="Добавить галерею">
		</form>
	</div>
<?php
	
	$sql="select * from news where tournament = 1 ORDER BY tournament_date DESC";
	$result=mysql_query($sql,Database::$mConnect);
	show('admin/tournaments.php',$result);

?>
</div>
<?php include '../footer.php'; ?>

