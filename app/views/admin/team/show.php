<div class='container'>
	<table>
		<tr>
			<td>Первое поле</td>
			<td>Второе поле</td>
			<td>Аватар</td>
		</tr>	
	<? while ($row=mysql_fetch_assoc($result)) { ?>
		<tr>
			<form method='post' enctype="multipart/form-data" action='/app/models/team.php'>
				<td><input type='text' name='data[first_field]' value='<?=$row['first_field']?>' /></td>
				<td><input type='text' name='data[second_field]' value='<?=$row['second_field']?>' /></td>			
				<td><input type="file" name="userfile" multiple accept="image/*"></td>			
				<td>
			 		<input type='hidden' value='<?=$row['id']?>' name='id'/>
			 		<input type='hidden' value='update' name='action'/>
			 		<input type="hidden" name="old_avatar" value="<?=$row['avatar']?>" />
					<input type="hidden" name="data[game_id]" value="<?=$_GET['id']?>" />
			 		<input class='green' type='submit' value='Обновить'/>
			 	</td>
		 	</form>
			<td>
				<form method='post' action='/app/models/team.php'>
			 		<input type='hidden' value='<?=$row['id']?>' name='id'/>
			 		<input type='hidden' value='delete' name='action'/>
					<input type="hidden" name="data[game_id]" value="<?=$_GET['id']?>" />
					<input type="hidden" name="data[avatar]" value="<?=$row['avatar']?>" />
			 		<input class='danger' type='submit' value='Удалить'/>
			 	</form>
		 	</td>
		</tr>
	<?php } ?>	
	</table>

	<form method="post" enctype="multipart/form-data" action="/app/models/team.php">
		<p>Первое поле: <input type="text" name="data[first_field]" /></p>
		<p>Второе поле: <input type="text" name="data[second_field]" /></p>
		<p>Аватар: <input type="file" name="userfile" multiple accept="image/*"></p>
		<input type="hidden" name="action" value="new" />
		<input type="hidden" name="data[game_id]" value="<?=$_GET['id']?>" />
		<input type='submit' value='Добавить' />
	</form>
</div>