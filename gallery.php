<?php include 'header.php'; ?>
<?php 

//echo $_SESSION['admin']; 
if(isset($_POST['p'])) $p=$_POST['p'];

 if (!empty($p)&&isset($_SESSION['admin']))
 {


		for ($i=0;$i<$p;$i++)
		 { 
			if ( isset($_POST['delete_photo'][$i]))
				 {
				  
				 $v='gallery/'.$_GET['id_clan'].'/'.$_POST['all_photo'][$i].'';
				
				unlink($v);
				} 
		}

		for ($i=0;$i<$p;$i++)
		 $delete_photo[$i]=0;
		 
 }
 
if (isset($_SESSION['admin'])) echo "<a href=\"in.php\">Панель управления кланом</a>";

if ($handle = opendir('gallery/'.$_GET['id_clan'])) 
{

?>
<table class="gallery_table">
<tr>
<?php
$k=1;
$s=1;
$p=0;
	if(isset($_GET['min'])) $min=$_GET['min'];
		else $min=1;
		$max=$min+2;
if (isset($_SESSION['admin'])) {
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
		<td><a href="gallery/<?php echo $_GET['id_clan'].'/'.$entry;?>" rel="lightbox[rar]" ><img class="gallery" src="gallery/<?php echo $_GET['id_clan'].'/'.$entry;?>" ></a> 
		<?php
if (isset($_SESSION['admin'])) {			
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

if (isset($_SESSION['admin'])) {
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