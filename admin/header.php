<? session_start();
header('Content-Type: text/html; charset=utf-8');
$path = $_SERVER['DOCUMENT_ROOT'];
include ($path.'/lib/functions.php');
check_login();


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

<?php //echo '<pre>'; print_r($_SESSION); echo '</pre>'; 	?>
	

