<?php
	$path = $_SERVER['DOCUMENT_ROOT'];
	include ($path.'/lib/functions.php');

	$last_id = mysql_real_escape_string($_GET['last_id']);
	$sql="select * from news where id < $last_id ORDER BY pub_date DESC, time DESC LIMIT 6";
	$result=mysql_query($sql,Database::$mConnect);
	if (mysql_num_rows($result)==0) {
		header('HTTP/1.1 204 No content', true, 204);
		exit();
	}
	show('news/index.php', $result);

?>