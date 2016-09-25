<?php /* Template Name: About Us */ get_header(); ?>
	
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
				<div class="row">
				<div class="col-md-6 col-md-offset-1">
					<div class="profile">
						<div class="row">
							<?php the_field('profile_two'); ?>
						</div>
					</div>
				</div>
				</div>
				<div class="row">
				<div class="col-md-6 col-md-offset-2">
					<div class="profile">
						<div class="row">
							<?php the_field('profile_three'); ?>
						</div>
					</div>
				</div>
				</div>
				<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="profile">
						<div class="row">
							<?php the_field('profile_four'); ?>
						</div>
					</div>
				</div>
				</div>
				<div class="row">
				<div class="col-md-6 col-md-offset-4">
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
	    <section id="values" class="section-values bg-inverse text-xs-center">
      <div class="container">
        <!-- Mission
        ================================================== -->
        <div class="row p-y-3 values-list">
<!--        <h3 class="wp wp-1 text-uppercase">Our Mission</h3>
        <hr class="title-underlined"/> -->
        <p class="lead wp wp-3 wide"><?php the_field('values'); ?></p>


        <!-- Values
        ================================================== -->
        <div class="row p-y-3 section-values">
          <h3 class="p-y-3"><?php _e( 'Values', 'chilly' ); ?></h3>
          <div class="col-md-3">
          <div class="card">
            <div class="card-block">
              <?php the_field('first_value'); ?>
            </div>
          </div>
          </div>
          <div class="col-md-3">
          <div class="card">
            <div class="card-block">
              <?php the_field('second_value'); ?>
            </div>
          </div>
          </div>
          <div class="col-md-3">
          <div class="card">
            <div class="card-block">
              <?php the_field('third_value'); ?>
            </div>
          </div>
          </div>
          <div class="col-md-3">
          <div class="card">
            <div class="card-block">
              <?php the_field('forth_value'); ?>
            </div>
          </div>
          </div>
          <div class="row-centered">
            <div class="col-md-3">
              <div class="card">
                <div class="card-block">
                  <?php the_field('fifth_value'); ?>
                </div>
              </div>
              </div>
            <div class="col-md-3">
              <div class="card">
                <div class="card-block">
                  <?php the_field('sixth_value'); ?>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card">
                <div class="card-block">
                  <?php the_field('seventh_value'); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
    </section>
<?php get_footer(); ?>