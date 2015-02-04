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
					Уникальная киберарена. 112 ультрасовременных компьютеров.<br>
					24/7 
				</p>
			</div>
    		<img src="/images/slide1.png" alt='asd' >  
    	</div>
    <div>
			<div class='image-message'>
				<h2>BATTLE HALL</h2>
				<p>Еженедельные киберспортивные соревнования</p>
			</div>
    		<img src="/images/slide2.jpg" >  
    </div>
    <div>
			<div class='image-message'>
				<h2>BATTLE HALL</h2>
				<p>Ежегодные Российские "Battle Hall Seasons"</p>
			</div>
    		<img src="/images/slide3.jpg" >  
    </div>
    <div>
			<div class='image-message'>
				<h2>BATTLE HALL</h2>
				<p>Казань, Муштари 2а, 8435800001, круглосуточно</p> 	  
			</div>
    		<img src="/images/slide4.jpg" >  
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
					$sql="select * from news where main = 1 ORDER BY pub_date DESC, time DESC LIMIT 6";
					$result=mysql_query($sql,Database::$mConnect);
					show('news/index.php',$result);
				?>		
				<span class='more'>Нам нужно больше минералов</span>
				<img class='loading' src='/images/loading.gif' />
			</div>
		</div>

		<div class='block system_info'>
			<div>
				<div class='oblique_line left_side'></div>
				<h1 id="system_info" >ХАРАКТЕРИСТИКИ</h1>
				<div class='oblique_line right_side'></div>
				<div class='spec'>
					<img src='/images/spec.png' />
					<ul>
						<li>
							Видеокарта: ASUS GTX780-DC2OC-3GD5
							3072МБ,<br>GDDR5, Retail
						</li>
						<li>
							Жесткий диск: WD Original SATA-II<br> 
							1 Tb WD1003FBYX (7200rpm)<br> 
							64 Mb Raid Edition 
						</li> 
						<li>
							ОЗУ: DDR3 4Gb PC3-10600<br>
							1333MHz DIMM Kingston,<br> 
							KVR1333D3N9K2/4G
						</li> 
						<li>
							Процессор: Intel Core i5-2400,<br> 
							3.1 ГГц, 6МБ, LGA1155 
						</li> 
					</ul>
				</div>
			</div>
		</div>

		<div class='block prices'>
			<div>
				<h1 id="prices">ЦЕНЫ</h1>
			 	<hr noshade class='block_header' > 			
				<div class='clear'></div>
				<ul>
					<li >
						<span class='time'>Час игры</span>
						<div class='price'>&nbsp;60.-</div>
					</li>
					<li>
						<span class='time'>Час игры Vip зона
						</span><div class='price'>&nbsp;70.-</div>
					</li>
					<li>
						<span class='time'>Час аренда зала (12 ПК)
						</span><div class='price'>&nbsp;800.-</div>
					</li>
					<li>
						<span class='time'>Пакет ночь
						</span><div class='price'>&nbsp;300.-</div>
					</li>
					<li>
						<span class='time'>Пакет ночь Vip зона
						</span><div class='price'>&nbsp;350.-</div>
					</li>
					<li>
						<span class='time'>Пакет ночь Аренда зала
						</span><div class='price'>3000.-</div>
					</li>
				</ul>
			</div>
		</div>
	</section>
<?php include_once $path.'/footer.php'; ?>