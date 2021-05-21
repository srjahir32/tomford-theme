<?php
/**
 * The template for displaying individual submission
 */

get_header();

global $user_ID;
if (!$user_ID) {
	wp_redirect(home_url(''));
	exit;
} else {
	while (have_posts()) : the_post();
		$product_id = get_the_ID();
		$author_id = $post->post_author;
		$author_name = get_the_author_meta('display_name', $author_id);
		$author_email = get_the_author_meta('user_email', $author_id);
		//$author_email = get_field('email');
		//$author = get_user_by('email', $author_email);
		//$author_id = $author->ID;
		//$author_name = $author->data->display_name;
		$user_meta = get_userdata($user_ID);
		$user_roles = $user_meta->roles;
		$user_role = (in_array('team', $user_roles)) ? 'team' : (in_array('judge', $user_roles) ? 'judge' : 'submission');
		$frozen = get_field('frozen', 'user_' . $author_id);
		$freeze_label = $frozen ? "Unfreeze" : "Freeze";
		$closed = get_field('closed');
		$close_label = $closed ? "Open" : "Close";
		$product_name = get_field('product_name');
		$product_status_obj = get_field_object("product_status");
		if (!$product_status_obj) {
			$product_status_obj = array("choices" => array(
				"accepted" => "Accepted",
				"pending" => "Pending",
				"criteria" => "Does Not Meet Criteria",
				"unreviewed" => "Unreviewed",
			));
		}
		$product_status_value = get_field("product_status");
		if (!$product_status_value) $product_status_value = "unreviewed";
		$product_status_label = $product_status_obj['choices'][$product_status_value];
		$product_desc = get_field('product_description');
		$uploaded_file1 = get_field('uploaded_document_1');
		$uploaded_file2 = get_field('uploaded_document_2');
		$uploaded_file3 = get_field('uploaded_document_3');
		$video_link = get_field('video_link');
		if ($video_link && isset($video_link['url'])) {
			$video_link = $video_link['url'];
		}
		$product_memo = get_field('product_memo');
		$memo = "";
		if ($product_memo) {
			foreach ($product_memo as $n) {
				if ($n["memo_writer"] == $user_ID) {
					$memo = $n["memo"];
					break;
				}
			}
		}
		echo"<div style='display:none'><pre>";var_dump($product_memo);echo"</pre></div>";

		$user_query = new WP_User_Query(array('role' => 'judge'));
		$judges = $user_query->get_results();
		$judges_count = (int)$user_query->get_total();

		$product_evaluations = get_field("product_evaluations");
		$product_evaluations_count = 0;
		$rating_1 = $rating_2 = $rating_3 = $rating_4 = $rating_5 = 0;
		if (is_array($product_evaluations)) {
			$product_evaluations_count = count($product_evaluations);
			foreach ($product_evaluations as $product_evaluation) {
				$rating_1 += $product_evaluation['durability'];
				$rating_2 += $product_evaluation['scalability'];
				$rating_3 += $product_evaluation['accessibility'];
				$rating_4 += $product_evaluation['usage'];
				$rating_5 += $product_evaluation['affordability'];
			}
			$rating_1 = number_format($rating_1 / $product_evaluations_count, 2, '.', ',');
			$rating_2 = number_format($rating_2 / $product_evaluations_count, 2, '.', ',');
			$rating_3 = number_format($rating_3 / $product_evaluations_count, 2, '.', ',');
			$rating_4 = number_format($rating_4 / $product_evaluations_count, 2, '.', ',');
			$rating_5 = number_format($rating_5 / $product_evaluations_count, 2, '.', ',');
		}
		?>
<section class="portal-tabs">
	<div class="container-fluid">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<?php if ($user_role == 'team') { ?>
			<li class="nav-item" role="presentation">
				<a class="nav-link active" id="submission-tab" href="/team-dashboard/">Submissions</a>
			</li>
			<li class="nav-item" role="presentation">
				<a class="nav-link" id="judges-tab" href="/team-dashboard/?tab=judges">Judges</a>
			</li>
			<li class="nav-item" role="presentation">
				<span class="nav-link" id="contact-tab" href="#contact">
					<div class="dropdown">
						<a class="nav-link dropdown-toggle contacts-tab-dropdown" id="dropdownMenuLink">contacts</a>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item" href="/team-dashboard/?tab=advisor">Advisor</a>
							<a class="dropdown-item" href="/team-dashboard/?tab=investment">Investment Alliance</a>
						</div>
					</div>
				</span>
			</li>
			<li class="nav-item" role="presentation">
				<a class="nav-link" id="timeline-tab" href="/team-dashboard/?tab=timeline">Timeline</a>
			</li>
			<?php } else if ($user_role == 'judge') { ?>
			<li class="nav-item" role="presentation">
				<a class="nav-link active" id="submission-tab" href="/judge-dashboard/">Submissions</a>
			</li>
			<li class="nav-item" role="presentation">
				<a class="nav-link" id="timeline-tab" href="/judge-dashboard/?tab=timeline">Timeline</a>
			</li>
			<li class="nav-item" role="presentation">
				<a class="nav-link" id="user-tab" href="/judge-dashboard/?tab=user">User</a>
			</li>
			<?php } ?>
		</ul>
		<div class="submission-detail-page">
			<div class="submission-detail-header">
				<div class="row">
					<div class="col">
						<h2 class="product-title"><?php echo $product_name; ?><?php if ($user_role == 'team') { ?> - <span class="product-status"><?php echo $product_status_label; ?></span><?php } ?></h2>
					</div>
					<div class="col">
					<?php if ($user_role == 'team') { ?>
						<div class="dropdown">
							<button class="team-action-btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
							<div class="dropdown-menu dropdown-menu-right text-right" aria-labelledby="dropdownMenuButton">
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
					<?php } else if ($user_role == 'judge') { ?>
						<div class="text-right"><a class="view-score" data-toggle="modal" data-target="#evaluateModal"
							data-durability="<?php if ($product_evaluation) echo $product_evaluation['durability']; ?>"
							data-scalability="<?php if ($product_evaluation) echo $product_evaluation['scalability']; ?>"
							data-accessibility="<?php if ($product_evaluation) echo $product_evaluation['accessibility']; ?>"
							data-usage="<?php if ($product_evaluation) echo $product_evaluation['usage']; ?>"
							data-affordability="<?php if ($product_evaluation) echo $product_evaluation['affordability']; ?>"
							>Evaluate</a></div>
					<?php } ?>
					</div>
				</div>
			</div>
			<div class="product-description">
				<h2>Product Description</h2>
				<div><?php echo $product_desc; ?></div>
			</div>
			<div class="product-files">
				<h2>Files</h2>
				<table class="table files-table table-hover">
					<tbody>
						<?php if ($uploaded_file1) { ?>
						<tr>
							<td><i class="<?php echo getFileSubType($uploaded_file1['subtype']); ?>"></i> <?php echo $uploaded_file1['filename']; ?></td>
							<td class="text-center"><a href="#" class="file-view" data-toggle="modal" data-target="#documentModal" data-type="<?php echo $uploaded_file1['mime_type']; ?>" data-title="<?php echo $uploaded_file1['title']; ?>" data-url="<?php echo $uploaded_file1['url']; ?>">View</a></td>
						</tr>
						<?php } ?>
						<?php if ($uploaded_file2) { ?>
						<tr>
							<td><i class="<?php echo getFileSubType($uploaded_file2['subtype']); ?>"></i> <?php echo $uploaded_file2['filename']; ?></td>
							<td class="text-center"><a href="#" class="file-view" data-toggle="modal" data-target="#documentModal" data-type="<?php echo $uploaded_file2['mime_type']; ?>" data-title="<?php echo $uploaded_file2['title']; ?>" data-url="<?php echo $uploaded_file2['url']; ?>">View</a></td>
						</tr>
						<?php } ?>
						<?php if ($uploaded_file3) { ?>
						<tr>
							<td><i class="<?php echo getFileSubType($uploaded_file3['subtype']); ?>"></i> <?php echo $uploaded_file3['filename']; ?></td>
							<td class="text-center"><a href="#" class="file-view" data-toggle="modal" data-target="#documentModal" data-type="<?php echo $uploaded_file3['mime_type']; ?>" data-title="<?php echo $uploaded_file3['title']; ?>" data-url="<?php echo $uploaded_file3['url']; ?>">View</a></td>
						</tr>
						<?php } ?>
						<?php if ($video_link && isset($video_link)) { ?>
						<tr class="product-link">
							<td><i class="far fa-file-video"></i> <?php echo $video_link; ?></td>
							<td class="text-center"><a href="<?php echo $video_link; ?>" target="_blank">View</a></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<div class="submission-memo">
				<h2>Memo for this submission</h2>
				<textarea name="" id="" cols="30" rows="8" placeholder="Enter notes here"><?php echo $memo; ?></textarea>
			</div>
			<?php if ($user_role == 'team') { ?>
			<div class="submission-evaluations">
				<div class="row">
					<div class="col">
						<div class="evaluations-title">
							<h2>Evaluations <span class="evaluation-score">(<?php echo $product_evaluations_count; ?>/<?php echo $judges_count; ?>)</span></h2>
						</div>
					</div>
					<div class="col">
						<div class="select-judge">
							<div class="dropdown">
								<button type="button" class="team-action-btn dropdown-toggle" data-toggle="dropdown">Select a Judge</button>
								<div class="dropdown-menu radio dropdown-menu-right">
									<label class="dropdown-item">
										<input class="jRadioDropdown" type="radio" value="0" name="selectjudge">
										<span>None</span>
									</label>
									<?php foreach ($judges as $judge) {
										$product_evaluation = searchEvaluationByJudge($judge->data->ID, $product_evaluations);
										?>
									<label class="dropdown-item">
										<input class="jRadioDropdown" type="radio" value="<?php echo $judge->data->ID; ?>" name="selectjudge"
										<?php if ($product_evaluation) { ?>
											data-rating1="<?php if ($product_evaluation['durability']) echo number_format($product_evaluation['durability'], 2, '.', ','); ?>"
											data-rating2="<?php if ($product_evaluation['scalability']) echo number_format($product_evaluation['scalability'], 2, '.', ','); ?>"
											data-rating3="<?php if ($product_evaluation['accessibility']) echo number_format($product_evaluation['accessibility'], 2, '.', ','); ?>"
											data-rating4="<?php if ($product_evaluation['usage']) echo number_format($product_evaluation['usage'], 2, '.', ','); ?>"
											data-rating5="<?php if ($product_evaluation['affordability']) echo number_format($product_evaluation['affordability'], 2, '.', ','); ?>"
											data-judge="<?php echo $product_evaluation['judge']->data->display_name; ?>"
										<?php } else { echo 'disabled'; } ?>
											>
										<span><?php echo $judge->data->display_name; ?></span>
									</label>
									<?php } ?>
									<script>
										jQuery(document).ready(function($) {
											$('input[name=selectjudge]').change(function() {
												eval = $('input[name=selectjudge]:checked');
												if ($(eval).val() == 0) {
													$('.evaluation-table .rating_1').html("<?php echo $rating_1; ?>");
													$('.evaluation-table .rating_2').html("<?php echo $rating_2; ?>");
													$('.evaluation-table .rating_3').html("<?php echo $rating_3; ?>");
													$('.evaluation-table .rating_4').html("<?php echo $rating_4; ?>");
													$('.evaluation-table .rating_5').html("<?php echo $rating_5; ?>");
													$('.select-judge .team-action-btn').html("Select a Judge");
												} else {
													$('.evaluation-table .rating_1').html($(eval).data('rating1'));
													$('.evaluation-table .rating_2').html($(eval).data('rating2'));
													$('.evaluation-table .rating_3').html($(eval).data('rating3'));
													$('.evaluation-table .rating_4').html($(eval).data('rating4'));
													$('.evaluation-table .rating_5').html($(eval).data('rating5'));
													$('.select-judge .team-action-btn').html($(eval).data('judge'));
												}
											});
										});
									</script>
								</div>
							</div>
						</div>
					</div>
				</div>
				<table class="table table-striped table-borderless evaluation-table">
					<thead>
						<tr>
							<th scope="col">Criteria</th>
							<th scope="col">Rating</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="criteria-label">Durability <button class="info-icon" data-toggle="tooltip" data-html="true" title="<h2>Durability</h2><p>Durabillity is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>"><img src="<?php echo get_template_directory_uri(); ?>/images/info-icon.svg" alt=""></button></td>
							<td class="rating"><span class="rating_1"><?php echo $rating_1; ?></span></td>
						</tr>
						<tr>
							<td class="criteria-label">Scalability <button class="info-icon" data-toggle="tooltip" data-html="true" title="<h2>Scalability</h2><p>Scalability is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>"><img src="<?php echo get_template_directory_uri(); ?>/images/info-icon.svg" alt=""></button></td>
							<td class="rating"><span class="rating_2"><?php echo $rating_2; ?></span></td>
						</tr>
						<tr>
							<td class="criteria-label">Accessibility <button class="info-icon" data-toggle="tooltip" data-html="true" title="<h2>Accessibility</h2><p>Accessibility is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>"><img src="<?php echo get_template_directory_uri(); ?>/images/info-icon.svg" alt=""></button></td>
							<td class="rating"><span class="rating_3"><?php echo $rating_3; ?></span></td>
						</tr>
						<tr>
							<td class="criteria-label">Usage <button class="info-icon" data-toggle="tooltip" data-html="true" title="<h2>Usage</h2><p>Usage is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>"><img src="<?php echo get_template_directory_uri(); ?>/images/info-icon.svg" alt=""></button></td>
							<td class="rating"><span class="rating_4"><?php echo $rating_4; ?></span></td>
						</tr>
						<tr>
							<td class="criteria-label">Affordability <button class="info-icon" data-toggle="tooltip" data-html="true" title="<h2>Affordability</h2><p>Affordability is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>"><img src="<?php echo get_template_directory_uri(); ?>/images/info-icon.svg" alt=""></button></td>
							<td class="rating"><span class="rating_5"><?php echo $rating_5; ?></span></td>
						</tr>
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
			<?php } ?>
		</div>
	</div>
</section>

<div class="modal fade action-modal" id="actionResetPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document" >
		<div class="modal-content">
			<div class="modal-body">
				<div class="action-modal-content">
					<h2>You are about reset a user’s password</h2>
					<p>This will reset and create a random password for the user and send the user an email with new login.</p>
					<div class="action-modal-button">
						<input type="hidden" name="author_id" value="<?php echo $author_id; ?>">
						<input type="hidden" name="author_email" value="<?php echo $author_email; ?>">
						<button data-dismiss="modal" aria-label="Close">Cancel</button>
						<button type="submit">Reset</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade action-modal" id="actionFreezeAccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document" >
		<div class="modal-content">
			<div class="modal-body">
				<div class="action-modal-content">
					<h2>You are about <span class="freeze-unfreeze">freeze</span> this account</h2>
					<p class="freeze-message">This will disable this user to log in and will log out this user right now.</p>
					<p class="unfreeze-message">This will allow users to log in this account.</p>
					<div class="action-modal-button">
						<input type="hidden" name="author_id" value="<?php echo $author_id; ?>">
						<input type="hidden" name="author_email" value="<?php echo $author_email; ?>">
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
	<div class="modal-dialog modal-dialog-centered" role="document" >
		<div class="modal-content">
			<div class="modal-body">
				<div class="action-modal-content">
					<h2>You are about <span class="freeze-unfreeze">close</span> this submission</h2>
					<p class="freeze-message">This submission will be closed.</p>
					<p class="unfreeze-message">This submission will be opened.</p>
					<div class="action-modal-button">
						<input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
						<input type="hidden" name="author_email" value="<?php echo $author_email; ?>">
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
	<div class="modal-dialog modal-dialog-centered" role="document" >
		<div class="modal-content">
			<div class="modal-body">
				<div class="action-message-modal">
					<h2>Message to <span class="message-submitter-name"><?php echo $author_name; ?></span> (<span class="message-product-name"><?php echo $product_name; ?></span>)</h2>
					<form action="<?php echo admin_url('admin-ajax.php'); ?>" method="post">
						<input type="hidden" name="to" value="<?php echo $author_email; ?>">
						<input type="hidden" name="subject" value="Message to <?php echo $author_name; ?> (<?php echo $product_name; ?>)">
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

<div class="modal fade" id="documentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document" >
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><i class="fa fa-times"></i></span>
				</button>
				<div class="document-preview">
					<div class="document-title">
						<h2>Document name</h2>
					</div>
					<div class="document-area">
						<div id="example1"></div>
					</div>
				</div>
				<a href="#" style="float:right" class="document-download" download><i class="fa fa-download"></i></a>
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

<div class="modal fade" id="evaluateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document" >
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="evaluate-sheet">
					<div class="table-responsive-md">
						<table class="table table-borderless">
							<thead>
								<tr>
									<th scope="col">Section</th>
									<th scope="col">Unlikely</th>
									<th scope="col">Pass</th>
									<th scope="col">Good</th>
									<th scope="col">Great</th>
									<th scope="col">Outstanding</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="criteria-label">Durability <button class="info-icon" data-toggle="tooltip" data-html="true" title="<h2>Durability</h2><p>Durabillity is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>"><img src="<?php echo get_template_directory_uri(); ?>/images/info-icon.svg" alt=""></button></td>
									<td><input type="radio" name="durability" id="" class="" value="1" disabled></td>
									<td><input type="radio" name="durability" id="" class="" value="2" disabled></td>
									<td><input type="radio" name="durability" id="" class="" value="3" disabled></td>
									<td><input type="radio" name="durability" id="" class="" value="4" disabled></td>
									<td><input type="radio" name="durability" id="" class="" value="5" disabled></td>
								</tr>
								<tr>
									<td class="criteria-label">Scalability <button class="info-icon" data-toggle="tooltip" data-html="true" title="<h2>Scalability</h2><p>Scalability is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>"><img src="<?php echo get_template_directory_uri(); ?>/images/info-icon.svg" alt=""></button></td>
									<td><input type="radio" name="scalability" id="" class="" value="1" disabled></td>
									<td><input type="radio" name="scalability" id="" class="" value="2" disabled></td>
									<td><input type="radio" name="scalability" id="" class="" value="3" disabled></td>
									<td><input type="radio" name="scalability" id="" class="" value="4" disabled></td>
									<td><input type="radio" name="scalability" id="" class="" value="5" disabled></td>
								</tr>
								<tr>
									<td class="criteria-label">Accessibility <button class="info-icon" data-toggle="tooltip" data-html="true" title="<h2>Accessibility</h2><p>Accessibility is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>"><img src="<?php echo get_template_directory_uri(); ?>/images/info-icon.svg" alt=""></button></td>
									<td><input type="radio" name="accessibility" id="" class="" value="1" disabled></td>
									<td><input type="radio" name="accessibility" id="" class="" value="2" disabled></td>
									<td><input type="radio" name="accessibility" id="" class="" value="3" disabled></td>
									<td><input type="radio" name="accessibility" id="" class="" value="4" disabled></td>
									<td><input type="radio" name="accessibility" id="" class="" value="5" disabled></td>
								</tr>
								<tr>
									<td class="criteria-label">Usage <button class="info-icon" data-toggle="tooltip" data-html="true" title="<h2>Usage</h2><p>Usage is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>"><img src="<?php echo get_template_directory_uri(); ?>/images/info-icon.svg" alt=""></button></td>
									<td><input type="radio" name="usage" id="" class="" value="1" disabled></td>
									<td><input type="radio" name="usage" id="" class="" value="2" disabled></td>
									<td><input type="radio" name="usage" id="" class="" value="3" disabled></td>
									<td><input type="radio" name="usage" id="" class="" value="4" disabled></td>
									<td><input type="radio" name="usage" id="" class="" value="5" disabled></td>
								</tr>
								<tr>
									<td class="criteria-label">Affordability <button class="info-icon" data-toggle="tooltip" data-html="true" title="<h2>Affordability</h2><p>Affordability is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>"><img src="<?php echo get_template_directory_uri(); ?>/images/info-icon.svg" alt=""></button></td>
									<td><input type="radio" name="affordability" id="" class="" value="1" disabled></td>
									<td><input type="radio" name="affordability" id="" class="" value="2" disabled></td>
									<td><input type="radio" name="affordability" id="" class="" value="3" disabled></td>
									<td><input type="radio" name="affordability" id="" class="" value="4" disabled></td>
									<td><input type="radio" name="affordability" id="" class="" value="5" disabled></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.4/pdfobject.min.js"></script>
<script>
jQuery(document).ready(function($) {
	$('.file-view').click(function() {
		$('.document-title h2').html($(this).data('title'));
		$('.document-download').attr('href', ($(this).data('url')));
		var url = $(this).data('url');
		PDFObject.embed(url, "#example1", {pdfOpenParams: { toolbar: 0 }});
	});

	$('#actionResetPassword button[type=submit]').click(function(e) {
		e.preventDefault();
		$.ajax({
			type: "post",
			dataType: "json",
			url: ajax_url,
			data: {
				action: "reset_user_password",
				id: $('#actionResetPassword input[name=author_id]').val(),
				to: $('#actionResetPassword input[name=author_email]').val()
			},
			success: function(response) {
				console.log(response);
				if (response == false) {
					console.log('failed');
				} else {
					console.log('success');
				}
				$('#actionResetPassword button[data-dismiss=modal]').click();
			}
		});
	});

	$('.dropdown-item[data-target="#actionFreezeAccount"]').click(function() {
		$('#actionFreezeAccount').removeClass('frozen');
		$('#actionFreezeAccount .freeze-unfreeze').html('freeze');
		$('#actionFreezeAccount input[name=freeze]').val('freeze');
		$('#actionFreezeAccount button[type=submit]').html('Freeze');
		if ($(this).data('frozen') && $(this).data('frozen') == "1") {
			$('#actionFreezeAccount').addClass('frozen');
			$('#actionFreezeAccount .freeze-unfreeze').html('unfreeze');
			$('#actionFreezeAccount input[name=freeze]').val('unfreeze');
			$('#actionFreezeAccount button[type=submit]').html('Unfreeze');
		}
	});
	$('#actionFreezeAccount button[type=submit]').click(function(e) {
		e.preventDefault();
		$.ajax({
			type: "post",
			dataType: "json",
			url: ajax_url,
			data: {
				action: "freeze_account",
				id: $('#actionFreezeAccount input[name=author_id]').val(),
				to: $('#actionFreezeAccount input[name=author_email]').val(),
				freeze: $('#actionFreezeAccount input[name=freeze]').val()
			},
			success: function(response) {
				console.log(response);
				if (response == false) {
					console.log('failed');
				} else {
					console.log('success');
					if ($('#actionFreezeAccount input[name=freeze]').val() == 'freeze') {
						$('.freeze-account[data-author=' + $('#actionFreezeAccount input[name=author_id]').val() + ']').html('Unfreeze Account');
						$('.freeze-account[data-author=' + $('#actionFreezeAccount input[name=author_id]').val() + ']').data('frozen', 1);
					} else {
						$('.freeze-account[data-author=' + $('#actionFreezeAccount input[name=author_id]').val() + ']').html('Freeze Account');
						$('.freeze-account[data-author=' + $('#actionFreezeAccount input[name=author_id]').val() + ']').data('frozen', 0);
					}
				}
				$('#actionFreezeAccount button[data-dismiss=modal]').click();
			}
		});
	});

	$('.dropdown-item[data-target="#actionCloseSubmission"]').click(function() {
		$('#actionCloseSubmission').removeClass('frozen');
		$('#actionCloseSubmission .freeze-unfreeze').html('close');
		$('#actionCloseSubmission input[name=freeze]').val('close');
		$('#actionCloseSubmission button[type=submit]').html('Close');
		if ($(this).data('frozen') && $(this).data('frozen') == "1") {
			$('#actionCloseSubmission').addClass('frozen');
			$('#actionCloseSubmission .freeze-unfreeze').html('open');
			$('#actionCloseSubmission input[name=freeze]').val('open');
			$('#actionCloseSubmission button[type=submit]').html('Open');
		}
	});
	$('#actionCloseSubmission button[type=submit]').click(function(e) {
		e.preventDefault();
		$.ajax({
			type: "post",
			dataType: "json",
			url: ajax_url,
			data: {
				action: "close_submission",
				id: $('#actionCloseSubmission input[name=product_id]').val(),
				to: $('#actionCloseSubmission input[name=author_email]').val(),
				close: $('#actionCloseSubmission input[name=freeze]').val()
			},
			success: function(response) {
				console.log(response);
				if (response == false) {
					console.log('failed');
				} else {
					console.log('success');
					if ($('#actionCloseSubmission input[name=freeze]').val() == 'close') {
						$('.close-submission[data-product=' + $('#actionCloseSubmission input[name=product_id]').val() + ']').html('Open Submission');
						$('.close-submission[data-product=' + $('#actionCloseSubmission input[name=product_id]').val() + ']').data('frozen', 1);
					} else {
						$('.close-submission[data-product=' + $('#actionCloseSubmission input[name=product_id]').val() + ']').html('Close Submission');
						$('.close-submission[data-product=' + $('#actionCloseSubmission input[name=product_id]').val() + ']').data('frozen', 0);
					}
				}
				$('#actionCloseSubmission button[data-dismiss=modal]').click();
			}
		});
	});

	$('.action-message-modal button[type=submit]').click(function(e) {
		e.preventDefault();
		$.ajax({
			type: "post",
			dataType: "json",
			url: ajax_url,
			data: {
				action: "send_message",
				to: $('.action-message-modal input[name=to]').val(),
				subject: $('.action-message-modal input[name=subject]').val(),
				message: $('.action-message-modal textarea').val()
			},
			success: function(response) {
				console.log(response);
				if (response == false) {
					console.log('failed');
				} else {
					console.log('success');
				}
				$('.action-message-modal button[data-dismiss=modal]').click();
			}
		});
	});

	status_key = ['accepted', 'pending', 'criteria', 'unreviewed'];
	status_label = ['Accepted', 'Pending', 'Does Not Meet Criteria', 'Unreviewed'];
	status_order = [1, 2, 3, 4];
	map_label = new Map();
	map_order = new Map();
	for (var i = 0; i < status_key.length; i++){
		map_label.set(status_key[i], status_label[i]);
		map_order.set(status_key[i], status_order[i]);
	}
	$('.dropdown-menu .sub-dropdown-item').click(function(e) {
		e.preventDefault();
		product_id = <?php echo get_the_ID(); ?>;
		status = $(this).data('status');
		$.ajax({
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
					$('.product-title .product-status').html(map_label.get(status));
				}
			}
		});
	});

	$('.submission-memo textarea').on('change paste', function() {
		$.ajax({
			type: "post",
			dataType: "json",
			url: ajax_url,
			data: {
				action: "update_single_submission_note",
				submission_id: <?php echo $product_id; ?>,
				team_id: <?php echo $user_ID; ?>,
				note: $(this).val(),
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

	$('.notepad-box textarea').on('change paste', function() {
		$.ajax({
			type: "post",
			dataType: "json",
			url: ajax_url,
			data: {
				action: "update_submissions_note",
				team_id: <?php echo $user_ID; ?>,
				note: $(this).val(),
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

	$('.view-score').click(function() {
		$('#evaluateModal input[type=radio][name=durability]').prop('checked', false);
		$('#evaluateModal input[type=radio][name=accessibility]').prop('checked', false);
		$('#evaluateModal input[type=radio][name=scalability]').prop('checked', false);
		$('#evaluateModal input[type=radio][name=usage]').prop('checked', false);
		$('#evaluateModal input[type=radio][name=affordability]').prop('checked', false);
		$(this).data('durability') && $('#evaluateModal input[type=radio][name=durability][value=' + $(this).data('durability') + ']').prop('checked', true);
		$(this).data('accessibility') && $('#evaluateModal input[type=radio][name=accessibility][value=' + $(this).data('accessibility') + ']').prop('checked', true);
		$(this).data('scalability') && $('#evaluateModal input[type=radio][name=scalability][value=' + $(this).data('scalability') + ']').prop('checked', true);
		$(this).data('usage') && $('#evaluateModal input[type=radio][name=usage][value=' + $(this).data('usage') + ']').prop('checked', true);
		$(this).data('affordability') && $('#evaluateModal input[type=radio][name=affordability][value=' + $(this).data('affordability') + ']').prop('checked', true);
	});
});
</script>
<?php
	endwhile;
}
?>
<?php get_footer();
