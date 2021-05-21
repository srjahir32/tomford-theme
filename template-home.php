<?php
/**
 * Template Name: Home
 */

get_header();
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
	<div class="modal-dialog modal-dialog-centered" role="document">
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
						<p>We do not share our contact lists</p>
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
				<div class="ceo-judge">
					<div class="row">
						<div class="col colleft">
							<div class="ceo-image">
								<img src="<?php echo get_template_directory_uri(); ?>/images/tom-ford.jpg" alt="">
							</div>
						</div>
						<div class="col colright">
							<div class="about-ceo">
								<h2>Tom Ford</h2>
								<h4>CEO, founder of Tom Ford</h4>
								<p>Ancillae intellegat mazim integre an nam. Pro te viderer ancillae scribentur. illae telzitelziintellegat mazim integre. Ancillae intelzim integre an nam. Pro te viderer ancillibentur. Ancillae intellegat mazim integre. Ancillae intemazim integre an nam. Pro te viderer ancillae scribentur. Ancillae intellegat mazim integre. </p>
							</div>
						</div>
					</div>
				</div>
				<div class="our-judges-grid">
					<div class="judge-card" data-toggle="modal" data-target="#judgesModal1">
						<div class="judge-image">
							<img src="<?php echo get_template_directory_uri(); ?>/images/judge-image.jpg" alt="">
						</div>
						<div class="judge-content">
							<h2>John Doe</h2>
							<h6>Title</h6>
							<h6>Industry</h6>
							<p>Ancillae intellegat mazim integre an nam. Pro te viderer ancillae scribentur. Ancillae intellegat mazim integre.</p>
						</div>
					</div>
					<div class="judge-card" data-toggle="modal" data-target="#judgesModal2">
						<div class="judge-image">
							<img src="<?php echo get_template_directory_uri(); ?>/images/judge-image.jpg" alt="">
						</div>
						<div class="judge-content">
							<h2>John Doe</h2>
							<h6>Title</h6>
							<h6>Industry</h6>
							<p>Ancillae intellegat mazim integre an nam. Pro te viderer ancillae scribentur. Ancillae intellegat mazim integre.</p>
						</div>
					</div>
					<div class="judge-card" data-toggle="modal" data-target="#judgesModal3">
						<div class="judge-image">
							<img src="<?php echo get_template_directory_uri(); ?>/images/judge-image.jpg" alt="">
						</div>
						<div class="judge-content">
							<h2>John Doe</h2>
							<h6>Title</h6>
							<h6>Industry</h6>
							<p>Ancillae intellegat mazim integre an nam. Pro te viderer ancillae scribentur. Ancillae intellegat mazim integre.</p>
						</div>
					</div>
					<div class="judge-card" data-toggle="modal" data-target="#judgesModal4">
						<div class="judge-image">
							<img src="<?php echo get_template_directory_uri(); ?>/images/judge-image.jpg" alt="">
						</div>
						<div class="judge-content">
							<h2>John Doe</h2>
							<h6>Title</h6>
							<h6>Industry</h6>
							<p>Ancillae intellegat mazim integre an nam. Pro te viderer ancillae scribentur. Ancillae intellegat mazim integre.</p>
						</div>
					</div>
					<div class="judge-card d-none d-md-block" data-toggle="modal" data-target="#judgesModal5">
						<div class="judge-image">
							<img src="<?php echo get_template_directory_uri(); ?>/images/judge-image.jpg" alt="">
						</div>
						<div class="judge-content">
							<h2>John Doe</h2>
							<h6>Title</h6>
							<h6>Industry</h6>
							<p>Ancillae intellegat mazim integre an nam. Pro te viderer ancillae scribentur. Ancillae intellegat mazim integre.</p>
						</div>
					</div>
					<div class="judge-card d-none d-md-block" data-toggle="modal" data-target="#judgesModal6">
						<div class="judge-image">
							<img src="<?php echo get_template_directory_uri(); ?>/images/judge-image.jpg" alt="">
						</div>
						<div class="judge-content">
							<h2>John Doe</h2>
							<h6>Title</h6>
							<h6>Industry</h6>
							<p>Ancillae intellegat mazim integre an nam. Pro te viderer ancillae scribentur. Ancillae intellegat mazim integre.</p>
						</div>
					</div>
					<div class="judge-card d-none d-md-block" data-toggle="modal" data-target="#judgesModal7">
						<div class="judge-image">
							<img src="<?php echo get_template_directory_uri(); ?>/images/judge-image.jpg" alt="">
						</div>
						<div class="judge-content">
							<h2>John Doe</h2>
							<h6>Title</h6>
							<h6>Industry</h6>
							<p>Ancillae intellegat mazim integre an nam. Pro te viderer ancillae scribentur. Ancillae intellegat mazim integre.</p>
						</div>
					</div>
					<div class="judge-card d-none d-md-block" data-toggle="modal" data-target="#judgesModal8">
						<div class="judge-image">
							<img src="<?php echo get_template_directory_uri(); ?>/images/judge-image.jpg" alt="">
						</div>
						<div class="judge-content">
							<h2>John Doe</h2>
							<h6>Title</h6>
							<h6>Industry</h6>
							<p>Ancillae intellegat mazim integre an nam. Pro te viderer ancillae scribentur. Ancillae intellegat mazim integre.</p>
						</div>
					</div>
					<div class="judge-card d-none d-md-block" data-toggle="modal" data-target="#judgesModal9">
						<div class="judge-image">
							<img src="<?php echo get_template_directory_uri(); ?>/images/judge-image.jpg" alt="">
						</div>
						<div class="judge-content">
							<h2>John Doe</h2>
							<h6>Title</h6>
							<h6>Industry</h6>
							<p>Ancillae intellegat mazim integre an nam. Pro te viderer ancillae scribentur. Ancillae intellegat mazim integre.</p>
						</div>
					</div>
					<div class="judge-card d-none d-md-block" data-toggle="modal" data-target="#judgesModal10">
						<div class="judge-image">
							<img src="<?php echo get_template_directory_uri(); ?>/images/judge-image.jpg" alt="">
						</div>
						<div class="judge-content">
							<h2>John Doe</h2>
							<h6>Title</h6>
							<h6>Industry</h6>
							<p>Ancillae intellegat mazim integre an nam. Pro te viderer ancillae scribentur. Ancillae intellegat mazim integre.</p>
						</div>
					</div>
					<div class="judge-card d-none d-md-block" data-toggle="modal" data-target="#judgesModal11">
						<div class="judge-image">
							<img src="<?php echo get_template_directory_uri(); ?>/images/judge-image.jpg" alt="">
						</div>
						<div class="judge-content">
							<h2>John Doe</h2>
							<h6>Title</h6>
							<h6>Industry</h6>
							<p>Ancillae intellegat mazim integre an nam. Pro te viderer ancillae scribentur. Ancillae intellegat mazim integre.</p>
						</div>
					</div>
					<div class="judge-card d-none d-md-block" data-toggle="modal" data-target="#judgesModal12">
						<div class="judge-image">
							<img src="<?php echo get_template_directory_uri(); ?>/images/judge-image.jpg" alt="">
						</div>
						<div class="judge-content">
							<h2>John Doe</h2>
							<h6>Title</h6>
							<h6>Industry</h6>
							<p>Ancillae intellegat mazim integre an nam. Pro te viderer ancillae scribentur. Ancillae intellegat mazim integre.</p>
						</div>
					</div>
					<div class="judge-card d-none d-md-block" data-toggle="modal" data-target="#judgesModal13">
						<div class="judge-image">
							<img src="<?php echo get_template_directory_uri(); ?>/images/judge-image.jpg" alt="">
						</div>
						<div class="judge-content">
							<h2>John Doe</h2>
							<h6>Title</h6>
							<h6>Industry</h6>
							<p>Ancillae intellegat mazim integre an nam. Pro te viderer ancillae scribentur. Ancillae intellegat mazim integre.</p>
						</div>
					</div>
					<div class="judge-card d-none d-md-block" data-toggle="modal" data-target="#judgesModal14">
						<div class="judge-image">
							<img src="<?php echo get_template_directory_uri(); ?>/images/judge-image.jpg" alt="">
						</div>
						<div class="judge-content">
							<h2>John Doe</h2>
							<h6>Title</h6>
							<h6>Industry</h6>
							<p>Ancillae intellegat mazim integre an nam. Pro te viderer ancillae scribentur. Ancillae intellegat mazim integre.</p>
						</div>
					</div>
				</div>
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
				<div class="our-judges-grid">
					<div class="judge-card" data-toggle="modal" data-target="#judgesModal15">
						<div class="judge-image">
							<img src="<?php echo get_template_directory_uri(); ?>/images/judge-image.jpg" alt="">
						</div>
						<div class="judge-content">
							<h2>John Doe</h2>
							<h6>Title</h6>
							<h6>Industry</h6>
							<p>Ancillae intellegat mazim integre an nam. Pro te viderer ancillae scribentur. Ancillae intellegat mazim integre.</p>
						</div>
					</div>
					<div class="judge-card" data-toggle="modal" data-target="#judgesModal16">
						<div class="judge-image">
							<img src="<?php echo get_template_directory_uri(); ?>/images/judge-image.jpg" alt="">
						</div>
						<div class="judge-content">
							<h2>John Doe</h2>
							<h6>Title</h6>
							<h6>Industry</h6>
							<p>Ancillae intellegat mazim integre an nam. Pro te viderer ancillae scribentur. Ancillae intellegat mazim integre.</p>
						</div>
					</div>
					<div class="judge-card" data-toggle="modal" data-target="#judgesModal17">
						<div class="judge-image">
							<img src="<?php echo get_template_directory_uri(); ?>/images/judge-image.jpg" alt="">
						</div>
						<div class="judge-content">
							<h2>John Doe</h2>
							<h6>Title</h6>
							<h6>Industry</h6>
							<p>Ancillae intellegat mazim integre an nam. Pro te viderer ancillae scribentur. Ancillae intellegat mazim integre.</p>
						</div>
					</div>
					<div class="judge-card" data-toggle="modal" data-target="#judgesModal18">
						<div class="judge-image">
							<img src="<?php echo get_template_directory_uri(); ?>/images/judge-image.jpg" alt="">
						</div>
						<div class="judge-content">
							<h2>John Doe</h2>
							<h6>Title</h6>
							<h6>Industry</h6>
							<p>Ancillae intellegat mazim integre an nam. Pro te viderer ancillae scribentur. Ancillae intellegat mazim integre.</p>
						</div>
					</div>
					<div class="judge-card d-none d-md-block" data-toggle="modal" data-target="#judgesModal19">
						<div class="judge-image">
							<img src="<?php echo get_template_directory_uri(); ?>/images/judge-image.jpg" alt="">
						</div>
						<div class="judge-content">
							<h2>John Doe</h2>
							<h6>Title</h6>
							<h6>Industry</h6>
							<p>Ancillae intellegat mazim integre an nam. Pro te viderer ancillae scribentur. Ancillae intellegat mazim integre.</p>
						</div>
					</div>
					<div class="judge-card d-none d-md-block" data-toggle="modal" data-target="#judgesModal20">
						<div class="judge-image">
							<img src="<?php echo get_template_directory_uri(); ?>/images/judge-image.jpg" alt="">
						</div>
						<div class="judge-content">
							<h2>John Doe</h2>
							<h6>Title</h6>
							<h6>Industry</h6>
							<p>Ancillae intellegat mazim integre an nam. Pro te viderer ancillae scribentur. Ancillae intellegat mazim integre.</p>
						</div>
					</div>
					<div class="judge-card d-none d-md-block" data-toggle="modal" data-target="#judgesModal21">
						<div class="judge-image">
							<img src="<?php echo get_template_directory_uri(); ?>/images/judge-image.jpg" alt="">
						</div>
						<div class="judge-content">
							<h2>John Doe</h2>
							<h6>Title</h6>
							<h6>Industry</h6>
							<p>Ancillae intellegat mazim integre an nam. Pro te viderer ancillae scribentur. Ancillae intellegat mazim integre.</p>
						</div>
					</div>
					<div class="judge-card d-none d-md-block" data-toggle="modal" data-target="#judgesModal22">
						<div class="judge-image">
							<img src="<?php echo get_template_directory_uri(); ?>/images/judge-image.jpg" alt="">
						</div>
						<div class="judge-content">
							<h2>John Doe</h2>
							<h6>Title</h6>
							<h6>Industry</h6>
							<p>Ancillae intellegat mazim integre an nam. Pro te viderer ancillae scribentur. Ancillae intellegat mazim integre.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="investment-alliance-content see-mobile-link">
					<p><a href="/prize-development-council">See our full list</a></p>
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
					<h2><?php echo get_field( "investment_alliance_section_title" );?></h2>
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
				<div class="our-judges-grid">
					<div class="judge-card" data-toggle="modal" data-target="#judgesModal23">
						<div class="judge-image">
							<img src="<?php echo get_template_directory_uri(); ?>/images/judge-image.jpg" alt="">
						</div>
						<div class="judge-content">
							<h2>John Doe</h2>
							<h6>Title</h6>
							<h6>Industry</h6>
							<p>Ancillae intellegat mazim integre an nam. Pro te viderer ancillae scribentur. Ancillae intellegat mazim integre.</p>
						</div>
					</div>
					<div class="judge-card" data-toggle="modal" data-target="#judgesModal24">
						<div class="judge-image">
							<img src="<?php echo get_template_directory_uri(); ?>/images/judge-image.jpg" alt="">
						</div>
						<div class="judge-content">
							<h2>John Doe</h2>
							<h6>Title</h6>
							<h6>Industry</h6>
							<p>Ancillae intellegat mazim integre an nam. Pro te viderer ancillae scribentur. Ancillae intellegat mazim integre.</p>
						</div>
					</div>
					<div class="judge-card" data-toggle="modal" data-target="#judgesModal25">
						<div class="judge-image">
							<img src="<?php echo get_template_directory_uri(); ?>/images/judge-image.jpg" alt="">
						</div>
						<div class="judge-content">
							<h2>John Doe</h2>
							<h6>Title</h6>
							<h6>Industry</h6>
							<p>Ancillae intellegat mazim integre an nam. Pro te viderer ancillae scribentur. Ancillae intellegat mazim integre.</p>
						</div>
					</div>
					<div class="judge-card" data-toggle="modal" data-target="#judgesModal26">
						<div class="judge-image">
							<img src="<?php echo get_template_directory_uri(); ?>/images/judge-image.jpg" alt="">
						</div>
						<div class="judge-content">
							<h2>John Doe</h2>
							<h6>Title</h6>
							<h6>Industry</h6>
							<p>Ancillae intellegat mazim integre an nam. Pro te viderer ancillae scribentur. Ancillae intellegat mazim integre.</p>
						</div>
					</div>
					<div class="judge-card d-none d-md-block" data-toggle="modal" data-target="#judgesModal27">
						<div class="judge-image">
							<img src="<?php echo get_template_directory_uri(); ?>/images/judge-image.jpg" alt="">
						</div>
						<div class="judge-content">
							<h2>John Doe</h2>
							<h6>Title</h6>
							<h6>Industry</h6>
							<p>Ancillae intellegat mazim integre an nam. Pro te viderer ancillae scribentur. Ancillae intellegat mazim integre.</p>
						</div>
					</div>
					<div class="judge-card d-none d-md-block" data-toggle="modal" data-target="#judgesModal28">
						<div class="judge-image">
							<img src="<?php echo get_template_directory_uri(); ?>/images/judge-image.jpg" alt="">
						</div>
						<div class="judge-content">
							<h2>John Doe</h2>
							<h6>Title</h6>
							<h6>Industry</h6>
							<p>Ancillae intellegat mazim integre an nam. Pro te viderer ancillae scribentur. Ancillae intellegat mazim integre.</p>
						</div>
					</div>
					<div class="judge-card d-none d-md-block" data-toggle="modal" data-target="#judgesModal29">
						<div class="judge-image">
							<img src="<?php echo get_template_directory_uri(); ?>/images/judge-image.jpg" alt="">
						</div>
						<div class="judge-content">
							<h2>John Doe</h2>
							<h6>Title</h6>
							<h6>Industry</h6>
							<p>Ancillae intellegat mazim integre an nam. Pro te viderer ancillae scribentur. Ancillae intellegat mazim integre.</p>
						</div>
					</div>
					<div class="judge-card d-none d-md-block" data-toggle="modal" data-target="#judgesModal30">
						<div class="judge-image">
							<img src="<?php echo get_template_directory_uri(); ?>/images/judge-image.jpg" alt="">
						</div>
						<div class="judge-content">
							<h2>John Doe</h2>
							<h6>Title</h6>
							<h6>Industry</h6>
							<p>Ancillae intellegat mazim integre an nam. Pro te viderer ancillae scribentur. Ancillae intellegat mazim integre.</p>
						</div>
					</div>
					<div class="judge-card d-none d-md-block" data-toggle="modal" data-target="#judgesModal31">
						<div class="judge-image">
							<img src="<?php echo get_template_directory_uri(); ?>/images/judge-image.jpg" alt="">
						</div>
						<div class="judge-content">
							<h2>John Doe</h2>
							<h6>Title</h6>
							<h6>Industry</h6>
							<p>Ancillae intellegat mazim integre an nam. Pro te viderer ancillae scribentur. Ancillae intellegat mazim integre.</p>
						</div>
					</div>
					<div class="judge-card d-none d-md-block" data-toggle="modal" data-target="#judgesModal32">
						<div class="judge-image">
							<img src="<?php echo get_template_directory_uri(); ?>/images/judge-image.jpg" alt="">
						</div>
						<div class="judge-content">
							<h2>John Doe</h2>
							<h6>Title</h6>
							<h6>Industry</h6>
							<p>Ancillae intellegat mazim integre an nam. Pro te viderer ancillae scribentur. Ancillae intellegat mazim integre.</p>
						</div>
					</div>
					<div class="judge-card d-none d-md-block" data-toggle="modal" data-target="#judgesModal33">
						<div class="judge-image">
							<img src="<?php echo get_template_directory_uri(); ?>/images/judge-image.jpg" alt="">
						</div>
						<div class="judge-content">
							<h2>John Doe</h2>
							<h6>Title</h6>
							<h6>Industry</h6>
							<p>Ancillae intellegat mazim integre an nam. Pro te viderer ancillae scribentur. Ancillae intellegat mazim integre.</p>
						</div>
					</div>
					<div class="judge-card d-none d-md-block" data-toggle="modal" data-target="#judgesModal34">
						<div class="judge-image">
							<img src="<?php echo get_template_directory_uri(); ?>/images/judge-image.jpg" alt="">
						</div>
						<div class="judge-content">
							<h2>John Doe</h2>
							<h6>Title</h6>
							<h6>Industry</h6>
							<p>Ancillae intellegat mazim integre an nam. Pro te viderer ancillae scribentur. Ancillae intellegat mazim integre.</p>
						</div>
					</div>
					<div class="judge-card d-none d-md-block" data-toggle="modal" data-target="#judgesModal35">
						<div class="judge-image">
							<img src="<?php echo get_template_directory_uri(); ?>/images/judge-image.jpg" alt="">
						</div>
						<div class="judge-content">
							<h2>John Doe</h2>
							<h6>Title</h6>
							<h6>Industry</h6>
							<p>Ancillae intellegat mazim integre an nam. Pro te viderer ancillae scribentur. Ancillae intellegat mazim integre.</p>
						</div>
					</div>
					<div class="judge-card d-none d-md-block" data-toggle="modal" data-target="#judgesModal36">
						<div class="judge-image">
							<img src="<?php echo get_template_directory_uri(); ?>/images/judge-image.jpg" alt="">
						</div>
						<div class="judge-content">
							<h2>John Doe</h2>
							<h6>Title</h6>
							<h6>Industry</h6>
							<p>Ancillae intellegat mazim integre an nam. Pro te viderer ancillae scribentur. Ancillae intellegat mazim integre.</p>
						</div>
					</div>
				</div>
				<div class="investment-alliance-form hide-desktop">
					<div class="investment-alliance-content see-mobile-link">
						<p><a href="/investment-alliance">See our full list</a></p>
					</div>
					<div class="form-group mb-0">
						<a href="mailto:info@plasticprize.org?subject=Investment Alliance" class="form-control">Interested in <br>the investment alliance?</a>
						<input type="submit" value="&#xf054;" class="submit-btn">
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="modal fade" id="openInvestmentAllianceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
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



<div class="modal fade" id="judgesModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><img src="/wp-content/uploads/2021/01/close.png"></span>
				</button>
				<div class="judge-profile">
					<div class="row">
						<div class="col-lg-6">
							<div class="judge-profile-image">
								<img src="/wp-content/themes/tomford/images/judge-profile-pic.jpg" alt="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="judge-profile-content">
								<h2>John Doe(CEO of X)</h2>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<div class="social-icons">
									<ul>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/insta.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/twitter.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/fb.png"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-prev"><img src="/wp-content/uploads/2021/01/left.png"> Leo Doe</button>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-next">Jane Doe <img src="/wp-content/uploads/2021/01/right.png"></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="judgesModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><img src="/wp-content/uploads/2021/01/close.png"></span>
				</button>
				<div class="judge-profile">
					<div class="row">
						<div class="col-lg-6">
							<div class="judge-profile-image">
								<img src="/wp-content/themes/tomford/images/judge-profile-pic.jpg" alt="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="judge-profile-content">
								<h2>John Doe(CEO of X)</h2>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<div class="social-icons">
									<ul>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/insta.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/twitter.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/fb.png"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-prev"><img src="/wp-content/uploads/2021/01/left.png"> Leo Doe</button>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-next">Jane Doe <img src="/wp-content/uploads/2021/01/right.png"></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="judgesModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><img src="/wp-content/uploads/2021/01/close.png"></span>
				</button>
				<div class="judge-profile">
					<div class="row">
						<div class="col-lg-6">
							<div class="judge-profile-image">
								<img src="/wp-content/themes/tomford/images/judge-profile-pic.jpg" alt="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="judge-profile-content">
								<h2>John Doe(CEO of X)</h2>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<div class="social-icons">
									<ul>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/insta.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/twitter.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/fb.png"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-prev"><img src="/wp-content/uploads/2021/01/left.png"> Leo Doe</button>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-next">Jane Doe <img src="/wp-content/uploads/2021/01/right.png"></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="judgesModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><img src="/wp-content/uploads/2021/01/close.png"></span>
				</button>
				<div class="judge-profile">
					<div class="row">
						<div class="col-lg-6">
							<div class="judge-profile-image">
								<img src="/wp-content/themes/tomford/images/judge-profile-pic.jpg" alt="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="judge-profile-content">
								<h2>John Doe(CEO of X)</h2>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<div class="social-icons">
									<ul>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/insta.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/twitter.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/fb.png"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-prev"><img src="/wp-content/uploads/2021/01/left.png"> Leo Doe</button>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-next">Jane Doe <img src="/wp-content/uploads/2021/01/right.png"></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="judgesModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><img src="/wp-content/uploads/2021/01/close.png"></span>
				</button>
				<div class="judge-profile">
					<div class="row">
						<div class="col-lg-6">
							<div class="judge-profile-image">
								<img src="/wp-content/themes/tomford/images/judge-profile-pic.jpg" alt="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="judge-profile-content">
								<h2>John Doe(CEO of X)</h2>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<div class="social-icons">
									<ul>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/insta.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/twitter.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/fb.png"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-prev"><img src="/wp-content/uploads/2021/01/left.png"> Leo Doe</button>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-next">Jane Doe <img src="/wp-content/uploads/2021/01/right.png"></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="judgesModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><img src="/wp-content/uploads/2021/01/close.png"></span>
				</button>
				<div class="judge-profile">
					<div class="row">
						<div class="col-lg-6">
							<div class="judge-profile-image">
								<img src="/wp-content/themes/tomford/images/judge-profile-pic.jpg" alt="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="judge-profile-content">
								<h2>John Doe(CEO of X)</h2>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<div class="social-icons">
									<ul>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/insta.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/twitter.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/fb.png"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-prev"><img src="/wp-content/uploads/2021/01/left.png"> Leo Doe</button>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-next">Jane Doe <img src="/wp-content/uploads/2021/01/right.png"></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="judgesModal7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><img src="/wp-content/uploads/2021/01/close.png"></span>
				</button>
				<div class="judge-profile">
					<div class="row">
						<div class="col-lg-6">
							<div class="judge-profile-image">
								<img src="/wp-content/themes/tomford/images/judge-profile-pic.jpg" alt="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="judge-profile-content">
								<h2>John Doe(CEO of X)</h2>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<div class="social-icons">
									<ul>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/insta.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/twitter.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/fb.png"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-prev"><img src="/wp-content/uploads/2021/01/left.png"> Leo Doe</button>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-next">Jane Doe <img src="/wp-content/uploads/2021/01/right.png"></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="judgesModal8" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><img src="/wp-content/uploads/2021/01/close.png"></span>
				</button>
				<div class="judge-profile">
					<div class="row">
						<div class="col-lg-6">
							<div class="judge-profile-image">
								<img src="/wp-content/themes/tomford/images/judge-profile-pic.jpg" alt="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="judge-profile-content">
								<h2>John Doe(CEO of X)</h2>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<div class="social-icons">
									<ul>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/insta.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/twitter.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/fb.png"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-prev"><img src="/wp-content/uploads/2021/01/left.png"> Leo Doe</button>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-next">Jane Doe <img src="/wp-content/uploads/2021/01/right.png"></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="judgesModal9" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><img src="/wp-content/uploads/2021/01/close.png"></span>
				</button>
				<div class="judge-profile">
					<div class="row">
						<div class="col-lg-6">
							<div class="judge-profile-image">
								<img src="/wp-content/themes/tomford/images/judge-profile-pic.jpg" alt="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="judge-profile-content">
								<h2>John Doe(CEO of X)</h2>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<div class="social-icons">
									<ul>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/insta.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/twitter.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/fb.png"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-prev"><img src="/wp-content/uploads/2021/01/left.png"> Leo Doe</button>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-next">Jane Doe <img src="/wp-content/uploads/2021/01/right.png"></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="judgesModal10" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><img src="/wp-content/uploads/2021/01/close.png"></span>
				</button>
				<div class="judge-profile">
					<div class="row">
						<div class="col-lg-6">
							<div class="judge-profile-image">
								<img src="/wp-content/themes/tomford/images/judge-profile-pic.jpg" alt="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="judge-profile-content">
								<h2>John Doe(CEO of X)</h2>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<div class="social-icons">
									<ul>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/insta.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/twitter.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/fb.png"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-prev"><img src="/wp-content/uploads/2021/01/left.png"> Leo Doe</button>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-next">Jane Doe <img src="/wp-content/uploads/2021/01/right.png"></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="judgesModal11" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><img src="/wp-content/uploads/2021/01/close.png"></span>
				</button>
				<div class="judge-profile">
					<div class="row">
						<div class="col-lg-6">
							<div class="judge-profile-image">
								<img src="/wp-content/themes/tomford/images/judge-profile-pic.jpg" alt="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="judge-profile-content">
								<h2>John Doe(CEO of X)</h2>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<div class="social-icons">
									<ul>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/insta.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/twitter.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/fb.png"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-prev"><img src="/wp-content/uploads/2021/01/left.png"> Leo Doe</button>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-next">Jane Doe <img src="/wp-content/uploads/2021/01/right.png"></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="judgesModal12" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><img src="/wp-content/uploads/2021/01/close.png"></span>
				</button>
				<div class="judge-profile">
					<div class="row">
						<div class="col-lg-6">
							<div class="judge-profile-image">
								<img src="/wp-content/themes/tomford/images/judge-profile-pic.jpg" alt="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="judge-profile-content">
								<h2>John Doe(CEO of X)</h2>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<div class="social-icons">
									<ul>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/insta.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/twitter.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/fb.png"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-prev"><img src="/wp-content/uploads/2021/01/left.png"> Leo Doe</button>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-next">Jane Doe <img src="/wp-content/uploads/2021/01/right.png"></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="judgesModal13" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><img src="/wp-content/uploads/2021/01/close.png"></span>
				</button>
				<div class="judge-profile">
					<div class="row">
						<div class="col-lg-6">
							<div class="judge-profile-image">
								<img src="/wp-content/themes/tomford/images/judge-profile-pic.jpg" alt="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="judge-profile-content">
								<h2>John Doe(CEO of X)</h2>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<div class="social-icons">
									<ul>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/insta.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/twitter.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/fb.png"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-prev"><img src="/wp-content/uploads/2021/01/left.png"> Leo Doe</button>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-next">Jane Doe <img src="/wp-content/uploads/2021/01/right.png"></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="judgesModal14" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><img src="/wp-content/uploads/2021/01/close.png"></span>
				</button>
				<div class="judge-profile">
					<div class="row">
						<div class="col-lg-6">
							<div class="judge-profile-image">
								<img src="/wp-content/themes/tomford/images/judge-profile-pic.jpg" alt="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="judge-profile-content">
								<h2>John Doe(CEO of X)</h2>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<div class="social-icons">
									<ul>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/insta.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/twitter.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/fb.png"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-prev"><img src="/wp-content/uploads/2021/01/left.png"> Leo Doe</button>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-next">Jane Doe <img src="/wp-content/uploads/2021/01/right.png"></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="judgesModal15" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><img src="/wp-content/uploads/2021/01/close.png"></span>
				</button>
				<div class="judge-profile">
					<div class="row">
						<div class="col-lg-6">
							<div class="judge-profile-image">
								<img src="/wp-content/themes/tomford/images/judge-profile-pic.jpg" alt="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="judge-profile-content">
								<h2>John Doe(CEO of X)</h2>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<div class="social-icons">
									<ul>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/insta.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/twitter.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/fb.png"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-prev"><img src="/wp-content/uploads/2021/01/left.png"> Leo Doe</button>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-next">Jane Doe <img src="/wp-content/uploads/2021/01/right.png"></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="judgesModal16" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><img src="/wp-content/uploads/2021/01/close.png"></span>
				</button>
				<div class="judge-profile">
					<div class="row">
						<div class="col-lg-6">
							<div class="judge-profile-image">
								<img src="/wp-content/themes/tomford/images/judge-profile-pic.jpg" alt="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="judge-profile-content">
								<h2>John Doe(CEO of X)</h2>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<div class="social-icons">
									<ul>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/insta.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/twitter.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/fb.png"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-prev"><img src="/wp-content/uploads/2021/01/left.png"> Leo Doe</button>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-next">Jane Doe <img src="/wp-content/uploads/2021/01/right.png"></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="judgesModal17" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><img src="/wp-content/uploads/2021/01/close.png"></span>
				</button>
				<div class="judge-profile">
					<div class="row">
						<div class="col-lg-6">
							<div class="judge-profile-image">
								<img src="/wp-content/themes/tomford/images/judge-profile-pic.jpg" alt="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="judge-profile-content">
								<h2>John Doe(CEO of X)</h2>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<div class="social-icons">
									<ul>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/insta.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/twitter.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/fb.png"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-prev"><img src="/wp-content/uploads/2021/01/left.png"> Leo Doe</button>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-next">Jane Doe <img src="/wp-content/uploads/2021/01/right.png"></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="judgesModal18" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><img src="/wp-content/uploads/2021/01/close.png"></span>
				</button>
				<div class="judge-profile">
					<div class="row">
						<div class="col-lg-6">
							<div class="judge-profile-image">
								<img src="/wp-content/themes/tomford/images/judge-profile-pic.jpg" alt="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="judge-profile-content">
								<h2>John Doe(CEO of X)</h2>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<div class="social-icons">
									<ul>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/insta.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/twitter.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/fb.png"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-prev"><img src="/wp-content/uploads/2021/01/left.png"> Leo Doe</button>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-next">Jane Doe <img src="/wp-content/uploads/2021/01/right.png"></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="judgesModal19" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><img src="/wp-content/uploads/2021/01/close.png"></span>
				</button>
				<div class="judge-profile">
					<div class="row">
						<div class="col-lg-6">
							<div class="judge-profile-image">
								<img src="/wp-content/themes/tomford/images/judge-profile-pic.jpg" alt="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="judge-profile-content">
								<h2>John Doe(CEO of X)</h2>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<div class="social-icons">
									<ul>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/insta.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/twitter.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/fb.png"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-prev"><img src="/wp-content/uploads/2021/01/left.png"> Leo Doe</button>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-next">Jane Doe <img src="/wp-content/uploads/2021/01/right.png"></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="judgesModal20" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><img src="/wp-content/uploads/2021/01/close.png"></span>
				</button>
				<div class="judge-profile">
					<div class="row">
						<div class="col-lg-6">
							<div class="judge-profile-image">
								<img src="/wp-content/themes/tomford/images/judge-profile-pic.jpg" alt="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="judge-profile-content">
								<h2>John Doe(CEO of X)</h2>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<div class="social-icons">
									<ul>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/insta.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/twitter.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/fb.png"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-prev"><img src="/wp-content/uploads/2021/01/left.png"> Leo Doe</button>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-next">Jane Doe <img src="/wp-content/uploads/2021/01/right.png"></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="judgesModal21" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><img src="/wp-content/uploads/2021/01/close.png"></span>
				</button>
				<div class="judge-profile">
					<div class="row">
						<div class="col-lg-6">
							<div class="judge-profile-image">
								<img src="/wp-content/themes/tomford/images/judge-profile-pic.jpg" alt="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="judge-profile-content">
								<h2>John Doe(CEO of X)</h2>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<div class="social-icons">
									<ul>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/insta.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/twitter.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/fb.png"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-prev"><img src="/wp-content/uploads/2021/01/left.png"> Leo Doe</button>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-next">Jane Doe <img src="/wp-content/uploads/2021/01/right.png"></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="judgesModal22" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><img src="/wp-content/uploads/2021/01/close.png"></span>
				</button>
				<div class="judge-profile">
					<div class="row">
						<div class="col-lg-6">
							<div class="judge-profile-image">
								<img src="/wp-content/themes/tomford/images/judge-profile-pic.jpg" alt="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="judge-profile-content">
								<h2>John Doe(CEO of X)</h2>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<div class="social-icons">
									<ul>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/insta.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/twitter.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/fb.png"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-prev"><img src="/wp-content/uploads/2021/01/left.png"> Leo Doe</button>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-next">Jane Doe <img src="/wp-content/uploads/2021/01/right.png"></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="judgesModal23" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><img src="/wp-content/uploads/2021/01/close.png"></span>
				</button>
				<div class="judge-profile">
					<div class="row">
						<div class="col-lg-6">
							<div class="judge-profile-image">
								<img src="/wp-content/themes/tomford/images/judge-profile-pic.jpg" alt="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="judge-profile-content">
								<h2>John Doe(CEO of X)</h2>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<div class="social-icons">
									<ul>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/insta.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/twitter.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/fb.png"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-prev"><img src="/wp-content/uploads/2021/01/left.png"> Leo Doe</button>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-next">Jane Doe <img src="/wp-content/uploads/2021/01/right.png"></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="judgesModal24" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><img src="/wp-content/uploads/2021/01/close.png"></span>
				</button>
				<div class="judge-profile">
					<div class="row">
						<div class="col-lg-6">
							<div class="judge-profile-image">
								<img src="/wp-content/themes/tomford/images/judge-profile-pic.jpg" alt="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="judge-profile-content">
								<h2>John Doe(CEO of X)</h2>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<div class="social-icons">
									<ul>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/insta.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/twitter.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/fb.png"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-prev"><img src="/wp-content/uploads/2021/01/left.png"> Leo Doe</button>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-next">Jane Doe <img src="/wp-content/uploads/2021/01/right.png"></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="judgesModal25" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><img src="/wp-content/uploads/2021/01/close.png"></span>
				</button>
				<div class="judge-profile">
					<div class="row">
						<div class="col-lg-6">
							<div class="judge-profile-image">
								<img src="/wp-content/themes/tomford/images/judge-profile-pic.jpg" alt="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="judge-profile-content">
								<h2>John Doe(CEO of X)</h2>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<div class="social-icons">
									<ul>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/insta.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/twitter.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/fb.png"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-prev"><img src="/wp-content/uploads/2021/01/left.png"> Leo Doe</button>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-next">Jane Doe <img src="/wp-content/uploads/2021/01/right.png"></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="judgesModal26" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><img src="/wp-content/uploads/2021/01/close.png"></span>
				</button>
				<div class="judge-profile">
					<div class="row">
						<div class="col-lg-6">
							<div class="judge-profile-image">
								<img src="/wp-content/themes/tomford/images/judge-profile-pic.jpg" alt="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="judge-profile-content">
								<h2>John Doe(CEO of X)</h2>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<div class="social-icons">
									<ul>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/insta.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/twitter.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/fb.png"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-prev"><img src="/wp-content/uploads/2021/01/left.png"> Leo Doe</button>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-next">Jane Doe <img src="/wp-content/uploads/2021/01/right.png"></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="judgesModal27" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><img src="/wp-content/uploads/2021/01/close.png"></span>
				</button>
				<div class="judge-profile">
					<div class="row">
						<div class="col-lg-6">
							<div class="judge-profile-image">
								<img src="/wp-content/themes/tomford/images/judge-profile-pic.jpg" alt="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="judge-profile-content">
								<h2>John Doe(CEO of X)</h2>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<div class="social-icons">
									<ul>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/insta.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/twitter.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/fb.png"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-prev"><img src="/wp-content/uploads/2021/01/left.png"> Leo Doe</button>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-next">Jane Doe <img src="/wp-content/uploads/2021/01/right.png"></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="judgesModal28" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><img src="/wp-content/uploads/2021/01/close.png"></span>
				</button>
				<div class="judge-profile">
					<div class="row">
						<div class="col-lg-6">
							<div class="judge-profile-image">
								<img src="/wp-content/themes/tomford/images/judge-profile-pic.jpg" alt="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="judge-profile-content">
								<h2>John Doe(CEO of X)</h2>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<div class="social-icons">
									<ul>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/insta.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/twitter.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/fb.png"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-prev"><img src="/wp-content/uploads/2021/01/left.png"> Leo Doe</button>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-next">Jane Doe <img src="/wp-content/uploads/2021/01/right.png"></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="judgesModal29" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><img src="/wp-content/uploads/2021/01/close.png"></span>
				</button>
				<div class="judge-profile">
					<div class="row">
						<div class="col-lg-6">
							<div class="judge-profile-image">
								<img src="/wp-content/themes/tomford/images/judge-profile-pic.jpg" alt="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="judge-profile-content">
								<h2>John Doe(CEO of X)</h2>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<div class="social-icons">
									<ul>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/insta.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/twitter.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/fb.png"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-prev"><img src="/wp-content/uploads/2021/01/left.png"> Leo Doe</button>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-next">Jane Doe <img src="/wp-content/uploads/2021/01/right.png"></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="judgesModal30" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><img src="/wp-content/uploads/2021/01/close.png"></span>
				</button>
				<div class="judge-profile">
					<div class="row">
						<div class="col-lg-6">
							<div class="judge-profile-image">
								<img src="/wp-content/themes/tomford/images/judge-profile-pic.jpg" alt="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="judge-profile-content">
								<h2>John Doe(CEO of X)</h2>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<div class="social-icons">
									<ul>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/insta.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/twitter.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/fb.png"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-prev"><img src="/wp-content/uploads/2021/01/left.png"> Leo Doe</button>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-next">Jane Doe <img src="/wp-content/uploads/2021/01/right.png"></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="judgesModal31" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><img src="/wp-content/uploads/2021/01/close.png"></span>
				</button>
				<div class="judge-profile">
					<div class="row">
						<div class="col-lg-6">
							<div class="judge-profile-image">
								<img src="/wp-content/themes/tomford/images/judge-profile-pic.jpg" alt="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="judge-profile-content">
								<h2>John Doe(CEO of X)</h2>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<div class="social-icons">
									<ul>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/insta.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/twitter.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/fb.png"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-prev"><img src="/wp-content/uploads/2021/01/left.png"> Leo Doe</button>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-next">Jane Doe <img src="/wp-content/uploads/2021/01/right.png"></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="judgesModal32" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><img src="/wp-content/uploads/2021/01/close.png"></span>
				</button>
				<div class="judge-profile">
					<div class="row">
						<div class="col-lg-6">
							<div class="judge-profile-image">
								<img src="/wp-content/themes/tomford/images/judge-profile-pic.jpg" alt="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="judge-profile-content">
								<h2>John Doe(CEO of X)</h2>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<div class="social-icons">
									<ul>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/insta.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/twitter.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/fb.png"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-prev"><img src="/wp-content/uploads/2021/01/left.png"> Leo Doe</button>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-next">Jane Doe <img src="/wp-content/uploads/2021/01/right.png"></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="judgesModal33" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><img src="/wp-content/uploads/2021/01/close.png"></span>
				</button>
				<div class="judge-profile">
					<div class="row">
						<div class="col-lg-6">
							<div class="judge-profile-image">
								<img src="/wp-content/themes/tomford/images/judge-profile-pic.jpg" alt="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="judge-profile-content">
								<h2>John Doe(CEO of X)</h2>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<div class="social-icons">
									<ul>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/insta.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/twitter.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/fb.png"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-prev"><img src="/wp-content/uploads/2021/01/left.png"> Leo Doe</button>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-next">Jane Doe <img src="/wp-content/uploads/2021/01/right.png"></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="judgesModal34" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><img src="/wp-content/uploads/2021/01/close.png"></span>
				</button>
				<div class="judge-profile">
					<div class="row">
						<div class="col-lg-6">
							<div class="judge-profile-image">
								<img src="/wp-content/themes/tomford/images/judge-profile-pic.jpg" alt="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="judge-profile-content">
								<h2>John Doe(CEO of X)</h2>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<div class="social-icons">
									<ul>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/insta.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/twitter.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/fb.png"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-prev"><img src="/wp-content/uploads/2021/01/left.png"> Leo Doe</button>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-next">Jane Doe <img src="/wp-content/uploads/2021/01/right.png"></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="judgesModal35" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><img src="/wp-content/uploads/2021/01/close.png"></span>
				</button>
				<div class="judge-profile">
					<div class="row">
						<div class="col-lg-6">
							<div class="judge-profile-image">
								<img src="/wp-content/themes/tomford/images/judge-profile-pic.jpg" alt="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="judge-profile-content">
								<h2>John Doe(CEO of X)</h2>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<div class="social-icons">
									<ul>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/insta.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/twitter.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/fb.png"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-prev"><img src="/wp-content/uploads/2021/01/left.png"> Leo Doe</button>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-next">Jane Doe <img src="/wp-content/uploads/2021/01/right.png"></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="judgesModal36" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><img src="/wp-content/uploads/2021/01/close.png"></span>
				</button>
				<div class="judge-profile">
					<div class="row">
						<div class="col-lg-6">
							<div class="judge-profile-image">
								<img src="/wp-content/themes/tomford/images/judge-profile-pic.jpg" alt="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="judge-profile-content">
								<h2>John Doe(CEO of X)</h2>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
								<div class="social-icons">
									<ul>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/insta.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/twitter.png"></a></li>
										<li><a href="#" target="_blank"><img src="/wp-content/uploads/2021/01/fb.png"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-prev"><img src="/wp-content/uploads/2021/01/left.png"> Leo Doe</button>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<button type="button" class="btn btn-default btn-next">Jane Doe <img src="/wp-content/uploads/2021/01/right.png"></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
get_footer('home');