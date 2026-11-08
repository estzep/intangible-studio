<?php
$robots = 'index, nofollow';
$canonical = 'https://intangiblestudio.mx/en/logofolio';
$title = 'Intangible Studio | Logofolio';
$path = '../../';

$nav_path = '../';
$home_path = '../';
$extra_stylesheets = '<link rel="stylesheet" href="' . $path . 'assets/css/logofolio.css">';
?>
<?php include($path . 'assets/data/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
	<?php include($path . 'assets/components/head.php'); ?>
	<body id="body">
		<?php include($path . 'assets/components/navbar.php'); ?>
		<header id="header">
			<div class="header-container container">
				<div class="content">
					<h1 class="appear">
						We build brands and they create us
						<br>
						<em><strong>This is who we are</strong></em>
					</h1>
				</div>
			</div>
		</header>
		<main>
			<section id="logos">
				<div class="section-container container">
					<div class="content row">
						<?php
						$query = $db->query("SELECT * FROM logofolio ORDER BY orden ASC");

						if ($query->num_rows > 0) {
							while($row = $query->fetch_assoc()) {
								$img = $row["file"];
						?>
							<div class="col-6 col-sm-4 item appear">
								<img src="../../assets/logos/<?php echo $img; ?>">
							</div>
						<?php
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