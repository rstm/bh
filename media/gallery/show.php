<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path.'/lib/nav.php';
$nav[1]['active'] = 'active';
include_once $path.'/header.php'; ?>
	<section>
		<div class='block calendar'>
			<div>
				<?
					$gallery_id = mysql_real_escape_string($_GET['id']);
					$sql="select * from news where id = $gallery_id LIMIT 1";
					$result=mysql_query($sql,Database::$mConnect);
					$gallery=mysql_fetch_assoc($result);	
					$gallery_title = mb_strtoupper($gallery['title'], 'UTF-8');					
					$timestamp = strtotime( $gallery['tournament_date']);
					$month = array("ЯНВАРЯ", "ФЕВРАЛЯ", "МАРТА", "АПРЕЛЯ", "МАЯ", "ИЮНЯ", "ИЮЛЯ", "АВГУСТА", "СЕНТЯБРЯ", "ОКТЯБРЯ", "НОЯБРЯ", "ДЕКАБРЯ");
					$day = date('j', $timestamp);
					$i = date('n', $timestamp) - 1;
				?>
					<h1><?=$day.' '.$month[$i].' | '.$gallery_title?></h1>
		 			<hr noshade class='block_header' >
		 			<div class='clear'></div>
		 			<br>
				<?php
					$sql="select * from photos where gallery_id = $gallery_id";
					$result=mysql_query($sql,Database::$mConnect);
					show('photos/index.php',$result);
					?>				
			</div>
		</div>
	</section>
<? include_once $path.'/footer.php'; ?>