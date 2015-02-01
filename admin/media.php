<?php include 'header.php'; ?>

<h1><span>Галереи</span></h1>
<div class='container'>
	<div class='actions'>
		<form method="post" action="/app/models/media.php">
			<p>Название <input type='text' name='title' /></p>
			<p>Описание <textarea id='anons' name="anons"  rows=3 cols=60></textarea> 
			</p>
			<p>Ссылка <textarea id='anons' name="url"  rows=3 cols=60></textarea> 
			</p>			
			<input type='hidden' name='action' value='new'/>
			<input type="submit" value="Добавить видео">
		</form>
	</div>
<?php

	$sql="select * from media";
	$result=mysql_query($sql,Database::$mConnect);
	echo '<ul>';
	while ($row=mysql_fetch_array($result)) {
		print "<li>{$row['title']}</li>";
	}
	echo '</ul>';
?>
</div>
<?php include 'footer.php'; ?>

