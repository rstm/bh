<section>
	<div class='block media streams'>
		<div>
			<h1>OLD</h1>
			<hr noshade class='block_header' > 
			<div class='clear'></div>

			<? 
			if (mysql_num_rows($data['old']) != 0) {
				$s = 1;
				while ($row = mysql_fetch_array($data['old'])) {	
					if ($s % 4 == 0) $position = 'last'; 
					else $position = '';
			?>

					<div class='list_video <?=$position?>'>
						<div id='<?=$row['id']?>' class='url_video'><?=$row['url']?></div>
						<div class='anons_video'>
							<span class='fullscreen'><?=$row['title']?></span>
							<hr>
							<div class='anons'><?=$row['anons']?></div>
						</div>
					</div>
				
			<? $s++; } 
				} else { ?>
				<p>К сожалению, тут пока ничего нет.</p>
			<? } ?>

			<div id='dark'></div>
		</div>
	</div>
</section>