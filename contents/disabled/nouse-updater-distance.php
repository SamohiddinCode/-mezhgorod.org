<?php 
$enable_update_auto = true;
$web_upd_on = 0;
$dist_upd = 0;
$time_upd = 0;
$next_upd_index_cityb;
$radom_timeupd = (0100+mt_rand(3433,4555));

foreach($_GET as $index=>$element) {
	if(!empty($index)){
		// echo $index.'='.iconv_strlen($element).'_GET<br>';
		if ($index=='distance_r' and iconv_strlen($element)!=0) {
			$dist_upd = $element;
		}

		if ($index=='time_r' and iconv_strlen($element)!=0) {
			$time_upd = $element;
		}

		if ($index=='update_r' and $element=='1' and $enable_update_auto and $arr_ccc>1) {
			$web_upd_on = 1; //включить обновление данных для направлений
		}
	}
};
if ($dist_upd!=0 or $time_upd!=0 and $web_upd_on==1) {
	$web_upd_on = 2;
};
 ?>