<? 
include '../header.php'; 
$sql = "select * from streams where type = 1";
$data['result'] = mysql_query($sql, Database::$mConnect);
$data['title'] = 'OLD';
$data['type'] = 1;
show_v2('admin/streams/index.php', $data);
include '../footer.php'; 
?>
