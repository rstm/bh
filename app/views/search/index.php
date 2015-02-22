<section>
	<div class='block all_news'>		
		<div>			
			<form class='search' method='get' action='search.php'>
				<input type='text' name='q' placeholder='Поиск' value='<?=$data['q']?>'/><input type='submit' value='GO'/>
			</form>

			<h1>РЕЗУЛЬТАТЫ ПОИСКА </h1>
		 	<hr noshade class='block_header' > 
		
			<div class='clear'></div>	
			<? if (mysql_num_rows($data['result'])) { ?>
				<ul>		
				<? 				
					$s = 1;
					while ($row = mysql_fetch_array($data['result'])) { 
						$position = '';
						if (($s - 1) % 3 == 0 && $s != 1) {
							$position = 'first';
							echo '</ul>';
						}
						
						$timestamp = strtotime( $row['tournament_date']);
						$month = array("января", "февраля", "марта", "апреля", "мая", "июня", "июля", "августа", "сентября", "октября", "ноября", "декабря");
						$day = date('j', $timestamp);
						$i = date('n', $timestamp) - 1;
						$year = date('o', $timestamp);
						if (($s - 1) % 3 == 0) echo "<ul class='elements_row'>"; 
				?>
					<li class='one_news <?=$position?>'>
						<a href='/news/show.php?id=<?=$row['id']?>'>
								<div class='date'><?=$day.' '.$month[$i].' '.$year?></div>
								<div class='body'><?=$row['title']?></div>
						</a>
					</li>
				<? 
						$s++;
					}	 
				?>
				</ul>
			<? } else { ?>
				<p class='search'>К сожалению ничего не найдено.</p>
			<? } ?>
		</div>
	</div>
</section>
