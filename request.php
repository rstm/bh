<?php include 'header.php';

//echo $_SESSION['admin']; 

if (isset($_SESSION['admin'])) echo "<a href=\"in.php\">Редактировать</a>";



if (isset($_POST['about'])) {

	if(add_request($_POST,$_GET['id_clan'])) {
		$to= 'caper@go.ru';
		$subject = 'Заявка на вступление в клан';
		$message = 'Новый игрок'.$_POST['name'].' хочет вступить к вам в клан!';

		if (mail($to, $subject, $message)) print "<h3>Заявка на вступление успешно отправлена! </h3><h3>Ждите ответа на ваш email</h3>";
	}
	else echo 'Что то пошло не так!';
}
else {
?>
<form method="post">
Введите ваше ник: <br>
<input type="text" name="name" value=""><br>
Email: <br>
<input type="text" name="email" value=""><br>
Уровень: <br>
<input type="text" name="lvl" value=""><br>
Количество денег: <br>
<input type="text" name="money" value=""><br>
Предыдущий клан (можете оставить пустым): <br>
<input type="text" name="last_klan" value=""><br>
О себе: <br>
<textarea name="about" maxlength="99999" rows=5 cols=40 placeholder="Введите текст">
</textarea>  
<br>
<input type="submit" value="Отправить">
</form>
 <?php } ?>

</div>
</div>
</div>
</body>
</html>