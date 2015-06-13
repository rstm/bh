<div class='container'>
	<table>
		<tr>
			<td>Название</td>
			<td>Цена</td>
		</tr>	
	<? while ($row=mysql_fetch_assoc($result)) { ?>
		<tr>
			<form method='post' enctype="multipart/form-data" action='/app/models/price.php'>
				<td><input type='text' name='data[title]' value='<?=$row['title']?>' /></td>
				<td><input type='text' name='data[price]' value='<?=$row['price']?>' /></td>			
				<td>
			 		<input type='hidden' value='<?=$row['id']?>' name='id'/>
			 		<input type='hidden' value='update' name='action'/>
			 		<input class='green' type='submit' value='Обновить'/>
			 	</td>
		 	</form>
			<td>
				<form method='post' action='/app/models/price.php'>
			 		<input type='hidden' value='<?=$row['id']?>' name='id'/>
			 		<input type='hidden' value='delete' name='action'/>
			 		<input class='danger' type='submit' value='Удалить'/>
			 	</form>
		 	</td>
		</tr>
	<?php } ?>	
	</table>

	<form method="post" action="/app/models/price.php">
		<p>Название: <input type="text" name="data[title]" /></p>
		<p>Цена: <input type="text" name="data[price]" /></p>
		<input type="hidden" name="action" value="new" />
		<input type='submit' value='Добавить' />
	</form>
</div>