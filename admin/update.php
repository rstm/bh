<?php
include 'header.php';
?>
	<script src="../js/tinymce/tinymce.min.js"></script>
	<script>
		tinymce.init({
			selector:'textarea',
		    plugins: "image",
		    height: 300
		});
	</script>

<?php


print<<<here
<form method="post" action="action/action.php">
	<textarea name="news" rows=5 cols=40>{$_POST['news']}
	</textarea>  <br>
here;



print<<<here
<input type="hidden" name="id" value="{$_POST['id']}">
<input type="hidden" name="action" value="update">

<input type="submit" value="Обновить">
</form>
here;
	
	include 'footer.php';
?>

