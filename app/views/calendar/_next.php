<ul class='elements_row next'>
	<li class='element'>
		<a href='/news/show.php?id=<?=$data['next']['id']?>'  id='<?=$row['id']?>'>
		 	<div class='header'><?=$data['next']['date']?></div>
			<div class='body'>
				<?=$data['next']['title']?>
				<span class='more2'>Подробнее</span>
			</div>
		</a>
	</li>
	<li class='element next_element_image'>
		<a href='/news/show.php?id=<?=$data['next']['id']?>'>
			<img src='/images/news/<?=$data['next']['anons_image']?>.png'/>
			
		</a>
	</li>
</ul>
<div class='clear'></div>
