<?php session_start(); 
header('Content-Type: text/html; charset=utf-8');
if(isset($_COOKIE['remember_token'])) {
	$path = $_SERVER['DOCUMENT_ROOT'];

	include ($path.'/lib/functions.php');

	$query = "SELECT remember_token FROM users WHERE id = '".intval($_COOKIE['id'])."' LIMIT 1";

	$result = mysql_query($query,Database::$mConnect);

	echo mysql_error();

	$data = mysql_fetch_assoc($result);

	$remember_token = md5($_SERVER['REMOTE_ADDR'].$_COOKIE['remember_token']);

	//echo $remember_token.'</br>';

	//echo $data['remember_token'];

	if ($data['remember_token'] == $remember_token) {
		header("Location: /admin/news.php");
		exit();
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<link href="/css/admin.css" rel="stylesheet" />
</head>
<body>


<div class='auth_form'>
	<form method="post" action="/models/session.php">
	<?php 
	if (isset($_GET['err'])) {
		echo '<p class="danger">'.$_GET['err'].'</p>';
	}
	?>
	<p>Имя пользователя: </p>
	<p><input type="text" name="login" value=""></p>
	<p>Пароль:</p>
	<p><input type="password" name="password" value="">
	</p>
	<p><input type="submit" value="Войти"></p>
	<input type="hidden" name='action' value="new">
	</form>	
</div>
</body>
</html>