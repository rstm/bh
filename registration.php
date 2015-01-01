<?php include ('header_main.php'); 
?>
<div class='container'>
	<form role="form" method="post" action='action/registration_complete.php'>
		<div class='col-md-6 col-md-offset-3'>
			<h2>Регистрация клана</h2>
			
			<table class="table">
				<tr>
					<td>Название клана</td>
					<td><input name='reg_data[name]' class="form-control"  required autofocus></td>
				</tr>
				<tr>
					<td>Логин</td>
					<td><input name='reg_data[login]' class="form-control"  required></td>
				</tr>
				<tr>
					<td>Пароль</td>
					<td><input name='reg_data[password]' class="form-control"  required></td>
				</tr>
				<tr>
					<td>Игра</td>
					<td>
						<select class="form-control" name="reg_data[id_game]">
							<?php 
							$types=show_all_games(); 
							foreach($types as $type) {
								echo "<option value='{$type['id']}'>{$type['name']}</option>";
							}
								?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Количество людей</td>
					<td><input name='reg_data[person]' class="form-control"  required></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input name='reg_data[email]' class="form-control"  required></td>
				</tr>
			</table>
			<?php if(isset($error)) echo $error; ?>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Зарегистрироваться</button>
		</div>
	</form>
	
</div>
</body>
</html>
