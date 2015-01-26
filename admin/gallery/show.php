<?php include '../header.php'; ?>

<h1><span>Галереи</span></h1>
<div class='container'>
	<div class='actions'>
		<form method="post" enctype="multipart/form-data" action="/app/models/photos.php">
   			<input type="file" name="userfile" multiple accept="image/*">
			<input type='hidden' name='action' value='new'/>
			<input type='hidden' name='gallery_id' value='<?php echo $_GET['id'];?>' />
			<input type="submit" value="Добавить фото">
		</form>
	</div>
<?php
	$id = mysql_real_escape_string($_GET['id']);
	$sql="select * from photos where gallery_id = $id";
	$result=mysql_query($sql,Database::$mConnect);
	show('photos/index.php',$result);

?>
</div>
<?php include '../footer.php'; ?>

