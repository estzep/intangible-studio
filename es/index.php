<?php
$robots = 'index, follow';
$canonical = 'https://intangiblestudio.mx/es';
$title = 'Intangible Studio | Inicio';
$path = '../';

$nav_path = '';
$home_path = '#body';
$extra_stylesheets = '';
?>

<?php include($path . 'assets/data/config.php'); ?>

<?
$query = $db->query("SELECT COUNT(*) AS count FROM destacados");
$data = $query->fetch_assoc();
$count = $data['count'];

if ($count <= 9) {
	$rows = (1.13*$count) + 2;
} else {
	if (($count % 2) == 0) {
		$rows = $count + 4;
	} else {
		$rows = $count + 3;
	}
}
if ($count <= 6) {
	$smallRows = $count;
} else {
	$smallRows = (($count - 5) / 2) + 5;
}
?>
<!DOCTYPE html>
<html lang="es" style="--project-rows: <? echo(round($rows)) ; ?>; --project-small-rows: <? echo(round($smallRows)) ; ?>;">
	<?php include($path . 'assets/components/head.php'); ?>
	<body id="body">
		<?php include($path . 'assets/components/navbar.php'); ?>
		<header id="header">
			<div class="header-container container">
				<div class="content">
					<h1 class="appear">Creadores intangibles.</h1>
					<div class="staircase-text">
						<p class="stair-text appear" data-delay="100">Creamos</p>
						<p class="stair-text appear" data-delay="300">Identidades</p>
						<p class="stair-text appear" data-delay="500">Conceptos</p>
						<p class="stair-text appear" data-delay="700">Símbolos</p>
						<p class="stair-text appear" data-delay="900">Memorias</p>
						<p class="stair-text appear" data-delay="1100">Creamos marcas inolvidables</p>
					</div>
				</div>
			</div>
		</header>
		<main>
			<section id="home-projects">
				<div class="section-container container">
					<div class="content">
						<?php
						$queryD = $db->query("SELECT * FROM destacados ORDER BY orden ASC");
						if ($queryD->num_rows > 0) {
							while($dataD = $queryD->fetch_assoc()) {
								$idD = $dataD["id"];
								$ordenD = $dataD["orden"];
								$proyectoD = $dataD["proyecto"];

								$query = $db->query("SELECT * FROM proyectos WHERE id = ".$proyectoD);
								$data = $query->fetch_assoc();
								$id = $data['id'];
								$folder = $data['path'];
								$title = $data['titulo'];
								$subtitle = $data['subtitulo'];
								$place = $data['lugar'];
								$date = $data['fecha'];
								$description = $data['descripcion'];
								$style = $data['style'];
								if ($style == 2) {
									$numImgDestacada = json_decode($data['imagenDestacada'])[0];
								} else {
									$numImgDestacada = $data['imagenDestacada'];
								}
								$imgs = json_decode($data['imagenes'], true);
								$imgDestacada = $imgs[$numImgDestacada];
								$clickable = $data['clickable'];
								$imgPos = $data['imgPos'];
								?>
								<div class="item appear" style="background-image: url(../assets/projects/<? echo $folder."/".$imgDestacada; ?>); background-position: <? echo $imgPos; ?>;">
									<a href="<? echo ($clickable) ? "proyecto?num=".$id : "javascript:;"; ?>">
										<div class="item-content">
											<h3><? echo $title; ?></h3>
											<p><? echo $subtitle; ?></p>
											<? if($clickable) { echo '<button class="btn-type-1"><img src="../assets/icons/eye.svg" alt="Eye icon"><strong>Ver</strong> <em>proyecto</em></button>'; } ?>
										</div>
									</a>
									<? if ($clickable) { echo '<img src="../assets/icons/eye-square.svg" class="eye-square" alt="Eye icon">'; } ?>
								</div>
								<?
							}
						}
						?>
					</div>
				</div>
			</section>
			<section id="contacto">
				<div class="contacto-container container">
					<div class="content row">
						<div class="col-12 col-sm-6">
							<h2 class="appear">
								<em>Rompe el hielo</em> <strong>y contáctanos</strong>
							</h2>
						</div>
						<div class="col-12 col-sm-6">
							<div class="btn-container">
								<div class="contact-btn appear">
									<button class="btn-type-1">
										<strong>Cotiza</strong> <em>un proyecto</em>
									</button>
									<div class="btn-container">
										<a href="https://ieyqwtatgui.typeform.com/to/UbAKgyEy" target="_blank" class="btn-type-2"><em>English</em></a>
										<a href="https://ieyqwtatgui.typeform.com/to/kQJwe9my" target="_blank" class="btn-type-2"><em>Español</em></a>
									</div>
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