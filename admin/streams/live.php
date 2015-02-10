<? 
include '../header.php'; 
$sql = "select * from streams where type = 0";
$data['result'] = mysql_query($sql, Database::$mConnect);
$data['title'] = 'LIVE';
$data['type'] = 0;
show_v2('admin/streams/index.php', $data);
include '../footer.php'; 
?>
