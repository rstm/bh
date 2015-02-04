<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path.'/lib/nav.php';
$nav[2]['active'] = 'active';
include_once $path.'/header.php';
?>
	<section>
		<div class='block games'>
			<div>
				<h1>BATTLE HALL КИБЕРСПОРТ</h1>
			 	<hr noshade class='block_header' > 
			 	<div class='clear'></div>
				<?php
					$sql="select * from games where id!=3";
					$result=mysql_query($sql,Database::$mConnect);
					show('team/index.php',$result);
				?>	
			</div>
		</div>
	</section>
<?php include_once  $path.'/footer.php'; ?>