<?php 
include_once '/lib/nav.php';
$nav[1]['active'] = 'active';
include_once 'header.php'; ?>
	<section>
		<div class='block calendar'>
			<div>
						
				<!--div class='clear'></div-->

				<?php
					$sql="select * from galleries ORDER BY date DESC";
					$result=mysql_query($sql,Database::$mConnect);
					//
					while ($gallery=mysql_fetch_array($result)) {
						$timestamp = strtotime( $gallery['date']);
						$month = array("ЯНВАРЯ", "ФЕВРАЛЯ", "МАРТА", "АПРЕЛЯ", "МАЯ", "ИЮНЯ", "ИЮЛЯ", "АВГУСТА", "СЕНТЯБРЯ", "ОКТЯБРЯ", "НОЯБРЯ", "ДЕКАБРЯ");
						$day = date('j', $timestamp);
						$i = date('n', $timestamp);
						$title = mb_strtoupper($gallery['title'], 'UTF-8');
						print "			
							<h1>$day {$month[$i]} | {$title}</h1>
						 	<hr noshade class='block_header' >
						 	<div class='photos'> 
						";
						$sql = "select * from photos 
								where gallery_id = {$gallery['id']} LIMIT 5";
						$result2 = mysql_query($sql,Database::$mConnect);
						show('photos/index.php',$result2);
						print "<a href='/gallery.php?id={$gallery['id']}'><div class='last more_images'>Нужно больше золота-</div></a>";
						print "</div>";
					}
					
				?>				
			</div>
		</div>
	</section>
<?php include_once 'footer.php'; ?>