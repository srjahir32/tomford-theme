<?php
/**
 * Template Name: Our Judges
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
?>

<section class="our-judges singlepage" id="our-judges">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-7">
				<div class="section-title">
					<h2>Our Judges</h2>
				</div>
				<div class="our-judges-content">
					<p>How judges are selected. Altera integre suavitate per an, alienum phaedrum te sea. Ex sea causae dolores, nam et doming dicunt feugait. Ea mel scripta aperiri postulant. Altera integre suavitate per an, alienum phaedrum te sea. Ex sea causae dolores, nam et doming dicunt feugait. Ea mel scripta aperiri postulant. </p>
				</div>
				<div class="ceo-judge">
					<div class="row">
						<div class="col">
							<div class="ceo-image"><img src="<?php echo get_template_directory_uri(); ?>/images/tom-ford.jpg" alt=""></div>
						</div>
						<div class="col">
							<div class="about-ceo">
								<h2>Tom Ford</h2>
								<h4>CEO, founder of Tom Ford</h4>
								<p>Ancillae intellegat mazim integre an nam. Pro te viderer ancillae scribentur. illae telzitelziintellegat mazim integre. Ancillae intelzim integre an nam. Pro te viderer ancillibentur. Ancillae intellegat mazim integre. Ancillae intemazim integre an nam. Pro te viderer ancillae scribentur. Ancillae intellegat mazim integre. </p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-12">
			<?php if( $query_judge->have_posts() ) : ?>
				<div class="our-judges-grid">
					<?php while( $query_judge->have_posts() ): $query_judge->the_post(); ?>
						<div class="judge-card <?php echo $class; ?>" data-toggle="modal"  data-target="#judgesModal" onclick="showPeopleModal(<?php the_ID(); ?>, 'judge')">
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
					endwhile;
					wp_reset_postdata();
					?>
				</div>
			<?php endif; ?>
			</div>
		</div>
	</div>
</section>

<!-- open people modal -->
<div class="modal fade" id="peopleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><img src="/wp-content/uploads/2021/01/close.png"></span>
				</button>
				<img src="<?php echo site_url();?>/wp-content/uploads/2021/02/loader3.gif" class="modal_loader_img">
				<div id="people_profile_data">
				</div>
			</div>
		</div>
	</div>
</div>

<?php
get_footer('home');