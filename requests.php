<?php session_start();

if(!isset($_SESSION['admin'])) header('Location: index.php');

include 'functions.php';

if(isset($_POST['id_member'])) {
	if(isset($_POST['delete'])) {
		delete_member($_POST['id_member']);
		$message = 'Вам отказали во вступлении в клан!';
		
	} else {
		add_member($_POST['id_member']);
		$message = 'Вас приняли в клан!';
	}
	$subject = 'Новость от клана '.$_SESSION['name'];
	$to= $_POST['email'];
	mail($to, $subject, $message);
}
?>
<html>
<head>
	<style type="text/css">

		td,th{border-bottom:1px solid lightgrey; text-align: left;}
	</style>
	<title>Заявки на вступление</title>
</head>
<body>
	<h3>Заявки на вступление</h3>
<?php
				$requests=show_requests();
				if(count($requests)==0) echo '<p class="text-muted">Новые заявки отсутвуют</p>';
				else {
					print<<<here
					<table width='100%' cellpadding='3'>
						<tr >
							<th>Ник</th>
							<th>Уровень</th>
							<th>Количество денег</th>
							<th>Email</th>
							<th>Предыдущий клан</th>
							<th>О себе</th>
							<th></th>
							<th></th>
						</tr>
					
here;
					foreach($requests as $member) {
						if($member['last_klan']==NULL) $last_klan = '-'; else $last_klan=$member['last_klan'];
						print<<<here
							<tr>
								<td>{$member['name']}</td>
								<td>{$member['lvl']}</td>
								<td>{$member['money']}</td>
								<td>{$member['email']}</td>
								<td>{$last_klan}</td>
								<td>{$member['about']}</td>
								<td>
									<form  method='post'>
										<input type='hidden' name='id_member' value='{$member['id']}'/>
										<input type='hidden' name='add' value='1'/>
										<input type='hidden' name='email' value='{$member['email']}'/>
										<input type='submit' value='Принять'/>
									</form>
								</td>
								<td>
									<form method='post'>
										<input type='hidden' name='id_member' value='{$member['id']}'/>
										<input type='hidden' name='delete' value='1'/>
										<input type='hidden' name='email' value='{$member['email']}'/>
										<input type='submit' value='Отказать'/>
									</form>
								</td>
							</tr>
here;
					}
					echo '</table>';
				}
		?>

<a href="in.php">Назад</a>
</body>
</html>