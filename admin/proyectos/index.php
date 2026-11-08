<?php
session_start();

$robots = 'noindex, nofollow';
$canonical = 'https://intangiblestudio.mx/admin/proyectos';
$title = 'Intangible Studio | Admin | Proyectos';
$path = '../../';

$nav_path = '../';
$home_path = '../';
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
		<div id="darken"></div>
		<div id="pop-up">
			<div class="container">
				<a href="" class="cerrar">Cerrar</a>
				<div id="uploadProyecto" class="content">
					<?php
					$query = $db->query("SELECT id FROM proyectos ORDER BY id DESC LIMIT 1");
					$data = $query->fetch_assoc();
					$count = $data['id'] + 1;
					?>
					<h2>Crear nuevo proyecto</h2>
					<form action="../../assets/data/uploadProyecto.php" method="post" enctype="multipart/form-data" class="proyecto-form">
						<div class="form-row row">
							<div class="form-column col-6">
								<label for="inputId" class="form-label">ID</label>
								<input name="inputId" type="number" class="form-control" id="inputId" value="<?php echo $count; ?>" readonly>
							</div>
							<div class="form-column col-6">
								<label for="inputFolder" class="form-label">Folder</label>
								<input name="inputFolder" type="text" class="form-control" id="inputFolder" required>
							</div>
						</div>
						<div class="form-row row">
							<div class="form-column col-6">
								<label for="inputTitle" class="form-label">Titulo</label>
								<input name="inputTitle" type="text" class="form-control" id="inputTitle" required>
							</div>
							<div class="form-column col-6">
								<label for="inputSubtitle" class="form-label">Sub-Titulo</label>
								<input name="inputSubtitle" type="text" class="form-control" id="inputSubtitle">
							</div>
						</div>
						<div class="form-row row">
							<div class="form-column col-6">
								<label for="inputPlace" class="form-label">Lugar</label>
								<input name="inputPlace" type="text" class="form-control" id="inputPlace">
							</div>
							<div class="form-column col-6">
								<label for="inputDate" class="form-label">Fecha</label>
								<input name="inputDate" type="text" class="form-control" id="inputDate">
							</div>
						</div>
						<div class="form-row row">
							<div class="form-column check">
								<div class="form-check form-switch">
									<label class="form-check-label" for="inputClickable">Clickable</label>
									<input name="inputClickable" class="form-check-input" type="checkbox" role="switch" id="inputClickable" value="1" onclick="clickableToggle(this);">
								</div>
							</div>
						</div>
						<div id="descContainer" class="form-row row d-none">
							<div class="form-column col-12">
								<label for="inputDescription" class="form-label">Descripción</label>
								<textarea name="inputDescription" class="form-control" id="inputDescription" rows="3"></textarea>
							</div>
						</div>
						<div id="styleContainer" class="form-row row d-none">
							<div class="form-column col-6">
								<label for="inputStyle" class="form-label">Estilo</label>
								<select id="inputStyle" name="inputStyle" class="form-select" onchange="styleToggle(this);">
									<option value="1">1</option>
									<option value="2">2</option>
								</select>
							</div>
						</div>
						<div id="filesContainer" class="form-row row">
							<div class="form-column col-6">
								<label for="inputFiles" class="form-label">
									Imagenes
									<br>
									<small>Seleccionar archivo (jpg, png, jpeg, gif, svg)</small>
								</label>
								<div class="input-file-container mb-2 row">
									<div class="col-2 fNumber">
										1:
									</div>
									<div class="col-8">
										<input name="inputFiles[]" class="form-control input-file" type="file">
									</div>
								</div>
								<button type="button" class="btn-type-3" onclick="addInputFile(this)">Agregar imagen</button>
							</div>
						</div>
						<div class="form-row row">
							<div class="form-column col-6">
								<label for="inputDestacada" class="form-label" id="labelDestacada" required>
									Imagen Destacada
									<br>
									<small>Solo el numero de la imagen.<br>Por ejemplo: 1</small>
								</label>
								<input name="inputDestacada" class="form-control" type="text" id="inputDestacada" required>
							</div>
							<div class="form-column col-6">
								<label for="inputPos" class="form-label" id="labelPos">
									Posicion de la imagen destacada
									<br>
									<small>"x" y "y"</small>
								</label>
								<input name="inputPos" class="form-control" type="text" id="inputPos" placeholder="x% y%" value="50% 50%" required>
							</div>
						</div>
						<div class="form-row row">
							<div class="form-column col-12 btn-col">
								<button name="upload" type="submit" value="Upload" class="btn-type-3">Crear proyecto</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<main id="admin">
			<?php include($path . 'assets/components/admin_navbar.php'); ?>
			<section class="panel">
				<div class="section-container container">
					<div class="content proyectos">
						<div class="top row">
							<div class="col-6">
								<h2>Proyectos</h2>
							</div>
							<div class="col-6 text-end">
								<button onclick="agregarProyecto();" type="button" class="btn-type-1">Crear proyecto</button>
							</div>
						</div>
						<div class="bottom">
							<div id="proyectosContainer" class="accordion">
								<?php
								$query = $db->query("SELECT * FROM proyectos ORDER BY id ASC");
								if ($query->num_rows > 0) {
									while($data = $query->fetch_assoc()) {
										$id = $data["id"];
										$folder = $data["path"];
										$title = $data["titulo"];
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
									<div class="accordion-item proyecto">
										<h2 id="<? echo $folder; ?>-heading" class="accordion-header p-0 m-0">
											<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<? echo $folder; ?>-collapse" aria-controls="<? echo $folder; ?>-collapse">
												<? echo $title; ?>
											</button>
										</h2>
										<div id="<? echo $folder; ?>-collapse" class="accordion-collapse collapse bg-dark" aria-labelledby="<? echo $folder; ?>-heading">
											<div class="accordion-body container">
												<div class="content">
													<div class="row">
														<div class="col-6">
															<form action="../../assets/data/removeProyecto.php" method="post" onsubmit="return confirm('¿Está seguro de que desea eliminar el proyecto?')">
																<button type="submit" class="btn-type-2" name="remove" value="<?php echo $id;?>">Eliminar proyecto</button>
															</form>
															<a href="modificar?num=<? echo $id; ?>" class="btn-type-1">Modificar proyecto</a>
															<!-- <button class="btn-type-1" disabled>Modificar proyecto</button> -->
														</div>
														<div class="col-6 text-end">
															<p class="text">
																<?
																if ($clickable) {
																	?>
																	<a href="../../en/proyecto?num=<? echo $id; ?>" target="_blank" class="btn-type-2">Ver página</a>
																	<br>
																	<?
																}
																?>
															</p>
														</div>
													</div>
													<form action="" class="proyecto-form">
														<div class="form-row row">
															<div class="form-column col-6">
																<label for="id">Id</label>
																<input name="id" type="number" value="<? echo $id; ?>" disabled>
															</div>
															<div class="form-column col-6">
																<label for="folder">Folder</label>
																<input name="folder" type="text" value="<? echo $folder; ?>" disabled>
															</div>
														</div>
														<div class="form-row row">
															<div class="form-column col-6">
																<label for="title">Titulo</label>
																<input name="title" type="text" value="<? echo $title; ?>" disabled>
															</div>
															<div class="form-column col-6">
																<label for="subtitle">Sub-titulo</label>
																<input name="subtitle" type="text" value="<? echo $subtitle; ?>" disabled>
															</div>
														</div>
														<div class="form-row row">
															<div class="form-column col-6">
																<label for="place">Lugar</label>
																<input name="place" type="text" value="<? echo $place; ?>" disabled>
															</div>
															<div class="form-column col-6">
																<label for="date">Fecha</label>
																<input name="date" type="text" value="<? echo $date; ?>" disabled>
															</div>
														</div>
														<div class="form-row row">
															<div class="form-column col-12">
																<label for="desc">Descripción</label>
																<textarea name="desc" rows="5" disabled><? echo $desc; ?></textarea>
															</div>
														</div>
														<div class="form-row row">
															<div class="form-column col-6">
																<label for="clickable">Clickable</label>
																<input name="clickable" type="text" value="<? echo $clickable ? 'Si' : 'No'; ?>" disabled>
															</div>
															<div class="form-column col-6">
																<label for="style">Estilo</label>
																<input name="stylesubtitle" type="text" value="<? echo $style; ?>" disabled>
															</div>
														</div>
														<div class="form-row row">
															<div class="form-column col-6">
																<label for="imgD">Imagen(es) Destacada(s)</label>
																<input name="imgD" type="text" value='<? echo $imgD; ?>' disabled>
															</div>
															<div class="form-column col-6">
																<label for="imgPos">Posicion de la imagen destacada</label>
																<input name="imgPos" type="text" value="<? echo $imgPos; ?>" disabled>
															</div>
														</div>
														<div class="form-row row imgs">
															<div class="form-column col-12">
																<label for="imgs">Imagenes</label>
															</div>
															<?
															for ($i = 1; $i <= sizeof($imgs); $i++) {
																$img = $imgs[$i];
																?>
																<div class="form-column col-4 my-2">
																	<label for="img"><? echo $i; ?>: <? echo $img; ?></label>
																	<img src="../../assets/projects/<? echo $folder.'/'.$img; ?>">
																</div>
																<?
															}
															?>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								<?
									}
								}
								?>
							</div>
						</div>
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
					laDestacada.innerHTML = "Imagen Destacada<br><small>Solo el numero de la imagen.<br>Por ejemplo: 1</small>";
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

			let fNumber = 2;

			function addInputFile(button) {
				const inputFileContainer = `
					<div class="input-file-container mb-2 row">
					<div class="col-2 fNumber">
						${fNumber}:
					</div>
					<div class="col-8">
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
	</body>
</html>