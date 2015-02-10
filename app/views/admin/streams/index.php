<h1><span><?=$data['title']?></span></h1>
<div class='container'>
	<div class='actions'>
		<form method="post" action="/app/models/stream.php">
			<p>Название <input type='text' name='data[title]' /></p>
			<p>Описание <textarea id='anons' name="data[anons]"  rows=3 cols=60></textarea> 
			</p>
			<p>Ссылка <textarea id='anons' name="data[url]"  rows=3 cols=60></textarea> 
			</p>			
			<input type='hidden' name='action' value='new'/>
			<input type='hidden' name='data[type]' value='<?=$data['type']?>'/>
			<input type="submit" value="Добавить видео">
		</form>
	</div>
	<table>
	 	<? while ($row = mysql_fetch_array($data['result'])) { ?>
			<tr>
				<form method='post' action='/app/models/stream.php'>
					<td>
						<input type='text' name='data[title]' value='<?=$row['title']?>'/>
					</td>
					<td>
						<input type='text' name='data[anons]' value='<?=$row['anons']?>'/>
					</td>
					<td><textarea name='data[url]' rows=6 cols=57><?=$row['url']?></textarea></td>
					<td>
				 		<input type='hidden' value='<?=$row['id']?>' name='id'/>
						<input type='hidden' name='data[type]' value='<?=$data['type']?>'/>
				 		<input type='hidden' value='update' name='action'/>
				 		<input class='green' type='submit' value='Обн.'/>
			 		</td>
				</form>
				<td>
					<form method='post' action='/app/models/stream.php'>
				 		<input type='hidden' value='<?=$row['id']?>' name='id'/>
				 		<input type='hidden' value='delete' name='action'/>
						<input type='hidden' name='data[type]' value='<?=$data['type']?>'/>
				 		<input class='danger' type='submit' value='Уд.'/>
				 	</form>
		 		</td>
			</tr>
		<? } ?>
	</table>
</div>