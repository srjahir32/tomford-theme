<?php
/**
 * Template Name: Prize Development Council
 */

get_header();

$args_prize_council = array(
	'post_type' => 'peoples',
	'post_status' => 'publish',
	'category_name' => 'prize-development-council',
	'posts_per_page' => -1,
	'order' => 'DESC'
);
$query_prize_council = new WP_Query( $args_prize_council );
?>

<section class="prize-development-council singlepage" id="prize-development-council">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-7">
				<div class="section-title">
					<h2>Prize Development Council</h2>
				</div>
				<div class="investment-alliance-content">
					<p>Our mission is Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
				</div>
			</div>
			<div class="col-lg-12">
			<?php if( $query_prize_council->have_posts() ) : ?>
				<div class="our-judges-grid">
				<?php while( $query_prize_council->have_posts() ): $query_prize_council->the_post(); ?>
					<div class="judge-card" data-toggle="modal" data-target="#judgesModal"
						onclick="showPeopleModal(<?php the_ID(); ?>, 'prize-development-council')">
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

<?php
get_footer('home');