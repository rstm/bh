<?php include 'header.php'; ?>


<?php

if (isset($_POST['about']))
{ $sql=<<<here
		update users
		set
		about='{$_POST['about']}'
		where 
		id={$_SESSION['id']};
here;
//echo $sql;
		$result=mysql_query($sql,Database::$mConnect);
		$_SESSION['about']=$_POST['about'];
}
if(isset($_SESSION['admin'])) {?>
	<a href="in.php">Панель управления кланом</a>
<?php
}
	if(isset($_SESSION['admin'])) print "<br><a href='change_about.php'>Редактировать</a><br>";

	$clan=show_clan_about($_GET['id_clan']);
	echo "<h1>Клан: {$clan['name']}</h1>";

	if($clan['about']==NULL) echo 'Отсутвует'; else echo $clan['about'];


?>

</div>
</div>
</body>
</html>