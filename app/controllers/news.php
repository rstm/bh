<?php
	$path = $_SERVER['DOCUMENT_ROOT'];
	include ($path.'/lib/functions.php');

	$offset = mysql_real_escape_string($_GET['offset']);
	$sql="select * from news where main = 1 ORDER BY tournament_date DESC, time DESC LIMIT 6 OFFSET $offset";
	$data['result'] = mysql_query($sql,Database::$mConnect);
	if (mysql_num_rows($data['result']) == 0) {
		header('HTTP/1.1 204 No content', true, 204);
		exit();
	}
	show_v2('news/main.php', $data);

?>