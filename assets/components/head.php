<?php
$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if (str_contains($url, '/en/')) {
	$lang = 'en';
} else if (str_contains($url, '/es/')) {
	$lang = 'es';
} else {
	$lang = 'es';
}
?>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<meta name="robots" content="<?php echo $robots; ?>">

	<meta name="description" content="<? echo ($lang == 'en' ) ? "Intangible creators, we create: identities, concepts, symbols and memories. We create unforgettable brands." : "Somos creadores intangibles, creamos: identidades, conceptos, símbolos y memorias. Creamos marcas inolvidables."; ?>">
	<link rel="canonical" href="<?php echo $canonical; ?>">
	<meta name="author" content="Qarta Online">
	<meta property="og:title" content="<?php echo $title; ?>">
	<meta property="og:description" content="<? echo ($lang == 'en' ) ? "We build brands and they create us." : "Creamos marcas que dejan marca."; ?>">
	<meta property="og:image" content="http://intangiblestudio.mx/assets/img/brand/logo.png">
	<meta property="og:image:secure_url" content="https://intangiblestudio.mx/assets/img/brand/logo.png">
	<meta property="og:url" content="<?php echo $canonical; ?>">
	<meta property="og:site_name" content="Intangible Studio">
	<meta name="twitter:title" content="<?php echo $title; ?>">
	<meta name="twitter:description" content="<? echo ($lang == 'en' ) ? "We build brands and they create us." : "Creamos marcas que dejan marca."; ?>">
	<meta name="twitter:image" content="http://intangiblestudio.mx/assets/img/brand/logo.png">
	<meta name="twitter:card" content="summary_large_image">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo $path; ?>assets/css/fonts.css">
	<link rel="stylesheet" href="<?php echo $path; ?>assets/css/style.css">
	<link rel="stylesheet" href="<?php echo $path; ?>assets/css/appearOnScroll.css">
	<?php echo $extra_stylesheets; ?>
	<title><?php echo $title; ?></title>
	<link rel="icon" href="https://intangiblestudio.mx/assets/img/brand/favicon.ico">
	<link rel="apple-touch-icon" href="https://intangiblestudio.mx/assets/img/brand/favicon.ico">
	<meta name="msapplication-TileImage" content="https://intangiblestudio.mx/assets/img/brand/favicon.ico">
</head>