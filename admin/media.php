<? 
include 'header.php'; 
$sql = "select * from media";
$data['result'] = mysql_query($sql, Database::$mConnect);
show_v2('admin/media/index.php', $data);
include 'footer.php'; 
?>

