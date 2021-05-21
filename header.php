<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php
	if (is_singular('user_submission')) the_field('product_name');
	else the_title();
	  ?> - Tom Ford Plastic Innovation Prize</title>

	<!-- Font-Awesome CSS -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
	
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
	
	<!-- css Files -->
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/responsive.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style-team.css">

	<?php wp_head();
	acf_form_head();
	?>

</head>
<body <?php body_class(); ?>>
	
	<header class="sticky-top">
		<?php if (is_front_page() || is_page('press-tools') || is_page('prize-development-council') || is_page('our-judges') || is_page('investment-alliance') ) { ?>
			<div class="top-bar d-none d-lg-block">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-6">
							<a data-toggle="modal" data-target="#exampleModalCenter">NEWSLETTER SIGNUP ></a>
						</div>
						<div class="col-md-6 text-right">
							<?php if (is_user_logged_in()) { ?>
								<a href="<?php echo wp_logout_url( home_url() ); ?>">LOGOUT</a>
							<?php } else { ?>
								<div class="dropdown">
									<a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">LOGIN</a>
									<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
										<a class="dropdown-item" href="<?php echo site_url('login')?>">SUBMISSION</a>
										<a class="dropdown-item" href="<?php echo site_url('judge-login')?>">JUDGE</a>
										<a class="dropdown-item" href="<?php echo site_url('team-login')?>">52HZ TEAM</a>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		<?php } else { ?>
			
		<?php } ?>
		<?php if (is_front_page() || is_page('press-tools') || is_page('prize-development-council') || is_page('our-judges') || is_page('investment-alliance') ) { ?>
			<nav class="navbar navbar-expand-lg navbar-dark" id="destopNavbar">
				<div class="container-fluid">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
							<li class="nav-item">
								<a class="nav-link" href="<?php if (is_front_page()) { ?>#the-prize<? } else { ?>/#the-prize <?php } ?>">The Prize</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?php if (is_front_page()) { ?>#the-problem<? } else { ?>/#the-problem <?php } ?>">The Problem</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?php if (is_front_page()) { ?>#submission<? } else { ?>/#submission <?php } ?>">Submissions</a>
							</li>
						</ul>
						<a href="<?php the_field('logo_link', 'option'); ?>" class="navbar-brand mx-auto">
							<img src="<?php the_field('site_logo', 'option'); ?>" alt="">
						</a>
						<ul class="navbar-nav ml-auto">
							<li class="nav-item">
								<a class="nav-link" href="<?php if (is_front_page()) { ?>#our-judges<? } else { ?>/our-judges<?php } ?>">Our Judges</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?php if (is_front_page()) { ?>#prize-development-council<? } else { ?>/prize-development-council<?php } ?>">Prize Council</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?php if (is_front_page()) { ?>#investment-alliance<? } else { ?>/investment-alliance<?php } ?>">Investment<br>alliance</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		<?php } else { ?>
			<nav class="navbar navbar-dark sticky-top">
				<a href="<?php the_field('logo_link', 'option'); ?>" class="navbar-brand mx-auto">
					<img src="<?php the_field('site_logo', 'option'); ?>" alt="">
				</a>
				<button class="navbar-toggler mobil-btn" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fas fa-bars"></i></button>
				<div class="collapse navbar-collapse mobile-dropdown" id="navbarSupportedContent">
					<ul class="navbar-nav" id="mobileMenu">
						<li class="nav-item">
							<a class="nav-link" href="<?php echo site_url(); ?>">HOME</a>
						</li>
						<?php if (!is_user_logged_in()) { ?>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo site_url('login')?>">SUBMISSION PORTAL</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo site_url('judge-login')?>">JUDGE PORTAL</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo site_url('team-login')?>">52HZ TEAM PORTAL</a>
							</li>
						<?php } else {
							global $user_ID;
							$user_role = "";
							if ($user_meta = get_userdata($user_ID)) {
								$user_roles = $user_meta->roles;
								$user_role = (in_array('team', $user_roles)) ? 'team' : (in_array('judge', $user_roles) ? 'judge' : 'submission');
							}
							if ($user_role == 'submission') { ?>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo site_url('user-dashboard'); ?>">SUBMISSION PORTAL</a>
						</li>
							<?php } else if ($user_role == 'judge') { ?>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo site_url('judge-dashboard')?>">JUDGE PORTAL</a>
						</li>
							<?php } else if ($user_role == 'team') { ?>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo site_url('team-dashboard')?>">52HZ TEAM PORTAL</a>
						</li>
							<?php } ?>
							<li class="nav-item">
								<a class="nav-link" data-toggle="modal" data-target="#logoutModal">LOGOUT</a>
							</li>
						<?php } ?>
					</ul>
				</div>
			</nav>
		<?php } ?>
		
		<?php if (is_front_page() || is_page('press-tools') || is_page('prize-development-council') || is_page('our-judges') || is_page('investment-alliance')) { ?>
			<nav class="navbar navbar-dark sticky-top" id="mobileNavbar">
				<button class="navbar-toggler mobil-btn" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fas fa-bars"></i></button>
				<a href="<?php the_field('logo_link', 'option'); ?>" class="navbar-brand mx-auto">
					<img src="<?php the_field('site_logo', 'option'); ?>" alt="">
				</a>
				<div class="collapse navbar-collapse mobile-dropdown" id="navbarSupportedContent">
					<ul class="navbar-nav " id="mobileMenu">
						<li class="nav-item">
							<a class="nav-link" href="<?php if(is_front_page()){ ?>#the-prize<? } else { ?>/#the-prize <?php } ?>">The Prize</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php if(is_front_page()){ ?>#the-problem<? } else { ?>/#the-problem <?php } ?>">The Problem</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php if(is_front_page()){ ?>#submission<? } else { ?>/#submission <?php } ?>">Submissions</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php if(is_front_page()){ ?>#our-judges<? } else { ?>/our-judges<?php } ?>">Our Judges</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php if(is_front_page()){ ?>#prize-development-council<? } else { ?>/prize-development-council<?php } ?>">Prize Council</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php if(is_front_page()){ ?>#investment-alliance<? } else { ?>/investment-alliance<?php } ?>">Investment alliance</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="https://www.lonelywhale.org/52hz">ABOUT 52HZ</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo site_url('login')?>">SUBMISSION PORTAL</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo site_url('judge-login')?>">JUDGE PORTAL</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo site_url('team-login')?>">52HZ TEAM PORTAL</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="modal" data-target="#exampleModalCenter">NEWSLETTER SIGNUP</a>
						</li>
						<?php if (is_user_logged_in()) { ?>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo wp_logout_url(home_url()); ?>">Logout</a>
						</li>
						<?php } ?>
					</ul>
				</div>
			</nav>
		<?php } ?>
	</header>

	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<div class="logout-modal-content">
						<h2>you are about to log out this account</h2>
						<div class="agreement-btns">
							<button data-dismiss="modal" aria-label="Close">Cancel</button>
							<a href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade newsletter" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<div class="_content">
						<p>SUBSCRIBE TO OUR NEWSLETTER TO STAY UP TO DATE ON THE PRIZE.</p>
						<?php echo do_shortcode( '[contact-form-7 id="20" title="Subscription form"]' ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
