<?php
include $_SERVER['DOCUMENT_ROOT'].'/base_info.php';
$page_url = parse_url($_SERVER['PATH_INFO'],PHP_URL_PATH);
// print_r($_SERVER['SERVER_NAME']);
if (substr($page_url, -1)!='/' and $page_url!='') {
	$page_url.='/';
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $page_url");
	exit();
};

$array_path = [];
foreach(explode("/",$page_url) as $element) {
	if(!empty($element)){
		$array_path[] = $element;
	}
};
$arr_ccc = count($array_path);

$this_page = (empty($array_path) ? '/' : end($array_path));


$localaa = [];
$localbb = [];
$localff = [];
$firms = [];
$title_gen = 'Междугороднее такси России';
$linea_view = '';
$check_last_obl;

$lineb_tmp_obl;


if ($arr_ccc==0) {

	// $city_aa = read_csv("citya.csv");

	$sql = "SELECT * FROM start_city ORDER BY name_obl_rus";

	if($result = mysqli_query($link, $sql)){
		// $sovpad = mysqli_num_rows($result);
		while ($roww = mysqli_fetch_row($result)) {
			$city_aa[] = $roww;
		};

		foreach($city_aa as $element) {
			if(!empty($element)){
				$localaa = $element;

				if (empty($check_last_obl) or $check_last_obl!=$element[2]) {

					if (!empty($check_last_obl)) {
						$linea_view .= '</ul><h4 data-open='."$element[0]".' class="open_oblast">'.$element[2].':</h4><ul id="'.$element[0].'" style="display:none;" class="obl_citys">';
					} else {
						$linea_view .= '<h4 data-open='."$element[0]".' class="open_oblast">'.$element[2].':</h4><ul id="'.$element[0].'" style="display:none;" class="obl_citys">';
					}
				// $linea_view .= '<li><h4>'.$element[2].':</h4></li>';
				}

				$linea_view .= '<li><a href="/'.$element[0].'/">'.$element[1].'</a></li>';
				$check_last_obl = $element[2];
			}
		}
		if (!empty($linea_view)) {
			$linea_view = '<p>'.$name_site.' поможет построить маршрут и узнать стоимость заказа такси с помощью калькулятора выше, или при помощи навигации по списку ниже в следующих городах и областях:</p>'.$linea_view;
		};
	} else {
	// echo "ОШИБКА: не удалось выполнить $sql. " . mysqli_error($link);
		$city_aa = [];
		$linea_view = '<p>'.$name_site.' поможет построить маршрут и узнать стоимость заказа такси с помощью калькулятора выше. Начните вводить города, или адреса с номером дома:</p>';
	};

}
elseif ($arr_ccc==1) {
	$findstep1 = 0;

	$sql = "SELECT * FROM start_city WHERE id_city = '$this_page'";

	if($result = mysqli_query($link, $sql)){
		// $sovpad = mysqli_num_rows($result);
		while ($roww = mysqli_fetch_row($result)) {
			$city_aa[] = $roww;
		};
	} else {
	// echo "ОШИБКА: не удалось выполнить $sql. " . mysqli_error($link);
	};

	foreach($city_aa as $element) {
		if(!empty($element)){
			if ($element[0] == $this_page) {
				$localaa = $element;
				$h1_title = "Междугороднее такси ".$element[4].' ('.$element[2].')';
				$findstep1++;
			}
		}
	};

	if($findstep1==0){
		header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found', true, 404);
		// header("Location: /#404-".$array_path[0], true);
		$h1_title=$title_404;
	}

	$city_bb = [];

	$sql = "SELECT * FROM final_city ORDER BY id_obl";

	if($result = mysqli_query($link, $sql)){
		// $sovpad = mysqli_num_rows($result);
		while ($roww = mysqli_fetch_row($result)) {
			$city_bb[] = $roww;
		};
	} else {
		// echo "ОШИБКА: не удалось выполнить $sql. " . mysqli_error($link);
	};

	// $city_bb = read_csv('2step.csv');
	// examples $city_bb = read_csv('2'.$localaa[3].'.csv');
	// print_r($city_bb);
	if(($city_bb==[])){
		// print_r('пусто, пользователь может указать сам город-2');
	};
	if($localaa==false){
		$localaa[2] = $this_page;
		$localaa[4] = $this_page;
	}
	
	$lineb_view_c = 0;
	$lineb_view = '';
	$lineb_tmp_obl = "";


	// echo $this_page;

	if ($city_bb!=FALSE) {

		foreach($city_bb as $element) {
			// echo $element[1].'<br>';
			if(!empty($element)){
				if ($this_page == $element[0] or true) {
					$localbb = $element;
					if (empty($lineb_tmp_obl) or $lineb_tmp_obl!=$element[3]) {
						if (!empty($lineb_tmp_obl)) {
							$lineb_view .= '</ul><h4 data-open='."$element[1]".' class="open_oblast">'.$element[3].':</h4><ul id="'.$element[1].'" style="display:none;" class="obl_citys">';
						} else {
							$lineb_view .= '<h4 data-open='."$element[1]".' class="open_oblast">'.$element[3].':</h4><ul id="'.$element[1].'" style="display:none;" class="obl_citys">';
						}
					}
					$lineb_view .= '<li><a href="/'.$this_page.'/'.$element[0].'/">'.$element[2].'</a></li>';
					// $lineb_view .= '<li><a href="/'.$this_page.'/'.$element[0].'/">'.$lineb_view_c.': '.$element[2].'</a></li>';
					$lineb_tmp_obl = $element[3];
					$lineb_view_c++;
				};
			}
		};

	};

	if (!empty($lineb_view and $lineb_view_c!=0 and $findstep1 > 0)) {
		$lineb_view = '<p>Выше есть калькулятор, введите нужный город или полный адрес, куда необходимо рассчитать стоимость такси.</p><p>Если хотите выбрать нужные область и город из списка, куда необходимо проложить маршрут из '.$localaa[1].' ('.$localaa[2].'), чтобы узнать стоимость заказа такси, перейдите к списку ниже:</p>'.$lineb_view;
	} elseif ($lineb_view_c==0) {
		$h1_title=$title_404.' по адресу /'.$this_page;
		$lineb_view = '<p>Администратор сайта не добавил города для заказа такси '.$localaa[4].'.</p><p>Вопспользуйтесь контактными данными, чтобы узать о возможности заказа такси прямо сейчас.</p>';
	} elseif ($findstep1 == 0) {
		$h1_title=$title_404.' по адресу /'.$this_page;
		$lineb_view = '<p>На данной странице нельзя выбрать конец маршрута, так как текущая страница не имеет списка городов.</p><p><a href="/">Вернуться на главную</a>, а мы пока исправим ошибку сайта 404.</p>';
	};


} elseif ($arr_ccc==2) {

	$sql = "SELECT * FROM start_city WHERE id_city = '$array_path[0]'";

	if($result = mysqli_query($link, $sql)){
		// $sovpad = mysqli_num_rows($result);
		while ($roww = mysqli_fetch_row($result)) {
			$city_aa[] = $roww;
		};
	} else {
	// echo "ОШИБКА: не удалось выполнить $sql. " . mysqli_error($link);
		$city_aa = [];
	};

	// print_r($array_path[0]);

	foreach($city_aa as $element) {
		if(!empty($element)){
			if ($element[0] == $array_path[0]) {
				$localaa = $element;
			}
		}
	};
	// print_r($localaa);

	$city_bb = [];

	$sql = "SELECT * FROM final_city WHERE id_city = '$this_page'";

	if($result = mysqli_query($link, $sql)){
		// $sovpad = mysqli_num_rows($result);
		while ($roww = mysqli_fetch_row($result)) {
			$city_bb[] = $roww;
		};
	} else {
		// echo "ОШИБКА: не удалось выполнить $sql. " . mysqli_error($link);
	};

		// $city_bb = read_csv('2step.csv');
		// $city_bb = read_csv('2'.$localaa[3].'.csv');
		// $city_bb = read_csv('2'.$array_path[0].'.csv');
		// print_r($city_bb);

	foreach($city_bb as $index=>$element) {
		if(!empty($element)){
			if ($element[0] == $this_page) {
				$localbb = $element;
				$next_upd_index_cityb = $index+1;

				// $tocity = $element[2];

				// echo "$element[2]<br>";
				// foreach($city_aa as $elel2) {
				// 	if(!empty($elel2)){
				// 		if ($elel2[0] == $localbb[1]) {
				// 			$localaa = $elel2;
				// 			$startcity = $elel2[4];
				// 		}
				// 	}
				// };

			}
		}
	};
	// echo $city_bb[$next_upd_index_cityb][0];

	// $city_bb = update_csv("cityb.csv", $this_page, 123, 234);

	if(!empty($localbb)){

		$h1_title = "Междугороднее такси из ".$localaa[1].' - в '.$localbb[2];

		// $kilometrs = $localbb[4];
		// $lineab_view .= "<p>index_next_page=$next_upd_index_cityb".'</p>';
		// $lineab_view .= '<h3>Таблица цен на такси '.$localaa[4].' в '.$localbb[2].' ('.$localbb[3].')'.':</h3>';
		// $lineab_view .= '<p>Для удобства расчета стоимости поездки '.$localaa[4].' до '.$localbb[2].' узнайте тариф организации и воспользуйтесь таблицей расчета.</p>';
		// $lineab_view .= '<div class="cart_info"><table style="width: 100%;"><tbody>';
		// $lineab_view .= '<tr><th>Стоимость за 1 км</th><th>Расчет на '.$kilometrs.' км</th></tr>';
		// for ($c=11; $c < 23; $c=($c+2)) {
		// 	$lineab_view .= '<tr><td>1 км = '.$c.' руб.:</td><td>'.round($kilometrs*$c, 1).' руб.</td></tr>';
		// };
		// $lineab_view .= '</tbody></table></div>';
		// $lineab_view .= '<div id="DivcreateMap">Маршрут загружается...</div>';
		// $lineab_view .= '<h3>Пример стоимости такси '.$localaa[4].' - '.$localbb[2].'</h3>';
		// $lineab_view .= '<div id="meter_view"></div><div id="time_view"></div><p>В таблице приведены расчеты с разной стоимостью за 1 километр ';
		// $lineab_view .= $localaa[4].' - '.$localbb[2].' ('.$localbb[3].')';
		// $lineab_view .= '. Эти данные можете использовать как для информирования своих клиентов, так и если вы хотите заказать такси - будете знать примерную адекватную  стоимость за такую поездку.</p><hr>';

		$link_page='';
		foreach($array_path as $element) {
			if(!empty($element)){
				$link_page .= $element.'/';
			};
		}

	} else {
		$h1_title=$title_404;
		$lineab_view .= '<p>Сайт не знает конечное направление маршрута на этой странице. Если хотите сообщить об этом или добавить такой регион для работы, напишите нам на электронную почту</p>';
	}


	// echo $lineab_view;

} elseif ($arr_ccc>=3) {
	$h1_title=$title_404;
};

if ($h1_title=='') {$h1_title = 'Междугороднее такси России';};
if ($h1_title==$title_404) {
	header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found', true, 404);
	// header("Location: /#404-345stranitsa", true);
}

// закрываем соединение
mysqli_close($link);
?>

<?php include $_SERVER['DOCUMENT_ROOT'].'/contents/header.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/contents/body-top.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/contents/breadcrumb.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/contents/body-end.php'; ?>

<?php 
if (!empty($lineab_view)) {
	echo $lineab_view;
};
?>


	<?php if ($arr_ccc<=1) {?>
	<section class="section3" style="background: #f6f7f8;">
		<div class="container">
			<?php if ($arr_ccc==0) {?>
				<h2>Выберите город начала поездки</h2>
			<?php }; ?>

			<?php if ($arr_ccc==1) {
				if ($findstep1 > 0) { ?>
					<h2>Выберите город куда необходимо приехать <?php echo $findstep1; ?></h2>
				<?php } else { //header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found', true, 404);
					// header("Location: /", true); ?>
					<h2>Страница не найдена - ошибка 404</h2>

					<?php }; ?>

			<?php }; ?>

			<?php
			if (!empty($linea_view)) {
				echo $linea_view;
			};
			if (!empty($lineb_view)) {
				echo $lineb_view;
			};
			?>
		</div>
	</section>
	<?php }; ?>


	<?php include $_SERVER['DOCUMENT_ROOT'].'/contents/pre-footer.php'; ?>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/contents/footer.php'; ?>
	
</html>