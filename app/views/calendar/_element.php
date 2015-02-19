<? 
if ($row = mysql_fetch_array($data['all'])) {
	$timestamp = strtotime( $row['tournament_date']);
	$day = date('j', $timestamp);
	$i = date('n', $timestamp) - 1;
	$year = date('o', $timestamp); 
	if ($current_month != $i)
?>
<a href='/news/show.php?id=<?=$row['id']?>' class='element' id='<?=$row['id']?>'>
 	<div class='header'><?=$day.' '.$month[$i]?></div>
	<div class='body'><?=$row['title']?></div>
</a>
<? $current_month = $i; } ?>