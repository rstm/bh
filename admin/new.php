<?php
include 'header.php';
?>
<script src="../js/tinymce/tinymce.min.js"></script>
<script>
	tinymce.init({
		selector:'textarea',
    plugins: "image jbimages link",
  	toolbar: "link bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent jbimages",
		menubar: false,
    height: 300,
  	relative_urls:false,
  	content_css : "/css/tiny_mce.css",
  	theme_advanced_font_sizes: "10px,12px,13px,14px,16px,18px,20px"
	});
</script>
<div class='container'>
<form method="post" action="/app/models/news.php">
	<p>Заголовок: <input type="text" name="data[title]" /></p>
	<p>Анонс: 
	<textarea id='anons' name="data[anons]" maxlength="99999" rows=3 cols=60 placeholder="Введите текст">
	</textarea> 
	</p>
	<p>Текст: 
	<textarea id='text' name="data[text]" maxlength="99999" rows=10 cols=60 placeholder="Введите текст">
	</textarea> 
	</p> 
	<input type="hidden" name="action" value="new" />
	Категория: <select name="data[category_id]">
		<?php
			$sql="select * from category_news";
			$result=mysql_query($sql,Database::$mConnect);
			while ($row=mysql_fetch_assoc($result)) {
				print "<option value='{$row['id']}'>{$row['title']}</option>";
			}
		?>
   	</select>
   	
	<p>
		<input type="hidden" name="data[main]" value="0" />
		<label><input type='checkbox' name='data[main]' value='1' />На главной</label>
	</p>	
	<p>
		<input type="hidden" name="data[tournament]" value="0" />
		<label><input id='tournament_check' type='checkbox' name='data[tournament]' value='1' />Событие</label>
	</p>
	<p>Дата:	<input type='date' name='data[tournament_date]' /></p>
	<input type="submit" value="Добавить">
</form>
</div>
<?php include 'footer.php'; ?>

