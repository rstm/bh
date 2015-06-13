	<footer>
		<div>
			<div class='footer_menu'>
			<?php 
				//echo '<pre>'; print_r($nav); echo '</pre>';
				foreach ($nav as $menu_element) {
					print "
						<div >
						<a href='{$menu_element['url']}' class='{$menu_element['active']}'>
							<h3>{$menu_element['title']}</h3>
						</a>
					";
					if (isset($menu_element['sub_menu'])) {
						print "	<ul>";
						foreach ($menu_element['sub_menu'] as $key => $sub_menu_element) {
								$sub_menu_element_title = mb_strtoupper($sub_menu_element['title'], 'UTF-8');
								print "<li><a href='{$sub_menu_element['url']}'>$sub_menu_element_title</a></li>";
						}
						print '</ul>';
					}
					print '</div>';
				}
			?>
			</div>
			<!--form class='search' method='get' action='search.php'>
				<input type='text' name='q' placeholder='Поиск'/><input type='submit' value='GO'/>
			</form-->
			
			<div class='address'>
				<img src='/images/footer_logo.png' />
				<br>Казань, ул. Муштари, 2а, 8 (843) 580-00-01
			</div>
			<div class='small_contact'>
				<a href='http://www.youtube.com/channel/UCwXUHVuYcenAvyoqJ2hS_vg'><img class='social_mini' src='/images/small_youtube_hover.png'  /></a>
				<a href='https://vk.com/battlehall'><img class='social_mini' src='/images/small_vk_hover.png'/></a>
				<div id="yellrank"></div>
				<script src="http://www.yell.ru/yellrank/yellrank.js/?cmp=9871145&s=1"></script>
			</div>
			<div class='bextel'>
				<img src='/images/bextel.png'/>
				Разработка сайта
			</div>
		</div>
	</footer>

<script src="/js/jquery-1.11.2.min.js"></script>
<script src="/js/jquery.slides.min.js"></script>
<script src="/js/main.js"></script>
<script src="/js/lightbox.js"></script>

<div id="counter">
<!--LiveInternet counter--><script type="text/javascript"><!--
document.write("<a href='//www.liveinternet.ru/click' "+
"target=_blank><img src='//counter.yadro.ru/hit?t45.6;r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";"+Math.random()+
"' alt='' title='LiveInternet' "+
"border='0' width='31' height='31'><\/a>")
//--></script><!--/LiveInternet-->
</div>

</body>
</html>