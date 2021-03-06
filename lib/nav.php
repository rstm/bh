<?php
$nav = array(
		array( 'title' => 'О КЛУБЕ', 'url' => '/', 'active' => '',
			'sub_menu' => array( 
				array('title' => 'Характеристики', 'url' => '/system_info.php'),
				array('title' => 'Цены', 'url' => '/prices.php'),
				array('title' => 'Медиа', 'url' => '/media/')
			)
	 	),
		array( 'title' => 'КАЛЕНДАРЬ', 'url' => '/calendar', 'active' => '',
			'sub_menu' => array( 
				array('title' => 'Прошедшее', 'url' => '/calendar/past.php'),
				array('title' => 'Будущее', 'url' => '/calendar/future.php')
			)
		),
		array( 'title' => 'НОВОСТИ', 'url' => '/news/?category_id=2', 'active' => '',
			'sub_menu' => array( 
				array('title' => 'Мир', 'url' => '/news/?category_id=1'),
				array('title' => 'Россия', 'url' => '/news/?category_id=3'),
				array('title' => 'Казань', 'url' => '/news/?category_id=2')
			)
		),
		array( 'title' => 'КОМАНДА', 'url' => '/team', 'active' => '',
			'sub_menu' => array( 
				array('title' => 'Battle Hall Staff', 'url' => '/team/staff.php'),
				array('title' => 'Battle Hall Киберспорт', 'url' => '/team/cybersport/')
			)
		),
		array( 'title' => 'КОНТАКТЫ', 'url' => '/contacts.php', 'active' => '', 
			'sub_menu' => array( 
				array('title' => 'Клуб', 'url' => '/contacts.php#info'),
				array('title' => 'Связаться с нами', 'url' => '/contacts.php#social'),
				array('title' => 'Как добраться', 'url' => '/contacts.php#look_map')
			)
		),
		array( 'title' => 'СТРИМЫ', 'url' => '/streams', 'active' => '',
			'sub_menu' => array( 
				array('title' => 'Live', 'url' => '/streams/live.php'),
				array('title' => 'VoD', 'url' => '/streams/old.php')
			)
		)
	);
?>