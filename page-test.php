<?php /* Template Name: Testing */ get_header(); ?>

	<section class="p-y-3 m-t-4">
      <div class="container text-center">
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
			<h3 class="text-uppercase"><?php the_title(); ?></h3>
			<hr class="title-underlined"/>
			<p class="wide"><?php the_content(); ?></p>
			<div class="row p-y-3">
				<div class="row">
				<div class="col-md-6 btn-edgy">

					<div class="profile">
						<div class="row">
							<?php the_field('profile_one'); ?>
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
    <!-- Testimonials
    ================================================== -->

    <section class="section-testimonials text-xs-center bg-inverse">

        <h3 class="sr-only"><?php _e( 'Testimonials', 'chilly' ); ?></h3>
        <div id="carousel-testimonials" class="carousel slide" data-ride="carousel" data-interval="5000">
          <div class="carousel-inner" role="listbox">
          	<?php
          		$args = array( 'post_type' => 'testimonial', 'posts_per_page' => 5 );
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();?>
					<div class="carousel-item <?php if( $loop -> current_post == 0) echo 'active';?>">
		              <blockquote class="blockquote">
		                <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id(), 'small'); ?>" height="80" width="80" alt="Avatar" class="img-circle">
		                <p class="h3"><?php the_content();?></p>
		                <footer><?php the_title();?></footer>
		              </blockquote>
		            </div>
			<?php
				endwhile;
			?>
          </div>
		    <ol class="carousel-indicators">
				<li data-target="#carousel-testimonials" data-slide-to="0" class="active"></li>
				<li data-target="#carousel-testimonials" data-slide-to="1"></li>
				<li data-target="#carousel-testimonials" data-slide-to="2"></li>
			</ol>   
          <!--<ol class="carousel-indicators">
            <li class="active"><img src="<?php echo get_template_directory_uri(); ?>/img/face5.jpg" alt="Navigation avatar" data-target="#carousel-testimonials" data-slide-to="0" class="img-fluid img-circle"></li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/img/face5.jpg" alt="Navigation avatar" data-target="#carousel-testimonials" data-slide-to="1" class="img-fluid img-circle"></li>
          </ol>-->
		Controls 
		<a class="carousel-control left" href="#carousel-testimonials" data-slide="prev">
			<span class="icon-prev"></span>
		</a>
		<a class="carousel-control right" href="#carousel-testimonials" data-slide="next">
			<span class="icon-next"></span>
		</a> 
        </div>


    </section>
	
	<section class="p-y-3 m-t-4">
      <div class="container text-center">
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
			<h3 class="text-uppercase"><?php the_title(); ?></h3>
			<hr class="title-underlined"/>
			<p class="wide"><?php the_content(); ?></p>
			<div class="row p-y-3">
				<div class="row">
				<div class="col-md-6 btn-edgy">

					<div class="profile">
						<div class="row">
							<?php the_field('profile_one'); ?>
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