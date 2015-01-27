<?php

$news = mysql_fetch_assoc($result);

$sql = "select title from category_news 
	where id = {$news['category_id']} LIMIT 1";
$result2 = mysql_query($sql,Database::$mConnect);
$category = mysql_fetch_assoc($result2);
$category_title = mb_strtoupper($category['title'], 'UTF-8');
$timestamp = strtotime( $news['pub_date']);
$month = array("января", "февраля", "марта", "апреля", "мая", "июня", "июля", "августа", "сентября", "октября", "ноября", "декабря");
$day = date('j', $timestamp);
$i = date('n', $timestamp);
$year = date('o', $timestamp);
?>
<section>
	<div class='block show_news'>
		<div>

			<h1>НОВОСТИ: <?=$category_title?></h1>
			<hr noshade class='block_header' > 
			<div class='clear'></div>

			<h2><?=$news['title']?></h2>
			<span class='date'><?=$day.' '.$month[$i].' '.$year ?></span>
			<div class='text'>
				<?=$news['text']?>
			</div>
		</div>
	</div>
</section>

