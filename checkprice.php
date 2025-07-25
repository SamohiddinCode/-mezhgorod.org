<?php

$json = file_get_contents('php://input');
$data = json_decode($json);
$region = $data->region;

$region = str_replace("обл", "область", "$region");

if($region != 'Чувашская республика - Чувашия'){
	$region = str_replace("Респ", "Республика", "$region");
}

include_once 'prices.php';

if(!is_null($prices[$region])){
	$toSend = json_encode($prices[$region]);
}else{
	$toSend = json_encode($prices['default']);
}

echo $toSend;

?>