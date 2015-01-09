<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include ($path.'/lib/db_connect.php');

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
			print "<div class='galleries'>";
			
			
			 print " <div><a href='show.php?id=$row[0]'>$row[1]</a>";
			 if ($admin==1) {
			  	print "		
				 	<form method='post' action='/models/gallery.php'>
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
			$link='<a  href="?&min='.$r.'">'.$t.'</a>';
			echo $link; 
			print "  ";
		}
}


function show_photos($id,$admin) {
	$sql="select * from photos where id_gallery = $id";
	$result=mysql_query($sql,Database::$mConnect);

		$s=1;
		$p=0;
		if(isset($_GET['min'])) $min=$_GET['min'];
		else $min=1;
		$max=$min+4;

		while ($row=mysql_fetch_array($result))
		{
			if ($s>=$min && $s<=$max)
			{
			print "<div class='photos'>";
			
			
			 print " <div><img src='/gallery/images/$id/$row[0]' />";
			 if ($admin==1) {
			  	print "		
				 	<form method='post' action='/models/gallery.php'>
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
			$link='<a  href="?&min='.$r.'">'.$t.'</a>';
			echo $link; 
			print "  ";
		}
}

?>