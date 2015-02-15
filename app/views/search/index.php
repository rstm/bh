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
						if (($s - 1) % 3 == 0) $position = 'first';
				?>
					<li class='one_news <?=$position?>'>
							<div class='date'><a href='/news/show.php?id=<?=$row['id']?>'><?=$row['title']?></a></div>
							<span class='date'><?=$row['anons']?></span>
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
