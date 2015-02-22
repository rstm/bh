<section>
	<div class='block media'>
		<div>
			<?php
			$s = 1;
			$row = mysql_fetch_array($data['result']);
			?>
			<h1>МЕДИА:ВИДЕО</h1>
			<hr noshade class='block_header' > 

			<div class='clear'></div>

			<div class='video first'>
				<div class='url'><?=$row['url']?></div>
					 
				<div class='info'>
					<span><?=$row['title']?></span>
					<hr>
					<div class='anons'><?=$row['anons']?></div>
				</div>
			</div>
			<? 
				while ($row = mysql_fetch_array($data['result'])) {	
					if ($s % 3 == 0) $position = 'last'; 
					else $position = '';
			?>

					<div class='list_video list_photo <?=$position?>'>
						<div id='<?=$row['id']?>' class='url_video'><?=$row['url']?></div>
						<div class='anons_video'>
							<span class='fullscreen'><?=$row['title']?></span>
						</div>
					</div>
				
			<? $s++; } ?>
			<div class='clear'></div>
			<div id='dark'></div>
		</div>
	</div>
</section>