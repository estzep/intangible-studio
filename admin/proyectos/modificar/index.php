<?php
session_start();

$robots = 'noindex, nofollow';
$canonical = 'https://intangiblestudio.mx/admin/proyectos/modificar';
$title = 'Intangible Studio | Admin | Proyectos | Modificar';
$path = '../../../';

$nav_path = '../../';
$home_path = '../../';
$extra_stylesheets = '<link rel="stylesheet" href="' . $path . 'assets/css/admin.css">';
?>
<?php include($path . 'assets/data/config.php'); ?>
<!DOCTYPE html>
<html lang="es">
	<?php include($path . 'assets/components/head.php'); ?>
	<body id="body">
		<?php
		if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
		?>
		<main id="admin">
			<?php include($path . 'assets/components/admin_navbar.php'); ?>
			<section class="panel">
				<div class="section-container container">
					<div class="content">
						<?php
						$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
						$url_params = parse_url($url);
						parse_str($url_params['query'], $params);
						$numProy = $params['num'];

						$query = $db->query("SELECT * FROM proyectos WHERE id = ".$numProy);
						$data = $query->fetch_assoc();
						$id = $data["id"];
						$folder = $data["path"];
						$titleP = $data["titulo"];
						$subtitle = $data["subtitulo"];
						$place = $data["lugar"];
						$date = $data["fecha"];
						$desc = $data["descripcion"];
						$imgs = json_decode($data['imagenes'], true);
						$style = $data["style"];
						$imgD = $data["imagenDestacada"];
						if ($style == 2) {
							$imgDArray = json_decode($imgD);
							$imgD = implode(', ', $imgDArray);
						}
						$clickable = $data["clickable"];
						$imgPos = $data['imgPos'];
						?>
						<h2><? echo $titleP; ?> - Modificar proyecto</h2>
						<form action="../../../assets/data/updateProyecto.php" method="post" enctype="multipart/form-data" class="proyecto-form">
							<div class="form-row row">
								<div class="form-column col-6">
									<label for="inputId" class="form-label">ID</label>
									<input name="inputId" type="number" class="form-control" id="inputId" value="<? echo $id; ?>" readonly>
								</div>
								<div class="form-column col-6">
									<label for="inputFolder" class="form-label">Folder</label>
									<input name="inputFolder" type="text" class="form-control" id="inputFolder" value="<? echo $folder; ?>" readonly>
								</div>
							</div>
							<div class="form-row row">
								<div class="form-column col-6">
									<label for="inputTitle" class="form-label">Titulo</label>
									<input name="inputTitle" type="text" class="form-control" id="inputTitle" value="<? echo $titleP; ?>">
								</div>
								<div class="form-column col-6">
									<label for="inputSubtitle" class="form-label">Sub-Titulo</label>
									<input name="inputSubtitle" type="text" class="form-control" id="inputSubtitle" value="<? echo $subtitle; ?>">
								</div>
							</div>
							<div class="form-row row">
								<div class="form-column col-6">
									<label for="inputPlace" class="form-label">Lugar</label>
									<input name="inputPlace" type="text" class="form-control" id="inputPlace" value="<? echo $place; ?>">
								</div>
								<div class="form-column col-6">
									<label for="inputDate" class="form-label">Fecha</label>
									<input name="inputDate" type="text" class="form-control" id="inputDate" value="<? echo $date; ?>">
								</div>
							</div>
							<div class="form-row row">
								<div class="form-column check">
									<div class="form-check form-switch">
										<label class="form-check-label" for="inputClickable">Clickable</label>
										<input name="inputClickable" class="form-check-input" type="checkbox" role="switch" id="inputClickable" value="1" onclick="clickableToggle(this);" <?php echo ($clickable) ? "checked" : "";?>>
									</div>
								</div>
							</div>
							<div id="descContainer" class="form-row row d-none">
								<div class="form-column col-12">
									<label for="inputDescription" class="form-label">Descripción</label>
									<textarea name="inputDescription" class="form-control" id="inputDescription" rows="5"><? echo $desc; ?></textarea>
								</div>
							</div>
							<div id="styleContainer" class="form-row row">
								<div class="form-column col-6">
									<label for="inputStyle" class="form-label">Estilo</label>
									<select id="inputStyle" name="inputStyle" class="form-select" onchange="styleToggle(this);">
										<option value="1" <?php echo ($style == 1) ? "selected" : ""; ?>>1</option>
										<option value="2" <?php echo ($style == 2) ? "selected" : ""; ?>>2</option>
									</select>
								</div>
							</div>
							<div id="filesContainer" class="form-row row">
								<div class="form-column col-6">
									<label for="inputFiles" class="form-label">
										Imagenes:
										<br>
										<small>Seleccionar archivo (jpg, png, jpeg, gif, svg)</small>
									</label>
									<?
									$fNumberJS = 1;
									foreach($imgs as $n => $img) {
										?>
										<div class="input-file-container mb-2 row">
											<div class="col-2 fNumber">
												<? echo $n; ?>:
											</div>
											<div class="col-8">
												<span class="file-label"><? echo $img; ?></span>
												<input type="hidden" name="oldInputFiles[]" class="d-none" value="<? echo $img; ?>">
												<input name="inputFiles[]" class="form-control input-file" type="file">
											</div>
											<?
											if ($n != 1) {
												?>
												<div class="col-2 remBtn">
													<button type="button" class="btn btn-outline-danger" onclick="removeInputFile(this)">Eliminar</button>
												</div>
												<?
											}
											?>
										</div>
										<?
										$fNumberJS++;
									}
									?>
									<button type="button" class="btn-type-3" onclick="addInputFile(this)">Agregar imagen</button>
								</div>
							</div>
							<div class="form-row row">
								<div class="form-column col-6">
									<label for="inputDestacada" class="form-label" id="labelDestacada">
										Imagen Destacada
									</label>
									<input name="inputDestacada" class="form-control" type="text" id="inputDestacada" value="<? echo $imgD; ?>">
								</div>
								<div class="form-column col-6">
									<label for="inputPos" class="form-label" id="labelPos">
										Posicion de la imagen destacada
										<br>
										<small>"x" y "y"</small>
									</label>
									<input name="inputPos" class="form-control" type="text" id="inputPos" placeholder="x% y%" value="<? echo $imgPos; ?>">
								</div>
							</div>
							<div class="form-row row">
								<div class="form-column col-12 btn-col">
									<button name="update" type="submit" value="Update" class="btn-type-3">Modificar proyecto</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</section>
		</main>
		<?php
		} else {
			?>
			<main id="login">
				<section class="form">
					<div class="section-container container">
						<div class="content">
							<h1>
								Tu sesión ha caducado
							</h1>
							<p>
								<a href="<? echo $home_path; ?>">Regresar al inicio de sesión</a>
							</p>
						</div>
					</div>
				</section>
			</main>
			<?
		}
		?>
		<?php include($path . 'assets/components/scripts.php'); ?>
		<script type="text/javascript">
			function clickableToggle(that) {
				var desc = document.getElementById("descContainer");
				var style = document.getElementById("styleContainer");
				var inStyle = document.getElementById("inputStyle");

				if (that.checked) {
					desc.classList.remove("d-none");
					style.classList.remove("d-none");
				} else {
					desc.classList.add("d-none");
					style.classList.add("d-none");
					inStyle.value = 1;
				}
				var inStyle = document.getElementById("inputStyle");
				styleToggle(inStyle);
			}

			function styleToggle(that) {
				var inDestacada = document.getElementById("inputDestacada");
				var laDestacada = document.getElementById("labelDestacada");
				var val = that.value;
				if (val == 1) {
					laDestacada.innerHTML = "Imagen Destacada";
					inDestacada.removeAttribute("placeholder");
					// inDestacada.setAttribute("name", "inputDestacada");
				} else if (val == 2) {
					laDestacada.innerHTML = `Imagen Destacada<br><small>Escribir los numeros seguidos por ,<br>Por ejemplo: 1, 2, 3</small>`;
					inDestacada.setAttribute("placeholder", "1, 2, 3");
					// inDestacada.setAttribute("name", "inputDestacada[]");
				}
			}

			function accordionToggle(that) {
				var id = that.getAttribute("aria-controls");
				var target = document.getElementById(id);
				if (target.classList.contains("show")) {
					that.classList.add("collapsed");
					target.classList.remove("show");
				} else {
					that.classList.remove("collapsed");
					target.classList.add("show");
				}
			}

			function toggleElem(id, choice) {
				var elem = document.getElementById(id);
				if (choice == "open") {
					elem.classList.add("active");
				} else if (choice == "close") {
					elem.classList.remove("active");
				} else {
					if (elem.classList.contains("active")) {
						elem.classList.remove("active");
					} else {
						elem.classList.add("active");
					}
				}
			}

			function agregarProyecto() {
				toggleElem("darken", "open");
				toggleElem("pop-up", "open");
				toggleElem("uploadProyecto", "open");
			}

			let fNumber = <? echo $fNumberJS; ?>;

			function addInputFile(button) {
				const inputFileContainer = `
					<div class="input-file-container mb-2 row">
						<div class="col-2 fNumber">
							${fNumber}:
						</div>
						<div class="col-8">
							<span class="file-label">Nueva imagen</span>
							<input type="hidden" name="oldInputFiles[]" class="d-none" value="">
							<input name="inputFiles[]" class="form-control input-file" type="file">
						</div>
						<div class="col-2 remBtn">
							<button type="button" class="btn btn-outline-danger" onclick="removeInputFile(this)">Eliminar</button>
						</div>
					</div>
				`;
				button.insertAdjacentHTML('beforebegin', inputFileContainer);
				fNumber++;
			}

			function removeInputFile(element) {
				const inputFileContainers = document.querySelectorAll('.input-file-container');
				element.closest('.input-file-container').remove();
				var inputFileContainer = document.getElementsByClassName('input-file-container');
				for (var i = 0; i < inputFileContainer.length; i++) {
					var elem = inputFileContainer[i];
					elem.getElementsByClassName("col-2")[0].innerHTML = `${i + 1}:`;
				}
				fNumber = i + 1;
			}



		</script>
		<?php
		if ($clickable) {
		echo '<script>clickableToggle(document.getElementById("inputClickable"));</script>';
		}
		?>
	</body>
</html>