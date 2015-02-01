<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path.'/lib/nav.php';
$nav[1]['active'] = 'active';
include_once $path.'/header.php'; ?>
	<section>
		<div class='block calendar'>
			<div>
						
				<!--div class='clear'></div-->

				<?php
					$sql="select * from news where tournament = 1 ORDER BY tournament_date DESC";
					$result=mysql_query($sql,Database::$mConnect);
					//
					while ($tournament=mysql_fetch_array($result)) {
						$timestamp = strtotime( $tournament['tournament_date']);
						$month = array("ЯНВАРЯ", "ФЕВРАЛЯ", "МАРТА", "АПРЕЛЯ", "МАЯ", "ИЮНЯ", "ИЮЛЯ", "АВГУСТА", "СЕНТЯБРЯ", "ОКТЯБРЯ", "НОЯБРЯ", "ДЕКАБРЯ");
						$day = date('j', $timestamp);
						$i = date('n', $timestamp) - 1;
						$title = mb_strtoupper($tournament['title'], 'UTF-8');
						print "			
							<h1>$day {$month[$i]}</h1>
						 	<hr noshade class='block_header' >
						 	<h2>$title</h2>
						 	{$tournament['anons']}
						 	<div class='photos'> 
						";
						$sql = "select * from photos 
								where gallery_id = {$tournament['id']} LIMIT 5";
						$result2 = mysql_query($sql,Database::$mConnect);
						show('photos/index.php',$result2);
						if(mysql_num_rows($result2) == 5 )
							print "<a href='/gallery.php?id={$tournament['id']}'><div class='last more_images'>Еще фотографии</div></a>";
						print "</div>";
					}
					
				?>				
			</div>
		</div>
	</section>
<?php include_once $path.'/footer.php'; ?>