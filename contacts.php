<?php 
include_once $path.'/lib/nav.php';
$nav[4]['active'] = 'active';
include_once 'header.php'; ?>
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
		 		<a href='https://youtube.com/battlehall'>YOUTUBE</a>
		 	</div>

		 	<h1 id='look_map' >КАК ДОБРАТЬСЯ</h1>
		 	<hr noshade class='block_header' > 
		 	<div class='clear'></div>
	 	</div>
 	</div>

 	<div class = ''>
 		<iframe id='map' src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4486.584452353227!2d49.13719282195441!3d55.78816345716665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x415ead0c57eeaaab%3A0x138544c96ec834be!2z0YPQuy4g0JzRg9GI0YLQsNGA0LgsIDIsINCa0LDQt9Cw0L3RjCwg0KDQtdGB0L8uINCi0LDRgtCw0YDRgdGC0LDQvSwgNDIwMDEy!5e0!3m2!1sru!2sru!4v1422376517738" width="600" height="450" frameborder="0" style="border:0"></iframe>
 	</div>	
</section>
<?php include_once $path.'/footer.php'; ?>