<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/lightbox.js"></script>
<link href="css/lightbox.css" rel="stylesheet" /> 
</head>
<body bgcolor="">

<div id="menu">
<div id="in_menu" >

<a href="rus.php" class="news">НОВОСТИ</a>
<a href="gallery.php" class="gallery">ГАЛЕРЕЯ</a>
<a href="request.php">ОСТАВИТЬ ЗАЯВКУ</a>
<a href="about.php" class="left">О НАС</a>
</div>
</div>

<div id="site">

<div id="content">
<div id="request">

<?php 
session_start();
//echo $_SESSION['admin']; 

if ($_SESSION['admin'] == 1) echo "<a href=\"in.php\">Редактировать</a>";




$message=$_GET['message'];
if (isset($message))
{
$to= 'caper@go.ru';
$subject = 'Заявка на вступление в клан';

if (mail($to, $subject, $message)) print "Заявку на вступление успешно отправлена";
}
?>
<form method="get">
Введите ваше ник: <br>
<input type="text" name="nik" value=""><br>
Сообщение: <br>
<textarea name="message" maxlength="99999" rows=5 cols=40 placeholder="Введите текст">
</textarea>  
<br>
<input type="submit" value="Отправить">
</form>
 

</div>
</div>
</div>
</body>
</html>