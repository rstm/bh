<?php
include ('header.php');

$sql="select * from users";
$result=mysql_query($sql,Database::$mConnect);

if(isset($_POST['p'])) $p=$_POST['p'];
//удаление
 if (!empty($p)&&$_SESSION['admin'] == 1)
 {
 	//echo '<pre>'; print_r($delete_messages); echo '</pre>';
		for ($i=0;$i<$p;$i++)
		 { 
			if ( isset($_POST['delete_messages'][$i]))
				 {
				$sql="delete from messages where id='{$_POST['all_messages'][$i]}'";
				$result=mysql_query($sql,Database::$mConnect);
				} 
		}

		for ($i=0;$i<$p;$i++)
		 $_POST['delete_messages'][$i]=0;
		 
 }

 //редактирование
if (!empty($_POST['id'])&&isset($_SESSION['admin']))
{ $sql=<<<here
		update messages
		set
		text='{$_POST['text2']}'
		where 
		id={$_POST['id']};
here;
//echo $sql;
		$result=mysql_query($sql,Database::$mConnect);
}


		
		if (isset($_SESSION['admin'])) echo "<a href=\"in.php\">Панель управления кланом</a>";
		
		$sql2="select * from messages where id_clan={$_GET['id_clan']}";
		$result2=mysql_query($sql2,Database::$mConnect);
		
		show_news();
?>
</div>
</div>
</div>

</body>
</html>