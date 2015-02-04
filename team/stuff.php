<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path.'/lib/nav.php';
$nav[3]['active'] = 'active';
include_once $path.'/header.php'; ?>
	<section>
		<div class='block team'>
			<div>
				<h1>BATTLE HALL STAFF</h1>
			 	<hr noshade class='block_header' > 
				<div class='persons'>

					<?php
$sql = "select * from team where game_id = 3";
$result = mysql_query($sql,Database::$mConnect);

show('team/show.php',$result);
?>
					<!--div class='person'>
						<img src='/images/team.png' />
						<div class='info'>
							<span>Эльвира Валиуллина</span>
							<p>Испольнительный директор</p>
						</div>
					</div>
					<div class='person second left'>
						<img src='/images/team.png' />
						<div class='info'>
							<span>Евгений Алексеев</span>
							<p>Администратор и еще нечто большее</p>
						</div>
					</div>
					<div class='person right'>
						<img src='/images/team.png' />
						<div class='info'>
							<span>Макс Селезнев</span>
							<p>Администратор и еще нечто большее</p>
						</div>
					</div>
					<div class='person second left'>
						<img src='/images/team.png' />
						<div class='info'>
							<span>Тимур Файзуллин</span>
							<p>Администратор и еще нечто большее</p>
						</div>
					</div>
					<div class='person right'>
						<img src='/images/team.png' />
						<div class='info'>
							<span>Руслан Галиев</span>
							<p>Администратор и еще нечто большее</p>
						</div>
					</div>
					<div class='person left'>
						<img src='/images/team.png' />
						<div class='info'>
							<span>Нияз Агафонов</span>
							<p>Сopywriting / newsmaker
и ещё нечто большее</p>
						</div>
					</div>
					<div class='person right'>
						<img src='/images/team.png' />
						<div class='info'>
							<span>Алексей Морару</span>
							<p>Администратор и еще нечто большее</p>
						</div>
					</div>
					<div class='clear'></div>
				</div>
				
			</div>
		</div>		
	</section-->
<?php include_once $path.'/footer.php'; ?>