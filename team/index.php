<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path.'/lib/nav.php';
$nav[2]['active'] = 'active';
include_once $path.'/header.php';

$result = '';
show('team/teams.php',$result);

include_once  $path.'/footer.php'; 
?>