<section>
	<div class='block media'>
		<div>
			<?php
			$s = 1;
			$row = mysql_fetch_array($data['result']);
			$timestamp = strtotime($row['tournament_date']);
			$day = date('j', $timestamp);
			$i = date('n', $timestamp) - 1;
			$year = date('o', $timestamp);
			?>
			<h1>МЕДИА:ФОТО</h1>
			<hr noshade class='block_header' > 

			<div class='clear'></div>

			<div class='video first'>
				<a href='show.php?id=<?=$row['gallery_id']?>' class='url'>
					<img src='/images/gallery/<?=$row['gallery_id'].'/'.$row['id']?>.png' />
				</a>
					 
				<a href='show.php?id=<?=$row['gallery_id']?>' class='info'>
					<span><?=$row['title']?></span>
					<hr>
					<div class='anons'>
						<?=strip_tags($row['anons'])?>
					</div>
					<span class='date'><?=$day.' '.$month[$i].' '.$year?></span>
				</a>
			</div>
			<? 
				while ($row = mysql_fetch_array($data['result'])) {	
					if ($s % 3 == 0) $position = 'last'; 
					else $position = '';

					$timestamp = strtotime($row['tournament_date']);
					$day = date('j', $timestamp);
					$i = date('n', $timestamp) - 1;
					$year = date('o', $timestamp);

			?>

					<div class='list_photo <?=$position?>'>
						<a href='show.php?id=<?=$row['gallery_id']?>' id='<?=$row['id']?>' class='url_photo'>
							<img src='/images/gallery/<?=$row['gallery_id'].'/'.$row['id']?>.png' />
						</a>
						<div class='anons_photo'>
							<a href='show.php?id=<?=$row['gallery_id']?>' class='fullscreen'><?=$row['title']?></a>
						</div>
						<span class='date'><?=$day.' '.$month[$i].' '.$year?></span>
					</div>
				
			<? $s++; } ?>
			<div class='clear'></div>
			<div id='dark'></div>
		</div>
	</div>
</section>