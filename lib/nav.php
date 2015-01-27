<?php
$nav = array(
		array( 'title' => 'О КЛУБЕ', 'url' => '/', 'active' => '',
			'sub_menu' => array( 
				array('title' => 'ХАРАКТЕРИСТИКИ', 'url' => '/#system_info'),
				array('title' => 'ЦЕНЫ', 'url' => '/#prices')
			)
	 	),
		array( 'title' => 'КАЛЕНДАРЬ', 'url' => '/calendar.php', 'active' => '',
			'sub_menu' => array( 
				array('title' => 'Прошедшее', 'url' => '#'),
				array('title' => 'Будущее', 'url' => '#')
			)
		),
		array( 'title' => 'НОВОСТИ', 'url' => '/news/?category_id=2', 'active' => '',
			'sub_menu' => array( 
				array('title' => 'Мир', 'url' => '/news/?category_id=1'),
				array('title' => 'Россия', 'url' => '/news/?category_id=3'),
				array('title' => 'Казань', 'url' => '/news/?category_id=2')
			)
		),
		array( 'title' => 'КОМАНДА', 'url' => '#', 'active' => '',
			'sub_menu' => array( 
				array('title' => 'Battle Hall Staff', 'url' => '/calendar.php'),
				array('title' => 'Battle Hall Киберспорт', 'url' => '/calendar.php')
			)
		),
		array( 'title' => 'КОНТАКТЫ', 'url' => '/contacts.php', 'active' => '', 
			'sub_menu' => array( 
				array('title' => 'Клуб', 'url' => '/contacts.php#info'),
				array('title' => 'Связаться с нами', 'url' => '/contacts.php#social'),
				array('title' => 'Как добраться', 'url' => '/contacts.php#look_map')
			)
		),
		array( 'title' => 'СТРИМЫ', 'url' => '#', 'active' => '',
			'sub_menu' => array( 
				array('title' => 'CS:GO', 'url' => '#'),
				array('title' => 'Dota 2', 'url' => '#'),
				array('title' => '101', 'url' => '#')
			)
		)
	);
?>