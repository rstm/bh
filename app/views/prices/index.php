<section>
	<div class='block prices'>
		<div>
			<h1 id="prices">ЦЕНЫ</h1>
		 	<hr noshade class='block_header' > 			
			<div class='clear'></div>
			<ul>
				<? while ($row=mysql_fetch_assoc($result)) { ?>
					<li>
						<span class='time'><?=$row['title']?></span>
						<div class='price'>&nbsp;<?=$row['price']?>.-</div>
					</li>
				<? } ?>
				<!-- <li >
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
				</li> -->
			</ul>
		</div>
		<div class='clear'></div>
	</div>
</section>