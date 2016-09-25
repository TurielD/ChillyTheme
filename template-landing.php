<?php /* Template Name: Landing */ get_header(); ?>
	
    <!-- Hero Section
    ================================================== -->

    <header class="jumbotron bg-inverse text-xs-center center-vertically poster" role="banner">
      <div class="container">          
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>register" class="btn btn-block"><span class="bg-inverse p-l">Get in in the first week</span></a>
      </div>
      <div id="promo" class="bg-inverse p-l">
        <div class="container">
          <a href="https://www.eventbrite.com/e/grand-opening-tickets-27787985613">
            <h3 class="text-uppercase">ChillySpaces grand opening: october 3rd!</h3>
            <h4><strong>12:00 - 15:00</strong></h4>
            <h5>Join us for our opening celebration at the very first ChillySpace at Cedars Lebanese restaurant in Amsterdam!<br/>Sign up for our Early Chillies membership by October 8th and receive 50% discount on your first 6 months membership!</h5>
          </a>
        </div>
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
        <div class="row values-list p-xxl">
          <h3 class="wp wp-1 text-uppercase"><?php _e( 'Our Mission', 'chilly' ); ?></h3>
          <hr class="title-underlined"/>
          <p class="lead wp wp-3 wide"><?php the_field('values'); ?></p>
        </div>
      </div>
    </section>

    <!-- Featured Space
    ================================================== -->

    <section id="spaces" class="section-news bg-white text-xs-center">
      <div class="container-fluid  p-y-3">
      <h5 class="text-uppercase"><?php _e( 'Featured Space', 'chilly' ); ?></h5>
      <hr class="title-underlined"/>
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
        <h3 class="text-uppercase"><?php _e( 'Pricing', 'chilly' ); ?></h3>
		<hr class="title-underlined"/>
        <div class="row p-y-3">
          <div class="col-md-4 p-t-md wp wp-5 shadow">
            <div class="card pricing-box p-l">
              <?php the_field('pricing_first'); ?>
            </div>
          </div>
          <div class="col-md-4 p-t-md wp wp-6">
            <div class="card pricing-box p-l">
              <?php the_field('pricing_second'); ?>
            </div>
          </div>
          <div class="col-md-4 p-t-md wp wp-6">
            <div class="card pricing-box pricing-best shadow p-l">
              <?php the_field('pricing_third'); ?>
            </div>
          </div>
          <!-- <div class="col-md-3 p-t-md wp wp-6">
            <div class="card pricing-box">
              <?php //the_field('pricing_forth'); ?>
            </div>
          </div> -->
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
            <p><?php _e( '<strong>Stay in touch with ChillySpaces!</strong> Leave your contact info here, and we\'ll keep you up to date with all big <em>ChillySpaces</em> news!', 'chilly' ); ?></p>
            </div>
          </div>
          <div class="col-md-6 p-xl bg-white margin-left-n shadow contact-form">
            <h3 class="text-xs-center"><?php _e( 'Please leave your contact information', 'chilly' ); ?></h3>
            <p class="text-xs-center"><?php _e( 'We\'ll get back to you as soon as possible!', 'chilly' ); ?></p>
            <?php echo do_shortcode('[contact-form-7 id="160" title="Home page Contact"]');?>
          </div>
        </div>
      </div>
    </section>
<?php get_footer(); ?>