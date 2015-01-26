<?php
session_start();
//if($_SESSION['in'] != 1) header("Location: index.php");

$path = $_SERVER['DOCUMENT_ROOT'];
$return_path = '/admin/news.php';
$table_name = 'galleries';

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


if(isset($_POST['action'])) {

	if ($_POST['action']=='new') {



		$query = "SELECT id, password_digest FROM users WHERE login='".mysql_real_escape_string($_POST['login'])."' LIMIT 1";
			
		//echo $query;
		$result = mysql_query($query,Database::$mConnect);

	    $data = mysql_fetch_assoc($result);

	   // echo '<pre>'; print_r($data); echo '</pre>';

	   // echo $_POST['password'].'</br>';

	   // echo md5(trim($_POST['password']));


	    if($data['password_digest'] === md5(trim($_POST['password']))) {

	    	$remember_token = generateCode(8);

	 		setcookie( "remember_token", $remember_token, time()+(60*60*24*365), '/' ); 
	 		setcookie( "id", $data['id'], time()+(60*60*24*365), '/' ); 

			$encrypt_remember_token = md5($_SERVER['REMOTE_ADDR'].$remember_token);

			$query = "UPDATE users SET remember_token = '$encrypt_remember_token' WHERE id = {$data['id']} LIMIT 1";

			$result = mysql_query($query,Database::$mConnect) or die(mysql_error());


			$_SESSION['authorized'] = true;  
	  		$_SESSION['ip'] = $_SERVER['REMOTE_ADDR']; 
  		
	    	header("Location: /admin/news.php"); 
	    } else {
	    	$err = 'Неправильный логин или пароль';
	    	header("Location: /admin?err=$err"); 
	    }
	}
}

if (isset($_GET['action'])) {	
	if ($_GET['action']=='delete') {
		setcookie( "remember_token", "", time() - 3600*24*30*12, "/" );
		setcookie( "id", "", time() - 3600*24*30*12, "/" );

		$_SESSION = array();


		// стираем cookie идентификатора сессии
		if (isset($_COOKIE[session_name()])) 
		{
	   		setcookie(session_name(), '', time()-42000, '/');
		}

		// уничтожаем сессию
		session_destroy();
		
		header("Location: /admin");
	}	
}
