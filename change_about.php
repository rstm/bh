<?php session_start(); ?>
<html>
<head>
</head>
<body>
<?php

print<<<here
<br>
<form method="post" action="about.php?id_clan={$_SESSION['id']}">
<textarea name="about" rows=5 cols=40>{$_SESSION['about']}
</textarea>  <br>
here;



print<<<here
<br>

<input type="submit" value="Готово">
</form>
here;
	
?>


</body>
</html>