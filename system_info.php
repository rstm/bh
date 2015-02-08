<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path.'/lib/nav.php';
$nav[0]['active'] = 'active';
include_once 'header.php'; ?>

	<section>


		<div class='block system_info'>
			<div>
				<!--div class='oblique_line left_side'></div>
				<h1 id="system_info" >ХАРАКТЕРИСТИКИ</h1>
				<div class='oblique_line right_side'></div-->

				<h1 id="prices">ХАРАКТЕРИСТИКИ</h1>
			 	<hr noshade class='block_header' > 			
				<div class='clear'></div>

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

	</section>
<?php include_once $path.'/footer.php'; ?>