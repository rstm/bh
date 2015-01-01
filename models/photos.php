<?php
session_start();
if($_SESSION['in'] != 1) header("Location: index.php");

$path = $_SERVER['DOCUMENT_ROOT'];
$return_path = "/admin/gallery/show.php?id={$_POST['id_gallery']}";
$table_name = 'photos';

include ($path.'/lib/db_connect.php');

if ($_POST['action']=='delete') {
	$sql="delete from $table_name where id={$_POST['id']}";
	$result=mysql_query($sql,Database::$mConnect);	 
	header("Location: $return_path");
}	

if ($_POST['action']=='new') {

	

	$sql="
		INSERT INTO $table_name
		(`id_gallery`) 
		VALUES ({$_POST['id_gallery']});
	";
	$result=mysql_query($sql,Database::$mConnect);
	$last_id=mysql_insert_id(Database::$mConnect);

	$uploaddir = "$path/images/gallery/{$_POST['id_gallery']}/";
	$uploadfile = $uploaddir .$last_id.$_FILES['userfile']['name'];

	echo '<pre>'; print_r($_FILES); echo '</pre>';
	
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
		 else { echo "<h4>Файл не загружен, попробуйте еще раз.</h4>";	
		}
	 }
	 else 
		{ echo "Размер файла не должен превышать 1000Кб";
}

	//header("Location: $return_path");
}