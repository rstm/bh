<div class='container'>
	<table>	
	<? while ($row=mysql_fetch_assoc($result)) { ?>
		<tr>
			<form method='post' action='/app/models/team.php'>
				<td><input type='text' name='first_field' value='<?=$row['first_field']?>' /></td>
				<td><input type='text' name='second_field' value='<?=$row['second_field']?>' /></td>			
				<td>
			 		<input type='hidden' value='<?=$row['id']?>' name='id'/>
			 		<input type='hidden' value='update' name='action'/>
					<input type="hidden" name="game_id" value="<?=$_GET['id']?>" />
			 		<input class='green' type='submit' value='Обновить'/>
			 	</td>
		 	</form>
			<td>
				<form method='post' action='/app/models/team.php'>
			 		<input type='hidden' value='<?=$row['id']?>' name='id'/>
			 		<input type='hidden' value='delete' name='action'/>
				<input type="hidden" name="game_id" value="<?=$_GET['id']?>" />
			 		<input class='danger' type='submit' value='Удалить'/>
			 	</form>
		 	</td>
		</tr>
	<?php } ?>	
	</table>

	<form method="post" action="/app/models/team.php">
		<p>Первое поле: <input type="text" name="first_field" /></p>
		<p>Второе поле: <input type="text" name="second_field" /></p>
		<input type="hidden" name="action" value="new" />
		<input type="hidden" name="game_id" value="<?=$_GET['id']?>" />
		<input type='submit' value='Добавить' />
	</form>
</div>