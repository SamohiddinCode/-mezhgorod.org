<section class="section2">
		<div class="container">
			<h2>Как работает сервис</h2>
			<div class="row">

				<div class="col-md-4">
					<div class="line">
						<span>1</span>
						<div class="divider"></div>
					</div>
					<div class="title">Вы оставляете заявку</div>
					<div class="desc">Позвоните <a href="tel:<?php echo str_replace([' ', '(', ')', '-'], '', $phone); ?>" style="position: relative;">по телефону</a>, или <br> рассчитайте цену <br> на такси самостоятельно</div>
				</div>

				<div class="col-md-4">
					<div class="line">
						<span>2</span>
						<div class="divider"></div>
					</div>
					<div class="title">Уточняем детали</div>
					<div class="desc">Уточните время, адрес и нужный <br> автомобиль и запросите <br> стоимость поездки.</div>
				</div>

				<div class="col-md-4">
					<div class="line">
						<span>3</span>
						<div class="divider oked"></div>
					</div>
					<div class="title">Выезжаем</div>
					<div class="desc">Дождитесь машину <br> и отправитесь в дорогу.</div>
				</div>

			</div>
		</div>
	</section>


	<section class="section4">
		<div class="container">
			<div class="orangeitem">
				<h2>Мы повышаем уровень сервиса, чтобы Вам было комфортно</h2>

				<div class="row justify-content-center align-items-start">
					<div class="col-md">
						<div class="item">
							<div class="title">Отслеживание рейса <nobr>в случае</nobr> задержки</div>
							<div class="desc">15 минут бесплатного ожидания</div>
						</div>
					</div>
					<div class="col-md">
						<div class="item">
							<div class="title">Бесплатная отмена <nobr>и изменение</nobr> заказа</div>
							<div class="desc">За 10 минут до выезда водителя.</div>
						</div>
					</div>
					<div class="col-md">
						<div class="item">
							<div class="title">Оплата поездки <nobr>в конце</nobr> пути</div>
							<div class="desc">Работаем без предоплат, если подача автомобиля меньше 30 км.</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<footer id="footer">
		<div class="container">
			<div class="row justify-content-center align-items-center no-gutters">
				<div class="col-auto">
					<img class="logoimage" width="48px" src="/assets/img/camryauto.png" alt="logo">
				</div>
				<div class="col">
					<div class="row justify-content-center align-items-center">
						<div class="col-md">
							<div class="logo"><?php echo $name_site; ?>
								
							</div><br /><a href="https://mezhgorod.org/" style="text-decoration: none;">Междугороднее такси</a>
						</div>
						<div class="col-md phonebox">
							<a class="phone" href="tel:<?php echo str_replace([' ', '(', ')', '-'], '', $phone); ?>"><?php echo "$phone"; ?></a>
						</div>
					</div>
				</div>
			</div>
	</footer>


	<div id="callback" class="zakaz mfp-hide">
		<b class="title">Заказ такси</b>
		<ul class="infoboard">
			<li><img src="/assets/img/caricon.png" alt="icon"> <span id="nameautoclass">Тариф</span></li>
			<li><img src="/assets/img/routeicon.png" alt="icon"> <span id="routeinfo">Откуда - Куда</span></li>
			<li><img src="/assets/img/fixcosticon.png" alt="icon"> <span id="costinfo">0 RUB</span></li>
			<li><span class="bttn mini formrefresh">Нажмите здесь, чтобы пересчитать цену с указанием улицы и номера дома.</span></li>
			<form action="#refreshcost" style="display: none;" class="hdnrefcost miniinput">
				<input class="city1ref" id="city1ref" type="text" name="Начальный адрес" required="" placeholder="Начальный адрес">
				<input class="city2ref" id="city2ref" type="text" name="Начальный адрес" required="" placeholder="Начальный адрес">
				<button class="bttn mini" type="button" onclick='preloadCost();'>Пересчитать</button>
			</form>
		</ul>
		<form action="/zayavka.php" method="POST">
			<input type="hidden" name="Куда-откуда" value="taxi Заказ" class="param_set">
			<label>
				<p>Оставьте ваши контактные данные <nobr>и наш</nobr> диспетчер свяжется <nobr>с Вами</nobr> <nobr>в течение</nobr> <nobr>2 минут!</nobr></p>
				<!-- <input class="name" type="text" name="Имя" required="" placeholder="Ваше имя"> -->
				<input class="phone" type="text" name="Телефон" required="" placeholder="Ваш телефон">
				<label for="date">Дата и время поездки:</label>
				<div class="form-row">
    				<input type="date" id="date"  required="" name="Дата" placeholder="Выберите дату">
    				<input type="time" id="time"  required="" name="Время" placeholder="Выберите время">
    				<button class="bttn mini" type="button" onclick="setCurrentDateTime()">Сейчас</button>
  				</div>
  				<textarea id="comment" name="Комментарий" rows="4" cols="50" placeholder="Ваш комментарий" style="width: 100%;"></textarea>

			</label>
			<button type="submit" button="sumbit" class="bttn" name="call-control">Заказать</button>

			<div class="confim">
				<input type="checkbox" checked="" required="" class="checkbox" id="checkbox3">
				<label for="checkbox3">Я согласен(а) с условиями передачи информации</label>
			</div>
		</form>
	</div>

	<div id="callme" class="zakaz mfp-hide">
		<b class="title">Заказ звонка (перезвонить)</b>
		<form action="/zayavka.php" method="POST">
			<input type="hidden" name="loc" value="taxi Заказ" class="param_set">
			<label>
				<p>Оставьте номер телефона и наш диспетчер<br>свяжется <nobr>с Вами</nobr> <nobr>в течение</nobr> 2 минут!</p>
				<input class="phone" type="text" name="phone" required="" placeholder="ВАШ ТЕЛЕФОН">
			</label>
			<button type="submit" button="sumbit" class="bttn" name="call-control">Заказать</button>

			<div class="confim">
				<input type="checkbox" checked="" required="" class="checkbox" id="checkbox4">
				<label for="checkbox4">Я согласен(а) с условиями передачи информации</label>
			</div>
		</form>
	</div>