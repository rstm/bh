
<?php 
$s = 1;
while ($row=mysql_fetch_assoc($result)) {
	if($s % 2 == 0) $position = 'right';
	else $position = 'left';
?>

	<div class='person <?=$position?>'>
		<img src='/images/team.png' />
		<div class='info'>
			<span><?=$row['name']?></span>
			<p>Team Leader</p>
		</div>
	</div>
		
			
<?php $s++; } ?>	
<div class='clear'></div>
</div>	
</div>
</div>
</section>