<?php include ('header_main.php'); ?>

	<h3>Выберите игру:</h3>
	<?php

				$games=show_all_games(); 
				echo '<ul>';
				foreach($games as $game) {
					print "<a href='clans.php?id_game={$game['id']}'><li>{$game['name']}</li></a>";
				}
				echo '</ul>';
		?>


	</div>
</div>
</body>
</html>
