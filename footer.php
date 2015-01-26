	<footer>
		<div>
			<div class='footer_menu'>
				<h3>О КЛУБЕ</h3>
				<ul>
					<li>МЕДИА</li>
					<li>ХАРАКТЕРИСТИКИ</li>
					<li>ЦЕНЫ</li>
				</ul>
			</div>
			<div class='footer_menu'>
				<h3>КАЛЕНДАРЬ</h3>
				<ul>
					<li>ПРОШЕДШЕЕ</li>
					<li>БУДУЩЕЕ</li>
				</ul>
			</div>
			<div class='footer_menu'>
				<h3>НОВОСТИ</h3>
				<ul>
					<li>МИР</li>
					<li>РОССИЯ</li>
					<li>КАЗАНЬ</li>
				</ul>
			</div>
			<div class='footer_menu'>
				<h3>КОМАНДА</h3>
				<ul>
					<li>BATTLE HALL STAFF</li>
					<li>BATTLE HALL КИБЕРСПОРТ</li>
				</ul>
			</div>
			<div class='footer_menu'>
				<h3>КОНТАКТЫ</h3>
				<ul>
					<li>КЛУБ</li>
					<li>СВЯЗАТЬСЯ С НАМИ</li>
					<li>КАК ДОБАВИТЬСЯ</li>
				</ul>
			</div>
			<div class='footer_menu last'>
				<h3>СТРИМЫ</h3>
				<ul>
					<li>CS GO</li>
					<li>DOTA 2</li>
					<li>101</li>
				</ul>
			</div>
		</div>

		<div class='address'>
			<img src='/images/footer_logo.png' />
			<br/>
			ул. Муштари, 2А, Казань, Республика Татарстан, 8 (843) 561-00-99
		</div>
	</footer>
</div>

<script src="/js/jquery-1.11.2.min.js"></script>
<script src="/js/jquery.slides.min.js"></script>
<script src="/js/main.js"></script>
<script src="/js/lightbox.js"></script>
<script src="http://maps.api.2gis.ru/2.0/loader.js?pkg=full" data-id="dgLoader"></script>
<script type="text/javascript">
    var map;

    DG.then(function () {
        map = DG.map('map', {
            "center": [54.98, 82.89],
            "zoom": 13
        });

        DG.marker([54.98, 82.89]).addTo(map);
    });
</script>
</body>
</html>