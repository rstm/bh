<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path.'/lib/nav.php';
$nav[4]['active'] = 'active';
include_once 'header.php'; ?>
<style>
footer { margin-top: 0 !important; }
</style>
<section>
	<div class='block about'>
		<div>
			<h1 id='info'>КЛУБ</h1>
		 	<hr noshade class='block_header' > 
		 	<div class='clear'></div>

		 	<img src='/images/contact.png' />
		 	<div class='info'>
			 	<h2>Информация о клубе</h2>
			 	<hr>
			 	<p>
			 		Battle Hall это - компьютерный клуб  со 111 современными компьютерами, каждый из которых оснащён топовой периферией компании Razer (мышка+наушники+клавиатура). 
			 	</p>
		 	</div>

		 	<h1 id='social'>СВЯЗАТЬСЯ С НАМИ</h1>
		 	<hr noshade class='block_header' > 
		 	<div class='clear'></div>

		 	<div class='social'>
		 		<a href='https://vk.com/battlehall'>ВКОНТАКТЕ</a>
		 		<a href='http://www.youtube.com/channel/UCwXUHVuYcenAvyoqJ2hS_vg'>YOUTUBE</a>
		 	</div>

		 	<h1 id='look_map' >КАК ДОБРАТЬСЯ</h1>
		 	<hr noshade class='block_header' > 
		 	<div class='clear'></div>
	 	</div>
 	</div>

 	<div class = ''>
 		<iframe id='map' src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2243.303309012785!2d49.137748!3d55.787971000000006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x415ead0c570574fd%3A0xa6bb7bf6b0712c42!2sBattle+Hall!5e0!3m2!1sru!2sru!4v1422792560030" width="600" height="450" frameborder="0" style="border:0"></iframe>
 	</div>	
</section>
<?php include_once $path.'/footer.php'; ?>