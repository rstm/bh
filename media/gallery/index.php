<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path.'/lib/nav.php';
$nav[1]['active'] = 'active';
include_once $path.'/header.php'; 

$sql = "
	SELECT p.id, p.gallery_id, n.title, n.anons, n.tournament_date from photos p
	inner join news n ON n.id = p.gallery_id 
	group by p.gallery_id order by n.tournament_date DESC
";
$data['result'] = mysql_query($sql,Database::$mConnect);
show_v2('media/gallery/index.php', $data);

include_once $path.'/footer.php'; 
?>