<?php
$robots = 'index, follow';
$canonical = 'https://intangiblestudio.mx';
$title = 'Intangible Studio';
$path = '';

$nav_path = '';
$home_path = '';
$extra_stylesheets = '';
?>
<!DOCTYPE html>
<html>
<?php include($path . 'assets/components/head.php'); ?>
	<body>
		<header id="worldmap-bg" class="appear" data-delay="3000">
			<img src="assets/img/worldmap.png" alt="World map background">
		</header>
		<main id="select-lang" class="appear" data-delay="3000">
			<div class="select-lang-container container">
				<div class="content">
					<div class="container">
						<p>
							<img src="assets/img/united-kingdom.svg" alt="English flag"><a href="en">English</a>
						</p>
						<p>
							<img src="assets/img/mexico.svg" alt="Español flag"><a href="es">Español</a>
						</p>
					</div>
				</div>
			</div>
		</main>
		<?php include($path . 'assets/components/scripts.php'); ?>
		<script type="text/javascript">
			var userLang = navigator.language || navigator.userLanguage;
			userLang = userLang.slice(0, 2);
	        if (userLang == "en") {
                window.location.href = "en";
            } else if(userLang == "es"){
            	window.location.href = "es";
            } else {
                window.location.href = "es";
            }
		</script>
	</body>
</html>