<?php header('Content-Type: text/html; charset=utf-8'); 
$path = $_SERVER['DOCUMENT_ROOT'];
include ($path.'/lib/functions.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">


<link href="/fonts/bebasneue.css" rel="stylesheet" type="text/css"  /> 
<link href="/fonts/bulletin.css" rel="stylesheet" type="text/css"  /> 
<link href="/fonts/beausanspro.css" rel="stylesheet" type="text/css"  />
<link href="/fonts/roboto/roboto.css" rel="stylesheet" type="text/css"  />
<!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

<link href="/css/lightbox.css" rel="stylesheet" type="text/css"  /> 
<link href="/fonts/bebasneue.css" rel="stylesheet" type="text/css"  /> 
<link href="/fonts/bulletin.css" rel="stylesheet" type="text/css"  /> 
<link href="/fonts/beausanspro.css" rel="stylesheet" type="text/css"  />
<link href="/css/main.css" rel="stylesheet" type="text/css"  />  
</head>
<body>
<header>
	<div>
		<img src='/images/logo.png' />
		<nav>
			<?php 
				//echo '<pre>'; print_r($nav); echo '</pre>';
				foreach ($nav as $menu_element) {
					print "
						<div>
						<a href='{$menu_element['url']}' class='{$menu_element['active']}'>
							{$menu_element['title']}
					";
					if (isset($menu_element['sub_menu'])) {
						print "							
							<span>|</span></a>
							<div class = 'sub_menu'>";
						foreach ($menu_element['sub_menu'] as $key => $sub_menu_element) {
								print "<a href='{$sub_menu_element['url']}'>{$sub_menu_element['title']}</a>";
						}
						print '</div>';
					} else print '</a>';
					print '</div>';
				}
			?>
		</nav>		
	</div>
</header>



