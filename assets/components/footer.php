<footer>
	<div class="container">
		<div class="content">
			<div class="row top">
				<div class="column col-12 col-lg-4">
					<h4>
						<?
						echo ($lang == 'es' ) ? "Contacto" : "Contact";
						?>
					</h4>
					<a href="mailto:contacto@intangiblestudio.mx">contacto@intangiblestudio.mx</a>
					<a href="tel:+525530099097">+52 (55) 3009 9097</a>
				</div>
				<div class="column col-12 col-lg-4">
					<h4>
						<?
						echo ($lang == 'es' ) ? "Síguenos" : "Follow Us";
						?>
					</h4>
					<a href="https://www.instagram.com/intangiblestudio.mx/" target="_blank">Instagram</a>
					<a href="https://www.facebook.com/intangiblestudio.mx/" target="_blank">Facebook</a>
					<a href="https://www.behance.net/intangiblestudio" target="_blank">Behance</a>
				</div>
			</div>
			<div class="row bottom">
				<div class="column col-6 col-lg-4">
					<a href="<? echo $canonical; ?>" class="logo">
						<img src="<?php echo $path; ?>assets/img/brand/Intangible Assets-02.svg" alt="Intangible Studio Logo">
					</a>
				</div>
				<div class="column col-12 col-lg-4">
					<div class="column-content" style="justify-content: center;">
						<p class="copyright">© 2022 Intangible Studio. All Rights Reserved</p>
					</div>
				</div>
				<div class="column col-6 col-lg-4">
					<div class="column-content" style="justify-content: flex-end;">
						<a href="#body" class="btn-arrow">
							<img src="<?php echo $path; ?>assets/icons/arrow-up.svg" alt="Arrow Button">
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>