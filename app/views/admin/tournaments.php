<ul>
<?php
while ($row=mysql_fetch_array($result)) {
	print "<li><a href='show.php?id=$row[0]'>$row[1]</a></li>";
}	
?>
</ul>