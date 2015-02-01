<?php
$s=1;
$row=mysql_fetch_array($result);
?>
<h1>МЕДИА</h1>
<hr noshade class='block_header' > 

<div class='clear'></div>

<div class='video first'>
	<div class='url'><?=$row['url']?></div>
		 
	<div class='info'>
		<span><?=$row['title']?></span>
		<hr>
		<div class='anons'><?=$row['anons']?></div>
	</div>
</div>


<?php

while ($row=mysql_fetch_array($result))
{	
?>



<?php	
		print "
		<div class='video'>{$row['url']}</div>
		 
			<div>
				<a href='/news/show.php?id={$row['id']}'>{$row['title']}</a>
			<hr>
						<div class='anons'>{$row['anons']}</div>

			</div>
		</div>";

		?>
	
<?php $s++;	} ?>