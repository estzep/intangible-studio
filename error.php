<?php
$title = 'Intangible Studio | Error '.$_SERVER['REDIRECT_STATUS'];
// Define the error messages
$error_messages = array(
	400 => 'Solicitud incorrecta',
	401 => 'No autorizado',
	403 => 'Acceso denegado',
	404 => 'Página no encontrada',
	500 => 'Error interno del servidor'
);

// Set the default error message
$error_message = 'Error desconocido';

// Get the error code
$error_code = $_SERVER['REDIRECT_STATUS'];

// Check if the error code exists in the array of error messages
if (array_key_exists($error_code, $error_messages)) {
    $error_message = $error_messages[$error_code];
}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<meta name="robots" content="noindex, nofollow">

		<meta name="description" content="Somos creadores intangibles, creamos: identidades, conceptos, símbolos y memorias. Creamos marcas inolvidables.">
		<link rel="canonical" href="https://intangiblestudio.mx/error.php">
		<meta name="author" content="Qarta Online">
		<meta property="og:title" content="<?php echo $title; ?>">
		<meta property="og:description" content="Creamos marcas que dejan marca.">
		<meta property="og:image" content="http://intangiblestudio.mx/assets/img/brand/logo.png">
		<meta property="og:image:secure_url" content="https://intangiblestudio.mx/assets/img/brand/logo.png">
		<meta property="og:url" content="https://intangiblestudio.mx/error.php">
		<meta property="og:site_name" content="Intangible Studio">
		<meta name="twitter:title" content="<?php echo $title; ?>">
		<meta name="twitter:description" content="Creamos marcas que dejan marca.">
		<meta name="twitter:image" content="http://intangiblestudio.mx/assets/img/brand/logo.png">
		<meta name="twitter:card" content="summary_large_image">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		<link rel="stylesheet" href="https://intangiblestudio.mx/assets/css/fonts.css">
		<link rel="stylesheet" href="https://intangiblestudio.mx/assets/css/style.css">
		<link rel="stylesheet" href="https://intangiblestudio.mx/assets/css/appearOnScroll.css">
		<title><?php echo $title; ?></title>
		<link rel="icon" href="https://intangiblestudio.mx/assets/img/brand/favicon.ico">
		<link rel="apple-touch-icon" href="https://intangiblestudio.mx/assets/img/brand/favicon.ico">
		<meta name="msapplication-TileImage" content="https://intangiblestudio.mx/assets/img/brand/favicon.ico">
	</head>
	<body id="body">
		<nav class="appear error">
			<div class="nav-container container">
				<div class="content">
					<a href="https://intangiblestudio.mx/es" class="logo">
						<img src="https://intangiblestudio.mx/assets/img/brand/Intangible Assets-02.svg" alt="Intangible Studio Logo">
					</a>
					<button id="btn-nav" type="button" aria-label="Nav toggle button" onclick="toggleNav();">
						<div class="bar1"></div>
						<div class="bar2"></div>
					</button>
					<ul>
						<li class="nav-link">
							<a href="https://intangiblestudio.mx/es" onclick="closeNav();">Inicio</a>
						</li>
						<li class="nav-link">
							<a href="https://intangiblestudio.mx/es/logofolio" onclick="closeNav();">Logofolio</a>
						</li>
						<li class="nav-link">
							<a href="https://intangiblestudio.mx/es/servicios" onclick="closeNav();">Servicios</a>
						</li>
						<li class="nav-link">
							<div class="contact-btn">
								<a href="javascript:;">Cotiza un proyecto</a>
								<div class="btn-container">
									<a href="https://ieyqwtatgui.typeform.com/to/UbAKgyEy" target="_blank" class="btn-type-2"><em>English</em></a>
									<a href="https://ieyqwtatgui.typeform.com/to/kQJwe9my" target="_blank" class="btn-type-2"><em>Español</em></a>
								</div>
							</div>
						</li>
						<li class="nav-link">
							<div class="language-select">
								<a href="https://intangiblestudio.mx/en">
									EN
								</a>
								|
								<a href="https://intangiblestudio.mx/es">
									<span style="border-bottom: 1px solid var(--white);">ES</span>
								</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<header id="error">
			<div class="container">
				<div class="content">
					<h1>Error <?php echo $error_code; ?></h1>
					<p><?php echo $error_message; ?></p>
					<a href="https://intangiblestudio.mx/">Regresar a página principal</a>
				</div>
			</div>
		</header>
		<footer>
			<div class="container">
				<div class="content">
					<div class="row top">
						<div class="column col-12 col-lg-4">
							<h4>
								Contacto
							</h4>
							<a href="mailto:contacto@intangiblestudio.mx">contacto@intangiblestudio.mx</a>
							<a href="tel:+525530099097">+52 (55) 3009 9097</a>
						</div>
						<div class="column col-12 col-lg-4">
							<h4>
								Síguenos
							</h4>
							<a href="https://www.instagram.com/intangiblestudio.mx/" target="_blank">Instagram</a>
							<a href="https://www.facebook.com/intangiblestudio.mx/" target="_blank">Facebook</a>
							<a href="https://www.behance.net/intangiblestudio" target="_blank">Behance</a>
						</div>
					</div>
					<div class="row bottom">
						<div class="column col-6 col-lg-4">
							<a href="https://intangiblestudio.mx/" class="logo">
								<img src="https://intangiblestudio.mx/assets/img/brand/Intangible Assets-02.svg" alt="Intangible Studio Logo">
							</a>
						</div>
						<div class="column col-12 col-lg-4">
							<div class="column-content" style="justify-content: center;">
								<p class="copyright">© 2022 Intangible Studio. All Rights Reserved</p>
							</div>
						</div>
						<div class="column col-6 col-lg-4">
							<div class="column-content" style="justify-content: flex-end;">
								<a href="#body" class="btn-arrow">
									<img src="https://intangiblestudio.mx/assets/icons/arrow-up.svg" alt="Arrow Button">
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
		<script src="https://intangiblestudio.mx/assets/js/scripts.js"></script>
		<script src="https://intangiblestudio.mx/assets/js/appearOnScroll.js"></script>
	</body>
</html>
