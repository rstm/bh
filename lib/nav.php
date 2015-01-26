<?php
$nav = array(
		array( 'title' => 'О КЛУБЕ', 'url' => '/', 'active' => '',
			'sub_menu' => array( 
				array('title' => 'ХАРАКТЕРИСТИКИ', 'url' => '/'),
				array('title' => 'ЦЕНЫ', 'url' => '/')
			)
	 	),
		array( 'title' => 'КАЛЕНДАРЬ', 'url' => 'calendar.php', 'active' => '' ),
		array( 'title' => 'НОВОСТИ', 'url' => 'news.php', 'active' => '',
			'sub_menu' => array( 
				array('title' => 'Мир', 'url' => '/'),
				array('title' => 'Россия', 'url' => '/'),
				array('title' => 'Казань', 'url' => '/')
			)
		),
		array( 'title' => 'КОМАНДА', 'url' => '#', 'active' => '' ),
		array( 'title' => 'КОНТАКТЫ', 'url' => 'contacts.php', 'active' => '' ),
		array( 'title' => 'СТРИМЫ', 'url' => '#', 'active' => '' )
	);
?>