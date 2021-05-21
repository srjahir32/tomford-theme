<?php
/**
 ** Template Name: User Dashboard
 */

get_header();

global $current_user, $user_ID;

if (isset($_POST['currentStep']) && $_POST['currentStep'] == 1) {
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
	if ($post_id == 0) {
		$post_id = wp_insert_post( array(
			'post_status' => 'publish',
			'post_type' => 'user_submission',
			'post_title' => "",
			'post_author' => $user_ID
		));
	}

	$updated = update_user_meta($user_ID, 'current_step', $_POST['currentStep']);
	wp_redirect(home_url('user-submission-step1'));
}

if ($user_ID) {
	$user_current_step = get_user_meta($user_ID, 'current_step', true);
?>
<section class="portal-tabs">
	<div class="container-fluid">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item" role="presentation">
				<a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">General</a>
			</li>
			<li class="nav-item" role="presentation">
				<a class="nav-link" id="user-tab" data-toggle="tab" href="#user" role="tab" aria-controls="user" aria-selected="false">User</a>
			</li>
			<li class="nav-item" role="presentation">
				<a class="nav-link" id="faq-tab" data-toggle="tab" href="#faq" role="tab" aria-controls="faq" aria-selected="false">Faq</a>
			</li>
		</ul>
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
				<div class="general-tab-content">
					<div class="document-submission">
						<div class="document-status">
						<?php if ($user_current_step >= 7) { ?>
							<h2>You have successfully submitted your documents! Stay tuned for updates from the 52hz team.</h2>
						<?php } ?>
						<?php if ($user_current_step >= 1 && $user_current_step < 7) { ?>
							<h2>You have not submitted your documents yet</h2>
							<a href="<?php echo site_url('user-submission-step') . $user_current_step; ?>"; >Continue my submission</a>
						<?php } ?>
						<?php if ($user_current_step == 0) { ?>
							<h2>You have not started your submission</h2>
							<a href="/user-submission-step1/" data-toggle="modal" data-target="#submissionModal">Start my submission</a>
						<?php } ?>
						</div>
					</div>
					<div class="timeline-content">
						<ul>
						<?php
						$evntargs = array(
							'post_type' => 'tm_event',
							'post_status' => 'publish',
							'posts_per_page' => -1,
							'meta_query' => array(
								'relation' => 'OR',
								array(
									'key' => 'event_category',
									'value' => '1',
									'compare' => '=',
								),
								array(
									'key' => 'event_category',
									'compare' => 'NOT EXISTS',
								),
							),
							'meta_key' => 'event_date',
							'orderby' => 'meta_value',
							'order' => 'ASC',
						);
						$myevnt_query = new WP_Query($evntargs);
						while ($myevnt_query->have_posts() ) : $myevnt_query->the_post();
							$evntdate = get_field('event_date');
							echo '<li>';
							echo '<h2>' . $evntdate . '</h2>';
							echo '<div>' . get_the_content() . '</div>';
							echo '</li>';
						endwhile;
						wp_reset_postdata();
						?>
						</ul>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="user" role="tabpanel" aria-labelledby="user-tab">
				<div class="user-account">
					<div class="form-group">
						<label>Email address</label>
						<input type="email" class="form-control" value="<?php echo $current_user->data->user_login ?>" placeholder="Enter Email Address" readonly>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" value="********" placeholder="Enter Password" readonly>
						<button class="change-password" data-toggle="modal" data-target="#changepasswordModal">Change password</button>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="faq" role="tabpanel" aria-labelledby="faq-tab">
				<div class="user-faq-content">
				<?php
				$args = array(
					'post_type' => 'faq',
					'post_status' => 'publish',
					'posts_per_page' => 10,
					'orderby' => 'title',
					'order' => 'ASC',
				);
				$my_query = new WP_Query($args);
				while ($my_query->have_posts() ) : $my_query->the_post();
					echo '<div class="faq-box">';
					echo '<div class="faq-question">';
					echo '<h2>' . get_the_title() . '</h2>';
					echo '</div>';
					echo '<div class="faq-answer">' . get_the_content() . '</div>';
					echo '</div>';
				endwhile;
				wp_reset_postdata();
				?>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="modal fade" id="submissionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="submission-modal-content">
					<form id="step0-form" method="POST" action="">
						<h2>you are about to start your submission</h2>
						<input type="hidden" name="currentStep" value="1">
						<div class="form-check">
							<input type="checkbox" name="term" id="terms_cond" class="form-check-input" value="">
							<label class="form-check-label">I agree to <a href="<?php echo home_url(); ?>/wp-content/uploads/2021/01/terms-and-conditions-template.pdf" target="_blank">legal terms</a> and <a href="<?php echo home_url(); ?>/wp-content/uploads/2021/01/terms-and-conditions-template.pdf" target="_blank">privacy policy</a></label>
						</div>
						<div class="agreement-btns">
							<button data-dismiss="modal" aria-label="Close">Cancel</button>
							<a href="javascript:void(0);" onclick="validate_term()">Start</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal action-modal fade" id="changepasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="action-modal-content reset-password-box">
					<div class="form-group">
						<label>New Password</label>
						<input type="password" class="form-control" value="" placeholder="Enter New Password">
					</div>
					<div class="form-group">
						<label>Confirm Password</label>
						<input type="password" class="form-control" value="" placeholder="Confirm Password">
					</div>
					<div class="action-modal-button">
						<button data-dismiss="modal" aria-label="Close">Cancel</button>
						<button type="submit">Confirm</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
$ = jQuery;
function validate_term() {
	if ($('#terms_cond').is(":checked")){
		//window.location.href = 'user-submission-step1';
		$('#step0-form').submit();
		return true;
	} else {
		alert('You must agree to the terms first.');
		return false;
	}
}
</script>
<?php
} else {
	wp_redirect( home_url('login') );
	exit;
}

get_footer();