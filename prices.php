<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path.'/lib/nav.php';
$nav[0]['active'] = 'active';
include_once 'header.php'; ?>

<!--div class="slides-container">
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
				<p>Казань, Муштари 2а, 8435800001, круглосуточно</p> 	  
			</div>
    		<img src="/images/slide4.png" >  
    </div>
  </div>
</div-->

	<section>
		

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
			<div class='clear'></div>
		</div>
	</section>
<?php include_once $path.'/footer.php'; ?>