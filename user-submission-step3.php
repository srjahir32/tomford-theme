<?php
/**
 * Template Name: User Submission Step3
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

$args2 = array(
	'author' => $current_user->ID,
	'post_type' => 'team_members',
	'posts_per_page' => -1,
	'orderby' => 'post_date',
	'order' => 'ASC',
);

$current_user_posts = get_posts( $args );
$current_user_teams = get_posts( $args2 );
$total = count($current_user_posts);
$totalTeams = count($current_user_teams);
if ($total > 0 ) {
	$post_id = $current_user_posts[0]->ID;
}
if (isset($_POST['currentStep']) && $_POST['currentStep'] == 3) {
	$count = sizeof($_POST['first_name']);
	for ($x = 0; $x < $count; $x++) {
		if ($_POST['existing_post_id'][$x]) {
			$existing_post_detail=$_POST['existing_post_id'][$x];
			update_post_meta($existing_post_detail, 'email', $_POST['email'][$x]);
			update_post_meta($existing_post_detail, 'first_name', $_POST['first_name'][$x]);
			update_post_meta($existing_post_detail, 'last_name', $_POST['last_name'][$x]);
			update_post_meta($existing_post_detail, 'title', $_POST['title'][$x]);
		} else {
			$post_id = wp_insert_post(array(
				'post_status' => 'publish',
				'post_type' => 'team_members',
				'post_title' => 'Team',
				'post_author' => $user_ID

			));
			update_post_meta($post_id, 'email', $_POST['email'][$x]);
			update_post_meta($post_id, 'first_name', $_POST['first_name'][$x]);
			update_post_meta($post_id, 'last_name', $_POST['last_name'][$x]);
			update_post_meta($post_id, 'title', $_POST['title'][$x]);
		}
	}

	$updated = update_user_meta($user_ID, 'current_step', $_POST['currentStep']);
	$user_current_step = get_user_meta($user_ID, 'current_step', true);
	$url_red = get_permalink();
	if (isset($_POST['next'])) {
		wp_redirect( home_url('user-submission-step4') );
	} else {
		header("location:" . $url_red);
	}
	unset($_POST);
	unset($_POST['currentStep']);
	unset($_POST['email']);
	unset($_POST['last_name']);
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
			<!-- Step 3 -->
			<div class="submission-step active">
				<div class="steps-progress">
					<h3>Team Information</h3>
					<div class="step-progress-box">
						<ul>
							<li id="step-1" class="active"><a href="/user-submission-step1/"></a></li>
							<li id="step-2" class="active"><a href="/user-submission-step2/"></a></li>
							<li id="step-3" class="active"></li>
							<li id="step-4"></li>
							<li id="step-5"></li>
							<li id="step-6"></li>
							<li id="step-7"></li>
						</ul>
					</div>
				</div>
				<form id="step3-form" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
					<input type="hidden" name="post_id" value="<?=$post_id;?>" id="current_post_id">
					<input type="hidden" name="currentStep" value="3">
					<div class="team-members-wrap">
						<div class="team-member">
						<?php if($totalTeams > 0) {
							foreach($current_user_teams as $key => $team) {
							?> 
							<h2>Team Member <span id="increment"><?=$key+1;?></span></h2>
							<input type="hidden" name="existing_post_id[]" value="<?=$team->ID; ?>">
							<div class="step-form">
								<div class="form-row">
									<div class="form-group col">
										<div class="conditional-notes1">
											<label>First Name</label>
											<input type="text" name="first_name[]" class="form-control" value="<?php the_field( "first_name", $team->ID )?>">
										</div>
									</div>
									<div class="form-group col">
										<div class="conditional-notes1">
											<label>Last Name</label>
											<input type="text" name="last_name[]" class="form-control" value="<?php the_field( "last_name", $team->ID )?>">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="conditional-notes1">
										<label>Title</label>
										<input type="text" name="title[]" class="form-control" value="<?php the_field( "title", $team->ID )?>">
									</div>
								</div>
								<div class="form-group">
									<div class="conditional-notes1">
										<label>Email</label>
										<input type="email" name="email[]" class="form-control" value="<?php the_field( "email", $team->ID )?>">
									</div>
								</div>
							</div>
							<?php }
						} else { ?>
							<div class="step-form">
								<div class="form-row">
									<div class="form-group col">
										<div class="conditional-notes1">
											<label>First Name</label>
											<input type="text" name="first_name[]" class="form-control">
										</div>
									</div>
									<div class="form-group col">
										<div class="conditional-notes1">
											<label>Last Name</label>
											<input type="text" name="last_name[]" class="form-control">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="conditional-notes1">
										<label>Title</label>
										<input type="text" name="title[]" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<div class="conditional-notes1">
										<label>Email</label>
										<input type="email" name="email[]" class="form-control">
									</div>
								</div>
							</div>
						<?php } ?>
						</div>
						<div class="team-member" id="add_new_team_member">
						</div>
					</div>
					<button type="button" id="add-team-member">Add another team member</button>
					<div class="step-buttons">
						<button type="button" id="back-btn" class="step-btn" data-toggle="modal" data-target="#cancelModal">Back</button>
						<button type="submit" id="save-btn" name="save" class="step-btn">Save</button>
						<button type="submit" id="next-btn" name="next" class="step-btn">Next</button>
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

	if (allFilled()){
		$("#save-btn").prop('disabled', false);
		$("#save-btn").removeClass( "disabled-button" );
	} else {
		$("#save-btn").prop('disabled', true);
		$("#save-btn").addClass( "disabled-button" );
	}

	$(".steps-progress ul li#step-1").hover(function(){
		$( ".steps-progress h3" ).text( "General Information" );
	}, function(){
		$(".steps-progress h3").text( "Team Information" );
	});
	
	$(".steps-progress ul li#step-2").hover(function(){
		$( ".steps-progress h3" ).text( "Product Information" );
	}, function(){
		$(".steps-progress h3").text( "Team Information" );
	});

	$(".steps-progress ul li#step-4").hover(function(){
		$( ".steps-progress h3" ).text( "Requirements" );
	}, function(){
		$(".steps-progress h3").text( "Team Information" );
	});

	$(".steps-progress ul li#step-5").hover(function(){
		$( ".steps-progress h3" ).text( "Legal Document & Competitive Agreement" );
	}, function(){
		$(".steps-progress h3").text( "Team Information" );
	});

	$(".steps-progress ul li#step-6").hover(function(){
		$( ".steps-progress h3" ).text( "Upload Files" );
	}, function(){
		$(".steps-progress h3").text( "Team Information" );
	});

	$(".steps-progress ul li#step-7").hover(function(){
		$( ".steps-progress h3" ).text( "Pay Registration Fee & Submit" );
	}, function(){
		$(".steps-progress h3").text( "Team Information" );
	});

	$('#cancelModal button[type=submit]').click(function(e) {
		window.location.href = '/user-submission-step2/';
	});

	$("#step3-form").validate({
		rules: {
			"first_name[]": "required",
			"last_name[]": "required",
			"title[]": "required",
			"email[]": "required"
		}
	});

	$('#step3-form input').bind('keyup', function() {
		if(allFilled()) {
			$("#save-btn").prop('disabled', false);
			$("#save-btn").removeClass( "disabled-button" );
		} else {
			$("#save-btn").prop('disabled', false);
			$("#save-btn").removeClass( "disabled-button" );
		}
	});

	function allFilled() {
		var filled = true;
		$('#step3-form input').each(function() {
			if($(this).val() == '')
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