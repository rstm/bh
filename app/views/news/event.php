<section>
	<div class='block show_news'>
		<div>

			<h1>НОВОСТИ: <?=$data['category_title']?></h1>
			<hr noshade class='block_header' > 
			<div class='clear'></div>

			<h2><?=$data['news']['title']?></h2>
			<span class='date'><?=$data['date'].' '.$data['year']?></span>
			<? if ($data['news']['anons_image']) { ?>
				<img class='anons' src='/images/news/<?=$data['news']['anons_image']?>.png'/>
			<? } ?>
			<div class='event_info'>	
					<label>ДАТА</label>
					<div class='value'><?=$data['date'].' '.$data['event_info']['time']?></div>
				
					<label>МЕСТО</label>
					<div class='value'>Казань, Муштари 2а "Battle Hall"</div>
				<? if ($data['event_info']['cost']) { ?>
						<label>СТОИМОСТЬ</label>
						<div class='value'><?=$data['event_info']['cost']?></div>
				<? } ?>
				<? if ($data['event_info']['registration']) { ?>
						<label>РЕГИСТРАЦИЯ</label>
						<div class='value'><?=$data['event_info']['registration']?></div>	
				<? } ?>
				<? if ($data['event_info']['prizes']) { ?>			
						<label>ПРИЗЫ</label>
						<div class='value'><?=$data['event_info']['prizes']?></div>				
				<? } ?>
				<? if ($data['news']['text']) { ?>
					<div class='text'>
						<?=$data['news']['text']?>
					</div>
				<? } ?>				
				<div class='clear'></div>
			</div>
			
			<? if(mysql_num_rows($data['images']) > 0) { ?>
				<div class='small_gallery'>
				<h1>ГАЛЕРЕЯ</h1>
				<hr noshade class='block_header' > 
				<div class='clear'></div>				
				<?
					while ($image = mysql_fetch_array($data['images'])) {	
				?>
				<div class='small_gallery_image'>
					<a href='/media/gallery/show.php?id=<?=$data['news']['id']?>'>
						<img src='/images/gallery/<?=$data['news']['id'].'/'.$image['id']?>.png'/>
					</a>
				</div>
				<? } ?>
				</div>
			<? } ?>
			<div class='share_news'>
				<!-- Put this script tag to the place, where the Share button will be -->
				<script type="text/javascript"><!--
				document.write(VK.Share.button(false,{type: "link_noicon", text: "<img src='/images/vk_share.png'/>"}));
				--></script>
					<a target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=http://<?=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>">
						<img src='/images/facebook_share.png'/>
					</a>		
			</div>
			<div class='clear'></div>

			
		</div>
	</div>
</section>