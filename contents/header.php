<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#" lang="ru">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php echo $h1_title ?></title>
	<meta name="description" content="Заказать <?php echo $h1_title ?> доступные по стоимости поездки" />
	<meta name="keywords" content="<?php echo $h1_title ?>" />
	<meta name="theme-color" content="#ffffff">
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:domain" content="<?php echo 'https://' . $_SERVER['SERVER_NAME'] . $page_url; ?>" />
	<meta name="twitter:title" content="<?php echo $h1_title ?>" />
	<meta name="twitter:description" content="Заказать <?php echo $h1_title ?> доступные по стоимости поездки" />
	<meta name="twitter:image" content="https://mezhgorod.org/assets/img/camryauto.png" />
	<meta property="og:title" content="<?php echo $h1_title ?>" />
	<meta property="og:description" content="Заказать <?php echo $h1_title ?> доступные по стоимости поездки" />
	<meta property="og:url" content="<?php echo 'https://' . $_SERVER['SERVER_NAME'] . $page_url; ?>" />
	<meta property="og:locale" content="ru_RU" />
	<meta property="og:image" content="https://mezhgorod.org/assets/img/camryauto.png" />
	<meta property="og:image:type" content="image/jpeg" />
	<meta property="og:image:width" content="900" />
	<meta property="og:image:height" content="600" />
	<meta property="og:type" content="website" />
	<meta property="og:site_name" content="Междугороднее по России и СНГ" />
	<meta itemprop="name" content="<?php echo $h1_title ?>" />
	<meta itemprop="description" content="Заказать <?php echo $h1_title ?> доступные по стоимости поездки" />
	<meta itemprop="image" content="https://mezhgorod.org/assets/img/camryauto.png" />
	<meta name="yandex-verification" content="c843706263106822" />

	<link rel="shortcut icon" href="/favicons.png" type="image/x-icon">
	<link rel="icon" href="/favicons.png" type="image/x-icon">
	<!-- esli 404, to ne подписывать canonical -->
	<link rel="canonical" href="<?php echo 'https://' . $_SERVER['SERVER_NAME'] . $page_url; ?>" />

	<!--noindex-->
	<link href="https://fonts.googleapis.com/css?family=Rubik:400,500&display=swap&subset=cyrillic" rel="stylesheet">
	<link rel="stylesheet" href="/assets/css/bootstrap-reboot.min.css" />
	<link rel="stylesheet" href="/assets/css/bootstrap-grid.min.css" />
	<link rel="stylesheet" href="/assets/css/magnific-popup.css" />
	<link rel="stylesheet" href="/assets/css/main.css?v=upd<?php echo $version_web; ?>" />
	<link rel="stylesheet" href="/assets/css/media.css" />
	<link rel="stylesheet" href="/assets/suggestions.min.css" />
	<!--/noindex-->

	<style>
		#map {
			width: 100%;
			height: 360px;
			padding: 0;
			margin: 0 auto;
		}

		@media only screen and (max-width : 767px) {
			#map {
				height: 320px;
			}
		}

		#map * {
			touch-action: auto
		}

		.white-popup {
			position: relative;
			background: #FFF;
			padding: 20px;
			width: auto;
			max-width: 500px;
			margin: 20px auto;
		}

		.form-row {
			display: flex;
			align-items: center;
			margin-bottom: 10px;
		}

		.form-row input {
			margin-right: 10px;
		}
	</style>

	<!-- <link rel="preconnect" href="//api-maps.yandex.ru"> -->
	<!-- <link rel="dns-prefetch" href="//api-maps.yandex.ru"> -->

	<!-- Scripts -->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<?php
		foreach ($prices['default'] as $key => $value) {
			echo '<input type="hidden" id="'.$key.'Price" value="'.$value.'" />';
		}
	?>
</head>

<body>