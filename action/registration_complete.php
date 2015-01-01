<?php
include('../functions.php');
	if(registration($_POST['reg_data'])) {
		header('Location: ../in.php');
	}
	echo 'Что то пошло не так, извините!';
?>