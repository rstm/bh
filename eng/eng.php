<!DOCTYPE HTML>
<html>
<head>

<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body bgcolor="">

<?php 

session_start();
$conn=mysql_connect("127.0.0.1","root","510311");

mysql_select_db("klan",$conn);

$sql="select * from users";
$result=mysql_query($sql,$conn);

//удаление
 if (!empty($p)&&$_SESSION['admin'] == 1)
 {
		for ($i=0;$i<$p;$i++)
		 { 
			if ( $delete_messages[$i]==1)
				 {
				$sql="delete from messages where pub_date='$all_messages[$i]'";
				$result=mysql_query($sql,$conn);
				} 
		}

		for ($i=0;$i<$p;$i++)
		 $delete_messages[$i]=0;
		 
 }

 //редактирование
if (!empty($date)&&$_SESSION['admin'] == 1)
{ $sql=<<<here
		update messages
		set
		text='$text2'
		where 
		pub_date='$date';
here;
		$result=mysql_query($sql,$conn);
}


?>
<div id="menu">
<div id="in_menu" >

<a href="rus.php" class="news_page">НОВОСТИ</a>
<a href="gallery.php" class="gallery">ГАЛЕРЕЯ</a>
<a href="request.php">ОСТАВИТЬ ЗАЯВКУ</a>
<a href="about.php" class="left">О НАС</a>
</div>
</div>
<div id="site">

<div id="content">




		<?php		
		if ($_SESSION['admin'] == 1) echo "<a href=\"in.php\">Редактировать</a>";
		
		$sql2="select * from messages";
		$result2=mysql_query($sql2,$conn);
		print<<<here
		<ul class="news">
here;
		
		$s=1;
		$p=0;
		if (!isset($min)) $min=1;
		$max=$min+4;
	if ($_SESSION['admin'] == 1) {	print<<<here
		<form method="post">
here;
}
		//echo $min; echo $max;
		while ($row2=mysql_fetch_array($result2))
		{
			if ($s>=$min && $s<=$max)
			{
			print "<li>";
			
			
			 echo $row2[1]; print "<br><br>";
			 echo $row2[0]; print " +3 GMT";
			 if ($_SESSION['admin'] == 1) {
			  print<<<here
			    <input type="checkbox" name="delete_messages[$p]" value="1" >
			  <a href="change.php?date=$row2[0]&message=$row2[1]">ред</a>
			 
			<input type="hidden" name="all_messages[$p]" value="$row2[0]" >
			 </li>
here;
		}
		
			}

			$p++;			
			$s++;			
		}	
		
	print "</ul>";	
if ($_SESSION['admin'] == 1) {
		print<<<here
			<br> <input type="hidden" name="p" value="$p"> 
		<input type="submit" value="Удалить">
		
		
		
		</form>
here;
	}
		print "<br>  <div  id=\"numpage\";>Страницы: ";
		
		for($k=0;$k<($s-1)/5;$k++)
		{
			$r=$k*5+1; $t=$k+1;
			$link='<a  href="rus.php?&min='.$r.'">'.$t.'</a>';
			echo $link; 
			print "  ";
		}
?>
</div>
</div>
</div>

</body>
</html>