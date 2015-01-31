<?php
include 'header.php';
$id = mysql_real_escape_string($_GET['id']);
$sql="select * from news where id = {$_GET['id']} ORDER BY pub_date DESC, time DESC LIMIT 1";
$result=mysql_query($sql,Database::$mConnect);
$row = $row=mysql_fetch_assoc($result);
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
      	theme_advanced_font_sizes: "10px,12px,13px,14px,16px,18px,20px",
	});
</script>

<?php


print<<<here
<form method="post" action="/app/models/news.php">
	Заголовок: <input type="text" name="title" value="{$row['title']}"/><br>
	<textarea name="text" rows=5 cols=40>{$row['text']}
	</textarea>  <br>
here;

$checked = ($row['main'] == 1) ? 'checked' : '';
$tournament = ($row['tournament'] == 1) ? 'checked' : '';

print<<<here
<input type="hidden" name="id" value="{$row['id']}">
<input type="hidden" name="action" value="update">

<input type="hidden" name="main" value="0" />
<label><input $checked type='checkbox' name='main' value='1' /> На главной</label>

<input type="hidden" name="tournament" value="0" />
<label><input $tournament type='checkbox' name='tournament' value='1' /> На главной</label>

<input type="submit" value="Обновить">
</form>
here;
	
	include 'footer.php';
?>

