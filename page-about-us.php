<?php /* Template Name: About Us */ get_header(); ?>
	
	<section class="p-y-3 m-t-4">
      <div class="container text-center">
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
			<h3 class="text-uppercase"><?php the_title(); ?></h3>
			<hr class="title-underlined"/>
			<p class="wide"><?php the_content(); ?></p>
			<div class="row p-y-3">
				<div class="row">
				<div class="col-md-5">
					<div class="profile">
						<div class="row">
							<?php the_field('profile_one'); ?>
						</div>
					</div>
				</div>
				</div>
				<div class="row">
				<div class="col-md-5 col-md-offset-1">
					<div class="profile">
						<div class="row">
							<?php the_field('profile_two'); ?>
						</div>
					</div>
				</div>
				</div>
				<div class="row">
				<div class="col-md-5 col-md-offset-2">
					<div class="profile">
						<div class="row">
							<?php the_field('profile_three'); ?>
						</div>
					</div>
				</div>
				</div>
				<div class="row">
				<div class="col-md-5 col-md-offset-3">
					<div class="profile">
						<div class="row">
							<?php the_field('profile_four'); ?>
						</div>
					</div>
				</div>
				</div>
				<div class="row">
				<div class="col-md-5 col-md-offset-4">
					<div class="profile">
						<div class="row">
							<?php the_field('profile_five'); ?>
						</div>
					</div>
				</div>
				</div>
			</div>
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