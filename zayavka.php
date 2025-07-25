<?php
include $_SERVER['DOCUMENT_ROOT'].'/base_info.php';
$recepient = $email_st; 
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html;charset=utf-8 \r\n";
$btnpressed = false;
$conversym = '';

$ref = $_SERVER['HTTP_REFERER'];
$result=parse_url($ref);
$url = $result['path'];

if ($ref==""||$url=="/zayavka.php") {
	$ref = "/";
};



$sitename = $result['host'];
if (function_exists('idn_to_utf8')) {
	$sitename = idn_to_utf8($result['host']);
};


// Генерация уникального номера заявки
$timestamp = time(); // текущее время в секундах с начала эпохи
$randomNumber = mt_rand(1000, 9999); // генерация случайного числа
$number = $timestamp . $randomNumber; // комбинация времени и случайного числа

$msgsend = '<ul>'."\n";



	foreach ($_POST as $key => $value) {

		if ($key != 'call-control') {

			$msgsend .= '<li><b>'.$key . ':</b> ' . $value . '</li>'."\n</br>";

		};

	};



$msgsend .= '</ul>';


// $message .= "<!DOCTYPE html><html lang='ru'><head><meta charset='UTF-8'><title>Заявка с сайта: ".$sitename."</title></head><body>\n</br>";

// $message .= "<h3>Информация о заявке</h3>\n</br>";
$message .= "<p>Номер заказа: " . $number. "</p>";

$message .= $msgsend;

$message .= "<p><b>Время отправления заявки:</b> ".date("d.m.Y H:i:s")."</p>\n</br>";

$message .= "<p><b>Заявка отправлена со страницы:</b> <a href='https://mezhgorod.org".parse_url($_SERVER['HTTP_REFERER'])['path']."'>https://mezhgorod.org".parse_url($_SERVER['HTTP_REFERER'])['path']."</a></p>\n</br>";

// $message .= "</body></html>";



$pagetitle = "Заявка с сайта: \"$sitename\"";



if (isset($_POST['call-control']) && $_POST['call-control'] == 0){



	mail($recepient, $pagetitle, $message, $headers);

	file_get_contents('https://api.telegram.org/bot' . '6177132981:AAFiJwuKs4bcD7F57bFtKXPlraRyHoXJMeM' . "/sendmessage?chat_id=" . '240573770' . "&text=" . strip_tags(str_replace(array("\n"), "%0A", $message)));
	// https://api.telegram.org/bot6177132981:AAFiJwuKs4bcD7F57bFtKXPlraRyHoXJMeM/sendmessage?chat_id=240573770&text=



	// header('Location: '.$sitename.'/spasibo-za-zayavku/');

	// exit();



	$nameh1="Ваш заказ сформирован. <br /> Номер вашего заказа: " . $number;
	$posth1="<p>Оператор уже звонит по указанному телефону!</p>\n";

	$conversym = "ym(93644797,'reachGoal','sended')";

} else {

	$nameh1="Информация <nobr>не отправлена</nobr>";

	$posth1="<p>Заявка не была отправлена.</p> <p>Пожалуйста, вернитесь на сайт и позвоните мне самостоятельно.</p>\n";

}

?><!DOCTYPE html>

<html lang='ru'>

<head>

	<meta charset='UTF-8'>

	<title><?php echo $nameh1 ?></title>

	<meta http-equiv='X-UA-Compatible' content='IE=edge' />

	<meta name='viewport' content='width=device-width, initial-scale=1.0' />

	<link rel='shortcut icon' href='/favicon.ico' type='image/x-icon'>

	<link rel='icon' href='/favicon.ico' type='image/x-icon'>

</head>

<style>

body {

	margin: 0;

	font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";

	font-size: 1rem;

	font-weight: 400;

	line-height: 1.5;

	color: #212529;

	text-align: left;

	background-color: #fff;

	min-height: 320px;

}

.box {

	width: 290px;

	margin: 10vh auto;

}

h1 {

	font-size: 1.25rem;

}

</style>

<body>



	<div class="box">

		<h1><?php echo $nameh1 ?></h1>

		<?php echo $posth1 ?>

		<p><a href="<?php echo $ref ?>">Вернуться на сайт</a></p>

	</div>



<!-- Yandex.Metrika counter --> <script type="text/javascript" > (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date(); for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }} k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(93644797, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true, trackHash:true }); </script> <noscript><div><img src="https://mc.yandex.ru/watch/93644797" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->

<script type="text/javascript">
	<?php echo $conversym; ?>
</script>



</body>

</div>

</html>