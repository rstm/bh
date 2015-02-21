<section>
	<div class='block media'>
		<div>
			<h1>МЕДИА:ВИДЕО</h1>
			<hr noshade class='block_header' > 
			<div class='clear'></div>

			<div class='video first'>
				<div class='url'><?=$data['video']['url']?></div>
					 
				<div class='info'>
					<span><?=$data['video']['title']?></span>
					<hr>
					<div class='anons'><?=$data['video']['anons']?></div>
				</div>

				<a href='/media/video' class='media_more'>Ещё больше видео</a>
			</div>

			<div class='clear'></div>
			<h1>МЕДИА:ФОТО</h1>
			<hr noshade class='block_header' > 
			<div class='clear'></div>

			<div class='video first'>
				<div class='url'>
					<img src='/images/gallery/<?=$data['image']['event']['id'].'/'.$data['image']['id']?>.png' />
				</div>
					 
				<div class='info'>
					<span><?=$data['image']['event']['title']?></span>
					<hr>
					<div class='anons'><?=$data['image']['event']['anons']?></div>
				</div>

				<a href='/media/gallery' class='media_more'>Ещё больше фото</a>

			</div>
			<div class='clear'></div>
		</div>
	</div>
</section>