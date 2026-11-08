<?php
$robots = 'index, nofollow';
$canonical = 'https://intangiblestudio.mx/en/servicios';
$title = 'Intangible Studio | Services';
$path = '../../';

$nav_path = '../';
$home_path = '../';
$extra_stylesheets = '<link rel="stylesheet" href="' . $path . 'assets/css/servicios.css">';
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
					<p class="text-1">
						We’re a branding studio <em><strong>based in Mexico City</strong></em>, we love creating brands for passionate people with unique projects. With the help of our creative team we build <em><strong>beautiful but functional brands</strong></em> that appeal to the intangibles (emotions) to become <em><strong>unforgettable.</strong></em>
					</p>
				</div>
			</div>
		</header>
		<main>
			<section id="service-table">
				<div class="section-container container">
					<div class="content">
						<h1>
							<em>Our services provide all the</em> <strong>essentials</strong> <em>for a</em> <strong>successful brand identity.</strong>
						</h1>
						<div class="services-table">
							<div class="row">
								<div class="col-6 col-md-7 column">
									<h3>Strategy</h3>
								</div>
								<div class="col-6 col-md-5 column">
									<ul>
										<li>
											Naming
										</li>
										<li>
											Slogan creation
										</li>
										<li>
											Tag line
										</li>
										<li>
											Creative Quotes
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
											Brand identity
										</li>
										<li>
											Brand guidelines
										</li>
										<li>
											Logotype systems
										</li>
										<li>
											Logotype applications
										</li>
										<li>
											Typography
										</li>
										<li>
											Packaging / Labeling
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
						<h3>Intangible Method</h3>
						<p class="text-1">
							Our methodology allows us to work hand in hand with you throughout the entire creative process, this ensures an identity worthy of your project.
						</p>
						<div class="circles">
							<img src="../../assets/img/four.png">
							<div class="row">
								<div class="col-12 col-sm-3 column">
									<img src="../../assets/img/ice-breaker.png" class="mobile">
									<p class="img-caption">
										We meet you and your project.
									</p>
								</div>
								<div class="col-12 col-sm-3 column">
									<img src="../../assets/img/downpour.png" class="mobile">
									<p class="img-caption">
										Our brainstorm presented in first sketches.
									</p>
								</div>
								<div class="col-12 col-sm-3 column">
									<img src="../../assets/img/rainbow.png" class="mobile">
									<p class="img-caption">
										After the storm the chosen sketch becomes a complete proposal.
									</p>
								</div>
								<div class="col-12 col-sm-3 column">
									<img src="../../assets/img/magic.png" class="mobile">
									<p class="img-caption">
										Your brand’s ready to hypnotize the market.
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