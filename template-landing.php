<?php /* Template Name: Landing */ get_header(); ?>
	
    <!-- Hero Section
    ================================================== -->

    <header class="jumbotron bg-inverse text-xs-center center-vertically poster" role="banner">
      <div class="container">
      	<img class="chilly-logo-hero" src="<?php echo get_template_directory_uri(); ?>/img/chilly_spaces_logo_home.png"/>
        <h2 class="m-b-3"><?php _e( 'Re-thinking the city!', 'chilly' ); ?></h2>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>register" class="btn btn-block"><span class="bg-inverse p-l">Get in in the first week</span></a>
      </div>
    </header>

    <section id="features" class="section-features text-xs-center bg-white">
      <div class="container">
        <!-- Intro
        ================================================== -->
        <h3 class="wp wp-2 text-uppercase">What is Chilly Spaces</h3>
        <hr class="title-underlined"/>
        <p class="lead wp wp-2 wide"><?php the_field('intro'); ?></p>


        <!-- Features
        ================================================== -->
        <div class="row p-y-3 features-list">
          <h3 class="p-y-3"><?php _e( 'Features', 'chilly' ); ?></h3>
          <div class="col-md-6">
          <div class="card">
            <div class="card-block">
              <?php the_field('first_feature'); ?>
            </div>
          </div>
          </div>
          <div class="col-md-6">
          <div class="card">
            <div class="card-block">
              <?php the_field('second_feature'); ?>
            </div>
          </div>
          </div>
          <div class="col-md-6">
          <div class="card m-b-0">
            <div class="card-block">
              <?php the_field('third_feature'); ?>
            </div>
          </div>
          </div>
          <div class="col-md-6">
          <div class="card m-b-0">
            <div class="card-block">
              <?php the_field('forth_feature'); ?>
            </div>
          </div>
          </div>
        </div>
      </div>
    </section>
    <section id="values" class="section-values bg-inverse text-xs-center">
      <div class="container">
        <!-- Mission
        ================================================== -->
        <div class="row p-y-3 values-list">
        <h3 class="wp wp-1 text-uppercase">What we do</h3>
        <hr class="title-underlined"/>
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

    <!-- News
    ================================================== -->

    <section id="spaces" class="section-news bg-white">
      <div class="container-fluid">
    	<?php
    		$loc_args = array( 'post_type' => 'space', 'posts_per_page' => 1 );
				$locations = new WP_Query( $loc_args );
				while ( $locations->have_posts() ) : $locations->the_post();
        $cover_img = wp_get_attachment_url( get_post_thumbnail_id(), 'full');
      ?>
      <div class="row">
  			<div class="space" style="background: url('<?php echo $cover_img; ?>') 50% 50% no-repeat; background-size: cover;">
            <div class="space-details">
              <article class="center-block">
                <h5><a href="<?php echo get_permalink();?>"><?php the_title();?></a></h5>
                <hr class="title-underlined white"/>
                <p class="m-b-0">
                  <?php echo chillywp_excerpt('chillywp_index'); ?>
                </p>
              </article>
            </div>
        </div>
      </div>
			<?php
				endwhile;
        wp_reset_query();
			?>
      </div>
    </section>

    <!-- Pricing
    ================================================== -->

    <section id="prices" class="section-pricing text-xs-center bg-white">
      <div class="container">
        <h6 class="text-uppercase"><?php _e( 'Pricing', 'chilly' ); ?></h6>
        <div class="row p-y-3">
          <div class="col-md-3 p-t-md wp wp-5 shadow">
            <div class="card pricing-box">
              <?php the_field('pricing_first'); ?>
            </div>
          </div>
          <div class="col-md-3 p-t-md wp wp-6">
            <div class="card pricing-box">
              <?php the_field('pricing_second'); ?>
            </div>
          </div>
          <div class="col-md-3 p-t-md wp wp-6">
            <div class="card pricing-box pricing-best shadow">
              <?php the_field('pricing_third'); ?>
            </div>
          </div>
          <div class="col-md-3 p-t-md wp wp-6">
            <div class="card pricing-box">
              <?php the_field('pricing_forth'); ?>
            </div>
          </div>
        </div>
      </div>
    </section>

    

    <!-- Contact
    ================================================== -->

    <section id="contact" class="section-text bg-white">
      <div class="container">
        
        <div class="row p-y-3">
          <div class="col-md-6 board-wrapper p-xxl">
            <div class="board">
            <p class=""><strong>A posuere donec senectus suspendisse</strong> bibendum magna.</p>
            </div>
          </div>
          <div class="col-md-6 p-xl bg-white margin-left-n shadow contact-form">
            <h3 class="text-xs-center">Start your free trial</h3>
            <p class="text-xs-center">You'll be up and running in less<br>than a minute</p>
            <form>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group has-icon-left form-control-name">
                    <label class="sr-only" for="inputName">Your name</label>
                    <input type="text" class="form-control form-control-lg" id="inputName" placeholder="Your name">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group has-icon-left form-control-email">
                    <label class="sr-only" for="inputEmail">Email address</label>
                    <input type="email" class="form-control form-control-lg" id="inputEmail" placeholder="Email address" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group has-icon-left form-control-email">
                    <label class="sr-only" for="inputEmail">Email address</label>
                    <input type="email" class="form-control form-control-lg" id="inputEmail" placeholder="Email address" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group has-icon-left form-control-email">
                    <label class="sr-only" for="inputEmail">Email address</label>
                    <input type="email" class="form-control form-control-lg" id="inputEmail" placeholder="Email address" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <button type="submit" class="btn btn-edgy invert btn-block">Get started</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

<?php get_footer(); ?>
