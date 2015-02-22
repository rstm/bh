<?php


while ($row=mysql_fetch_array($result))
{
	if ($s>=$min && $s<=$max)
	{
	print "<div class='photos'>";
	
	
	 print " <div><img src='/images/gallery/$id/$row[0].png' />";
	 if ($admin==1) {
	  	print "		
		 	<form method='post' action='/models/photos.php'>
		 		<input type='hidden' value='{$row[0]}' name='id'/>
		 		<input type='hidden' name='id_gallery' value='{$_GET['id']}' />
		 		<input type='hidden' value='delete' name='action'/>
		 		<input class='small_action' type='submit' value='Удалить'/>
		 	</form>
			</div>
		";
}

	}

	$s++;			
}	

print "<br>  <div  id=\"numpage\">Cтраницы: ";

for($k=0;$k<($s-1)/5;$k++)
{
	$r=$k*5+1; $t=$k+1;
	$link='<a  href="?&min='.$r.'">'.$t.'</a>';
	echo $link; 
	print "  ";
}

?>