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

		
		 	<div class='info'>
		 		<img src='/images/contact.png' />
			 	<h2>Информация о клубе</h2>
			 	<hr>

			 	<p>
Игровой клуб "Battle Hall" рад приветствовать Вас на нашем официальном сайте! Здесь Вы можете ознакомиться с клубом, его персоналом, получить подробную информацию по его работе и просто почитать новости в мире киберспорта! 
</p><p>
Компьютерный клуб «Battle Hall» от многих других клубов отличает
 продуманный дизайн и необычный футуристический вид.
 </p>
 <p class='blue'>Так интересно оформленного клуба - в России еще не было!
 </p>
 <p> В нескольких игровых залах компьютеры размещены в специальных полуовальных кабинках, на которых, позади мониторов располагается специальная подсветка, не дающая глазам сильно уставать во время затяжных игр. 
</p><p>
В первую очередь, это ультрасовременные компьютеры и высокотехнологичные девайсы от именитых производителей.
В Battle Hall Вас ждут эпические битвы, приятная атмосфера, дружественный персонал и великое разнообразие игр, в сочетании с высокоскоростным интернетом! Недорогой бар с горячим питанием, а так же отдельные игровые зоны для PC и баталий на xBox One и PS4.
</p><p>
Несомненно, что этот клуб, расположенный в самом центре Приволжья стал «Ареной Киберспорта» и местом проведения отличного досуга для всего региона.
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