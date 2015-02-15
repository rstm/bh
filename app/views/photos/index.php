
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
				print '</div>';	
			$s++;			
		}	
			
			if (sign_in()) { echo "<div style='clear:both;'></div>"; }

		?>

