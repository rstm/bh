<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/lightbox.js"></script>
<link href="css/lightbox.css" rel="stylesheet" /> 
</head>
<body bgcolor="">

<div id="menu">
<div id="in_menu" >

<a href="rus.php" class="news">НОВОСТИ</a>
<a href="gallery.php" class="gallery">ГАЛЕРЕЯ</a>
<a href="request.php">ОСТАВИТЬ ЗАЯВКУ</a>
<a href="about.php" class="left">О НАС</a>
</div>
</div>

<div id="site">

<div id="content">

<?php 
session_start();
//echo $_SESSION['admin']; 


 if (!empty($p)&&$_SESSION['admin'] == 1)
 {

		for ($i=0;$i<$p;$i++)
		 { 
			if ( $delete_photo[$i]==1)
				 {
				  
				 $v='gallery/'.$all_photo[$i].'';
				
				unlink($v);
				} 
		}

		for ($i=0;$i<$p;$i++)
		 $delete_photo[$i]=0;
		 
 }
 
if ($_SESSION['admin'] == 1) echo "<a href=\"in.php\">Редактировать</a>";

if ($handle = opendir('gallery')) 
{

?>
<table class="gallery_table">
<tr>
<?php
$k=1;
$s=1;
$p=0;
	if (!isset($min)) $min=1;
		$max=$min+2;
if ($_SESSION['admin'] == 1) {
		print<<<here
		<form method="post">
here;
}

    while (false !== ($entry = readdir($handle))) 
	{
		if ($entry[0] != "." && $entry[0] != ".." )
		{
        
					if ($s>=$min && $s<=$max)
			{
			?>
		<td><a href="gallery/<?php echo $entry;?>" rel="lightbox[rar]" ><img class="gallery" src="gallery/<?php echo $entry;?>" ></a> 
		<?php
if ($_SESSION['admin'] == 1) {			
			print<<<here
				 <br>
			    <input type="checkbox" name="delete_photo[$p]" value="1" >

			<input type="hidden" name="all_photo[$p]" value="$entry" >
here;
}
$p++;

?>
		</td>
		
		<?php
}

		if ($k%3==0) print "</tr><tr>";
			$k++;
			$s++;
		}
    }
	
}
		


?>
</tr>
</table>
<?php

if ($_SESSION['admin'] == 1) {
		print<<<here
			<br> <input type="hidden" name="p" value="$p"> 
		<input type="submit" value="Удалить">
		
		
		
		</form>
here;
}

				print "<br>  <div  id=\"numpage\";>Страницы: ";
		for($k=0;$k<($s-1)/3;$k++)
		{
			$r=$k*3+1; $t=$k+1;
			$link='<a href="gallery.php?&min='.$r.'">'.$t.'</a>';
			echo $link; 
			print "  ";
		}
		
?>
</div>
</div>
</div>
</body>
</html>