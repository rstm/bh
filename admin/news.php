<?php include 'header.php'; ?>

<h1><span>Список новостей</span></h1>
<div class='container'>
<?php

	//show_news(1);
	$sql="select * from news ORDER BY pub_date DESC, time DESC ";
	$result=mysql_query($sql,Database::$mConnect);
	show('admin/news/index.php', $result);

?>
</div>
<?php include 'footer.php'; ?>

