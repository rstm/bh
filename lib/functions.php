<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include ($path.'/lib/db_connect.php');

function check_login() {
	if(isset($_COOKIE['remember_token'])) {

		$query = "SELECT remember_token FROM users WHERE id = '".intval($_COOKIE['id'])."' LIMIT 1";

		$result = mysql_query($query,Database::$mConnect);

		//echo mysql_error();

		$data = mysql_fetch_assoc($result);

		$remember_token = md5($_SERVER['REMOTE_ADDR'].$_COOKIE['remember_token']);


		//echo $remember_token.'</br>';

		//echo $data['remember_token']; 

		if ($data['remember_token'] !== $remember_token) {
			header("Location: /admin");
			exit();
		} else {
			$_SESSION['authorized'] = true;  
	  		$_SESSION['ip'] = $_SERVER['REMOTE_ADDR']; 
		}
	} else {
		header("Location: /admin");
		exit();
	}
}

function show( $method,$result ) {
	global $path; 
	include $path.'/app/views/'.$method;
}

function sign_in() {
	if ( !empty($_SESSION['authorized'])
		&& $_SESSION['ip'] == $_SERVER['REMOTE_ADDR'] ) {
		return true;
	} else return false;//die("Доступ закрыт."); 
}

function rudate($format, $timestamp = 0, $nominative_month = false)
{
	 if(!$timestamp) $timestamp = time();
	 elseif(!preg_match("/^[0-9]+$/", $timestamp)) $timestamp = strtotime($timestamp);
	 
	 $F = $nominative_month ? array(1=>"Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь") : array(1=>"Января", "Февраля", "Марта", "Апреля", "Мая", "Июня", "Июля", "Августа", "Сентября", "Октября", "Ноября", "Декабря");
	 $M = array(1=>"Янв", "Фев", "Мар", "Апр", "Май", "Июн", "Июл", "Авг", "Сен", "Окт", "Ноя", "Дек");
	 $l = array("Воскресенье", "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота");
	 $D = array("Вс", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб");
	 
	 $format = str_replace("F", $F[date("n", $timestamp)], $format);
	 $format = str_replace("M", $M[date("n", $timestamp)], $format);
	 $format = str_replace("l", $l[date("w", $timestamp)], $format);
	 $format = str_replace("D", $D[date("w", $timestamp)], $format);
	 
	 return date($format, $timestamp);
}

function show_news($admin) {
	$sql="select * from news ORDER BY pub_date DESC, time DESC ";
	$result=mysql_query($sql,Database::$mConnect);

		$s=1;
		$p=0;
		if(isset($_GET['min'])) $min=$_GET['min'];
		else $min=1;
		$max=$min+4;


		//echo $min; echo $max;
		while ($row=mysql_fetch_array($result))
		{
			if ($s>=$min && $s<=$max)
			{
			print "<div class='news'>";
			
			
			 echo $row[3]; print "<br><br>";
			 echo $row[1].' '.$row[2]; //print " +3 GMT";
			 if ($admin==1) {
			  	print "			  
				  	<form method='post' action='update.php'>
				 		<input type='hidden' value='{$row[0]}' name='id'/>
				 		<input type='hidden' value='$row[3]' name='news'/>
				 		<input class='small_action' type='submit' value='Редактировать'/>
				 	</form>

				 	<form method='post' action='action/action.php'>
				 		<input type='hidden' value='{$row[0]}' name='id'/>
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
			$link='<a href="?&min='.$r.'">'.$t.'</a>';
			echo $link; 
			print "  ";
		}
}



function add_news($news) {
			$date=date("Y-m-d");
			$time=date("H:i:s");
			$sql="
			INSERT INTO `news` 
			( `pub_date`, `time`, `text`) 
			VALUES ('{$date}', '{$time}', '{$news}');
				";
		//echo $sql;
			$result=mysql_query($sql,Database::$mConnect);
				 
			print "<h4>Новость успешно добавлена</h4>";

}

function delete_news() {
	
}

function add_photo() {
	if(!empty($_POST['photo'])) { 
	  
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
				else {
				 	echo "<h4>Файл не загружен, попробуйте еще раз.</h4>";
				}
		 	}
		 	else 
			{ echo "Размер файла не должен превышать 1000Кб";}
	} 

}


function show_galleries($admin) {
	$sql="select * from galleries";
	$result=mysql_query($sql,Database::$mConnect);

		
}


function show_photos($id,$admin) {
	$sql="select * from photos where id_gallery = $id";
	$result=mysql_query($sql,Database::$mConnect);

		
}

?>