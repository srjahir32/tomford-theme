<?php
/**
 * Template Name: User Submission Step1
 */

get_header();

global $current_user, $user_ID;

$post_id = 0;
$args = array(
	'author' => $current_user->ID,
	'post_type' => 'user_submission',
	'posts_per_page' => -1,
	'orderby' => 'post_date',
	'order' => 'ASC',
);
$current_user_posts = get_posts($args);
$total = count($current_user_posts);
if ($total > 0) {
	$post_id = $current_user_posts[0]->ID;
}

if (isset($_POST['currentStep']) && $_POST['currentStep'] == 1) {
	if ($post_id == 0) {
		$post_id = wp_insert_post(array(
			'post_status' => 'publish',
			'post_type' => 'user_submission',
			'post_author' => $user_ID,
			'post_title' => $_POST['organization'],
		));
	}

	update_post_meta($post_id, 'orgnization', $_POST['organization']);
	update_post_meta($post_id, 'first_name', $_POST['firstName']);
	update_post_meta($post_id, 'last_name', $_POST['lastName']);
	update_post_meta($post_id, 'title', $_POST['title']);
	update_post_meta($post_id, 'email', $_POST['email']);
	update_post_meta($post_id, 'phone_number', $_POST['phone']);
	update_post_meta($post_id, 'address', $_POST['address']);
	update_post_meta($post_id, 'city', $_POST['city']);
	update_post_meta($post_id, 'state', $_POST['state']);
	update_post_meta($post_id, 'zip_code', $_POST['zipcode']);
	update_post_meta($post_id, 'country', $_POST['country']);

	$updated = update_user_meta($user_ID, 'current_step', $_POST['currentStep']);

	if (isset($_POST['next'])) {
		wp_redirect(home_url('user-submission-step2'));
	}
}

if ($user_ID) {
	$user_current_step = get_user_meta($user_ID, 'current_step', true);
?>

<section class="portal-tabs">
	<div class="container-fluid">
		<?php get_template_part( 'template-parts/tab-content' ); ?>
		<div class="submission-form">
			<div class="submission-form-title">
				<h2>Submitting documents</h2>
			</div>
			<div class="submission-step active">
				<div class="steps-progress">
					<h3>General information</h3>
					<div class="step-progress-box">
						<ul>
							<li id="step-1" class="active"></li>
							<li id="step-2"></li>
							<li id="step-3"></li>
							<li id="step-4"></li>
							<li id="step-5"></li>
							<li id="step-6"></li>
							<li id="step-7"></li>
						</ul>
					</div>
				</div>
				<h2>Primary contact information</h2>
				<div class="step-form">
					<form id="step1-form" action="" method="post">
						<input type="hidden" name="post_id" value="<?php echo $post_id; ?>" id="current_post_id">
						<input type="hidden" name="currentStep" value="1">
						<div class="form-group">
							<label>Name of the organization/company</label>
							<input type="text" name="organization" class="form-control" value="<?php the_field( "orgnization", $post_id )?>">
						</div>
						<div class="form-row">
							<div class="form-group col">
								<label>First Name</label>
								<input type="text" name="firstName" class="form-control" value="<?php the_field( "first_name", $post_id)?>">
							</div>
							<div class="form-group col">
								<label>Last Name</label>
								<input type="text" name="lastName" class="form-control" value="<?php the_field( "last_name", $post_id )?>">
							</div>
						</div>
						<div class="form-group">
							<label>Title</label>
							<input type="text" name="title" class="form-control" value="<?php the_field( "title", $post_id )?>">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control" value="<?php the_field( "email", $post_id )?>">
						</div>
						<div class="form-group">
							<label>Phone Number</label>
							<input type="text" name="phone" class="form-control" data-inputmask="'mask': '+1 (999)-999-9999'" value="<?php the_field( "phone_number", $post_id )?>" >
						</div>
						<div class="form-group">
							<label>Address</label>
							<input type="text" name="address" class="form-control" value="<?php the_field( "address", $post_id )?>">
						</div>
						<div class="form-row">
							<div class="form-group col">
								<label>City</label>
								<input type="text" name="city" class="form-control" value="<?php the_field( "city", $post_id )?>">
							</div>
							<div class="form-group col">
								<label>State</label>
								<input type="text" name="state" class="form-control" value="<?php the_field( "state", $post_id )?>">
							</div>
							<div class="form-group col">
								<label>Zipcode</label>
								<input type="text" name="zipcode" class="form-control" data-inputmask="'mask': '99999'" value="<?php the_field( "zip_code", $post_id )?>">
							</div>
						</div>
						<div class="form-group">
							<label>Country</label>
							<input type="text" name="country" class="form-control" value="<?php the_field( "country", $post_id )?>" >
						</div>
						<div class="step-buttons">
							<button type="button" id="cancel-btn" class="step-btn" data-toggle="modal" data-target="#cancelModal">Cancel</button>
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

	if (allFilled()) {
		$("#next-btn").prop('disabled', false);
		$("#next-btn").removeClass("disabled-button");
	} else {
		$("#next-btn").prop('disabled', true);
		$("#next-btn").addClass("disabled-button");
	}

	$(".steps-progress ul li#step-2").hover(function(){
		$( ".steps-progress h3" ).text( "Product Information" );
	}, function(){
		$(".steps-progress h3").text( "General Information" );
	});

	$(".steps-progress ul li#step-3").hover(function(){
		$( ".steps-progress h3" ).text( "Team Information" );
	}, function(){
		$(".steps-progress h3").text( "General Information" );
	});

	$(".steps-progress ul li#step-4").hover(function(){
		$( ".steps-progress h3" ).text( "Requirements" );
	}, function(){
		$(".steps-progress h3").text( "General Information" );
	});

	$(".steps-progress ul li#step-5").hover(function(){
		$( ".steps-progress h3" ).text( "Legal Document & Competitive Agreement" );
	}, function(){
		$(".steps-progress h3").text( "General Information" );
	});

	$(".steps-progress ul li#step-6").hover(function(){
		$( ".steps-progress h3" ).text( "Upload Files" );
	}, function(){
		$(".steps-progress h3").text( "General Information" );
	});

	$(".steps-progress ul li#step-7").hover(function(){
		$( ".steps-progress h3" ).text( "Pay Registration Fee & Submit" );
	}, function(){
		$(".steps-progress h3").text( "General Information" );
	});

	$('#cancelModal button[type=submit]').click(function(e) {
		window.location.href = '/user-dashboard/';
	});

	$("#next-btn").click(function() {
		$("#step1-form").validate({
			rules: {
				country: {
					required:true
				},
			}
		});
	});

	$('#step1-form input').bind('keyup', function() {
		if(allFilled()) {
			$("#next-btn").prop('disabled', false);
			$("#next-btn").removeClass("disabled-button");
			$("#save-btn").prop('disabled', false);
			$("#save-btn").removeClass("disabled-button");
		}
		else{
			$("#save-btn").prop('disabled', false);
			$("#save-btn").removeClass("disabled-button");
			$("#next-btn").prop('disabled', true);
			$("#next-btn").addClass("disabled-button");
		}
	});

	$('#valid-error').show(1).delay(1500).hide(1);

	$("#step1-form").validate({
		rules: {
			email: {
				email: true
			},
		}
	});

	function allFilled() {
		var filled = true;
		$('#step1-form input').each(function() {
			if ($(this).val() == '')
				filled = false;
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