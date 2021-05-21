<?php
/**
 * Template Name: User Submission Step2
 */

get_header();

global $current_user, $user_ID;

$args = array(
	'author' => $current_user->ID,
	'post_type' => 'user_submission',
	'posts_per_page' => -1,
	'orderby' => 'post_date',
	'order' => 'ASC',
);
$current_user_posts = get_posts($args);
$total = count($current_user_posts);
if ($total > 0 ) {
	$post_id = $current_user_posts[0]->ID;
}

if(isset($_POST['currentStep']) && $_POST['currentStep'] == 2) {
	wp_update_post(array(
		'ID' => $post_id,
		'post_name' => sanitize_title_with_dashes($_POST['productName']),
	));
	update_post_meta($post_id, 'product_name', $_POST['productName']);
	update_post_meta($post_id, 'product_description', $_POST['productDescription']);
	update_post_meta($post_id, 'judg_durability', $_POST['durability']);
	update_post_meta($post_id, 'judg_durability_description', $_POST['durabilitydesc']);
	update_post_meta($post_id, 'judg_scalability', $_POST['scalability']);
	update_post_meta($post_id, 'judg_scalability_description', $_POST['scalabilitydesc']);
	update_post_meta($post_id, 'judg_accessibility', $_POST['accessibility']);
	update_post_meta($post_id, 'judg_accessibility_description', $_POST['accessibilitydesc']);
	update_post_meta($post_id, 'judg_usage', $_POST['usage']);
	update_post_meta($post_id, 'judg_usage_description', $_POST['usagedesc']);
	update_post_meta($post_id, 'judg_affordability', $_POST['affordability']);
	update_post_meta($post_id, 'judg_affordability_description', $_POST['affordabilitydesc']);

	$updated = update_user_meta($user_ID, 'current_step', $_POST['currentStep']);
	$user_current_step = get_user_meta($user_ID, 'current_step', true);
	if (isset($_POST['next'])) {
		wp_redirect( home_url('user-submission-step3') );
	}
}

if ($user_ID) {
	$user_current_step = get_user_meta($user_ID, 'current_step', true);
	$durability = get_field("judg_durability", $post_id);
	$scalability = get_field("judg_scalability", $post_id);
	$accessibility = get_field("judg_accessibility", $post_id);
	$usage = get_field("judg_usage", $post_id);
	$affordability = get_field("judg_affordability", $post_id);
?>
<section class="portal-tabs">
	<div class="container-fluid">
		<?php get_template_part( 'template-parts/tab-content' );?>
		<div class="submission-form">
			<div class="submission-form-title">
				<h2>Submitting documents</h2>
			</div>
			<!-- Step 2 -->
			<div class="submission-step active">
				<div class="steps-progress">
					<h3>Product Information</h3>
					<div class="step-progress-box">
						<ul>
							<li id="step-1" class="active"><a href="/user-submission-step1/"></a></li>
							<li id="step-2" class="active"></li>
							<li id="step-3"></li>
							<li id="step-4"></li>
							<li id="step-5"></li>
							<li id="step-6"></li>
							<li id="step-7"></li>
						</ul>
					</div>
				</div>
				<h2>Product Information</h2>
				<div class="step-form">
					<form id="step2-form" action="" method="post">
						<input type="hidden" name="post_id" value="<?php echo $post_id?>" id="current_post_id">
						<input type="hidden" name="currentStep" value="2">
						<div class="form-group">
							<label>Name of Product</label>
							<input type="text" value="<?php the_field( "product_name", $post_id ) ?>" class="form-control" name="productName">
						</div>
						<div class="form-group">
							<label>Product Discription</label>
							<textarea class="form-control" name="productDescription" rows="8" id="productDescription"><?php the_field( "product_description", $post_id ) ?></textarea>
							<div class="text-count"></div>
						</div>
						<div class="additional-product-information">
							<h2>Additional Product information</h2>
							<div class="information-box">
								<label>Judging Criterea Durability</label>
								<h3>Does your product match this criterea?</h3>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="durability" value="Yes" <?php if( $durability=="Yes") echo "checked" ?> >
									<label class="form-check-label">Yes</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="durability" value="No" <?php if( $durability=="No") echo "checked" ?>>
									<label class="form-check-label">No</label>
								</div>
								<div class="conditional-notes" id="durability_area">
									<div class="form-group">
										<label class="yes-notes">Please describe the strengths and weaknesses of your submission against this criteria.</label>
									<label class="no-notes" id="durability_no">We strongly recommend your product matches all judging criterea, in the mean time please tell us the your interest and other strengths.</label>
										<textarea class="form-control" name="durabilitydesc" rows="8"><?php the_field( "judg_durability_description", $post_id )?></textarea>
									</div>
								
								</div>
							</div>
							<div class="information-box">
								<label>Judging Criterea Scalability</label>
								<h3>Does your product match this criterea?</h3>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="scalability" value="Yes" <?php if( $scalability=="Yes") echo "checked" ?> >
									<label class="form-check-label">Yes</label>
								</div>
								<div class="form-check">
								<input class="form-check-input" type="radio" name="scalability" value="No" <?php if( $scalability=="No") echo "checked" ?>>
									<label class="form-check-label">No</label>
								</div>
								<div class="conditional-notes" id="scalability_area">
									<div class="form-group">
										<label class="yes-notes">Please describe the strengths and weaknesses of your submission against this criteria.</label>
										<label class="no-notes">We strongly recommend your product matches all judging criterea, in the mean time please tell us the your interest and other strengths.</label>
										<textarea class="form-control" name="scalabilitydesc" rows="8"><?php the_field( "judg_scalability_description", $post_id )?></textarea>
									</div>
								
								</div>
							</div>
							<div class="information-box">
								<label>Judging Criterea Accessibility</label>
								<h3>Does your product match this criterea?</h3>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="accessibility" value="Yes" <?php if( $accessibility=="Yes") echo "checked" ?>>
									<label class="form-check-label">Yes</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="accessibility" value="No" <?php if( $accessibility=="No") echo "checked" ?>>
									<label class="form-check-label">No</label>
								</div>
								<div class="conditional-notes" id="accessibility_area">
									<div class="form-group">
										<label class="yes-notes">Please describe the strengths and weaknesses of your submission against this criteria.</label>
										<label class="no-notes">We strongly recommend your product matches all judging criterea, in the mean time please tell us the your interest and other strengths.</label>
										<textarea class="form-control" name="accessibilitydesc" rows="8"><?php the_field( "judg_accessibility_description", $post_id )?></textarea>
									</div>
								</div>
							</div>
							<div class="information-box">
								<label>Judging Criterea Usage</label>
								<h3>Does your product match this criterea?</h3>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="usage" value="Yes" <?php if( $usage=="Yes") echo "checked" ?> >
									<label class="form-check-label">Yes</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="usage" value="No" <?php if( $usage=="No") echo "checked" ?> >
									<label class="form-check-label">No</label>
								</div>
								<div class="conditional-notes" id="usage_area">
									<div class="form-group ">
										<label class="yes-notes">Please describe the strengths and weaknesses of your submission against this criteria.</label>
										<label class="no-notes">We strongly recommend your product matches all judging criterea, in the mean time please tell us the your interest and other strengths.</label>
										<textarea class="form-control" name="usagedesc" rows="8"><?php the_field( "judg_usage_description", $post_id )?></textarea>
									</div>
								</div>
							</div>
							<div class="information-box">
								<label>Judging Criterea Affordability</label>
								<h3>Does your product match this criterea?</h3>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="affordability" value="Yes" <?php if( $affordability=="Yes") echo "checked" ?> >
									<label class="form-check-label">Yes</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="affordability" value="No" <?php if( $affordability=="No") echo "checked" ?>>
									<label class="form-check-label">No</label>
								</div>
								<div class="conditional-notes" id="affordability_area">
									<div class="form-group ">
										<label class="yes-notes">Please describe the strengths and weaknesses of your submission against this criteria.</label>
										<label class="no-notes">We strongly recommend your product matches all judging criterea, in the mean time please tell us the your interest and other strengths.</label>
										<textarea class="form-control" name="affordabilitydesc" rows="8"><?php the_field( "judg_affordability_description", $post_id )?></textarea>
									</div>
								</div>
							</div>
						</div>
						<div class="step-buttons">
							<button type="button" id="back-btn" class="step-btn" data-toggle="modal" data-target="#cancelModal">Back</button>
							<button type="submit" id="save-btn" name="save" class="step-btn">Save</button>
							<button type="submit" id="next-btn" name="next" class="step-btn">Next</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="modal fade action-modal" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="action-modal-content">
					<h2>Exiting document submission page</h2>
					<p>Exiting document submission page without saving will lose all information you filled in.</p>
					<div class="action-modal-button">
						<button data-dismiss="modal" aria-label="Close">Cancel</button>
						<button type="submit">Okay</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
jQuery(document).ready(function($) {
	$("#save-btn").prop('disabled', true);
	$("#save-btn").addClass('disabled-button');
	$('.conditional-notes').hide();

	var affordability = $("input[name='affordability']:checked").val();
	var usage = $("input[name='usage']:checked").val();
	var scalability = $("input[name='scalability']:checked").val();
	var accessibility = $("input[name='accessibility']:checked").val();
	var durability = $("input[name='durability']:checked").val();
	
	if (affordability == 'Yes') {
		$('#affordability_area').show();
		$('#affordability_area .yes-notes').show();
		$('#affordability_area .no-notes').hide();
	} else if (affordability == 'No') {
		$('#affordability_area').show();
		$('#affordability_area .yes-notes').hide();
		$('#affordability_area .no-notes').show();
	}

	if (usage == 'Yes') {
		$('#usage_area').show();
		$('#usage_area .yes-notes').show();
		$('#usage_area .no-notes').hide();
	} else if (usage == 'No') {
		$('#usage_area').show();
		$('#usage_area .yes-notes').hide();
		$('#usage_area .no-notes').show();
	}

	if (scalability == 'Yes') {
		$('#scalability_area').show();
		$('#scalability_area .yes-notes').show();
		$('#scalability_area .no-notes').hide();
	} else if (scalability == 'No') {
		$('#scalability_area').show();
		$('#scalability_area .yes-notes').hide();
		$('#scalability_area .no-notes').show();
	}

	if (accessibility == 'Yes') {
		$('#accessibility_area').show();
		$('#accessibility_area .yes-notes').show();
		$('#accessibility_area .no-notes').hide();
	} else if (accessibility == 'No') {
		$('#accessibility_area').show();
		$('#accessibility_area .yes-notes').hide();
		$('#accessibility_area .no-notes').show();
	}

	if (durability == 'Yes') {
		$('#durability_area').show();
		$('#adurability_area .yes-notes').show();
		$('#durability_area .no-notes').hide();
	} else if (durability == 'No') {
		$('#durability_area').show();
		$('#durability_area .yes-notes').hide();
		$('#durability_area .no-notes').show();
	}
	
	if (allFilled()) {
		$("#next-btn").prop('disabled', false);
		$("#next-btn").removeClass( "disabled-button" );
	} else {
		$("#next-btn").prop('disabled', true);
		$("#next-btn").addClass( "disabled-button" );
	}

	set = 250;
	remain = 250;
	$('.text-count').text(remain +' / '+ set);

	$(".steps-progress ul li#step-1").hover(function(){
		$(".steps-progress h3").text( "General Information" );
	}, function(){
		$(".steps-progress h3").text( "Product Information" );
	});

	$(".steps-progress ul li#step-3").hover(function(){
		$(".steps-progress h3").text( "Team Information" );
	}, function(){
		$(".steps-progress h3").text( "Product Information" );
	});

	$(".steps-progress ul li#step-4").hover(function(){
		$(".steps-progress h3").text( "Requirements" );
	}, function(){
		$(".steps-progress h3").text( "Product Information" );
	});

	$(".steps-progress ul li#step-5").hover(function(){
		$(".steps-progress h3").text( "Legal Document & Competitive Agreement" );
	}, function(){
		$(".steps-progress h3").text( "Product Information" );
	});

	$(".steps-progress ul li#step-6").hover(function(){
		$(".steps-progress h3").text( "Upload Files" );
	}, function(){
		$(".steps-progress h3").text( "Product Information" );
	});

	$(".steps-progress ul li#step-7").hover(function(){
		$(".steps-progress h3").text( "Pay Registration Fee & Submit" );
	}, function(){
		$(".steps-progress h3").text( "Product Information" );
	});
	
	$('#cancelModal button[type=submit]').click(function(e) {
		window.location.href = '/user-submission-step1/';
	});

	$('#step2-form input').bind('keyup', function() {
		if(allFilled()) {
			$("#next-btn").prop('disabled', false);
			$("#next-btn").removeClass( "disabled-button" );
			$("#save-btn").prop('disabled', false);
			$("#save-btn").removeClass( "disabled-button" );
		}
		else{
			$("#save-btn").prop('disabled', false);
			$("#save-btn").removeClass( "disabled-button" );
			$("#next-btn").prop('disabled', true);
			$("#next-btn").addClass( "disabled-button" );
		}
	});

	$('#step2-form textarea').bind('keyup', function() {
		if(allFilled()) {
			$("#next-btn").prop('disabled', false);
			$("#next-btn").removeClass( "disabled-button" );
			$("#save-btn").prop('disabled', false);
			$("#save-btn").removeClass( "disabled-button" );
		}
		else{
			$("#save-btn").prop('disabled', false);
			$("#save-btn").removeClass( "disabled-button" );
			$("#next-btn").prop('disabled', true);
			$("#next-btn").addClass( "disabled-button" );
		}
	});

	$('#step2-form input[type="radio"]').bind('click', function() {
		if(allFilled()) {
			$("#next-btn").prop('disabled', false);
			$("#next-btn").removeClass( "disabled-button" );
			$("#save-btn").prop('disabled', false);
			$("#save-btn").removeClass( "disabled-button" );
		}
		else{
			$("#save-btn").prop('disabled', false);
			$("#save-btn").removeClass( "disabled-button" );
			$("#next-btn").prop('disabled', true);
			$("#next-btn").addClass( "disabled-button" );
		}
	});

	$('#valid-error').show(1).delay(1500).hide(1);

	$("#step2-form").validate({
		rules: {
			productDescription: {
				maxlength: 250
			},
		}
	});

	$('#productDescription').keydown(function() {
		if (Math.max(0, 250 - this.value.length) == 0){
			$("#save-btn").prop('disabled', true);
			$("#save-btn").addClass( "disabled-button" );
		} else {
			$("#save-btn").prop('disabled', false);
			$("#save-btn").removeClass( "disabled-button" );
		}
		$('.text-count').text(
			Math.max(0, 250 - this.value.length) + ' / 250'
		)
	});

	function allFilled() {
		var filled = true;
		$('#step2-form input').each(function() {
			if($(this).val() == '') filled = false;
		});
		$('#step2-form textarea').each(function() {
			if($(this).val() == '') filled = false;
		});
		$('#step2-form input[type ="radio"]').each(function() {
			if($(this).val() == '') filled = false;
		});
		return filled;
	}
});
</script>
<?php
} else {
	wp_redirect( home_url('login') );
	exit;
}

get_footer();