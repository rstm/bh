<html>
<head>
</head>
<body>
<?php
include('db_connect.php');
//$sql="select * from users";
//$result=mysql_query($sql,$conn);

//print "$date";

//$sql="select * from messages where pub_date='$date'";
//$result=mysql_query($sql,$conn);

//$row=mysql_fetch_array($result);
//print "<br>$row[0]<br>";
//print "$row[1]<br>";
//print "$row[2]<br>";
//print "$row[3]<br>";

print<<<here
<br>
<form method="post" action="news.php?id_clan={$_GET['id_clan']}">
<textarea name="text2" rows=5 cols=40>{$_GET['message']}
</textarea>  <br>
here;



print<<<here
<br>


<input type="hidden" name="id" value="{$_GET['id']}">

<input type="submit" value="Готово">
</form>
here;
	
?>


</body>
</html>