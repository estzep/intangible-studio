<nav class="appear">
	<div class="nav-container container">
		<div class="content">
			<a href="<?php echo $home_path; ?>" class="logo">
				<img src="<?php echo $path; ?>assets/img/brand/Intangible Assets-02.svg" alt="Intangible Studio Logo">
			</a>
			<button id="btn-nav" type="button" aria-label="Nav toggle button" onclick="toggleNav();">
			    <div class="bar1"></div>
			    <div class="bar2"></div>
			</button>
			<ul>
				<li class="nav-link">
					<a href="<?php echo $home_path; ?>" onclick="closeNav();">
						<?
						echo ($lang == 'es' ) ? "Inicio" : "Home";
						?>
					</a>
				</li>
				<li class="nav-link">
					<a href="<?php echo $nav_path; ?>logofolio" onclick="closeNav();">Logofolio</a>
				</li>
				<li class="nav-link">
					<a href="<?php echo $nav_path; ?>servicios" onclick="closeNav();">
						<?
						echo ($lang == 'es' ) ? "Servicios" : "Services";
						?>
					</a>
				</li>
				<li class="nav-link">
					<div class="contact-btn">
						<a href="javascript:;">
							<?
							echo ($lang == 'es' ) ? "Cotiza un proyecto" : "Quote project";
							?>
						</a>
						<div class="btn-container">
							<a href="https://ieyqwtatgui.typeform.com/to/UbAKgyEy" target="_blank" class="btn-type-2"><em>English</em></a>
							<a href="https://ieyqwtatgui.typeform.com/to/kQJwe9my" target="_blank" class="btn-type-2"><em>Español</em></a>
						</div>
					</div>
				</li>
				<li class="nav-link">
					<div class="language-select">
						<a href="<? echo ($lang == 'en' ) ? "javascript:;" : str_replace("/es/", "/en/", $url); ?>">
							<? echo ($lang == 'en' ) ? '<span style="border-bottom: 1px solid var(--white);">EN</span>' : 'EN'; ?>
						</a>
						|
						<a href="<? echo ($lang == 'es' ) ? "javascript:void(0)" : str_replace("/en/", "/es/", $url); ?>">
							<? echo ($lang == 'es' ) ? '<span style="border-bottom: 1px solid var(--white);">ES</span>' : 'ES'; ?>
						</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>