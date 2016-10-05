<?php /* Template Name: Landing */ get_header(); ?>
	
    <!-- Hero Section
    ================================================== -->

    <header class="jumbotron bg-inverse text-xs-center center-vertically poster" role="banner">
      <div class="container">          
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>register" class="btn btn-edgy" style="background:rgba(0,0,0,.3)"><span class="p-l"><h1>Re-think the city and the way you work</h1><h2>Co-working & networking in inspiring spaces<!--</h2>Sign up now to receive 50% discount on your first 6 months!<br/>--><h2></br>Click here to <em>try out <strong>ChillySpaces</strong></em> for one day - totally <strong>free!</strong></h2><br/></span></a>
      </div>
    </header>

    <section id="features" class="section-features text-xs-center bg-white">
      <div id="promo" class="p-l">
        <div class="container">
          <a href="https://www.chillyspaces.com/#prices">
            <h4><strong>ChillySpaces</strong> is now open!</h4>
            <div class="promo-message">
              <h4>09:00 - 17:00</h4>
              <p style="line-height: 1.2rem">Come experience our very first ChillySpace at Cedars Lebanese restaurant in Amsterdam!<br/>Sign up for our Early Chillies membership in our first weeks and receive 50% discount on your first 6 months membership!</p>
            </div>
          </a>
          <a class="extend-less" href="javascript:void(0)">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" viewBox="0 0 24 24">
            <path fill="#fff" d="M12 8.016l6 6-1.406 1.406-4.594-4.594-4.594 4.594-1.406-1.406z"></path>
            </svg>
          </a>
          <a class="extend-more" href="javascript:void(0)">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" viewBox="0 0 24 24">
            <path fill="#fff" d="M16.594 8.578l1.406 1.406-6 6-6-6 1.406-1.406 4.594 4.594z"></path>
            </svg>
          </a>
        </div>
      </div>
      <div class="container">
        <!-- Intro
        ================================================== -->
        <h3 class="wp wp-2 text-uppercase"><?php _e( 'What is Chilly Spaces', 'chilly' ); ?></h3>
        <hr class="title-underlined wp wp-2"/>
        <p class="lead wp wp-2 wide"><?php the_field('intro'); ?></p>


        <!-- Features
        ================================================== -->
        <div class="row p-y-3 features-list">
          <h5 class="p-y-3"><?php _e( 'Features', 'chilly' ); ?></h5>
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
              <div class="headline">
                <h5 class="text-uppercase"><?php _e( 'Featured Space', 'chilly' ); ?></h5>
                <hr class="title-underlined white"/>
              </div>
              <a href="<?php echo get_permalink();?>">
                <div class="space-description">
                  <h5><?php the_title();?></h5>
                  <hr class="title-underlined white"/>
                  <p class="m-b-0">
                    <?php echo chillywp_excerpt('chillywp_index'); ?>
                  </p>
                </div>
              </a>
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
        <h5><?php _e( 'Pricing', 'chilly' ); ?></h5>
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