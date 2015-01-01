<?php session_start(); 

if (!empty($_POST['out'])&&$_SESSION['admin'] == 1)
{
	// освобождаем все переменные сессии
	$_SESSION = array();


	// стираем cookie идентификатора сессии
	if (isset($_COOKIE[session_name()])) 
	{
   		setcookie(session_name(), '', time()-42000, '/');
	}

	// уничтожаем сессию
	session_destroy();
  } 
  ?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>



<?php

  

  
 if ( isset($_POST['userName']))
  {


	$sql="select * from users";
	$result=mysql_query($sql,Database::$mConnect);
	while ($row=mysql_fetch_assoc($result))
	{ 	

		if (($row["login"]==$_POST['userName'])&&($row["password"]==$_POST['password']))
		{ 
			foreach($row as $index=>$value) {
			$_SESSION[$index]=$value;
			}
		print "Вы успешно авторизовались. ";
				$_SESSION['admin'] = 1;
			$r=1;
		}
		
	}
	if (!isset($r)) print "<h4>Неправильный логин или пароль</h4>";
}


if (!isset($_SESSION['admin']))
{?>
<form method="post" action="#">
Введите ваши данные: <br>
Имя пользователя: <input type="text" name="userName" value=""><br>
Пароль: <input type="password" name="password" value="">
<br>
<input type="submit" value="Войти">
</form>
<?php
} 


if (isset($_SESSION['admin']))
{
?>

<h2>Клан: <?php echo $_SESSION['name']; ?></h2>

<h2><a href="requests.php">Заявки в клан</a></h2>
<h2><a href="members.php">Состав клана</a></h2>
<form method="post" action="#">
Новость:
<br>

<textarea name="message" maxlength="99999" rows=10 cols=60 placeholder="Введите текст">
</textarea>  

<input type="hidden" name="id" value="$id">
<input type="hidden" name="login" value="$login">
<input type="hidden" name="admin" value="$admin">
<br>
<input type="submit" value="Добавить">
</form>

<?php 
if(!empty($_POST['message']))
{
		$date=date("Y-m-d");
		$time=date("H:i:s");
		$sql=<<<here
		INSERT INTO `mystuff`.`messages` 
		( `pub_date`, `time`, `text`, `id_clan`) 
		VALUES ('{$date}', '{$time}', '{$_POST['message']}', {$_SESSION['id']});
here;
	//echo $sql;
		$result=mysql_query($sql,Database::$mConnect);
			 
			print "<h4>Новость успешно добавлена</h4>";
}
?>
  <br>
Загрузка фотографий для новостей (ссылаться на них по адресу news/(название файла)):
<form name="upload" enctype="multipart/form-data" method="post" action="#">
   <p><input type="file" name="userfile" multiple accept="image/*">
   <input type="hidden" name="photo" value="1">
   <input type="hidden" name="razdel" value="news/<?php echo $_SESSION['id'];?>/">
   <input type="submit" name="upload" value="Отправить"></p>
  </form> 
  <hr>
  
<br>
Загрузка фотографий:
<form name="upload" enctype="multipart/form-data" method="post" action="#">
   <p><input type="file" name="userfile" multiple accept="image/*">
   <input type="hidden" name="photo" value="1">
   <input type="hidden" name="razdel" value="gallery/<?php echo $_SESSION['id'];?>/">
   <input type="submit" name="upload" value="Отправить"></p>
  </form> 

  

  
  <?php

  
if(!empty($_POST['photo']))
{ 
	  
	$uploaddir = $_POST['razdel'];
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
	
	 if($_FILES['userfile']['size'] != 0 and $_FILES['userfile']['size']<=10024000) 
	 { // Здесь мы проверяем размер если он более 1 МБ
		 if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) 
		 { // Здесь идет процесс загрузки изображения
		 $size = getimagesize($uploadfile); // с помощью этой функции мы можем получить размер пикселей изображения

		 if ($size[0] < 800 && $size[1]<800) 
		 { 
			 echo "<h4>Фотография загружена.</h4>";
		}
		else 
		{
		echo "<h4>Размер пикселей превышает допустимые нормы (ширина не более - 800 пикселей, высота не более 800)</h4>"; 
			 unlink($uploadfile); 
		}
	  
		 } 
		 else 
			{echo "<h4>Файл не загружен, попробуйте еще раз.</h4>";
}
	 }
	 else 
		{ echo "Размер файла не должен превышать 1000Кб";}
} 

}
?>


<?php if (isset($_SESSION['admin'])) {?>
<br>
<a href="about.php?id_clan=<?php echo $_SESSION['id'];?>"> На сайт </a>
<br>
<form method="post">
<input type="hidden" name="out" value="1"> 
<input type="submit" value="Выход">
</form>
<?php
 }
 else print '<a href="index.php"> На сайт </a>';
 

?>

</body>
</html>