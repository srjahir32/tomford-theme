<?php
/**
 * Template Name: User Submission Step4
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
$current_user_posts = get_posts( $args );
$total = count($current_user_posts);
if ($total > 0) {
	$post_id = $current_user_posts[0]->ID;
}

if (isset($_POST['currentStep']) && $_POST['currentStep'] == 4) {
	update_post_meta($post_id, 'requirement', $_POST['documentAgreement']);
	$updated = update_user_meta($user_ID, 'current_step', $_POST['currentStep']);
	if (isset($_POST['next'])) {
		wp_redirect(home_url('user-submission-step5'));
	}
}
	
if ($user_ID) {
	$user_current_step = get_user_meta($user_ID, 'current_step', true);
	$requirment = get_field( "requirement", $post_id );
?>
<section class="portal-tabs">
	<div class="container-fluid">
		<?php get_template_part( 'template-parts/tab-content' );?>
		<div class="submission-form">
			<div class="submission-form-title">
				<h2>Submitting documents</h2>
			</div>
			<!-- Step 4 -->
			<div class="submission-step active">
				<div class="steps-progress">
					<h3>Requirements</h3>
					<div class="step-progress-box">
						<ul>
							<li id="step-1" class="active"><a href="/user-submission-step1/"></a></li>
							<li id="step-2" class="active"><a href="/user-submission-step2/"></a></li>
							<li id="step-3" class="active"><a href="/user-submission-step3/"></a></li>
							<li id="step-4" class="active"></li>
							<li id="step-5"></li>
							<li id="step-6"></li>
							<li id="step-7"></li>
						</ul>
					</div>
				</div>
				<div class="document-requirements judging-aspects">
					<h3>Judging Aspects</h3>
					<p>we will judge your documents base on the following areas. Atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
					<a href="<?php echo home_url(); ?>/wp-content/uploads/2021/01/terms-and-conditions-template.pdf" target="_blank">Plastic Innovation Prize Competition Guidelines</a>
					<br>
					<a href="<?php echo home_url(); ?>/wp-content/uploads/2021/01/terms-and-conditions-template.pdf" target="_blank">Design Brief</a>
				</div>
				<div class="document-requirements">
					<h3>Document Requirements</h3>
					<p>we will judge your documents base on the following areas. Atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
				</div>
				<form id="step4-form" action="" method="post">
					<input type="hidden" name="post_id" value="<?php echo $post_id?>" id="current_post_id">
					<input type="hidden" name="currentStep" value="4">
					<div class="document-agreement">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="Yes" name="documentAgreement" id="documentAgreement" <?php if( $requirment=="Yes") echo "checked" ?>>
							<label class="form-check-label">I understand</label>
						</div>
					</div>
					<div class="step-buttons">
						<button type="button" id="back-btn" class="step-btn" data-toggle="modal" data-target="#cancelModal">Back</button>
						<button type="submit" id="save-btn" class="step-btn">Save</button>
						<button type="submit" id="next-btn" class="step-btn" name="next">Next</button>
					</div>
				</form>
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
	$("#next-btn").prop('disabled', true);
	$("#next-btn").addClass('disabled-button');

	if ($('#documentAgreement').is(":checked")) {
		$("#save-btn").prop('disabled', true);
		$("#save-btn").addClass('disabled-button');
		$("#next-btn").prop('disabled', false);
		$("#next-btn").removeClass('disabled-button');
	}

	$(".steps-progress ul li#step-1").hover(function(){
		$( ".steps-progress h3" ).text( "General Information" );
	}, function(){
		$(".steps-progress h3").text( "Requirements" );
	});

	$(".steps-progress ul li#step-2").hover(function(){
		$( ".steps-progress h3" ).text( "Product Information" );
	}, function(){
		$(".steps-progress h3").text( "Requirements" );
	});

	$(".steps-progress ul li#step-3").hover(function(){
		$( ".steps-progress h3" ).text( "Team Information" );
	}, function(){
		$(".steps-progress h3").text( "Requirements" );
	});
	
	$(".steps-progress ul li#step-5").hover(function(){
		$( ".steps-progress h3" ).text( "Legal Document & Competitive Agreement" );
	}, function(){
		$(".steps-progress h3").text( "Requirements" );
	});

	$(".steps-progress ul li#step-6").hover(function(){
		$( ".steps-progress h3" ).text( "Upload Files" );
	}, function(){
		$(".steps-progress h3").text( "Requirements" );
	});

	$(".steps-progress ul li#step-7").hover(function(){
		$( ".steps-progress h3" ).text( "Pay Registration Fee & Submit" );
	}, function(){
		$(".steps-progress h3").text( "Requirements" );
	});

	$('#cancelModal button[type=submit]').click(function(e) {
		window.location.href = '/user-submission-step3/';
	});

	$("#documentAgreement").change(function() {
		var checked = $(this).is(":checked");
		if (checked) {
			$("#save-btn").prop('disabled', false);
			$("#save-btn").removeClass( "disabled-button" );
			$("#next-btn").prop('disabled', false);
			$("#next-btn").removeClass( "disabled-button" );
		} else {
			$("#next-btn").prop('disabled', true);
			$("#next-btn").addClass( "disabled-button" );
			$("#save-btn").prop('disabled', true);
			$("#save-btn").addClass( "disabled-button" );
		}
	});
});
</script>
<?php
} else {
	wp_redirect( home_url('login') );
	exit;
}

get_footer();