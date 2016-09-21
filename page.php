<?php get_header(); ?>
	
	<section class="p-y-3 m-t-4">

      <div class="container">

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php the_content(); ?>

				<br class="clear">

				<?php edit_post_link(); ?>

			</article>
			<!-- /article -->

		<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article>

				<h2><?php _e( 'Sorry, nothing to display.', 'chilly' ); ?></h2>

			</article>
			<!-- /article -->

		<?php endif; ?>

		</div>
		<!-- /section -->
	</section>

<?php get_footer(); ?>
