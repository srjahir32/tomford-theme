<?php
/**
 * Template Name: Team Portal Dashboard
 */

get_header();

global $user_ID;
if (!$user_ID) {
	wp_redirect(home_url('team-login'));
	exit;
}
?>
<section class="portal-tabs">
	<div class="container-fluid">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item" role="presentation">
				<a class="nav-link active" id="submission-tab" data-toggle="tab" href="#submission" role="tab" aria-controls="submission" aria-selected="true">Submissions</a>
			</li>
			<li class="nav-item" role="presentation">
				<a class="nav-link" id="judges-tab" data-toggle="tab" href="#judges" role="tab" aria-controls="judges" aria-selected="false">Judges</a>
			</li>
			<li class="nav-item" role="presentation">
				<span class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">
					<div class="dropdown">
						<a class="nav-link dropdown-toggle contacts-tab-dropdown" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Contacts</a>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item" id="advisor-main-tab" data-toggle="tab" href="#advisor" role="tab" aria-controls="advisor" aria-selected="true">Advisor</a>
							<a class="dropdown-item" id="investment-alliance-main-tab" data-toggle="tab" href="#investment-alliance" role="tab" aria-controls="investment-alliance" aria-selected="true">Investment Alliance</a>
						</div>
					</div>
				</span>
			</li>
			<li class="nav-item" role="presentation">
				<a class="nav-link" id="timeline-tab" data-toggle="tab" href="#timeline" role="tab" aria-controls="timeline" aria-selected="false">Timeline</a>
			</li>
		</ul>
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="submission" role="tabpanel" aria-labelledby="submission-tab">
				<div class="tab-buttons-bar">
					<div class="row">
						<div class="col text-right">
							<a href="#" id="download-in-progress-submitters">Get "In-Progress-Submitter" List</a>
						</div>
					</div>
				</div>
				<table class="table table-striped table-borderless team-portal-table">
					<thead>
						<tr>
							<th scope="col" class="nosort"><label for="select-all-products"><input class="form-check-input m-0" type="checkbox" id="select-all-products"> Submissions</label></th>
							<th scope="col" class="product-status"><span>Status</span></th>
							<th scope="col"><span>Progress</span></th>
							<th scope="col"><span>Rating</span></th>
							<th scope="col" class="nosort">Actions</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$user_query = new WP_User_Query(array('role' => 'judge'));
					$judges = $user_query->get_results();
					$judges_count = (int)$user_query->get_total();

					$product_status_obj = array("choices" => array(
						"accepted" => "Accepted",
						"pending" => "Pending",
						"criteria" => "Does Not Meet Criteria",
						"unreviewed" => "Unreviewed",
					));

					$args = array(
						'post_type' => 'user_submission',
						'post_status' => 'publish',
						'posts_per_page' => -1,
						'orderby' => 'title',
						'order' => 'ASC',
					);
					$submissions = new WP_Query($args);
					$submission_count = $submissions->found_posts;
					while ($submissions->have_posts()) : $submissions->the_post();
						$product_id = get_the_ID();
						$submission_link = get_permalink();
						$author_id = $post->post_author;
						$author_name = get_the_author_meta('display_name');
						$author_email = get_the_author_meta('user_email');
						//$author_email = get_field('email');
						//$author = get_user_by('email', $author_email);
						//$author_id = $author->ID;
						//$author_name = $author->data->display_name;
						$frozen = get_field('frozen', 'user_' . $author_id);
						$freeze_label = $frozen ? "Unfreeze" : "Freeze";
						$closed = get_field('closed');
						$close_label = $closed ? "Open" : "Close";
						$product_name = get_field("product_name");
						$product_status_value = get_field("product_status");
						if (!$product_status_value) $product_status_value = "unreviewed";
						$product_status_label = $product_status_obj['choices'][$product_status_value];
						$product_status_order = "4";
						switch ($product_status_value) {
							case 'accepted':
								$product_status_order = "1";
								break;
							case 'pending':
								$product_status_order = "2";
								break;
							case 'criteria':
								$product_status_order = "3";
								break;
						}
						$product_evaluations = get_field("product_evaluations");
						$product_evaluations_count = 0;
						$product_progress = "-";
						$rating_total = "-";
						if (is_array($product_evaluations)) {
							$product_evaluations_count = count($product_evaluations);
							$product_progress = 0;
							$rating_total = 0;
							foreach ($product_evaluations as $product_evaluation) {
								/*if ($product_status_value == "accepted")*/
								if ($product_evaluation['durability'] &&
									$product_evaluation['scalability'] &&
									$product_evaluation['accessibility'] &&
									$product_evaluation['usage'] &&
									$product_evaluation['affordability']) {
									$rating_total += $product_evaluation['durability'];
									$rating_total += $product_evaluation['scalability'];
									$rating_total += $product_evaluation['accessibility'];
									$rating_total += $product_evaluation['usage'];
									$rating_total += $product_evaluation['affordability'];
									$product_progress++;
								}
								$product_evals[$product_evaluation['judge']->data->ID][] = searchEvaluationByJudge($product_evaluation['judge']->data->ID, $product_evaluations);
							}
							if ($product_progress == 0) {
								$product_progress = "-";
								$rating_total = "-";
							} else {
								$product_progress = $product_progress . "/" . $judges_count;
								$rating_total = number_format($rating_total / ($product_evaluations_count * 5.0), 2, '.', ',');
							}
						}
						?>
						<tr>
							<td>
								<label for="select-product-<?php echo $product_id; ?>">
									<input class="select-product form-check-input m-0" type="checkbox" id="select-product-<?php echo $product_id; ?>"> <?php echo $product_name; ?>
								</label>
							</td>
							<td class="product-status" data-status="<?php echo $product_status_value; ?>" data-sort="<?php echo $product_status_order; ?>">
								<h4 class="submission-status"><?php echo $product_status_label; ?></h4>
							</td>
							<td data-sort="<?php echo $product_evaluations_count; ?>"><?php echo $product_progress; ?></td>
							<td data-sort="<?php echo $rating_total; ?>"><?php echo $rating_total; ?></td>
							<td data-product="<?php echo $product_id; ?>">
								<div class="dropdown">
									<a class="nav-link dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
									<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										<a class="dropdown-item" href="<?php echo $submission_link; ?>">View</a>
										<a class="dropdown-item" data-toggle="modal" data-target="#actionResetPassword" data-author="<?php echo $author_id; ?>" data-email="<?php echo $author_email; ?>">Reset Password</a>
										<a class="dropdown-item freeze-account" data-toggle="modal" data-target="#actionFreezeAccount" data-author="<?php echo $author_id; ?>" data-email="<?php echo $author_email; ?>" data-frozen="<?php echo $frozen; ?>"><?php echo $freeze_label; ?> Account</a>
										<a class="dropdown-item close-submission" data-toggle="modal" data-target="#actionCloseSubmission" data-product="<?php echo $product_id; ?>" data-email="<?php echo $author_email; ?>" data-frozen="<?php echo $closed; ?>"><?php echo $close_label; ?> Submission</a>
										<a class="dropdown-item" data-toggle="modal" data-target="#actionMessage" data-submitter="<?php echo $author_name; ?>" data-product="<?php echo $product_name; ?>" data-email="<?php echo $author_email; ?>">Message</a>
										<a class="dropdown-item change-status" href="#">Change Status</a>
										<a class="dropdown-item sub-dropdown-item" data-status="accepted" href="#">Accepted</a>
										<a class="dropdown-item sub-dropdown-item" data-status="pending" href="#">Pending Materials</a>
										<a class="dropdown-item sub-dropdown-item" data-status="criteria" href="#">Does Not Meet Criteria</a>
										<a class="dropdown-item sub-dropdown-item" data-status="unreviewed" href="#">Unreviewed</a>
									</div>
								</div>
							</td>
						</tr>
						<?php
					endwhile;
					wp_reset_postdata();
					?>
					</tbody>
				</table>
				<div class="portal-footer">
					<div class="row">
						<div class="col-md-6 my-auto mobile-responsive-order-2">
						</div>
						<div class="col-md-6 my-auto mobile-responsive-order-1">
							<div class="notepad-button">
								<button data-toggle="modal" data-target="#notepadModal">Notepad</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="tab-pane fade" id="judges" role="tabpanel" aria-labelledby="judges-tab">
				<div class="tab-buttons-bar">
					<div class="row">
						<div class="col">
							<a href="#" data-toggle="modal" data-target="#inviteJudge">Invite Judge</a>
						</div>
					</div>
				</div>
				<table class="table table-striped table-borderless team-portal-table">
					<thead>
						<tr>
							<th scope="col" class="nosort">Judges</th>
							<th scope="col" class="nosort">Email</th>
							<th scope="col">Progress</th>
							<th scope="col" class="nosort">Actions</th>
						</tr>
					</thead>
					<tbody>
					<?php
					foreach ($judges as $judge) {
						$user_id = $judge->data->ID;
						$user_name = $judge->data->display_name;
						$user_email = $judge->data->user_email;
						$user_link = get_author_posts_url($user_id);
						$frozen = get_field('frozen', 'user_' . $user_id);
						$freeze_label = $frozen ? "Unfreeze" : "Freeze";
						$product_evaluated = 0;
						if (isset($product_evals[$user_id])) {
							foreach ($product_evals[$user_id] as $product_eval) {
								if ($product_eval['durability'] &&
									$product_eval['scalability'] &&
									$product_eval['accessibility'] &&
									$product_eval['usage'] &&
									$product_eval['affordability']) {
									$product_evaluated++;
								}
							}
						}
					?>
						<tr>
							<td><?php echo $user_name; ?></td>
							<td><?php echo $user_email; ?></td>
							<td data-sort="<?php echo count($product_evals[$user_id]); ?>"><?php echo $product_evaluated; ?>/<?php echo $submission_count; ?></td>
							<td>
								<div class="dropdown">
									<a class="nav-link dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
									<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										<a class="dropdown-item" data-toggle="modal" data-target="#actionResetPassword" data-author="<?php echo $user_id; ?>" data-email="<?php echo $user_email; ?>">Reset Password</a>
										<a class="dropdown-item freeze-account" data-toggle="modal" data-target="#actionFreezeAccount" data-author="<?php echo $user_id; ?>" data-email="<?php echo $user_email; ?>" data-frozen="<?php echo $frozen; ?>"><?php echo $freeze_label; ?> Account</a>
										<a href="<?php echo $user_link; ?>" class="dropdown-item">View Evaluation Process</a>
									</div>
								</div>
							</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
				<div class="portal-footer">
					<div class="row">
						<div class="col-md-6 my-auto mobile-responsive-order-2">
						</div>
						<div class="col-md-6 my-auto mobile-responsive-order-1">
							<div class="notepad-button">
								<button data-toggle="modal" data-target="#notepadModal">Notepad</button>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
				<div class="team-contact-tabs">
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item" role="presentation">
							<a class="nav-link active" id="advisor-tab" data-toggle="tab" href="#advisor" role="tab" aria-controls="advisor" aria-selected="true">Advisor</a>
						</li>
						<li class="divider">|</li>
						<li class="nav-item" role="presentation">
							<a class="nav-link" id="investment-alliance-tab" data-toggle="tab" href="#investment-alliance" role="tab" aria-controls="investment-alliance" aria-selected="false">Investment Alliance</a>
						</li>
					</ul>
				</div>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="advisor" role="tabpanel" aria-labelledby="advisor-tab">
						<table class="table table-striped table-borderless team-portal-table">
							<thead>
								<tr>
									<th scope="col">Name</th>
									<th scope="col">Title</th>
									<th scope="col">Email</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$args = array(
								'post_type' => 'peoples',
								'category_name' => 'prize-development-council',
								'post_status' => 'publish',
								'posts_per_page' => -1,
							);
							$advisors = new WP_Query($args);
							while ($advisors->have_posts()) : $advisors->the_post();
								?>
								<tr>
									<td><?php the_title(); ?></td>
									<td><?php echo get_field('title'); ?></td>
									<td><?php echo get_field('email'); ?></td>
								</tr>
							<?php
							endwhile;
							wp_reset_postdata();
							?>
							</tbody>
						</table>
					</div>
					<div class="tab-pane fade" id="investment-alliance" role="tabpanel" aria-labelledby="investment-alliance-tab">
						<table class="table table-striped table-borderless team-portal-table">
							<thead>
								<tr>
									<th scope="col">Name</th>
									<th scope="col">Title</th>
									<th scope="col">Email</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$args = array(
								'post_type' => 'peoples',
								'category_name' => 'investment-alliance',
								'post_status' => 'publish',
								'posts_per_page' => -1,
							);
							$investment_alliances = new WP_Query($args);
							while ($investment_alliances->have_posts()) : $investment_alliances->the_post();
								?>
								<tr>
									<td><?php the_title(); ?></td>
									<td><?php echo get_field('title'); ?></td>
									<td><?php echo get_field('email'); ?></td>
								</tr>
							<?php
							endwhile;
							wp_reset_postdata();
							?>
						</table>
					</div>
				</div>
			</div>

			<div class="tab-pane fade" id="timeline" role="tabpanel" aria-labelledby="timeline-tab">
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
								'value' => '3',
								'compare' => '<=',
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
	</div>
</section>

<div class="modal fade" id="inviteJudge" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<div class="invite-submission-form">
					<form action="" method="">
						<div class="form-group">
							<label>First Name</label>
							<input type="text" class="form-control" required="required">
						</div>
						<div class="form-group">
							<label>Last Name</label>
							<input type="text" class="form-control" required="required">
						</div>
						<div class="form-group">
							<label>Email Address</label>
							<input type="email" class="form-control" required="required">
						</div>
						<button type="submit">Invite</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade action-modal" id="actionResetPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="action-modal-content">
					<h2>You are about reset a user’s password</h2>
					<p>This will reset and create a random password for the user and send the user an email with new login.</p>
					<div class="action-modal-button">
						<input type="hidden" name="author_id" value="">
						<input type="hidden" name="author_email" value="">
						<button data-dismiss="modal" aria-label="Close">Cancel</button>
						<button type="submit">Reset</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade action-modal" id="actionFreezeAccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="action-modal-content">
					<h2>You are about <span class="freeze-unfreeze">freeze</span> this account</h2>
					<p class="freeze-message">This will disable this user to log in and will log out this user right now.</p>
					<p class="unfreeze-message">This will allow users to log in this account.</p>
					<div class="action-modal-button">
						<input type="hidden" name="author_id" value="">
						<input type="hidden" name="author_email" value="">
						<input type="hidden" name="freeze" value="freeze">
						<button data-dismiss="modal" aria-label="Close">Cancel</button>
						<button type="submit">Freeze</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade action-modal" id="actionCloseSubmission" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="action-modal-content">
					<h2>You are about <span class="freeze-unfreeze">close</span> this submission</h2>
					<p class="freeze-message">This submission will be closed.</p>
					<p class="unfreeze-message">This submission will be opened.</p>
					<div class="action-modal-button">
						<input type="hidden" name="product_id" value="">
						<input type="hidden" name="author_email" value="">
						<input type="hidden" name="freeze" value="close">
						<button data-dismiss="modal" aria-label="Close">Cancel</button>
						<button type="submit">Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="actionMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="action-message-modal">
					<h2>Message to <span class="message-submitter-name">Submitter name</span> (<span class="message-product-name">product name</span>)</h2>
					<form action="<?php echo admin_url('admin-ajax.php'); ?>" method="post">
						<input type="hidden" name="to" value="">
						<input type="hidden" name="subject" value="">
						<textarea class="form-control" name="message" rows="5" placeholder="Message here"></textarea>
						<div class="action-modal-button">
							<button data-dismiss="modal" aria-label="Close">Cancel</button>
							<button type="submit">Send</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="notepadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<div class="notepad-box">
					<h2>Notepad</h2>
					<form action="" method="">
					<?php
					$note = get_field('note_for_submissions', 'user_' . $user_ID);
					?>
						<input type="hidden" name="user_id" value="<?php echo $user_ID; ?>">
						<textarea name="note" id="" cols="30" rows="10" placeholder="Notes here" required><?php echo $note; ?></textarea>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
jQuery(document).ready(function() {
	<?php
	if (isset($_GET['tab'])) {
		if ($_GET['tab'] == 'submissions')
			echo "jQuery('#submission-tab').click();";
		else if ($_GET['tab'] == 'judges')
			echo "jQuery('#judges-tab').click();";
		else if ($_GET['tab'] == 'advisor')
			echo "jQuery('#advisor-main-tab').click();";
		else if ($_GET['tab'] == 'investment')
			echo "jQuery('#investment-alliance-main-tab').click();jQuery('#investment-alliance-tab').click();";
		else if ($_GET['tab'] == 'timeline')
			echo "jQuery('#timeline-tab').click();";
	}
	?>
	jQuery('#advisor-main-tab').click(function() {
		jQuery('#advisor-tab').click();
	});
	jQuery('#investment-alliance-main-tab').click(function() {
		jQuery('#investment-alliance-tab').click();
	});

	product_table = jQuery('#submission .team-portal-table').DataTable({
		"order": [1, "asc"],
		"columnDefs": [{
			"targets": 'nosort',
			"orderable": false
		}],
		"bLengthChange": false,
		"bFilter": false,
		"info": false,
	});
	jQuery('#judges .team-portal-table').DataTable({
		"order": [2, "desc"],
		"columnDefs": [{
			"targets": 'nosort',
			"orderable": false
		}],
		"bLengthChange": false,
		"bFilter": false,
		"info": false,
	});
	jQuery('#advisor .team-portal-table').DataTable({
		"ordering": false,
		"bLengthChange": false,
		"bFilter": false,
		"info": false,
	});
	jQuery('#investment-alliance .team-portal-table').DataTable({
		"ordering": false,
		"bLengthChange": false,
		"bFilter": false,
		"info": false,
	});

	jQuery('#download-in-progress-submitters').click(function(e) {
		e.preventDefault();
		jQuery.ajax({
			type: "post",
			url: ajax_url,
			data: {
				action: "download_in_progress_submitters"
			},
			success: function(response) {
				//Convert JSON Array to string.
				var json = JSON.parse(response);

				//Convert JSON string to BLOB.
				json = [json['list'].join('\n')];
				console.log(json);
				var blob1 = new Blob(json, { type: "text/plain;charset=utf-8" });

				//Check the Browser.
				var isIE = false || !!document.documentMode;
				if (isIE) {
					window.navigator.msSaveBlob(blob1, "in-progress-submitters.txt");
				} else {
					var url = window.URL || window.webkitURL;
					link = url.createObjectURL(blob1);
					var a = jQuery("<a />");
					a.attr("download", "in-progress-submitters.txt");
					a.attr("href", link);
					jQuery("body").append(a);
					a[0].click();
					jQuery("body").remove(a);
				}
			}
		});
	});

	jQuery(document).on('click', '.dropdown-item[data-target="#actionResetPassword"]', function() {
		jQuery('#actionResetPassword input[name=author_id]').val(jQuery(this).data('author'));
		jQuery('#actionResetPassword input[name=author_email]').val(jQuery(this).data('email'));
	});
	jQuery('#actionResetPassword button[type=submit]').click(function(e) {
		e.preventDefault();
		jQuery.ajax({
			type: "post",
			dataType: "json",
			url: ajax_url,
			data: {
				action: "reset_user_password",
				id: jQuery('#actionResetPassword input[name=author_id]').val(),
				to: jQuery('#actionResetPassword input[name=author_email]').val()
			},
			success: function(response) {
				console.log(response);
				if (response == false) {
					console.log('failed');
				} else {
					console.log('success');
				}
				jQuery('#actionResetPassword button[data-dismiss=modal]').click();
			}
		});
	});

	jQuery(document).on('click', '.dropdown-item[data-target="#actionFreezeAccount"]', function() {
		jQuery('#actionFreezeAccount input[name=author_id]').val(jQuery(this).data('author'));
		jQuery('#actionFreezeAccount input[name=author_email]').val(jQuery(this).data('email'));
		jQuery('#actionFreezeAccount').removeClass('frozen');
		jQuery('#actionFreezeAccount .freeze-unfreeze').html('freeze');
		jQuery('#actionFreezeAccount input[name=freeze]').val('freeze');
		jQuery('#actionFreezeAccount button[type=submit]').html('Freeze');
		if (jQuery(this).data('frozen') && jQuery(this).data('frozen') == "1") {
			jQuery('#actionFreezeAccount').addClass('frozen');
			jQuery('#actionFreezeAccount .freeze-unfreeze').html('unfreeze');
			jQuery('#actionFreezeAccount input[name=freeze]').val('unfreeze');
			jQuery('#actionFreezeAccount button[type=submit]').html('Unfreeze');
		}
	});
	jQuery('#actionFreezeAccount button[type=submit]').click(function(e) {
		e.preventDefault();
		jQuery.ajax({
			type: "post",
			dataType: "json",
			url: ajax_url,
			data: {
				action: "freeze_account",
				id: jQuery('#actionFreezeAccount input[name=author_id]').val(),
				to: jQuery('#actionFreezeAccount input[name=author_email]').val(),
				freeze: jQuery('#actionFreezeAccount input[name=freeze]').val()
			},
			success: function(response) {
				console.log(response);
				if (response == false) {
					console.log('failed');
				} else {
					console.log('success');
					if (jQuery('#actionFreezeAccount input[name=freeze]').val() == 'freeze') {
						jQuery('.freeze-account[data-author=' + jQuery('#actionFreezeAccount input[name=author_id]').val() + ']').html('Unfreeze Account');
						jQuery('.freeze-account[data-author=' + jQuery('#actionFreezeAccount input[name=author_id]').val() + ']').data('frozen', 1);
					} else {
						jQuery('.freeze-account[data-author=' + jQuery('#actionFreezeAccount input[name=author_id]').val() + ']').html('Freeze Account');
						jQuery('.freeze-account[data-author=' + jQuery('#actionFreezeAccount input[name=author_id]').val() + ']').data('frozen', 0);
					}
				}
				jQuery('#actionFreezeAccount button[data-dismiss=modal]').click();
			}
		});
	});

	jQuery(document).on('click', '.dropdown-item[data-target="#actionCloseSubmission"]', function() {
		jQuery('#actionCloseSubmission input[name=product_id]').val(jQuery(this).data('product'));
		jQuery('#actionCloseSubmission input[name=author_email]').val(jQuery(this).data('email'));
		jQuery('#actionCloseSubmission').removeClass('frozen');
		jQuery('#actionCloseSubmission .freeze-unfreeze').html('close');
		jQuery('#actionCloseSubmission input[name=freeze]').val('close');
		jQuery('#actionCloseSubmission button[type=submit]').html('Close');
		if (jQuery(this).data('frozen') && jQuery(this).data('frozen') == "1") {
			jQuery('#actionCloseSubmission').addClass('frozen');
			jQuery('#actionCloseSubmission .freeze-unfreeze').html('open');
			jQuery('#actionCloseSubmission input[name=freeze]').val('open');
			jQuery('#actionCloseSubmission button[type=submit]').html('Open');
		}
	});
	jQuery('#actionCloseSubmission button[type=submit]').click(function(e) {
		e.preventDefault();
		jQuery.ajax({
			type: "post",
			dataType: "json",
			url: ajax_url,
			data: {
				action: "close_submission",
				id: jQuery('#actionCloseSubmission input[name=product_id]').val(),
				to: jQuery('#actionCloseSubmission input[name=author_email]').val(),
				close: jQuery('#actionCloseSubmission input[name=freeze]').val()
			},
			success: function(response) {
				console.log(response);
				if (response == false) {
					console.log('failed');
				} else {
					console.log('success');
					if (jQuery('#actionCloseSubmission input[name=freeze]').val() == 'close') {
						jQuery('.close-submission[data-product=' + jQuery('#actionCloseSubmission input[name=product_id]').val() + ']').html('Open Submission');
						jQuery('.close-submission[data-product=' + jQuery('#actionCloseSubmission input[name=product_id]').val() + ']').data('frozen', 1);
					} else {
						jQuery('.close-submission[data-product=' + jQuery('#actionCloseSubmission input[name=product_id]').val() + ']').html('Close Submission');
						jQuery('.close-submission[data-product=' + jQuery('#actionCloseSubmission input[name=product_id]').val() + ']').data('frozen', 0);
					}
				}
				jQuery('#actionCloseSubmission button[data-dismiss=modal]').click();
			}
		});
	});

	jQuery(document).on('click', '.dropdown-item[data-target="#actionMessage"]', function() {
		jQuery('.message-submitter-name').html(jQuery(this).data('submitter'));
		jQuery('.message-product-name').html(jQuery(this).data('product'));
		jQuery('.action-message-modal input[name=to]').val(jQuery(this).data('email'));
		jQuery('.action-message-modal input[name=subject]').val('Message to ' + jQuery(this).data('submitter') + ' (' + jQuery(this).data('product') + ')');;
		jQuery('.action-message-modal textarea').val('');
	});
	jQuery('.action-message-modal button[type=submit]').click(function(e) {
		e.preventDefault();
		jQuery.ajax({
			type: "post",
			dataType: "json",
			url: ajax_url,
			data: {
				action: "send_message",
				to: jQuery('.action-message-modal input[name=to]').val(),
				subject: jQuery('.action-message-modal input[name=subject]').val(),
				message: jQuery('.action-message-modal textarea').val()
			},
			success: function(response) {
				console.log(response);
				if (response == false) {
					console.log('failed');
				} else {
					console.log('success');
				}
				jQuery('.action-message-modal button[data-dismiss=modal]').click();
			}
		});
	});

	status_key = ['accepted', 'pending', 'criteria', 'unreviewed'];
	status_label = ['Accepted', 'Pending', 'Does Not Meet Criteria', 'Unreviewed'];
	status_order = [1, 2, 3, 4];
	map_label = new Map();
	map_order = new Map();
	for (var i = 0; i < status_key.length; i++) {
		map_label.set(status_key[i], status_label[i]);
		map_order.set(status_key[i], status_order[i]);
	}
	jQuery(document).on('click', '.dropdown-menu .sub-dropdown-item', function(e) {
		e.preventDefault();
		product = jQuery(this).closest('td');
		product_id = jQuery(product).data('product');
		status = jQuery(this).data('status');
		jQuery.ajax({
			type: "post",
			dataType: "json",
			url: ajax_url,
			data: {
				action: "update_product_status",
				id: product_id,
				status: status,
			},
			success: function(response) {
				console.log(response);
				if (response == false) {
					console.log('failed');
				} else {
					console.log('success');
					jQuery(product).closest('tr').find('.product-status').attr('data-status', status);
					jQuery(product).closest('tr').find('.product-status').attr('data-sort', map_order.get(status));
					jQuery(product).closest('tr').find('.submission-status').html(map_label.get(status));
					product_table.row(jQuery(product).closest('tr')).invalidate().draw(false);
				}
			}
		});
	});

	jQuery('.notepad-box textarea').on('change paste', function() {
		jQuery.ajax({
			type: "post",
			dataType: "json",
			url: ajax_url,
			data: {
				action: "update_submissions_note",
				team_id: <?php echo $user_ID; ?>,
				note: jQuery(this).val(),
			},
			success: function(response) {
				console.log(response);
				if (response == false) {
					console.log('failed');
				} else {
					console.log('success');
				}
			}
		});
	});
});
</script>
<?php get_footer();