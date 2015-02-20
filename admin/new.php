<?php
include 'header.php';
?>
<script src="../js/tinymce/tinymce.min.js"></script>
<script>
	tinymce.init({
		selector:'.edit',
	    plugins: "image jbimages link paste",
      	toolbar: "link bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent jbimages",
		menubar: false,
    height: 300,
      	relative_urls:false,
      	content_css : "/css/tiny_mce.css",
      	font_size_style_values : "15px",
   	oninit : "setPlainText"
	});
</script>
<div class='container'>
<form method="post" enctype="multipart/form-data" action="/app/models/news.php">
	<p>Заголовок: <input type="text" name="data[title]" /></p>
	<p>Анонс:</p>
	<p>
		<textarea id='anons' name="data[anons]" maxlength="99999" rows=3 cols=60 placeholder="Введите текст"></textarea> 
	</p>
	<p>Текст: 
	<textarea class='edit' id='text' name="data[text]" maxlength="99999" rows=10 cols=60 placeholder="Введите текст">
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
		<div id="tournament_date">
			<p>
				Картинка анонса(рекомендуемое разрешение 630x205): <input type="file" name="userfile" multiple accept="image/*">
			</p>
			<p>Время:	<input type='text' name='event_info[time]' placeholder='в 9:00 утра'/></p>
			<p>Стоимость:	<input type='text' name='event_info[cost]' placeholder='не обязательно число, можно текст'/></p>
			<p>Регистрация:	<input type='text' name='event_info[registration]' placeholder='не обязательно ссылка, можно текст' /></p>
			<p>Призы:</p>
			<p>
				<textarea  class='edit' name="event_info[prizes]" maxlength="99999" rows=3 cols=60 placeholder="Введите текст"></textarea> 
			</p>
		</div>

	</p>
	<p>Дата:	<input type='date' name='data[tournament_date]' /></p>
	<input type="submit" value="Добавить">
</form>
</div>
<?php include 'footer.php'; ?>

