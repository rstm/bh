<?php session_start(); 
if (($_SESSION['in']==1)) header('Location: news.php');

?>
<!DOCTYPE html>



<?php

//echo '<pre>'; print_r($_SESSION); echo '</pre>';

$path = $_SERVER['DOCUMENT_ROOT'];

include ($path.'/lib/db_connect.php');

function generateCode($length=6) {

    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";

    $code = "";

    $clen = strlen($chars) - 1;  
    while (strlen($code) < $length) {

            $code .= $chars[mt_rand(0,$clen)];  
    }

    return $code;

}


	$salt = '9eeeab13-050a-4c27-8cf9-afe003be71c1';


	if ( isset($_POST['password'])&&isset($_POST['login'])) {

		$query = "SELECT user_id, user_password FROM users WHERE user_login='".mysql_real_escape_string($_POST['login'])."' LIMIT 1";
		
		//echo $query;
		$result = mysql_query($query,Database::$mConnect);

	    $data = mysql_fetch_assoc($result);

	    //echo '<pre>'; print_r($data); echo '</pre>';

	    if($data['user_password'] === md5(trim($salt.$_POST['password']))) {
	    	echo 'ok';
	    	$_SESSION['in']=1;
	    	header("Location: news.php"); 
	    	exit();
	    } else echo '<h5>Неверное имя или пароль</h5>';

	}


	if (!isset($_SESSION['in'])) { ?>
		<form method="post" action="">
		Введите ваши данные: <br>
		Имя пользователя: <input type="text" name="login" value=""><br>
		Пароль: <input type="password" name="password" value="">
		<br>
		<input type="submit" value="Войти">
		</form>
	
	<?php
	}

?>