<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path.'/lib/nav.php';
$nav[2]['active'] = 'active';
include_once 'header.php';
?>
	<section>
		<div class='block'>
			<div>
				<h1>НОВОСТИ</h1>
			 	<hr noshade class='block_header' > 
			
				<div class='clear'></div>
				<?php
					$category_id = (isset($_GET['category_id']) ? mysql_real_escape_string($_GET['category_id']) : 0 );
					$sql="select * from news where category_id=$category_id ORDER BY pub_date DESC, time DESC ";
					$result=mysql_query($sql,Database::$mConnect);
					show('news/index.php',$result);
				?>			
				<span class='more'>Еще больше минералов</span>
				<img class='loading' src='/images/loading.gif' />
			</div>
		</div>
	</section>
<?php include_once  $path.'/footer.php'; ?>