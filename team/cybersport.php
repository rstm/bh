<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path.'/lib/nav.php';
$nav[3]['active'] = 'active';
include_once $path.'/header.php'; ?>
	<section>
		<div class='block team'>
			<div>
				<h1>BATTLE HALL КИБЕРСПОРТ</h1>
			 	<hr noshade class='block_header' > 
			
				<div class='clear'></div>
				
				<div class='persons'>
					<div class='person'>
						<img src='/images/team.png' />
						<div class='info'>
							<span>Somebody</span>
							<p>Team Leader</p>
						</div>
					</div>
					
					<div class='clear'></div>
				</div>
				
			</div>
		</div>		
	</section>
<?php include_once $path.'/footer.php'; ?>