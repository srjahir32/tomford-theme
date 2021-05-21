<section class="contact-us">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="contact-us-content">
					<?php the_field('contact_us_email', 'option'); ?>
					<img src="<?php the_field('contact_us_logo', 'option'); ?>" alt="">
					<a target="_blank" href="<?php the_field('learn_more_button_link', 'option'); ?>" class="d-block">Learn more</a>
				</div>
			</div>
		</div>
	</div>
</section>

<footer>
	<div class="footer-menu">
		<ul>
			<li><a href="#the-prize">The Prize</a></li>
			<li><a href="#the-problem">The Problem</a></li>
			<li><a href="#innovation-prize">INNOVATION PRIZE </a></li>
			<li><a href="#submission">Submissions</a></li>
			<li><a href="#our-judges">Our Judges</a></li>
			<li><a href="#prize-development-council">PRIZE COUNCIL</a></li>
			<li><a href="http://lonelywhale.org/52hz">ABOUT 52HZ </a></li>
			<li><a href="/login/">SUBMISSION PORTAL</a></li>
			<li><a href="/judge-login/">JUDGE PORTAL</a></li>
			<li><a href="/press-tools">PRESS TOOLS</a></li>
		</ul>
	</div>
	<div class="copyright-text">
		<p><?php the_field('copyright_text', 'option'); ?></p>
	</div>
</footer>

<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr-custom.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/popper.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.inputmask.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/custom.js"></script>

<?php wp_footer(); ?>
<script>
	jQuery(".modal_loader_img").hide();
	function showPeopleModal(id, category){
		console.log("category", category);
		jQuery("#people_profile_data").empty();
		jQuery("#peopleModal").modal('show');
		jQuery(".modal_loader_img").show();
		var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
		var tab_data = {
			action: "people-modal",
			category: category,
			id: id,
			type: 'POST'
		};
		jQuery.post(ajaxurl, tab_data, function(response) {
			console.log("response",response);
			jQuery("#people_profile_data").append(response);
			jQuery(".modal_loader_img").hide();
		}); 
	}

	function previousPeopleModal(id,category){
		console.log("previousPeopleModalcategory", category);
		jQuery(".modal_loader_img").show();
		var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
			var tab_data = {
				action: "people-modal",
				id: id,
				category: category,
				type: 'POST',
			};
			jQuery("#people_profile_data").empty();
			jQuery.post(ajaxurl, tab_data, function(response) {
				console.log("previous-people-response", response);
				jQuery("#people_profile_data").append(response);
				jQuery(".modal_loader_img").hide();
			});
	}

	function nextPeopleModal(id,category) {
		jQuery(".modal_loader_img").show();
		var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
		var tab_data = {
			action: "people-modal",
			id: id,
			category: category,
			type: 'POST',
		};
		jQuery("#people_profile_data").empty();
		jQuery.post(ajaxurl, tab_data, function(response) {
			console.log("next-people-response", response);
			jQuery("#people_profile_data").append(response);
			jQuery(".modal_loader_img").hide();
		});
	}
</script>
</body>
</html>