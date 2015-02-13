<table>
<?php
	while ($row=mysql_fetch_assoc($result))
	{
		$anons = strip_tags($row['anons'], '<p>'); 
		//$anons = $row['anons']; 
		$last = '';
		$timestamp = strtotime( $row['tournament_date']);
		$month = array("Янв", "Фев", "Мар", "Апр", "Май", "Июн", "Июл", "Авг", "Сен", "Окт", "Ноя", "Дек");
		$day = date('d', $timestamp);
		$i = date('n', $timestamp) - 1;
		$year = date('y', $timestamp);

		if ($row['main']) $main = 'На главной '; 
		else $main = '';
		if ($row['tournament']) $tournament = 'Событие';
		else $tournament = '';
	?>
		
		
			<tr>
			 	<td><?=$day.' '.$month[$i].' '.$year?></td>
				<td><a href='/news/show.php?id=<?=$row['id']?>'><?=$row['title']?></a></td>
			 	<td><a href='/admin/update.php?id=<?=$row['id']?>'>Редактировать</a></td>
			 	<td>
				 	<form method='post' action='/app/models/news.php'>
				 		<input type='hidden' value='<?=$row['id']?>' name='id'/>
				 		<input type='hidden' value='<?=$row['tournament']?>' name='tournament'/>
				 		<input type='hidden' value='delete' name='action'/>
				 		<input class='small_action' type='submit' value='Удалить'/>
				 	</form>	
			 </td>
			 <td><?=$main?></td>
			 <td><?=$tournament?></td>
	</tr>		
	<? } ?>
</table>