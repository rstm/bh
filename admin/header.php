<? session_start();
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

	if ($data['remember_token'] !== $remember_token) {
		header("Location: /admin");
		exit();
	}
} else {
	header("Location: /admin");
	exit();
}

?>
<!DOCTYPE html>
<html>
<head>
	<link href="/css/admin.css" rel="stylesheet" /> 
	<script src="/js/jquery-1.7.2.min.js"></script>
	<script src="/js/admin.js"></script>
</head>
<body>
	<header>
		<nav>
			<ul class='left'>
				<li><a href='/admin/news.php'>Новости</a></li>
				<li><a href='/admin/gallery'>Галерея</a></li>
				<li><a href='#'>Состав команды</a></li>
				<li><a href='/admin/new.php'>Добавить новость</a></li>
			</ul>
			<ul class='right'>
				<li><a href='#'>Сайт</a></li>
				<li><a href='/models/session.php?action=delete'>Выход</a></li>
			</ul>
		</nav>
		<span class='clear '>			
		</span>
	</header>
	

