
	<section class="section1">
		<div class="container">
			<h1 id="h1id"><?php echo $h1_title; ?> <nobr>24/7</nobr></h1>

			<div class="row justify-content-center align-items-center">
				<div class="col-md">
					<div class="item">
						<img class="dimg" src="/assets/img/distance.png" alt="">
						<div class="desc">От адреса до адреса <br> Без попутчиков</div>
					</div>
				</div>
				<div class="col-md">
					<div class="item">
						<img class="dimg" src="/assets/img/timer.png" alt="">
						<div class="desc">Время в пути <br> не подлежит оплате</div>
					</div>
				</div>
				<div class="col-md">
					<div class="item">
						<img class="dimg" src="/assets/img/fixcost.png" alt="">
						<div class="desc">Фиксированная <br> стоимость</div>
					</div>
				</div>
			</div>

			<form class="select_address">
				<div class="row justify-content-center align-items-center no-gutters">
					<div class="col-md">
						<input id="city1" name="city1" type="text" placeholder="Откуда (город, аэропорт или полный адрес)" value="<?php if($arr_ccc>=1) {echo "$localaa[1]";}; ?>" />
					</div>
					<div class="col-md">
						<input id="city2" name="city2" type="text" placeholder="Куда (город, аэропорт или полный адрес)" value="<?php if($arr_ccc==2) {echo "$localbb[2]";}; ?>" />
					</div>
					<div class="col-md">
						<button id="btncalc" class="btn" type="submit" button="sumbit" onclick='preloadCost();'>Узнать цены</button>
					</div>
				</div>
			</form>

			<p>В расчёт стоимости поездки не входит стоимость оплаты проезда через платные мосты или участки дорог, паромные, ледовые переправы.</p>

		</div>
	</section>

	<section class="calcmode" id="calcmode" style="display: none;padding: 0;">
		<div id="DivcreateMap"></div>
	</section>