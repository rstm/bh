<?php include '../header.php'; ?>

<h1><span>Галереи</span></h1>
<div class='container'>
	<div class='actions'>
		<form method="post" action="/models/gallery.php">
			<input type='text' name='title' />
			<input type='hidden' name='action' value='new'/>
			<input type="submit" value="Добавить галерею">
		</form>
	</div>
<?php

	show_galleries(1);

?>
</div>
<?php include '../footer.php'; ?>

