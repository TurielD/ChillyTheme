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
		    <div class="container">
				<article class="text-xs-center p-xl">
					<h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
					<h5 class="text-uppercase"><?php echo 'Open: '; echo the_field('week_days'); echo '~'; echo the_field('hours');?></h5>
					<hr class="title-underlined"/>
					<?php the_content();?>

					<h6 class="text-uppercase">Features</h6>
					<ul>
						<li><?php if (get_field('wifi')) echo 'WIFI';?></li>
						<li>Seats Available: <?php the_field('available_places'); ?></li>
						<li><?php if (get_field('drinks')) echo 'We serve Drinks';?></li>
						<li><?php if (get_field('spectacular_view')) echo 'Spectacular View';?></li>
						<li><?php if (get_field('free_parking')) echo 'Free Parking';?></li>
					</ul>

					<?php the_tags( __( 'Tags: ', 'chilly' ), ', ', '<br>'); ?>

					<?php edit_post_link(); ?>
				</article>
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