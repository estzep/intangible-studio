<?php
session_start();
$statusMsg = isset($_GET['status']) ? $_GET['status'] : '';

$robots = 'noindex, nofollow';
$canonical = 'https://intangiblestudio.mx/admin';
$title = 'Intangible Studio | Admin';
$path = '../';

$nav_path = '';
$home_path = '';
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
							<h2>Bienvenido <?php echo $_SESSION['email'];?></h2>
							<div class="row">
								<div class="col-6 py-2">
									<a href="/admin/logos" class="link-card">
										<h3>Logofolio</h3>
										<div class="darken"></div>
										<img src="../assets/img/logofolio-linkcard.png" alt="Logofolio-bg">
									</a>
								</div>
								<div class="col-6 py-2">
									<a href="/admin/proyectos" class="link-card">
										<h3>Proyectos</h3>
										<div class="darken"></div>
										<img src="../assets/img/proyectos-linkcard.png" alt="Proyectos-bg">
									</a>
								</div>
							</div>
							<div class="row">
								<div class="col-6 py-2">
									<a href="/admin/destacados" class="link-card">
										<h3>Proyectos Destacados</h3>
										<div class="darken"></div>
										<img src="../assets/img/proyectosdestacados-linkcard.png" alt="Proyectosdestacados-bg">
									</a>
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
								Bienvenido al panel de administrador
								<br>
								Inicia sesión para continuar.
							</h1>
							<p>
								Si no cuentas con usuario, ponte en <a href="">contacto</a> con nosotros.
							</p>
							<?
							if (!empty($statusMsg)) {
								?>
								<p class="statusMsg">
									<? echo $statusMsg; ?>
								</p>
								<?
							}
							?>
							<form action="../assets/data/login.php" method="post">
								<div class="form-div">
									<label for="username" class="form-label">Usuario</label>
									<input name="username" type="text" class="form-control" id="username" placeholder="Ingresa nombre de usuario">
								</div>
								<div class="form-div">
									<label for="password" class="form-label">Contraseña</label>
									<input name="password" type="password" class="form-control" id="password" placeholder="Ingresa contraseña">
								</div>
								<button type="submit">Iniciar sesión</button>
							</form>
						</div>
					</div>
				</section>
			</main>
		<?php
		}
		?>
		<?php include($path . 'assets/components/scripts.php'); ?>
		<script type="text/javascript">
		</script>
	</body>
</html>