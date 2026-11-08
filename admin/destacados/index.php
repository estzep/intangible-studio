<?php
session_start();

$robots = 'noindex, nofollow';
$canonical = 'https://intangiblestudio.mx/admin/destacados';
$title = 'Intangible Studio | Admin | Destacados';
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
			<main id="admin">
				<?php include($path . 'assets/components/admin_navbar.php'); ?>
				<section class="panel">
					<div class="section-container container">
						<div class="content destacados">
							<div class="top">
								<h2>Proyectos Destacados</h2>
								<form id="upreForm" class="table container" action="" method="post">
									<div class="table-header row">
										<button name="toggleRem" type="button" value="Toggle" onclick="formToggle('remove')" class="toggle-btn">Eliminar</button>
										<button name="toggleMod" type="button" value="Toggle" onclick="formToggle('mod')" class="toggle-btn">Modificar orden</button>

										<button name="cancel" type="button" value="Cancel" onclick="window.location.reload(true)" class="cancel-btn">Cancelar</button>
										<button id="guardar-cambios" name="" type="submit" value="" class="save-btn">Guardar cambios</button>
									</div>
									<?php
									$countQuery = $db->query("SELECT COUNT(*) AS count FROM destacados");
									$countResult = $countQuery->fetch_assoc();
									$count = $countResult['count'];

									$query = $db->query("SELECT * FROM destacados ORDER BY orden ASC");
									if ($query->num_rows > 0) {
										while($data = $query->fetch_assoc()) {
											$id = $data["id"];
											$orden = $data["orden"];
											$idProyecto = $data["proyecto"];
											$sQuery = $db->query("SELECT * FROM proyectos WHERE id = ".$idProyecto);
											$sData = $sQuery->fetch_assoc();
											$title = $sData['titulo'];
									?>
										<div class="t-elem row">
											<div class="col-1">
												<div class="form-check">
													<input type="checkbox" name="checkboxRemove[]" class="logo-checkbox form-checkbox-input" value="<?php echo $orden; ?>">
												</div>
											</div>
											<div class="col-1">
												<input type="number" name="ordenUpdate[]" class="logo-orden-in form-control" value="<?php echo $orden; ?>" min="1" max="<? echo $count; ?>">
												<p class="text logo-orden-p">
													<?php echo $orden; ?>
												</p>
											</div>
											<div class="col-10">
												<p class="text">
													<?php echo $title; ?>
												</p>
											</div>
											
										</div>
									<?php
										}
									}
									?>
								</form>
							</div>
							<div class="bottom">
								<?php
								$query = $db->query("SELECT orden FROM destacados ORDER BY orden DESC LIMIT 1");
								$data = $query->fetch_assoc();
								$count = $data['orden'] + 1;
								?>
								<h2>Agregar proyecto a destacados</h2>
								<form action="../../assets/data/uploadDestacados.php" method="post">
									<div class="form-div">
										<label for="inputOrden" class="form-label">Orden</label>
										<input name="inputOrden" type="number" class="form-control" id="inputOrden" value="<?php echo $count; ?>" min="1" max="<? echo $count; ?>">
									</div>
									<div class="form-div">
										<label for="inputStyle" class="form-label">Proyectos disponibles</label>
										<select id="inputProyecto" name="inputProyecto" class="form-select">
											<option value="none" selected>Seleccionar proyecto</option>
											<?
											$query = $db->query("SELECT * FROM proyectos ORDER BY id ASC");
											if ($query->num_rows > 0) {
												while($data = $query->fetch_assoc()) {
													$id = $data["id"];
													$title = $data["titulo"];
											?>
												<option value="<? echo $id; ?>"><? echo $title; ?></option>
											<?
												}
											}
											?>
										</select>
									</div>
									<div class="form-div">
										<button name="upload" type="submit" value="Upload">Agregar</button>
									</div>
								</form>
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
			function formToggle(action) {
				var form = document.getElementById("upreForm");
				var btn = document.getElementById("guardar-cambios");
				if (action=='mod') {
					form.classList.add("update");
					form.setAttribute("action", "../../assets/data/updateDestacados.php");
					btn.setAttribute("name", "update");
					btn.setAttribute("value", "Update");
				} else if (action=='remove') {
					form.classList.add("remove");
					form.setAttribute("action", "../../assets/data/removeDestacados.php");
					btn.setAttribute("name", "remove");
					btn.setAttribute("value", "Remove");
				}
			}
		</script>
	</body>
</html>