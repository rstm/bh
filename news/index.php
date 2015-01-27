<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path.'/lib/nav.php';
$nav[2]['active'] = 'active';
include_once $path.'/header.php';
?>
	<section>
		<div class='block'>
			<div>
				<h1>НОВОСТИ</h1>
			 	<hr noshade class='block_header' > 
			
				<div class='clear'></div>
				<?php
					$category_id = (isset($_GET['category_id']) ? mysql_real_escape_string($_GET['category_id']) : 1 );
					$sql="select * from news where category_id=$category_id ORDER BY pub_date DESC, time DESC ";
					$result=mysql_query($sql,Database::$mConnect);
					if (mysql_num_rows($result)!=0) {
						show('news/index.php',$result);
					} else print "<span class='error'>К сожалению, тут новостей пока нет =(</span>";

					if (mysql_num_rows($result)!=0) { 
						print "<span class='more'>Нужно больше минералов</span>";
					}					
				?>						
				<img class='loading' src='/images/loading.gif' />
			</div>
		</div>
	</section>
<?php include_once $path.'/footer.php'; ?>