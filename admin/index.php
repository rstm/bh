<?php session_start(); 
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



<?php 
if (isset($_GET['err'])) {
	echo $err;
}
if (!isset($_SESSION['in'])) { ?>
		<form method="post" action="/models/session.php">
		Введите ваши данные: <br>
		Имя пользователя: <input type="text" name="login" value=""><br>
		Пароль: <input type="password" name="password" value="">
		<br>
		<input type="submit" value="Войти">
		<input type="hidden" name='action' value="new">
		</form>	
<?php } ?>