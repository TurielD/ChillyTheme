<?php get_header(); ?>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<section class="section-intro bg-faded text-xs-center">
			<ul id="lightSlider">
				<?php
					for ( $i=1; $i<=5; $i++) {
						$var_slide = 'slide_'.$i;
						$image = get_field($var_slide);
						
						$slider_image = wp_get_attachment_image_src( $image, 'slider' );
						if ($image) {
							echo '<li><img src="'.$slider_image[0].'"/></li>';
						}

				}
				?>
			</ul>
			<div class="container">
				<?php
				$cityID = get_field('city');
				echo '<h6>'.get_cat_name($cityID).'</h6>';
				echo '<hr class="title-underlined"/>';
				echo '<p class="wide">'.category_description($cityID).'</p>';
			?>
			</div>
	    </section>
	    <section>
		    <div class="container-fluid">
		    	<div class="col-md-6">
					<article class="text-xs-center p-xl">
						<h1><?php the_title(); ?></h1>
						<h5 class="text-uppercase"><?php echo 'Open: '; echo the_field('week_days'); echo '~'; echo the_field('hours');?></h5>
						<hr class="title-underlined"/>
						<?php the_content();?>

						<h6 class="text-uppercase p-y-3"><?php _e('Features', 'chilly'); ?></h6>
						<?php if (get_field('wifi')) {
							echo '<div class="col-md-6 p-l"><span class="csp-icon icon-wifi"></span>';
							echo 'WIFI</div>';
							}
						?>

						<?php if (get_field('available_places')) {
							echo '<div class="col-md-6 p-l"><span class="csp-icon icon-seat"></span>';
							the_field('available_places');
							echo '</div>';
							}
						?>
						<?php if (get_field('drinks')) {
							echo '<div class="col-md-6 p-l"><span class="csp-icon icon-drinks"></span>';
							_e('We serve Drinks', 'chilly');
							echo '</div>';
							}
						?>
						<?php if (get_field('spectacular_view')) {
							echo '<div class="col-md-6 p-l"><span class="csp-icon icon-view"></span>';
							_e('Spectacular View', 'chilly');
							echo '</div>';
							};
						?>
						<?php if (get_field('free_parking')) {
							echo '<div class="col-md-6 p-l"><span class="csp-icon icon-parking"></span>';
							_e('Free Parking', 'chilly');
							echo '</div>';
							}
						?>
						<?php if (get_field('printing_scanning')) {
							echo '<div class="col-md-6 p-l"><span class="csp-icon icon-printer"></span>';
							_e('Printing & Scanning', 'chilly');
							echo '</div>';
							}
						?>


						<?php the_tags( __( 'Tags: ', 'chilly' ), ', ', '<br>'); ?>

						<?php edit_post_link(); ?>
					</article>
		    	</div>
		    	<div class="col-md-6">
			    	<?php 
						$location = get_field('map');
						if( !empty($location) ):
						?>
						<div class="csp-map">
							<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
						</div>
					<?php endif; ?>
		    	</div>
				
			</div>
		</section>

	<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'chilly' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>

<?php get_footer(); ?>