<?php


	

	$s=1;
	$p=0;
	if(isset($_GET['min'])) $min=$_GET['min'];
	else $min=1;
	$max=$min+4;


	//echo $min; echo $max;
	while ($row=mysql_fetch_assoc($result))
	{
		//if ($s>=$min && $s<=$max)
		//{
		$anons = strip_tags($row['anons'], '<p>'); 
		//$anons = $row['anons']; 
		$last = '';
		if ($s % 3 == 0) $last = 'last';
		print "<div class='news $last' id='{$row['id']}''>";
		$timestamp = strtotime( $row['pub_date']);
		$month = array("Янв", "Фев", "Мар", "Апр", "Май", "Июн", "Июл", "Авг", "Сен", "Окт", "Ноя", "Дек");
		$day = date('d', $timestamp);
		$i = date('n', $timestamp);
		$year = date('y', $timestamp);
		if (!sign_in()) echo "<img src='/images/halflife.png' />";
		print "
			<div>
			 	<div class='date'><span>$day</span> $month[$i] $year</div>
				<a href='/news/show.php?id={$row['id']}'>{$row['title']}</a>";
		if (!sign_in())	print "<hr>
						<div class='anons'>$anons</div>";
		if (sign_in()) {
		  	print "
			 	<a href='/admin/update.php?id={$row['id']}'>Редактировать</a>

			 	<form method='post' action='/app/models/news.php'>
			 		<input type='hidden' value='{$row['id']}' name='id'/>
			 		<input type='hidden' value='delete' name='action'/>
			 		<input class='small_action' type='submit' value='Удалить'/>
			 	</form>
				
			";
			if ($row['main']) echo '| На главной ';
			if ($row['tournament']) echo '| Турнир ';
		}
		echo '</div></div>';
			
		//}
	
		$s++;			
	}	
	



	/*print "<br>  <div  id=\"numpage\">Cтраницы: ";
	
	for($k=0;$k<($s-1)/5;$k++)
	{
		$r=$k*5+1; $t=$k+1;
		$link='<a href="?&min='.$r.'">'.$t.'</a>';
		echo $link; 
		print "  ";
	}*/
?>