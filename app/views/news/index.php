<section>
	<div class='block all_news'>
		<div>
			<h1>НОВОСТИ: <?=$data['category_title']?></h1>
		 	<hr noshade class='block_header' > 		
			<div class='clear'></div>

			<? if (mysql_num_rows($data['result']) != 0) { ?>
			
			<?	
				$s=1;
				while ($row = mysql_fetch_array($data['result'])) {
					$anons = strip_tags($row['anons'], '<p>'); 
					//$anons = $row['anons']; 
					$position = '';
					if (($s - 1) % 3 == 0) $position = 'first';
					//if ($s == 1 || $s % 4 == 0 ) $position = 'first';
					
					$timestamp = strtotime( $row['tournament_date']);
					$month = array("января", "февраля", "марта", "апреля", "мая", "июня", "июля", "августа", "сентября", "октября", "ноября", "декабря");
					$day = date('j', $timestamp);
					$i = date('n', $timestamp) - 1;
					$year = date('o', $timestamp);
				?>
				<div class='one_news <?=$position?>' id='<?=$row['id']?>'>
					 	<div class='date'><?=$day.' '.$month[$i].' '.$year?></div>
						<a href='/news/show.php?id=<?=$row['id']?>'><?=$row['title']?></a>
				</div>	
			<? $s++; } ?>
			<? } else { ?>	
				<span class='error'>К сожалению, тут новостей пока нет =(</span>
			<? } ?>
			