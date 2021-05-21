<?php
/**
 * Template Name: Press Tools
 */

get_header();
?>
<section class="press-tools">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="press-tools-content">
					<h1>Press Tools</h1>
					<div class="press-tools-contact">
						<h2>Press Firm contact:</h2>
						<h2>Email: <a href="mailto:<?php the_field('press_email'); ?>"><?php the_field('press_email'); ?></a></h2>
					</div>
					<div class="press-tools-links">
						<h3><a href="<?php the_field('press_release_link') ?>" download>Press Release(s)</a></h3>
						<h3><a href="<?php the_field('press_kits_pdf_link') ?>" download>Press Kits</a></h3>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
get_footer('home');