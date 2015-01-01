<?php
include 'header.php';
?>
<script src="../js/tinymce/tinymce.min.js"></script>
<script>
	tinymce.init({
		selector:'textarea',
	    plugins: "image jbimages",
      toolbar: "bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent jbimages",
		menubar: false,
	    height: 300,
      relative_urls:false
	});
</script>
<form method="post" action="action/action.php">
	<textarea id='text' name="news" maxlength="99999" rows=10 cols=60 placeholder="Введите текст">
	</textarea>  
	<input type='hidden' name='action' value='add'/>
	<input type="submit" value="Добавить">
</form>
<?php include 'footer.php'; ?>

