<?php 
include_once '/lib/nav.php';
$nav[0]['active'] = 'active';
include_once 'header.php'; ?>
<section>
	<div class='block about'>
		<div>
			<h1>КЛУБ</h1>
		 	<hr noshade class='block_header' > 
		 	<div class='clear'></div>

		 	<img src='/images/contact.png' />
		 	<div class='info'>
			 	<h2>ИНФОРМАЦИЯ О КЛУБЕ</h2>
			 	<p>
			 		Battle Hall это - компьютерный клуб  со 111 современными компьютерами, каждый из которых оснащён топовой периферией компании Razer (мышка+наушники+клавиатура). 
			 	</p>
		 	</div>

		 	<h1>СВЯЗАТЬСЯ С НАМИ</h1>
		 	<hr noshade class='block_header' > 
		 	<div class='clear'></div>

		 	<div class='social'>
		 		<div>ВКОНТАКТЕ</div>
		 		<div>YOUTUBE</div>
		 	</div>

		 	<h1>КАК ДОБРАТЬСЯ</h1>
		 	<hr noshade class='block_header' > 
		 	<div class='clear'></div>
	 	</div>
 	</div>

 	<div class = 'block'>
 		<div id="map" style="width:100%; height:400px"></div>
 	</div>	
</section>
<?php include_once 'footer.php'; ?>