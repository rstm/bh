<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path.'/lib/nav.php';
$nav[2]['active'] = 'active';
include_once $path.'/header.php';
?>

				<?php
					$category_id = (isset($_GET['category_id']) ? mysql_real_escape_string($_GET['category_id']) : 1 );

					$sql = "
						select title from category_news 
						where id = $category_id LIMIT 1
					";
					$result2 = mysql_query($sql,Database::$mConnect);
					$category = mysql_fetch_assoc($result2);
					$data['category_title'] = mb_strtoupper($category['title'], 'UTF-8');

					$sql="select * from news where category_id=$category_id ORDER BY pub_date DESC, time DESC ";
					$data['result'] = mysql_query($sql, Database::$mConnect);
					if (mysql_num_rows($data['result']) != 0) {
						show_v2('news/index.php', $data);
						print "
							<span class='more'>Еще новости</span>
							<img class='loading' src='/images/loading.gif' />
						";
					} else print "<span class='error'>К сожалению, тут новостей пока нет =(</span>";

					/*if (mysql_num_rows($data['result'])!=0) { 
						
					}				*/	
				?>						
				
			</div>
		</div>
	</section>
<?php include_once $path.'/footer.php'; ?>