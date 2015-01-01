<?php include '../header.php'; ?>

<h1><span>Галереи</span></h1>
<div class='container'>
	<div class='actions'>
		<form method="post" enctype="multipart/form-data" action="/models/photos.php">
   			<input type="file" name="userfile" multiple accept="image/*">
			<input type='hidden' name='action' value='new'/>
			<input type='hidden' name='id_gallery' value='<?php echo $_GET['id'];?>' />
			<input type="submit" value="Добавить фото">
		</form>
	</div>
<?php

	show_photos($_GET['id'],1);

?>
</div>
<?php include '../footer.php'; ?>

