<?php

// mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = mysqli_connect("localhost", "root", "", "mezhgorod_or");


// Проверка подключения
if($link === false){
	die("ERROR: Ошибка подключения. " . mysqli_connect_error());
}

$version_web = rand(5, 315);;
$organiz_name = 'name';
$name_site = 'mezhgorod.org';
$phone = '8 (960) 033-12-12';
$phone_link = '+79600331212';
$wa_link = '+79600331212';
$email_st = 'taxi@mezhgorod.org';
$city_gde = 'в Москве';
$city_osnova = 'Москва';

$title_404 = 'Ошибка 404';

$cost_1km_base = 30.0;
$cost_1km_comfort = 40.0;
$cost_1km_miniwan = 50.0;
$cost_1km_delivery = 30.0;

$min_distance = 100.0; //минимальная цена в километрах

$loc_geo = $city;
$time_works = 'с 08<sup>00</sup> до 24<sup>00</sup> без выходных';
$yandex_metrika_code = '
<script type="text/javascript" > (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date(); for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }} k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(93644797, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true, trackHash:true }); </script> <noscript><div><img src="https://mc.yandex.ru/watch/93644797" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
';

$code_form = '
<script>(function(w, c){(w[c]=w[c]||[]).push(function(){new zTracker({"id":"7a13129c34097f41073af31f245af60d10471","metrics":{"metrika":"87003848"}});});})(window, "zTrackerCallbacks");</script>
<script async id="zd_ct_phone_script" src="https://my.zadarma.com/js/ct_phone.min.js"></script>
';
if ($replace_phone=='') {} else {$code_form = '';}
 ?>