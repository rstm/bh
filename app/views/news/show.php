<section>
	<div class='block show_news'>
		<div>

			<h1>НОВОСТИ: <?=$data['category_title']?></h1>
			<hr noshade class='block_header' > 
			<div class='clear'></div>

			<h2><?=$data['news']['title']?></h2>
			<span class='date'><?=$data['date'].' '.$data['year']?></span>
			<div class='text'>
				<?=$data['news']['text']?>
			</div>
		</div>
	</div>
</section>

