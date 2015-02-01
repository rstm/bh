<ul>
<?php while ($row=mysql_fetch_assoc($result)) {?>
	<li><a href="show.php?id=<?=$row['id']?>"><?=$row['name']?></a></li>		
<?php } ?>	
</ul>
