<?php session_start();

if(!isset($_SESSION['admin'])) header('Location: index.php');

include 'functions.php';

if(isset($_POST['delete'])) {
	delete_active_member($_POST['id_member']);
}

?>
<html>
<head>
	<style type="text/css">

		td,th{border-bottom:1px solid lightgrey; text-align: left;}
	</style>
	<title>Cостав</title>
</head>
<body>
	<h3>Состав</h3>
<?php
				$members=show_members();
				if(count($members)==0) echo '<p class="text-muted">В клане нет ни одного человека</p>';
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
						</tr>
					
here;
					foreach($members as $member) {
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
										<input type='hidden' name='delete' value='1'/>
										<input type='submit' value='Удалить'/>
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