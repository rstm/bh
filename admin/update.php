<?php
include 'header.php';
$id = mysql_real_escape_string($_GET['id']);
$sql = "select * from news where id = $id ORDER BY pub_date DESC, time DESC LIMIT 1";
$result = mysql_query($sql,Database::$mConnect);
$row = mysql_fetch_assoc($result);

if($row['tournament'] == 1) {
	$sql = "select * from event_info where event_id = $id LIMIT 1";
	$result = mysql_query($sql,Database::$mConnect);
	$event_info = mysql_fetch_assoc($result);
}

?>
<script src="../js/tinymce/tinymce.min.js"></script>
<script>
	tinymce.init({
		selector:'.edit',
	    plugins: "image jbimages link",
      	toolbar: "link bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent jbimages",
		menubar: false,
    height: 300,
      	relative_urls:false,
      	content_css : "/css/tiny_mce.css",
      	font_size_style_values : "15px",
   	oninit : "setPlainText",
		plugins : "paste"
	});
</script>
<div class='container edit_info'>
<?php


print<<<here
<form method="post" enctype="multipart/form-data" action="/app/models/news.php">
	<p>Заголовок: <input type="text" name="data[title]" value="{$row['title']}" /></p>
	<p>Анонс:</p> 
	<p><textarea id='anons' name="data[anons]" maxlength="99999" rows=3 cols=60>{$row['anons']}</textarea> 
	</p>
	<p>Текст: 
	<textarea class='edit' id='text' name="data[text]" maxlength="99999" rows=10 cols=60 >
	{$row['text']}
	</textarea> 


	
here;

?>
<p>
	Категория: <select name="data[category_id]">
	<?
		$sql="select * from category_news";
		$result=mysql_query($sql,Database::$mConnect);
		while ($category=mysql_fetch_assoc($result)) {
			if ($category['id'] == $row['category_id']) $selected = 'selected';
			else $selected = '';
			print "<option $selected value='{$category['id']}'>{$category['title']}</option>";
		}
	?>
 	</select>
</p>
<?


$checked = ($row['main'] == 1) ? 'checked' : '';
$tournament = ($row['tournament'] == 1) ? 'checked' : '';
?>

<input type="hidden" name="id" value="<?=$row['id']?>">
<input type="hidden" name="action" value="update">
<input type="hidden" name="data[tournament]" value="<?=$row['tournament']?>" />
<input type="hidden" name="old_anons_image" value="<?=$row['old_anons_image']?>" />
<p>
<input type="hidden" name="data[main]" value="0" />
<label><input <?=$checked?> type='checkbox' name='data[main]' value='1' /> На главной</label>
</p>

<p>
	Дата:	<input type='date' name='data[tournament_date]' value='<?=$row['tournament_date']?>'/>
</p>

<? if($row['tournament'] == 1) { ?>
<p>Поменять картинку анонса(рекомендуемое разрешение 630x205): <input type="file"  name="userfile" multiple accept="image/*"></p>
<p>Время:	<input type='text' name='event_info[time]' value="<?=$event_info['time']?>" placeholder='в 9:00 утра'/></p>
<p>Стоимость:	<input type='text' value="<?=$event_info['cost']?>" name='event_info[cost]' placeholder='не обязательно число, можно текст'/></p>
<p>Регистрация:	<input type='text' value="<?=$event_info['registration']?>" name='event_info[registration]' placeholder='не обязательно ссылка, можно текст' /></p>
<p>Призы:</p>
<p>
	<textarea class='edit' name="event_info[prizes]" maxlength="99999" rows=1 cols=30 placeholder="Введите текст"><?=$event_info['prizes']?></textarea> 
</p>
<? } ?>

<input type="submit" value="Обновить">
</form>
</div>

<? include 'footer.php'; ?>

