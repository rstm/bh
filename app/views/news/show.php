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

