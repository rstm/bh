<?
$s=1;
$current_month = -99;

if($data['next']) include_once '_next.php';
 
while ($row = mysql_fetch_array($data['all'])) {
	$anons = strip_tags($row['anons'], '<p>'); 
	//$anons = $row['anons']; 
	$position = '';
		
	$timestamp = strtotime($row['tournament_date']);
	$day = date('j', $timestamp);
	$i = date('n', $timestamp) - 1;
	$year = date('o', $timestamp);



	if (($s - 1) % 3 == 0 && $current_month == $i) echo "</ul>"; 

	
	if ($current_month != $i) {
		$s = 1;

		if ($current_month != -99) echo '</ul></div>';
		$current_month = $i;
?>
	
	<h1><?=mb_strtoupper(rudate('F',$timestamp,true), 'UTF-8')?></h1>
 	<hr noshade class='block_header' > 
	<div class='clear'></div>
	<div class='elements'> 	
<? }
	if (($s - 1) % 3 == 0) echo "<ul class='elements_row'>"; 
?>			
		<li class='element'>
			<a href='/news/show.php?id=<?=$row['id']?>' 
			class='' id='<?=$row['id']?>'>
			 	<div class='header'><?=$day.' '.$month[$i]?></div>
				<div class='body'><?=$row['title']?></div>
			</a>
		</li>					
<? 
	//if ($s % 3 == 0) echo '</div>'; 
	//$current_month = $i;
	//if ($current_month != $i && $current_month != -99) echo '</div>';

	$s++; 
} 
?>
