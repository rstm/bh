﻿<?php
include 'header.php';
$id = mysql_real_escape_string($_GET['id']);
$sql="select * from news where id = {$_GET['id']} ORDER BY pub_date DESC, time DESC LIMIT 1";
$result=mysql_query($sql,Database::$mConnect);
$row = $row=mysql_fetch_assoc($result);
?>
<script src="../js/tinymce/tinymce.min.js"></script>
<script>
	tinymce.init({
		selector:'#text',
	    plugins: "image jbimages link",
      	toolbar: "link bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent jbimages",
		menubar: false,
	    height: 300,
      	relative_urls:false,
      	content_css : "/css/tiny_mce.css",
      	theme_advanced_font_sizes: "10px,12px,13px,14px,16px,18px,20px",
	});
</script>
<div class='container'>
<?php


print<<<here
<form method="post" enctype="multipart/form-data" action="/app/models/news.php">
	<p>Заголовок: <input type="text" name="data[title]" value="{$row['title']}" /></p>
	<p>Анонс:</p> 
	<p><textarea id='anons' name="data[anons]" maxlength="99999" rows=3 cols=60>
	{$row['anons']}
	</textarea> 
	</p>
	<p>Текст: 
	<textarea id='text' name="data[text]" maxlength="99999" rows=10 cols=60 >
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
<p>Поменять картинку анонса(рекомендуемое разрешение 630x205): <input type="file" value="<?=$row['old_anons_image']?>" name="userfile" multiple accept="image/*"></p>
<? } ?>

<input type="submit" value="Обновить">
</form>
</div>

<? include 'footer.php'; ?>

