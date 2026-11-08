<?php
session_start();

$robots = 'noindex, nofollow';
$canonical = 'https://intangiblestudio.mx/admin/logos';
$title = 'Intangible Studio | Admin | Logos';
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
						<div class="content logofolio">
							<div class="top">
								<h2>Logos</h2>
								<form id="upreForm" class="table container" action="" method="post">
									<div class="table-header row">
										<button name="toggleRem" type="button" value="Toggle" onclick="formToggle('remove')" class="toggle-btn">Eliminar</button>
										<button name="toggleMod" type="button" value="Toggle" onclick="formToggle('mod')" class="toggle-btn">Modificar orden</button>

										<button name="cancel" type="button" value="Cancel" onclick="window.location.reload(true)" class="cancel-btn">Cancelar</button>
										<button id="guardar-cambios" name="" type="submit" value="" class="save-btn">Guardar cambios</button>
									</div>
									<?php
									$countQuery = $db->query("SELECT COUNT(*) AS count FROM logofolio");
									$countResult = $countQuery->fetch_assoc();
									$count = $countResult['count'];

									$query = $db->query("SELECT * FROM logofolio ORDER BY orden ASC");


									if ($query->num_rows > 0) {
										while($data = $query->fetch_assoc()) {
											$orden = $data["orden"];
											$img = $data["file"];
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
													<?php echo $img; ?>
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
								$query = $db->query("SELECT COUNT(*) AS count FROM logofolio");
								$data = $query->fetch_assoc();
								$count = $data['count'] + 1;
								?>
								<h2>Agregar logo</h2>
								<form action="../../assets/data/uploadLogofolio.php" method="post" enctype="multipart/form-data">
									<div class="form-div">
										<label for="inputOrden" class="form-label">Orden</label>
										<input name="inputOrden" type="number" class="form-control" id="inputOrden" value="<?php echo $count; ?>" min="1" max="<? echo $count; ?>">
									</div>
									<div class="form-div">
										<label for="inputFile" class="form-label">Seleccionar archivo (jpg, png, jpeg, gif, svg)</label>
										<input name="inputFile" class="form-control" type="file" id="inputFile">
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
					form.setAttribute("action", "../../assets/data/updateLogofolio.php");
					btn.setAttribute("name", "update");
					btn.setAttribute("value", "Update");
				} else if (action=='remove') {
					form.classList.add("remove");
					form.setAttribute("action", "../../assets/data/removeLogofolio.php");
					btn.setAttribute("name", "remove");
					btn.setAttribute("value", "Remove");
				}
			}
		</script>
	</body>
</html>