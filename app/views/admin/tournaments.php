<table>
<? while ($row = mysql_fetch_array($result)) { ?>
	<tr>
		<td><?=$row['tournament_date']?></td>
		<td><a href='show.php?id=<?=$row['id']?>'><?=$row['title']?></a></td>
	</tr>
<? } ?>
</table>