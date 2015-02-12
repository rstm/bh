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
	<script src="/js/jquery-1.11.2.min.js"></script>
	<script src="/js/admin.js"></script>
</head>
<body>
	<header>
		<nav>
			<ul class='left'>
				<li><a href='/admin/news.php'>Новости</a></li>
				<li><a href='/admin/gallery'>Галерея</a></li>
				<li><a href='/admin/media.php'>Медиа</a></li>
				<li><a href='/admin/team/'>Команда</a></li>
				<li class='block_begin'><span>Cтримы :</span></li>
				<li><a href='/admin/streams/live.php'>LIVE</a></li>
				<li><a href='/admin/streams/old.php'>OLD</a></li>
				<li class='block_begin'><a href='/admin/new.php'>Добавить новость/турнир</a></li>
			</ul>
			<ul class='right'>
				<li><a href='/'>Сайт</a></li>
				<li><a href='/models/session.php?action=delete'>Выход</a></li>
			</ul>
		</nav>
		<span class='clear '>			
		</span>
	</header>

<?php //echo '<pre>'; print_r($_SESSION); echo '</pre>'; 	?>
	

