<?php
$robots = 'noindex, nofollow';
$canonical = 'https://intangiblestudio.mx/en/proyecto';
$title = 'Intangible Studio | Project';
$path = '../../';

$nav_path = '../';
$home_path = '../';
$extra_stylesheets = '<link rel="stylesheet" href="' . $path . 'assets/css/proyecto.css">';
?>
<?php include($path . 'assets/data/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
	<?php
	$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$url_params = parse_url($url);
	parse_str($url_params['query'], $params);
	$numProy = $params['num'];

	$query = $db->query("SELECT * FROM proyectos WHERE id = ".$numProy);
	$data = $query->fetch_assoc();
	$id = $data['id'];
	$folder = $data['path'];
	$proTitle = $data['titulo'];
	$title = 'Intangible Studio | '.$proTitle;
	$subtitle = $data['subtitulo'];
	$place = $data['lugar'];
	$date = $data['fecha'];
	$description = $data['descripcion'];
	$description = str_replace('/n', '<br><br>', $description);
	$style = $data['style'];
	$imgs = json_decode($data['imagenes'], true);
	$clickable = $data['clickable'];
	$imgPos = $data['imgPos'];
	?>
	<?php include($path . 'assets/components/head.php'); ?>
	<body id="body">
		<?php include($path . 'assets/components/navbar.php'); ?>
		<header id="header">
			<div class="header-container container">
				<div class="content <? echo 'style-type-'.$style; ?>">
					<h1><? echo $proTitle; ?></h1>
					<?
					if ($style == 2) {
						$numsImagenesDestacadas = json_decode($data['imagenDestacada']);
						$numsImagenesDestacadasLength = sizeof($numsImagenesDestacadas);
						?>
						<div class="row">
							<?
							for ($i = 0; $i < $numsImagenesDestacadasLength; $i++) {
								$numImagenDestacada = $numsImagenesDestacadas[$i];
								$imagenDestacada = $imgs[$numImagenDestacada];
								?>
								<div class="col-<? echo(12/$numsImagenesDestacadasLength);?> column">
									<img src="../../assets/projects/<? echo $folder.'/'.$imagenDestacada; ?>">
								</div>
								<?
							}

							?>
						</div>
						<?
					} else {
						$numImagenDestacada = $data['imagenDestacada'];
						$imagenDestacada = $imgs[$numImagenDestacada];
						?>
						<img src="../../assets/projects/<? echo $folder.'/'.$imagenDestacada; ?>">
						<?
					}
					?>
				</div>
			</div>
		</header>
		<main>
			<section>
				<div class="section-container container">
					<div class="content">
						<h2>
							<? echo $proTitle.' <span class="muted">/ '.$subtitle.' / '.$place.' '.$date.'</span>'; ?>
						</h2>
						<p class="text">
							<? echo $description; ?>
						</p>
					</div>
				</div>
			</section>
			<section>
				<div class="section-container container">
					<div class="content<? if ($style == 2) { echo ' row'; } echo ' style-type-'.$style; ?>">
						<?
						for ($i = 1; $i <= sizeof($imgs); $i++) {
							$img = $imgs[$i];
							if ($style == 2) {
								if (!(in_array($i, $numsImagenesDestacadas))) {
									?>
									<div class="col-<? echo(12 / $numsImagenesDestacadasLength); ?> column">
										<img src="../../assets/projects/<? echo $folder.'/'.$img; ?>">
									</div>
									<?
								}
							} else {
								if ($numImagenDestacada != $i) {
									?>
									<img src="../../assets/projects/<? echo $folder.'/'.$img; ?>">
									<?
								}
							}
						}
						?>
					</div>
				</div>
			</section>
		</main>
		<?php include($path . 'assets/components/footer.php'); ?>
		<?php include($path . 'assets/components/scripts.php'); ?>
	</body>
</html>