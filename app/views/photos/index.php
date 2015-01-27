<?php
$s=1;
		$p=0;
		if(isset($_GET['min'])) $min=$_GET['min'];
		else $min=1;
		$max=$min+4;

		//echo "<div class='photos'>";
		while ($row=mysql_fetch_assoc($result))
		{
			
				$position = ( $s % 3 == 0 ) ? 'last' : '';


			 	print "
			 		<div class='$position image'>
				 		<a data-lightbox='set{$row['gallery_id']}' href='/images/gallery/{$row['gallery_id']}/{$row['id']}.png'>
					 		<img src='/images/gallery/{$row['gallery_id']}/{$row['id']}.png' />
					 	</a>
			 	";
			 	if (sign_in()) {
				  	print "		
					 	<form class='delete_image' method='post' action='/app/models/photos.php'>
					 		<input type='hidden' value='{$row['id']}' name='id'/>
					 		<input type='hidden' name='gallery_id' value='{$row['gallery_id']}' />
					 		<input type='hidden' value='delete' name='action'/>
					 		<input class='small_action' type='submit' value='Удалить'/>
					 	</form>
					";
				}		
				print '</div>';	
			$s++;			
		}	
			
		//echo '</div>';

		?>