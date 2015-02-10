<section>
	<div class='block media streams'>
		<div>
			<h1>LIVE</h1>
			<hr noshade class='block_header' > 
			<div class='clear'></div>
			<?php
				$s = 1;
				if (mysql_num_rows($data['live']) != 0) {
					while ($row = mysql_fetch_array($data['live'])) {	
			?>
					<div class='video first'>
						<div class='url'><?=$row['url']?></div>
							 
						<div class='info'>
							<span><?=$row['title']?></span>
							<hr>
							<div class='anons'><?=$row['anons']?></div>
						</div>
					</div>				
			<?
						$s++; 
					} 
				} else {
			?>
				<p>К сожалению, пока ничего не транслируется.</p>
			<? } ?>
			<div id='dark'></div>
		</div>
	</div>
</section>