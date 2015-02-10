<div class='container'>
	<table>	
	<? while ($row=mysql_fetch_assoc($result)) { ?>
		<tr>
			<td>
				<a class='link' href="show.php?id=<?=$row['id']?>"><?=$row['name']?></a>
		 	</td>
		</tr>
	<?php } ?>	
	</table>
</div>