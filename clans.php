<?php include ('header_main.php'); ?>

	<?php

				$clans=show_clans($_GET['id_game']);
				if(count($clans)==0) echo '<p class="text-muted">Для данной игры кланы отсутвуют.</p>';
				else {
					print<<<here
					<table width='100%'>
						<tr >
							<th>Название клана</th>
							<th>Количество людей</th>
							<th></th>
						</tr>
					
here;
					foreach($clans as $clan) {
						//if($clan['about']==NULL) $about = 'Отсутвует'; else $about=$clan['about'];
						print<<<here
							<tr>
								<td>{$clan['name']}</td>
								<td>{$clan['person']}</td>
								<td><a target='_blank' href='about.php?id_clan={$clan['id']}'>Посмотреть</a></td>
							</tr>
here;
					}
					echo '</table>';
				}
		?>


	</div>
</div>
</body>
</html>
