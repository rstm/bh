<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path.'/lib/nav.php';
$nav[0]['active'] = 'active';
include_once 'header.php'; ?>

<div class="slides-container">
	<div id="slides">
		<div>
			<div class='image-message'>
				<h2>BATTLE HALL</h2>
				<p>
					Казань, Муштари 2а, 8432059999, круглосуточно
				</p>
			</div>
    		<img src="/images/slide1.png" alt='asd' >  
    	</div>
    <div>
			<div class='image-message'>
				<h2>BATTLE HALL</h2>
				<p>Еженедельные киберспортивные соревнования</p>
			</div>
    		<img src="/images/slide2.png" >  
    </div>
    <div>
			<div class='image-message'>
				<h2>BATTLE HALL</h2>
				<p>Ежегодные Российские "Battle Hall Seasons"</p>
			</div>
    		<img src="/images/slide3.png" >  
    </div>
    <div>
			<div class='image-message'>
				<h2>BATTLE HALL</h2>
				<p>
					Уникальная киберарена. 112 ультрасовременных компьютеров.<br>
					24/7 
				</p> 	  
			
			</div>
    		<img src="/images/slide4.png" >  
    </div>
  </div>
</div>

	<section>
		<div class='block news_block'>
			<div>
				<h1>НОВОСТИ</h1>
			 	<hr noshade class='block_header' > 
			
				<div class='clear'></div>
				<?php
					$sql="select * from news where main = 1 ORDER BY tournament_date DESC, time DESC LIMIT 6";
					$data['result']=mysql_query($sql,Database::$mConnect);
					show_v2('news/main.php',$data);
				?>		
				<span class='more'>Еще новости</span>
				<img class='loading' src='/images/loading.gif' />
			</div>
		</div>
		<div class="clear"></div>
	</section>
<?php include_once $path.'/footer.php'; ?>