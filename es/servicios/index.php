<?php
$robots = 'index, nofollow';
$canonical = 'https://intangiblestudio.mx/es/servicios';
$title = 'Intangible Studio | Servicios';
$path = '../../';

$nav_path = '../';
$home_path = '../';
$extra_stylesheets = '<link rel="stylesheet" href="' . $path . 'assets/css/servicios.css">';
?>
<?php include($path . 'assets/data/config.php'); ?>
<!DOCTYPE html>
<html lang="es">
	<?php include($path . 'assets/components/head.php'); ?>
	<body id="body">
		<?php include($path . 'assets/components/navbar.php'); ?>
		<header id="header">
			<div class="header-container container">
				<div class="content">
					<p class="text-1">
						Somos un estudio de branding en la <em><strong>Ciudad de México</strong></em>, nos encanta crear marcas para personas apasionadas con proyectos únicos. Con la ayuda de nuestro equipo creativo creamos <em><strong>marcas estéticas y funcionales</strong></em> que evoquen lo intangible (emociones) para volverse <em><strong>inolvidables.</strong></em>
					</p>
				</div>
			</div>
		</header>
		<main>
			<section id="service-table">
				<div class="section-container container">
					<div class="content">
						<h1>
							<em>Nuestros servicios proveen todo lo</em> <strong>esencial</strong> <em>para crear una</em> <strong>identidad de marca exitosa.</strong>
						</h1>
						<div class="services-table">
							<div class="row">
								<div class="col-6 col-md-7 column">
									<h3>Estrategia</h3>
								</div>
								<div class="col-6 col-md-5 column">
									<ul>
										<li>
											Naming
										</li>
										<li>
											Creación de Slogan
										</li>
										<li>
											Desarrollo de tag line
										</li>
										<li>
											Creación de frases creativas
										</li>
									</ul>
								</div>
							</div>
							<div class="row">
								<div class="col-6 col-md-7 column">
									<h3>Branding</h3>
								</div>
								<div class="col-6 col-md-5 column">
									<ul>
										<li>
											Identidad corporativa
										</li>
										<li>
											Lineamiento gráfico
										</li>
										<li>
											Aplicaciones
										</li>
										<li>
											Packaging / Papelería básica
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section id="method">
				<div class="section-container container">
					<div class="content">
						<h3>Metodología Intangible</h3>
						<p class="text-1">
							Nuestra metodología nos permite trabajar de la mano contigo durante todo el proceso creativo, esto nos asegura una identidad digna de tu proyecto.
						</p>
						<div class="circles">
							<img src="../../assets/img/four-es.png">
							<div class="row">
								<div class="col-12 col-sm-3 column">
									<img src="../../assets/img/ice-breaker-es.png" class="mobile">
									<p class="img-caption">
										Cuéntanos de ti y tu proyecto, nosotros nos aseguramos de “entender la tarea.”
									</p>
								</div>
								<div class="col-12 col-sm-3 column">
									<img src="../../assets/img/downpour-es.png" class="mobile">
									<p class="img-caption">
										De 2-3 propuestas iniciales con estilos y conceptos distintos.
									</p>
								</div>
								<div class="col-12 col-sm-3 column">
									<img src="../../assets/img/rainbow-es.png" class="mobile">
									<p class="img-caption">
										Después del aguacero la propuesta elegida se convierte en una propuesta sólida.
									</p>
								</div>
								<div class="col-12 col-sm-3 column">
									<img src="../../assets/img/magic-es.png" class="mobile">
									<p class="img-caption">
										Tu marca está lista para hipnotizar al mercado.
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</main>
		<?php include($path . 'assets/components/footer.php'); ?>
		<?php include($path . 'assets/components/scripts.php'); ?>
	</body>
</html>