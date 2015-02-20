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
			</div>
			<div class='clear'></div>
			<div class='text'>
				<?=$data['news']['text']?>
			</div>
			<div class='share_news'>
				<!--a href="http://vkontakte.ru/share.php?url=http://mysite.com" target="_blank">
					<img src='/images/vk_share.png'/>
				</a-->
				<!-- Put this script tag to the place, where the Share button will be -->
				<script type="text/javascript"><!--
				document.write(VK.Share.button(false,{type: "link_noicon", text: "<img src='/images/vk_share.png'/>"}));
				--></script>

				<!--a href="http://vkontakte.ru/share.php?url=http://mysite.com" target="_blank">
					<img src='/images/facebook_share.png'/>
				</a-->
					<a target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=http://<?=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>">
						<img src='/images/facebook_share.png'/>
					</a>		
			</div>
			<div class='clear'></div>
		</div>
	</div>
</section>