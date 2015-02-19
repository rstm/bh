<?php header('Content-Type: text/html; charset=utf-8'); 
$path = $_SERVER['DOCUMENT_ROOT'];
include ($path.'/lib/functions.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Battle Hall</title>
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/favicon.ico" type= "image/x-icon">

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
		<a href='/'><img src='/images/logo.png' /></a>
		<form class='header_search' method='get' action='search.php'>
				<img src='/images/search.png'>
				<input type='text' name='q' placeholder='Поиск'/>
		</form>	
		<nav>
			<ul>
			<?php 
				//echo '<pre>'; print_r($nav); echo '</pre>';
				$s = 0;
				foreach ($nav as $menu_element) {
					switch ($s) {
						case 4:
							$position = 'fourth';
							break;
						case 5:
							$position = 'fifth';
							break;
						
						default:
							$position = '';
							break;
					}
					print "
						<li>
							<a href='{$menu_element['url']}' class='{$menu_element['active']}'>
								{$menu_element['title']}						
								<span>|</span>
							</a>
						<ul class = 'sub_menu $position'>";
					foreach ($menu_element['sub_menu'] as $key => $sub_menu_element) {
							print "<li><a href='{$sub_menu_element['url']}'>{$sub_menu_element['title']}</a></li>";
					}
					print '</ul>';
					print '</li>';
					$s++;
				}
			?>
			</ul>
		
		</nav>

	</div>
</header>



