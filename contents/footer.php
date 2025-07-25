<!-- Scripts -->
<!-- Yandex.Metrika counter -->
<?php echo $yandex_metrika_code; ?>
<!-- /Yandex.Metrika counter -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="/assets/js/jquery.magnific-popup.min.js"></script>
<script src="/assets/jquery.suggestions.min.js?v=35"></script>

<script>
	$(document).ready(function() {

		var mobile_menu = 0;
		var start_menu = 0;

		function menuShowHider() {
			mobile_menu++;
			start_menu++;

			if (mobile_menu == 1) {
				$('body').addClass('noscrollOn');
				$('.scrollmenu').css('display', 'block');
				if (start_menu == 1) {
					$('body').append("<div class='hidesmenu'></div>");
					$(document).on("click", '.hidesmenu', function(event) {
						menuShowHider();
					});
				} else {
					$('.hidesmenu').css('display', 'block');
				};
				$('.scrollmenu').animate({
					width: '280px'
				}, function() {
					$('.closemobmenu').css('display', 'inline-block');
				});
			} else if (mobile_menu == 2) {
				$('.closemobmenu').css('display', 'none');
				$('.scrollmenu').animate({
					width: '90px'
				}, function() {
					$('.scrollmenu').css('display', 'none');
					$('body').removeClass('noscrollOn');
					$('.hidesmenu').css('display', 'none');
					mobile_menu = 0;
				});
			};
		};

		$('.btnmenumob, .closemobmenu, .hidesmenu').click(function(e) {
			e.preventDefault();
			menuShowHider();
		});

		$(".open_oblast").on("click", function() {
			var fnd_this_obl = $(this).attr('data-open');
			// console.log(fnd_this_obl);
			// console.log('ul '+fnd_this_obl);
			// $(this).parent().find('ul').slideToggle();
			$("#" + fnd_this_obl).slideToggle();
		});
	});
</script>


<!-- <script src="//api-maps.yandex.ru/2.1/?load=package.route&loadByRequire=1&lang=ru-RU&onload=loadTimer&apikey=f4e83078-77b3-4cf9-ba44-3a0391263d48&suggest_apikey=4113b82e-4d06-4d3f-be17-864fef1e6b5a" type="text/javascript"></script> -->
<!-- <script src="//api-maps.yandex.ru/2.1/?load=package.route&loadByRequire=1&lang=ru-RU&onload=loadTimer&apikey=85c2e130-a93b-4f49-8f7f-e007418a07bc&suggest_apikey=4113b82e-4d06-4d3f-be17-864fef1e6b5a" type="text/javascript"></script> -->
<?php
$sugginit_php = 0;
$getarr_sovpad_ignore_obl = explode(', ', str_replace("'", "", $ignore_oblast));
// echo $localaa[2];
if (($arr_ccc == 1 and in_array($localaa[2], $getarr_sovpad_ignore_obl)) or (($arr_ccc == 2 and in_array($localaa[2], $getarr_sovpad_ignore_obl)))) {
	$sugginit_php = -1; ?>
	<script src="https://api-maps.yandex.ru/2.1/?load=package.route&loadByRequire=1&lang=ru-RU&onload=loadTimer&apikey=f4e83078-77b3-4cf9-ba44-3a0391263d48" type="text/javascript"></script>
<?php } else { ?>
	<!-- <script src="https://api-maps.yandex.ru/2.1/?load=package.route&loadByRequire=1&lang=ru-RU&onload=loadTimer&apikey=f4e83078-77b3-4cf9-ba44-3a0391263d48&suggest_apikey=c1598cef-2d0d-4f38-b1a1-591723322d09" type="text/javascript"></script> -->
	<script src="https://api-maps.yandex.ru/2.1/?load=package.route&loadByRequire=1&lang=ru-RU&onload=loadTimer&apikey=f4e83078-77b3-4cf9-ba44-3a0391263d48" type="text/javascript"></script>
	<script type="text/javascript">
		ym(93644797, 'reachGoal', 'loadsuggest');
	</script>

<?php } ?>
<!-- <script src="https://api-maps.yandex.ru/2.1/?load=package.route&amp;lang=ru-RU&amp;apikey=85c2e130-a93b-4f49-8f7f-e007418a07bc" type="text/javascript"></script> -->
<script>
	var ymps;

	function loadTimer(ymaps) {
		ymps = ymaps;
		setTimeout(function() {
			inityamaps(ymaps);
		}, 200);
	};

	sugginit = <?php echo $sugginit_php; ?>;

	// удаляет неактуальные адреса
	function removeUnactual(suggestions) {
		return suggestions.filter(function(suggestion) {
			return suggestion.data.kladr_id.length > 17 || suggestion.data.kladr_id.substr(-2) == "00";
		});
	}

	function addsuggtoref() {
		if (sugginit == 1) {
			// new ymps.SuggestView('city1ref').events.add('select', function (event) {
			// 	$('#city2ref').select();
			// });
			// new ymps.SuggestView('city2ref').events.add('select', function (event) {
			// 	preloadCost();
			// });

			$("#city1ref").suggestions({
				token: "ed360d7016e5eff2ee9cedcd6a1ab159aa1f3020",
				type: "ADDRESS",
				onSuggestionsFetch: removeUnactual,
				onSelect: function() {
					console.log()
					$('#city2ref').select();
				}
			});
			$("#city2ref").suggestions({
				token: "ed360d7016e5eff2ee9cedcd6a1ab159aa1f3020",
				type: "ADDRESS",
				onSuggestionsFetch: removeUnactual,
				onSelect: function() {
					preloadCost();
				}
			});

			console.log('loaded sugg 2');
			ym(93644797, 'reachGoal', 'loadsuggest2');
		};
	};

	function suggload() {
		$("#city1").suggestions({
			token: "ed360d7016e5eff2ee9cedcd6a1ab159aa1f3020",
			type: "ADDRESS",
			onSuggestionsFetch: removeUnactual,
			hint: false,
			bounds: "city-settlement",
			onSelect: function() {
				$('#city2').select();
			}
		});
		// new ymps.SuggestView('city1').events.add('select', function (event) {
		// 	$('#city2').select();
		// });

		$("#city2").suggestions({
			token: "ed360d7016e5eff2ee9cedcd6a1ab159aa1f3020",
			type: "ADDRESS",
			onSuggestionsFetch: removeUnactual,
			hint: false,
			bounds: "city-settlement",
			onSelect: function() {
				preloadCost();
			}
		});

		// new ymps.SuggestView('city2').events.add('select', function (event) {
		// 	preloadCost();
		// });
		// console.log('loaded sugg');
		ym(93644797, 'reachGoal', 'loadsuggest');
	};

	$(document).ready(function() {

		$("#city1, #city2").on("focus", function() {
			if (sugginit == 0) {
				sugginit++;
			};
			if (sugginit == 1) {
				suggload();
			};
		});

		$(".tarifmode .popup-open").click(function() {
			var formcost = $(this).parent().find('.cost')[0].innerHTML;
			var formroute = $("#routecitys")[0].innerHTML;
			var formautoclass = $(this).parent().parent().parent().find('.titleclass')[0].innerHTML;
			$("#costinfo").html("От " + formcost);
			$("#routeinfo").html(formroute);
			$("#nameautoclass").html(formautoclass);
			$(".param_set").val('Заказ такси ' + formautoclass + ' | ' + formroute + ' | ' + formcost);
			$(".zakaz").attr('data-openedtarif', $(this).parent().find('.cost').attr('id'));
			ym(93644797, 'reachGoal', 'zoomtarif');
		});

		$('.popup-open').magnificPopup({
			type: 'inline',
			preloader: false,
			focus: '#name',

			callbacks: {
				beforeOpen: function() {
					if ($(window).width() < 768) {
						this.st.focus = false;
					} else {
						this.st.focus = '#name';
					}
				}
			}
		});

		$(".formrefresh").click(function() {
			$(this).attr('style', 'display: none;');
			$(".hdnrefcost").attr('style', 'display: block;');
			$("#city1ref").val($("#city1").val());
			$("#city2ref").val($("#city2").val());

			addsuggtoref();

			return false;
		});

		$("#city1ref, #city2ref").change(function() {
			// $("#city1").val($("#city1ref").val());
			// $("#city2").val($("#city2ref").val());
		});
		// добавить переменную с таймером и спустя время дублировать поля

	});

	var map;
	var tempRoute;
	var flagtarif = 0;
	var flagvisionmode = 0;

	var autorun_cost = 0;

	startcity = '';
	toGetCity = '';

	pointA = "";
	pointB = "";

	bonuscost = 0;

	h1basetext = document.getElementById('h1id').innerHTML;
	viewcoststr1 = document.getElementById('costtarif1').innerHTML;
	viewcoststr2 = document.getElementById('costtarif2').innerHTML;
	viewcoststr3 = document.getElementById('costtarif3').innerHTML;
	viewcoststr4 = document.getElementById('costtarif4').innerHTML;

	function GetCost(tarif1km, cityDistance) {
		var costadd = .0;
		if (cityDistance < 299) {
			costadd = costadd + .01;
		}
		if (cityDistance < 199) {
			costadd = costadd + .02;
		}
		if (cityDistance < 99) {
			costadd = costadd + .03;
		}
		if (cityDistance < 49) {
			costadd = costadd + .04;
		}
		if (cityDistance > 399) {
			costadd = costadd - .002;
		}
		return Math.max(Number(100 * (cityDistance * (tarif1km + costadd)).toFixed(0) - 10), Number(100 * (20 * (tarif1km + costadd)).toFixed(0) - 10));
	}


	function XFormatPrice(_number) {
		var decimal = 0;
		var separator = ' ';
		var decpoint = '.';
		var format_string = '# руб.';
		var r = parseFloat(_number)
		var exp10 = Math.pow(10, decimal);
		r = Math.round(r * exp10) / exp10;
		rr = Number(r).toFixed(decimal).toString().split('.');
		b = rr[0].replace(/(\d{1,3}(?=(\d{3})+(?:\.\d|\b)))/g, "\$1" + separator);
		r = (rr[1] ? b + decpoint + rr[1] : b);
		return format_string.replace('#', r);
	}

	var saveDist = .0;
	var minDist = (<?php echo $min_distance; ?> * 1.0);

	function replacer(aaacity, bbbcity, cityDistance) {
		let getidofzakaz = '';
		if (cityDistance >= 9) {
			saveDist = cityDistance;

			if (cityDistance <= minDist) {
				cityDistance = minDist;
			}

			console.log('MINIVAN:');
			console.log(document.getElementById('minivanPrice').value);

			var numcosttarif1 = GetCost((document.getElementById('economPrice').value * 0.01), cityDistance);
			var numcosttarif2 = GetCost((document.getElementById('comfortPlusPrice').value * 0.01), cityDistance);
			var numcosttarif3 = GetCost((document.getElementById('minivanPrice').value * 0.01), cityDistance);
			var numcosttarif4 = GetCost((<?php echo $cost_1km_delivery; ?> * 0.01), cityDistance);

			cityDistance = saveDist;

			if (flagtarif == 1) {
				if (autorun_cost == 1) {
					autorun_cost = 0;
				} else {
					document.getElementById('h1id').innerHTML = aaacity + ' &mdash; ' + bbbcity + ' от <nobr>' + XFormatPrice(numcosttarif1) + '</nobr> <nobr>На такси</nobr> <nobr>без попутчиков</nobr>';
				}
			} else {
				document.getElementById('h1id').innerHTML = aaacity + ' &mdash; ' + bbbcity + '</nobr> <nobr>на такси</nobr> <nobr>без попутчиков</nobr>';
			}
			document.getElementById('routecitys').innerHTML = aaacity + ' &mdash; ' + bbbcity + ' (' + cityDistance + ' км)';
			$("#routeinfo").html($('#routecitys').text());


			document.getElementById('costtarif1').innerHTML = XFormatPrice(numcosttarif1);
			document.getElementById('costtarif2').innerHTML = XFormatPrice(numcosttarif2);
			document.getElementById('costtarif3').innerHTML = XFormatPrice(numcosttarif3);
			document.getElementById('costtarif4').innerHTML = XFormatPrice(numcosttarif4);

			getidofzakaz = document.getElementById($(".zakaz").attr('data-openedtarif'));
			if (getidofzakaz) {
				$("#costinfo").html(getidofzakaz.textContent);
			}

		} else {
			document.getElementById('h1id').innerHTML = h1basetext;
			document.getElementById('costtarif1').innerHTML = viewcoststr1;
			document.getElementById('costtarif2').innerHTML = viewcoststr2;
			document.getElementById('costtarif3').innerHTML = viewcoststr3;
			document.getElementById('costtarif4').innerHTML = viewcoststr4;

			if (getidofzakaz) {
				$("#costinfo").html(getidofzakaz.textContent);
			}
		}
	};


	function resetBtnCalc() {
		document.getElementById('btncalc').disabled = false;
	}

	function getTimeRoute(timemoveroads) {
		var hhh = timemoveroads / 3600 ^ 0;
		var mmm = (timemoveroads - hhh * 3600) / 60 ^ 0;
		var zzz = (timemoveroads) / 60 ^ 0;
		document.getElementById('timeroute').innerHTML = 'Время в пути: около ' + hhh + ' ч. ' + mmm + ' мин.';
	}

	function MygetRoute(cityA, cityB) {
		map.geoObjects.remove(tempRoute);
		var activeRoute = ymaps.route([cityA, cityB], {
			mapStateAutoApply: true,
			avoidTrafficJams: false,
		}).then(function(route) {
				route.getPaths().options.set({
					strokeColor: '26a65b',
					opacity: 0.9
				});
				map.geoObjects.add(route);
				tempRoute = route;

				var meter = route.getLength();
				var distance = (meter / 1020).toFixed(0);

				getTimeRoute(route.getJamsTime().toFixed(0));

				var myGeocoder = ymaps.geocode(cityA);
				myGeocoder.then(function(res) {
					var LocalityName = res.geoObjects.get(0).properties.get('metaDataProperty.GeocoderMetaData.AddressDetails.Country.AdministrativeArea.SubAdministrativeArea.Locality.LocalityName');
					if (LocalityName == null) {
						LocalityName = res.geoObjects.get(0).properties.get('metaDataProperty.GeocoderMetaData.AddressDetails.Country.AdministrativeArea.Locality.Premise.PremiseName');
					}
					if (LocalityName == null) {
						LocalityName = res.geoObjects.get(0).properties.get('metaDataProperty.GeocoderMetaData.AddressDetails.Country.AdministrativeArea.Locality.DependentLocality.DependentLocalityName');
					}
					if (LocalityName == null) {
						LocalityName = res.geoObjects.get(0).properties.get('metaDataProperty.GeocoderMetaData.Address.formatted');
					}
					startcity = LocalityName;
					myGeocoder.Remove;

					var myGeocoder2 = ymaps.geocode(cityB);
					myGeocoder2.then(function(res) {
						var LocalityName = res.geoObjects.get(0).properties.get('metaDataProperty.GeocoderMetaData.AddressDetails.Country.AdministrativeArea.SubAdministrativeArea.Locality.LocalityName');
						toGetCity = LocalityName;
						if (LocalityName == null) {
							LocalityName = res.geoObjects.get(0).properties.get('metaDataProperty.GeocoderMetaData.AddressDetails.Country.AdministrativeArea.Locality.Premise.PremiseName');
						}
						if (LocalityName == null) {
							LocalityName = res.geoObjects.get(0).properties.get('metaDataProperty.GeocoderMetaData.AddressDetails.Country.AdministrativeArea.Locality.DependentLocality.DependentLocalityName');
						}
						if (LocalityName == null) {
							LocalityName = res.geoObjects.get(0).properties.get('metaDataProperty.GeocoderMetaData.Address.formatted');
						}

						toGetCity = LocalityName;
						myGeocoder2.Remove;

						if (flagtarif == 0 && flagvisionmode == 1) {
							$('#tarifmode').slideDown();
							flagtarif = 1;
						}
						if (flagtarif == 1) {
							replacer(startcity, toGetCity, distance);
							jQuery('body,html').animate({
								scrollTop: $('#tarifmode').offset().top
							}, 800, function() {
								resetBtnCalc();
							});
						}

					});
				});

			},
			function(error) {
				$.magnificPopup.open({
					items: {
						src: '<div class="white-popup">Внимание! Маршрут не был проложен на карте, иногда так бывает. Но можно указать улицу (или район) к городу, и тогда алгоритм составления маршрута заработает.</div>',
						type: 'inline'
					}
				});
				resetBtnCalc();
			});
	};



	var oncecallfunc = 0;

	function preloadCost() {

		if (autorun_cost == 1) {
			// autorun_cost = 0;
			pointA = '<?php echo $localaa[1]; ?>';
			pointB = '<?php echo $localbb[2] . ' (' . $localbb[3] . ')'; ?>';
		} else {
			event.preventDefault();
			pointA = document.getElementById('city1').value;
			pointB = document.getElementById('city2').value;
		};


		if ((pointA == pointB) || pointA == '' || pointB == '' || pointA.length <= 2 || pointB.length <= 2) {
			// console.log('log_stop');
			replacer('', '', 0);
			resetBtnCalc();
			return;
			// resetBtnCalc();
		}

		// console.log('check1-flagvisionmode=' + flagvisionmode);

		if (flagvisionmode == 0) {
			$('#calcmode').slideDown();
			jQuery('body,html').animate({
				scrollTop: $('#calcmode').offset().top
			}, 800, function() {
				// resetBtnCalc();
				document.getElementById("btncalc").disabled = true;
				document.getElementById("timeroute").innerHTML = "Время в пути: ~ 0 ч. 0 мин.";
				oncecallfunc++;
				if (oncecallfunc == 1) {
					MygetRoute(pointA, pointB);
				}


			});
			// console.log('flagvisionmode=' + flagvisionmode);
			flagvisionmode = 1;
		} else {
			document.getElementById("timeroute").innerHTML = "Время в пути: ~ 0 ч. 0 мин.";
			document.getElementById("btncalc").disabled = true;
			MygetRoute(pointA, pointB);
		}

		// console.log('check1-2');

	}

	function inityamaps(ymaps) {
		document.getElementById('DivcreateMap').innerHTML = '<div id="map"></div>';

		map = new ymaps.Map('map', {
			center: ['<?php echo $localaa[5]; ?>', '<?php echo $localaa[6]; ?>'],
			zoom: 10,
			controls: []
		});
		map.behaviors.disable('scrollZoom');
		map.behaviors.disable('multiTouch');
		map.behaviors.disable('rightMouseButtonMagnifier');
		map.behaviors.disable('drag');

		<?php if ($arr_ccc == 2) { ?>
			flagvisionmode = 1;
			// console.log('check3-flagvisionmode=' + flagvisionmode);
			$('#calcmode').slideDown();

			autorun_cost = 1;
			preloadCost();
		<?php }; ?>

		ymps = ymaps;


	};
</script>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-PFWNNLXY10"></script>
<script>
	window.dataLayer = window.dataLayer || [];

	function gtag() {
		dataLayer.push(arguments);
	}
	gtag('js', new Date());

	gtag('config', 'G-PFWNNLXY10');
</script>

<script>
	function setCurrentDateTime() {
		var currentDate = new Date();

		// Получение элементов формы по их id
		var dateField = document.getElementById("date");
		var timeField = document.getElementById("time");

		// Установка значений полей формы
		dateField.value = currentDate.toISOString().slice(0, 10);
		timeField.value = currentDate.toTimeString().slice(0, 5);
	}
</script>

<script>
	// Получение элементов полей выбора даты и времени
	var dateField = document.getElementById("date");
	var timeField = document.getElementById("time");

	// Создание объекта текущей даты и времени
	var currentDate = new Date();

	// Форматирование даты в формат ГГГГ-ММ-ДД
	var formattedDate = currentDate.toISOString().slice(0, 10);

	// Форматирование времени в формат ЧЧ:ММ
	var formattedTime = currentDate.toTimeString().slice(0, 5);

	// Установка значений полей выбора даты и времени
	dateField.value = formattedDate;
	timeField.value = formattedTime;
</script>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function(m,e,t,r,i,k,a){
        m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();
        for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
        k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)
    })(window, document,'script','https://mc.yandex.ru/metrika/tag.js?id=103440209', 'ym');

    ym(103440209, 'init', {ssr:true, webvisor:true, clickmap:true, ecommerce:"dataLayer", accurateTrackBounce:true, trackLinks:true});
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/103440209" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->



</body>