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
		<div class='address'>
			<img src='/images/footer_logo.png' />
			<br/>
			ул. Муштари, 2А, Казань, Республика Татарстан, 8 (843) 561-00-99
		</div>
	</footer>
</div>

<script src="/js/jquery-1.11.2.min.js"></script>
<script src="/js/jquery.slides.min.js"></script>
<script src="/js/main.js"></script>
<script src="/js/lightbox.js"></script>
</body>
</html>