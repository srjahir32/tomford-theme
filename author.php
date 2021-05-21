<?php
/**
 * The template for displaying author
 */

get_header();

global $user_ID;
if (!$user_ID) {
	wp_redirect(home_url('team-login'));
	exit;
} else {
?>
<div class="portal-tabs">
	<div class="container-fluid">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item" role="presentation">
				<a class="nav-link" id="submission-tab" href="/team-dashboard/">Submissions</a>
			</li>
			<li class="nav-item" role="presentation">
				<a class="nav-link active" id="judges-tab" href="/team-dashboard/?tab=judges">Judges</a>
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
		</ul>
		<div class="judge-detail-page">
			<div class="tab-buttons-bar">
				<div class="row">
					<div class="col">
						<a href="/team-dashboard/?tab=judges">Evaluation Process</a>
					</div>
				</div>
			</div>
			<table class="table table-striped table-borderless team-portal-table">
				<thead>
					<tr>
						<th scope="col" class="nosort">Submissions</th>
						<th scope="col" class="product-status"><span>Status</span></th>
						<th scope="col"><span>Score</span></th>
						<th scope="col" class="nosort">Actions</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$judge_id = get_queried_object_id();
				$notes = get_field('notes', 'user_' . $judge_id);
				$note = "";
				if ($notes) {
					foreach ($notes as $n) {
						if ($n['user'] == $user_ID) {
							$note = $n['note'];
						}
					}
				}

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
					$product_name = get_field("product_name");
					$product_evaluations = get_field("product_evaluations");
					$product_status = get_field("product_status");
					$product_evaluation = searchEvaluationByJudge($judge_id, $product_evaluations);
					$status_value = "unevaluated";
					$status_label = "Unreviewed";
					$status_order = "3";
					$score = "-";
					if ($product_evaluation) {
						if ($product_evaluation['durability'] &&
							$product_evaluation['scalability'] &&
							$product_evaluation['accessibility'] &&
							$product_evaluation['usage'] &&
							$product_evaluation['affordability']) {
							$status_value = "evaluated";
							$status_label = "Evaluated";
							$status_order = "1";
							$score = number_format(($product_evaluation['durability'] + $product_evaluation['scalability'] + $product_evaluation['accessibility'] + $product_evaluation['usage'] + $product_evaluation['affordability']) / 5.0, 2, '.', ',');
						} else if ($product_evaluation['durability'] ||
							$product_evaluation['scalability'] ||
							$product_evaluation['accessibility'] ||
							$product_evaluation['usage'] ||
							$product_evaluation['affordability']) {
							$status_value = "progress";
							$status_label = "In Progress";
							$status_order = "2";
						}
					}
					if ($status_order == "3" && $product_status != "accepted") continue;
				?>
					<tr>
						<td><?php echo $product_name; ?></td>
						<td class="product-status" data-status="<?php echo $status_value; ?>" data-sort="<?php echo $status_order; ?>"><h4 class="submission-status"><?php echo $status_label; ?></h4></td>
						<td data-sort="<?php echo $score; ?>"><?php echo $score; ?></td>
						<td><a class="view-score" data-toggle="modal" data-target="#evaluateModal"
							data-durability="<?php if ($product_evaluation) echo $product_evaluation['durability']; ?>"
							data-scalability="<?php if ($product_evaluation) echo $product_evaluation['scalability']; ?>"
							data-accessibility="<?php if ($product_evaluation) echo $product_evaluation['accessibility']; ?>"
							data-usage="<?php if ($product_evaluation) echo $product_evaluation['usage']; ?>"
							data-affordability="<?php if ($product_evaluation) echo $product_evaluation['affordability']; ?>"
							>View Score</a></td>
					</tr>
				<?php endwhile; ?>
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
	</div>
</div>
		
<div class="modal fade" id="evaluateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
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
									<th scope="col" style="width:25%"></th>
									<th scope="col" style="width:15%">1</th>
									<th scope="col" style="width:15%">2</th>
									<th scope="col" style="width:15%">3</th>
									<th scope="col" style="width:15%">4</th>
									<th scope="col" style="width:15%">5</th>
								</tr>
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
								<tr class="criteria-dur">
									<td class="criteria-label">Durability <button class="info-icon" data-toggle="tooltip" data-html="true" title="<h2>Durability</h2><p>Durabillity is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>"><img src="<?php echo get_template_directory_uri(); ?>/images/info-icon.svg" alt=""></button></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr class="criteria-sca">
									<td class="criteria-label">Scalability <button class="info-icon" data-toggle="tooltip" data-html="true" title="<h2>Scalability</h2><p>Scalability is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>"><img src="<?php echo get_template_directory_uri(); ?>/images/info-icon.svg" alt=""></button></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr class="criteria-acc">
									<td class="criteria-label">Accessibility <button class="info-icon" data-toggle="tooltip" data-html="true" title="<h2>Accessibility</h2><p>Accessibility is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>"><img src="<?php echo get_template_directory_uri(); ?>/images/info-icon.svg" alt=""></button></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr class="criteria-use">
									<td class="criteria-label">Usage <button class="info-icon" data-toggle="tooltip" data-html="true" title="<h2>Usage</h2><p>Usage is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>"><img src="<?php echo get_template_directory_uri(); ?>/images/info-icon.svg" alt=""></button></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr class="criteria-aff">
									<td class="criteria-label">Affordability <button class="info-icon" data-toggle="tooltip" data-html="true" title="<h2>Affordability</h2><p>Affordability is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>"><img src="<?php echo get_template_directory_uri(); ?>/images/info-icon.svg" alt=""></button></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
							</tbody>
						</table>
					</div>
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
						<textarea cols="30" rows="10" placeholder="Notes here"><?php if ($note) echo $note; ?></textarea>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>
<script>
jQuery(document).ready(function($) {
	$('.judge-detail-page .team-portal-table').DataTable({
		"order": [1, "asc"],
		"columnDefs": [{
			"targets": 'nosort',
			"orderable": false
		}],
		"bLengthChange": false,
		"bFilter": false,
		"info": false,
	});
	$('.view-score').click(function() {
		$('#evaluateModal td:not(.criteria-label)').html("");
		$(this).data('durability') && $('#evaluateModal .criteria-dur td:nth-child(' + ($(this).data('durability') + 1) + ')').html("<span></span>");
		$(this).data('accessibility') && $('#evaluateModal .criteria-acc td:nth-child(' + ($(this).data('accessibility') + 1) + ')').html("<span></span>");
		$(this).data('scalability') && $('#evaluateModal .criteria-sca td:nth-child(' + ($(this).data('scalability') + 1) + ')').html("<span></span>");
		$(this).data('usage') && $('#evaluateModal .criteria-use td:nth-child(' + ($(this).data('usage') + 1) + ')').html("<span></span>");
		$(this).data('affordability') && $('#evaluateModal .criteria-aff td:nth-child(' + ($(this).data('affordability') + 1) + ')').html("<span></span>");
	});

	$('.notepad-box textarea').on('change paste', function() {
		$.ajax({
			type: "post",
			url: ajax_url,
			data: {
				action: "update_user_note",
				id: <?php echo $user_ID; ?>,
				dest_id: <?php echo $judge_id; ?>,
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
});
</script>
<?php get_footer();