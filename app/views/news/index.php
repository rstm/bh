<section>
	<div class='block all_news'>
		<div>
			<h1>НОВОСТИ: <?=$data['category_title']?></h1>
		 	<hr noshade class='block_header' > 		
			<div class='clear'></div>

<?php
	$s=1;
	while ($row = mysql_fetch_array($data['result']))
	{
		$anons = strip_tags($row['anons'], '<p>'); 
		//$anons = $row['anons']; 
		$position = '';
		if ($s % 3 == 0) $position = 'last';
		if ($s == 1 || $s % 4 == 0 ) $position = 'first';
		
		$timestamp = strtotime( $row['pub_date']);
		$month = array("января", "февраля", "марта", "апреля", "мая", "июня", "июля", "августа", "сентября", "октября", "ноября", "декабря");
		$day = date('j', $timestamp);
		$i = date('n', $timestamp);
		$year = date('o', $timestamp);
	?>
		<div class='one_news <?=$position?>' id='<?=$row['id']?>'>
			 	<div class='date'><?=$day.' '.$month[$i].' '.$year?></div>
				<a href='/news/show.php?id=<?=$row['id']?>'><?=$row['title']?></a>
		</div>	
	<? $s++; } ?>	
			