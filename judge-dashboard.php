<?php
/**
 * Template Name: Judge Portal Dashboard
 */

get_header();

global $user_ID;
if (!$user_ID) {
	wp_redirect(home_url('judge-login'));
	exit;
}

$error = "";
$success = "";
$old_password = "";
$new_password = "";
$user_meta = get_userdata($user_ID);

if (isset($_POST['action']) && $_POST['action'] == 'update_password') {
	$cur_password = $user_meta->user_pass;
	$old_password = $_POST['old_password'];
	$new_password = $_POST['password'];
	$check = wp_check_password($old_password, $cur_password, $user_ID);
	if ($check) {
		$update_user = wp_update_user(array(
			'ID' => $user_ID,
			'user_pass' => $new_password,
		));
		if ($update_user) {
			$success = "Your password is updated.";
		} else {
			$error = "Oops! Something went wrong updating your account.";
		}
	} else {
		$error = "The password you enter did not match the current password.";
	}
		
	if (!empty($error))
		$resetError = '<p id="valid-error" style="color: #FF0000; text-aling: left;"><strong>ERROR</strong>: ' . $error . '<br /></p>';
	//else if (!empty($success))
		//$resetError = '<p style="color: green; text-aling: left;"><strong>SUCCESS</strong>: ' . $success . '<br /></p>';
}
?>
<section class="portal-tabs">
	<div class="container-fluid">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item" role="presentation">
				<a class="nav-link active" id="submission-tab" data-toggle="tab" href="#submission" role="tab" aria-controls="submission" aria-selected="true">Submissions</a>
			</li>
			<li class="nav-item" role="presentation">
				<a class="nav-link" id="timeline-tab" data-toggle="tab" href="#timeline" role="tab" aria-controls="timeline" aria-selected="false">Timeline</a>
			</li>
			<li class="nav-item" role="presentation">
				<a class="nav-link" id="user-tab" data-toggle="tab" href="#user" role="tab" aria-controls="user" aria-selected="false">User</a>
			</li>
		</ul>
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="submission" role="tabpanel" aria-labelledby="submission-tab">
				<table class="table table-striped table-borderless team-portal-table">
					<thead>
						<tr>
							<th scope="col" class="nosort">Submissions</th>
							<th scope="col">Status</th>
							<th scope="col" class="nosort">Actions</th>
						</tr>
					</thead>
					<tbody>
					<?php
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
						?>
						<tr>
							<td><?php echo $product_name; ?></td>
							<td class="product-status" data-status="<?php echo $product_status_value; ?>" data-sort="<?php echo $product_status_order; ?>">
								<h4 class="submission-status"><?php echo $product_status_label; ?></h4>
							</td>
							<td><a href="<?php echo $submission_link; ?>">View</a></td>
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
								<button data-toggle="modal" data-target="#notepadtModal">Notepad</button>
							</div>
						</div>
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
								'value' => '2',
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

			<div class="tab-pane fade" id="user" role="tabpanel" aria-labelledby="user-tab">
				<div class="judge-user-account">
					<div class="form-group">
						<label>Email address</label>
						<input type="email" class="form-control" placeholder="myemail@google.com" value="<?php echo $user_meta->user_email; ?>" readonly>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" placeholder="********" readonly>
						<button class="change-password" data-toggle="modal" data-target="#changepasswordModal">Change password</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="modal fade" id="notepadtModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document" >
		<div class="modal-content">
			<div class="modal-body">
				<div class="notepad-box">
					<h2>Notepad</h2>
					<form action="">
						<textarea name="" id="" cols="30" rows="10" placeholder="Notes here" required></textarea>
						<button type="submit">Save</button>
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
					<form name="update-password-form" id="update-password-form" action="" method="post">
						<?php if (isset($resetError)) { echo '<div>' . $resetError . '</div>'; } ?>
						<input type="hidden" name="action" value="update_password">
						<div class="form-group">
							<label>Old Password</label>
							<input type="password" name="old_password" id="old_password" class="form-control" placeholder="********" value="<?php if ($old_password) echo $old_password; ?>">
						</div>
						<div class="form-group">
							<label>New Password</label>
							<input type="password" name="password" id="password" class="form-control" placeholder="********" value="<?php if ($new_password) echo $new_password; ?>">
							<a href="#" id ="toggleText" class="field-show" onclick="myFunction()">Show</a>
						</div>
						<div class="action-modal-button">
							<button data-dismiss="modal" aria-label="Close">Cancel</button>
							<button type="submit">Confirm</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php if ($success != '') { ?>
<div class="modal action-modal fade" id="successfullyUpdatePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="successfully-submission-content">
					<h2 class="text-center mb-5"><?php echo $success; ?></h2>
					<button data-dismiss="modal" id="submit-ok" aria-label="Close">Okay</button>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$ = jQuery;
$(window).on('load', function() {
	$('#successfullyUpdatePassword').modal('show');
});
</script>
<?php } else if ($error != '') { ?>
<script type="text/javascript">
$ = jQuery;
$(window).on('load', function() {
	$('#changepasswordModal').modal('show');
});
</script>
<?php } ?>

<script>
jQuery(document).ready(function($) {
	<?php
	if (isset($_GET['tab'])) {
		if ($_GET['tab'] == 'submissions')
			echo "$('#submission-tab').click();";
		else if ($_GET['tab'] == 'timeline')
			echo "$('#timeline-tab').click();";
		else if ($_GET['tab'] == 'user')
			echo "$('#user-tab').click();";
	}
	?>

	$('#submission .team-portal-table').DataTable({
		"order": [1, "asc"],
		"columnDefs": [{
			"targets": 'nosort',
			"orderable": false
		}],
		"bLengthChange": false,
		"bFilter": false,
		"info": false,
	});

	jQuery.validator.addMethod("notEqualTo", function(value, element, param) {
		return this.optional(element) || value != $(param).val();
	}, "You can't use the same password as the new password.");

	$("#update-password-form").validate({
		rules: {
			old_password: {
				required: true
			},
			password: {
				required: true,
				minlength: 8,
				notEqualTo: "#old_password"
			},
		},
		messages: {
			old_password: {
				required: "Please enter your old password.",
			},
			password: {
				required: "Please enter your new password.",
				minlength: "Password need to have minimum 8 charater.",
				notEqualTo: "You can't use the same password as the new password."
			},
		}
	});
});
</script>

<?php get_footer();