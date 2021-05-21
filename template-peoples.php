<?php
/**
 * Template Name: Peoples
 */

get_header();

$args_judge = array(
	'post_type' => 'peoples',
	'post_status' => 'publish',
	'category_name' => 'judge',
	'posts_per_page' => -1,
	'order' => 'DESC'
	);
$query_judge = new WP_Query( $args_judge );

$args_prize_council = array(
		'post_type' => 'peoples',
		'post_status' => 'publish',
		'category_name' => 'prize-development-council',
		'posts_per_page' => -1,
		'order' => 'DESC'
	);
$query_prize_council = new WP_Query( $args_prize_council );

$args_investment = array(
	'post_type' => 'peoples',
	'post_status' => 'publish',
	'category_name' => 'investment-alliance',
	'posts_per_page' => -1,
	'order' => 'DESC'
);
$query_investment = new WP_Query( $args_investment );
?>

<section class="hero-section">
	<div class="container-fluid">
		<div class="row">
			<div class="slider-desktop">
				<img src="<?php echo get_template_directory_uri(); ?>/images/SWEATSHIRT-BLK1.png" title="homepg_slider_1920" alt="homepg_slider_1920">
			</div>
			<div class="slider-tab">
				<img src="<?php echo get_template_directory_uri(); ?>/images/homepg_slider_768.jpg" title="homepg_slider_1920" alt="homepg_slider_1920">
			</div>
			<div class="slider-mobile">
				<img src="<?php echo get_template_directory_uri(); ?>/images/homepg_slider_375.jpg" title="homepg_slider_1920" alt="homepg_slider_1920">
			</div>
		</div>
	</div>
</section>

<section class="our-purpose" id="the-prize">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-5">
				<div class="section-title">
					<h2><?php echo get_field( "the_prize_section_title" ); ?></h2>
				</div>
			</div>
			<div class="col-lg-7">
				<div class="our-purpose-content">
					<?php echo get_field( "the_prize_section_content" ); ?>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="thin-film">
	<div class="thin-film-image">
		<img src="<?php echo get_template_directory_uri(); ?>/images/thin-film-plastic.jpg" alt="" class="w-100">
	</div>
</section>

<section class="the-problem" id="the-problem">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-5">
				<div class="section-title">
					<h2><?php echo get_field( "the_problem_section_title" ); ?></h2>
				</div>
			</div>
			<div class="col-lg-7">
				<div class="the-problem-content">
					<?php echo get_field( "the_problem_section_content" ); ?>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="innovation-prize" id="innovation-prize">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-5">
				<div class="section-title">
					<h2><?php echo get_field( "innovation_prize_section_title" ); ?></h2>
				</div>
			</div>
			<div class="col-lg-7">
				<div class="innovation-prize-content">
					<?php echo get_field( "innovation_prize_section_content" );?>
				</div>
			</div>
			<div class="col-lg-5 mt-auto">
				<div class="subscribe-form">
					<!-- <div class="form-group mb-0" onclick="openEmailmodal()">
						<input type="email" class="form-control" placeholder="Submit">
						<input type="submit" value="&#xf054;" class="submit-btn">
					</div> -->
					<div class="form-group mb-0">
						<?php echo get_field( "innovation_prize_button_link" );?>
					</div>
				</div>
			</div>
			<div class="col-lg-7">
				<div class="innovation-prize-content padding-top-30 hide-when-small no-pad-when-large">
					<?php echo get_field( "innovation_prize_last_paragraph" );?>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document" >
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="_content">
					<p>subscribe to our newsletter to stay up to date with our news.</p>
					<div class="form_fields">
						<label>YOUR EMAIL ADDRESS</label>
						<input type="email" class="form-control">
						<input type="submit" value="SIGN UP" class="wpcf7-form-control wpcf7-submit btn btn-default">
						<p>We do not share our contact lists </p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<section class="submission" id="submission">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-5">
				<div class="section-title">
					<h2><?php echo get_field( "submissions_section_title" );?></h2>
				</div>
			</div>
			<div class="col-lg-7">
				<div class="submission-content">
					<?php echo get_field( "submissions_section_content" );?>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="working" id="working">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-5">
				<div class="section-title">
					<h2><?php echo get_field( "how_it_work_section_title" );?></h2>
				</div>
			</div>
			<div class="col-lg-7">
				<div class="working-content">
					<?php echo get_field( "how_it_work_section_content" );?>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="timeline" id="timeline">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-5">
				<div class="section-title">
					<h2><?php echo get_field( "timeline_section_title" );?></h2>
				</div>
				<div class="subscribe-form timeline-form hide-tablet">
					<!-- <div class="form-group mb-0" onclick="openEmailmodal()">
						<input type="email" class="form-control" placeholder="Submit">
						<input type="submit" value="&#xf054;" class="submit-btn">
					</div> -->
					<div class="form-group mb-0">
						<?php echo get_field( "timeline_button_link" );?>
					</div>
					
				</div>
			</div>
			<div class="col-lg-7">
				<div class="timeline-content">
					<?php echo get_field( "timeline_section_content" );?>
				</div>
				<div class="subscribe-form timeline-form hide-desktop">
					<!-- <div class="form-group mb-0" onclick="openEmailmodal()">
						<input type="email" class="form-control" placeholder="Submit">
						<input type="submit" value="&#xf054;" class="submit-btn">
					</div> -->
					<div class="form-group mb-0">
						<?php echo get_field( "timeline_button_link" );?>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</section>

<section class="judge-criteria" id="judge-criteria">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-5">
				<div class="section-title">
					<h2><?php echo get_field( "how_will_Judged_section_title" );?></h2>
				</div>
			</div>
			<div class="col-lg-7">
				<div class="judge-criteria-content">
					<?php echo get_field( "how_will_Judged_section_content" );?>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="our-judges" id="our-judges">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-5">
				<div class="section-title">
					<h2><?php echo get_field( "our_judges_section_title" );?></h2>
				</div>
			</div>
			<div class="col-lg-7">
				<div class="our-judges-content">
					<?php echo get_field( "our_judges_section_content" );?>
					<!-- <p class="d-none d-lg-block hide-tab"><a href="/our-judges">See our full list</a></p> -->
				</div>
				<div class="ceo-judge" data-toggle="modal" data-target="#judgesModal" onclick="showPeopleModal(836, 'ceo')">
					<div class="row">
						<div class="col colleft">
							<div class="ceo-image">
								<img src="<?php echo get_template_directory_uri(); ?>/images/tom-ford.jpg" alt="">
							</div>
						</div>
						<?php 
						$ceopost = get_post( 836 );
						?>
						<div class="col colright">
							<div class="about-ceo">
								<h2><?php echo $ceopost->post_title; ?></h2>
								<h4><?php echo get_field( "title", 836 ); ?></h4>
								<p><?php echo $ceopost->post_content; ?></p>
							</div>
						</div>
					</div>
				</div>
				<?php if( $query_judge->have_posts() ) : 
					$index = 0; ?>
				<div class="our-judges-grid">
					<?php while( $query_judge->have_posts() ): $query_judge->the_post();
							$class = ($index > 3) ? "d-none d-md-block" : "";
						?>
						<div class="judge-card <?php echo $class; ?>" data-toggle="modal" data-target="#judgesModal" onclick="showPeopleModal(<?php the_ID(); ?>, 'judge')">
							<div class="judge-image">
								<?php if ( has_post_thumbnail() ) :
									the_post_thumbnail('full', array( 'class' => 'img-responsive people_img' ));
								endif; ?>
							</div>
							<div class="judge-content">
								<h2><?php the_title(); ?></h2>
								<h6><?php echo get_field('title'); ?></h6>
								<h6><?php echo get_field('industry'); ?></h6>
							<?php the_excerpt(); ?>
							</div>
						</div>
					<?php
					$index++;
					endwhile;
					wp_reset_postdata();
					?>
				</div>
			<?php endif; ?>
			</div>
			<div class="col-lg-12">
				<div class="our-judges-content see-mobile-link">
					<p><a href="/our-judges">See our full list</a></p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="prize-development-council" id="prize-development-council">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-5">
				<div class="section-title">
					<h2><?php echo get_field( "prize_development_council_section_title" );?></h2>
				</div>
			</div>
			<div class="col-lg-7">
				<div class="investment-alliance-content">
					<?php echo get_field( "prize_development_council_content" );?>
					<!-- <p class="d-none d-lg-block hide-tab"><a href="/prize-development-council">See our full list</a></p> -->
				</div>
				<?php if ( $query_prize_council->have_posts() ) :
					$index = 0; ?>
				<div class="our-judges-grid">
					<?php while( $query_prize_council->have_posts() ) : $query_prize_council->the_post();
						$class = ($index > 3) ? "d-none d-md-block" : ""; ?>
						<div class="judge-card <?php echo $class; ?>" data-toggle="modal" data-target="#judgesModal" onclick="showPeopleModal(<?php the_ID(); ?>, 'prize-development-council')">
							<div class="judge-image">
								<?php if ( has_post_thumbnail() ) :
									the_post_thumbnail('full', array( 'class' => 'img-responsive people_img' ));
								endif; ?>
							</div>
							<div class="judge-content">
								<h2><?php the_title(); ?></h2>
								<h6><?php echo get_field('title'); ?></h6>
								<h6><?php echo get_field('industry'); ?></h6>
								<?php the_excerpt(); ?>
							</div>
						</div>
					<?php
						$index++;
					endwhile;
					wp_reset_postdata();
					?>
				</div>
				<?php endif; ?>
			</div>
			<div class="col-lg-12">
				<div class="investment-alliance-content see-mobile-link">
					<p><a href="/prize-development-council/">See our full list</a></p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="investment-alliance" id="investment-alliance">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-5">
				<div class="section-title">
					<h2> <?php echo get_field( "investment_alliance_section_title" );?></h2>
				</div>
				<div class="investment-alliance-form hide-tablet">
					<!-- <div class="form-group mb-0" onclick="openInvestmentAlliancemodal()">
						<input type="email" class="form-control" placeholder="interested in the investment alliance?">
						<input type="submit" value="&#xf054;" class="submit-btn">
					</div> -->
					<div class="form-group mb-0 investment_alliance_form_group">
						<?php echo get_field( "investment_alliance_button_link" );?>
					</div>
				</div>
			</div>
			<div class="col-lg-7">
				<div class="investment-alliance-content">
					<?php echo get_field( "investment_alliance_content" );?>
					<!-- <p class="d-none d-lg-block hide-tab"><a href="/investment-alliance">See our full list</a></p> -->
				</div>
				<?php if ( $query_investment->have_posts() ) : ?>
					<div class="our-judges-grid">
						<?php $index = 0;
						while ( $query_investment->have_posts() ) : $query_investment->the_post();
							$class = ($index > 3) ? "d-none d-md-block" : "";
						?>
							<div class="judge-card <?php echo $class; ?>" data-toggle="modal" data-target="#judgesModal" onclick="showPeopleModal(<?php the_ID(); ?>, 'investment-alliance')">
								<div class="judge-image">
									<?php if ( has_post_thumbnail() ) :
										the_post_thumbnail('full', array( 'class' => 'img-responsive people_img' ));
									endif;?>
								</div>
								<div class="judge-content">
									<h2><?php the_title(); ?></h2>
									<h6><?php echo get_field('title'); ?></h6>
									<h6><?php echo get_field('industry'); ?></h6>
									<?php the_excerpt(); ?>
								</div>
							</div>
							<?php
							$index++;
						endwhile;
						wp_reset_postdata();
						?>
					</div>
				<?php endif; ?>
				<div class="investment-alliance-form hide-desktop">
					<div class="investment-alliance-content see-mobile-link">
						<p><a href="/investment-alliance">See our full list</a></p>
					</div>
					<div class="form-group mb-0">
						<a href="mailto:info@plasticprize.org?subject=Investment Alliance" class="form-control">Interested in<br> the investment alliance?</a>
						<input type="submit" value="&#xf054;" class="submit-btn">
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="modal fade" id="openInvestmentAllianceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document" >
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="_content">
					<p>Join the investment alliance</p>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label>First Name</label>
							<input type="text" class="form-control">
						</div>
						<div class="form-group col-md-6">
							<label>Last Name</label>
							<input type="text" class="form-control">
						</div>
						<div class="form-group col-md-12">
							<label>Your Email Address</label>
							<input type="email" class="form-control">
						</div>
						<div class="form-group col-md-12">
							<label>Occupation</label>
							<input type="text" class="form-control">
						</div>
						<div class="form-group col-md-12">
							<input type="submit" value="SIGN UP" class="wpcf7-form-control wpcf7-submit btn btn-default">
						</div>
						<div class="col-md-12">
							<p>We do not share our contact lists </p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<section class="semi-finalist-teams" id="semi-finalist-teams">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-5">
				<div class="section-title">
					<h2>Semi-Finalist Teams</h2>
				</div>
			</div>
			<div class="col-lg-7">
				<div class="semi-finalist-teams-grid">
					<a href="#" target="_blank">
						<div class="team-card">
							<div class="team-image">
								<img src="<?php echo get_template_directory_uri(); ?>/images/sami-finalist-teams.jpg" alt="">
							</div>
							<div class="team-content">
								<h2>Name of the org</h2>
							</div>
						</div>
					</a>
					<a href="#" target="_blank">
						<div class="team-card">
							<div class="team-image">
								<img src="<?php echo get_template_directory_uri(); ?>/images/sami-finalist-teams.jpg" alt="">
							</div>
							<div class="team-content">
								<h2>Name of the org</h2>
							</div>
						</div>
					</a>
					<a href="#" target="_blank">
						<div class="team-card">
							<div class="team-image">
								<img src="<?php echo get_template_directory_uri(); ?>/images/sami-finalist-teams.jpg" alt="">
							</div>
							<div class="team-content">
								<h2>Name of the org</h2>
							</div>
						</div>
					</a>
					<a href="#" target="_blank">
						<div class="team-card">
							<div class="team-image">
								<img src="<?php echo get_template_directory_uri(); ?>/images/sami-finalist-teams.jpg" alt="">
							</div>
							<div class="team-content">
								<h2>Name of the org</h2>
							</div>
						</div>
					</a>
					<a href="#" target="_blank">
						<div class="team-card">
							<div class="team-image">
								<img src="<?php echo get_template_directory_uri(); ?>/images/sami-finalist-teams.jpg" alt="">
							</div>
							<div class="team-content">
								<h2>Name of the org</h2>
							</div>
						</div>
					</a>
					<a href="#" target="_blank">
						<div class="team-card">
							<div class="team-image">
								<img src="<?php echo get_template_directory_uri(); ?>/images/sami-finalist-teams.jpg" alt="">
							</div>
							<div class="team-content">
								<h2>Name of the org</h2>
							</div>
						</div>
					</a>
					<a href="#" target="_blank">
						<div class="team-card">
							<div class="team-image">
								<img src="<?php echo get_template_directory_uri(); ?>/images/sami-finalist-teams.jpg" alt="">
							</div>
							<div class="team-content">
								<h2>Name of the org</h2>
							</div>
						</div>
					</a>
					<a href="#" target="_blank">
						<div class="team-card">
							<div class="team-image">
								<img src="<?php echo get_template_directory_uri(); ?>/images/sami-finalist-teams.jpg" alt="">
							</div>
							<div class="team-content">
								<h2>Name of the org</h2>
							</div>
						</div>
					</a>
					<a href="#" target="_blank">
						<div class="team-card">
							<div class="team-image">
								<img src="<?php echo get_template_directory_uri(); ?>/images/sami-finalist-teams.jpg" alt="">
							</div>
							<div class="team-content">
								<h2>Name of the org</h2>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- open people modal -->
<div class="modal fade" id="peopleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document" >
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><img src="/wp-content/uploads/2021/01/close.png"></span>
				</button>
				<img src="<?php echo site_url();?>/wp-content/uploads/2021/02/loader3.gif" class="modal_loader_img">
				<div id="people_profile_data"></div>
			</div>
		</div>
	</div>
</div>
<!-- <script>
	function showPeopleModal(id, category){
		console.log("category", category);
		jQuery("#people_profile_data").empty();
		jQuery("#peopleModal").modal('show');
		var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
		var tab_data = {
			action: "people-modal",
			category: category,
			id: id,
		};
		jQuery.post(ajaxurl, tab_data, function(response) {
			console.log("response",response);
			jQuery("#people_profile_data").append(response);
		});
	}

	function previousPeopleModal(id,category){
		console.log("previousPeopleModalcategory", category);
		var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
		var tab_data = {
			action: "people-modal",
			id: id,
			category: category,
		};
		jQuery("#people_profile_data").empty();
		jQuery.post(ajaxurl, tab_data, function(response) {
			console.log("previous-people-response",response);
			jQuery("#people_profile_data").append(response);
		});
	}

	function nextPeopleModal(id,category){
		var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
		var tab_data = {
			action: "people-modal",
			id: id,
			category: category,
		};
		jQuery("#people_profile_data").empty();
		jQuery.post(ajaxurl, tab_data, function(response) {
			console.log("next-people-response",response);
			jQuery("#people_profile_data").append(response);
		});
	}
</script> -->
<?php
get_footer('home');
