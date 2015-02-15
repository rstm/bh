<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path.'/lib/nav.php';
$nav[0][2]['active'] = 'active';
include_once 'header.php'; 

$q = isset($_GET['q']) ? mysql_real_escape_string($_GET['q']) : '';

$sql="select * from news where title like '%$q%' OR text like '%$q%'";
$data['result']=mysql_query($sql,Database::$mConnect);
$data['q'] = $q;
show_v2('search/index.php',$data);
				
include_once $path.'/footer.php'; 
?>