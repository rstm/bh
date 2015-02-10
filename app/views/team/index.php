<section>
	<div class='block games'>
		<div>
			<?php while ($row=mysql_fetch_assoc($result)) {?>
				<div class='game'>
					<a href="show.php?id=<?=$row['id']?>">
						<img src='/images/team/<?=$row['id']?>.png'>
					</a>
					<a class='link' href="show.php?id=<?=$row['id']?>"><?=$row['name']?></a>
					<hr>
				</div>		
			<?php } ?>
		</div>
	</div>
</section>

