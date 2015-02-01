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
<form method="post" action="/app/models/news.php">
	<p>Заголовок: <input type="text" name="title" /></p>
	<p>Анонс: 
	<textarea id='anons' name="anons" maxlength="99999" rows=3 cols=60 placeholder="Введите текст">
	</textarea> 
	</p>
	<p>Текст: 
	<textarea id='text' name="text" maxlength="99999" rows=10 cols=60 placeholder="Введите текст">
	</textarea> 
	</p> 
	<input type="hidden" name="action" value="new" />
	Категория: <select name="category_id">
		<?php
			$sql="select * from category_news";
			$result=mysql_query($sql,Database::$mConnect);
			while ($row=mysql_fetch_assoc($result)) {
				print "<option value='{$row['id']}'>{$row['title']}</option>";
			}
		?>
   	</select>
   	
	<input type="hidden" name="main" value="0" />
	<label><input type='checkbox' name='main' value='1' />На главной</label>
	<input type="hidden" name="tournament" value="0" />
	<label><input type='checkbox' name='tournament' value='1' />Турнир</label>
	<input type="submit" value="Добавить">
</form>
<?php include 'footer.php'; ?>

