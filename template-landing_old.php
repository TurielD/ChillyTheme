<?php /* Template Name: Landing */ get_header(); ?>
	
    <!-- Hero Section
    ================================================== -->

    <header class="jumbotron bg-inverse text-xs-center center-vertically poster" role="banner">
      <div class="container">
      	<img src="<?php echo get_template_directory_uri(); ?>/img/chilly_spaces_logo_home.png"/>
        <h2 class="m-b-3"><?php _e( 'Start, <em>absolutely free</em>', 'chilly' ); ?></h2>
      </div>
    </header>

    <!-- Intro
    ================================================== -->

    <section class="section-intro bg-faded text-xs-center">
      <div class="container">
        <h3 class="wp wp-1 text-uppercase"><?php echo get_page (14) -> post_title; ?></h3>
        <hr class="title-underlined"/>
        <p class="lead wp wp-2 wide"><?php echo get_page (14) -> post_content; ?></p>
      </div>
    </section>

    <!-- Testimonials
    ================================================== -->

    <section class="section-testimonials text-xs-center bg-inverse">
      <div class="container">
        <h3 class="sr-only"><?php _e( 'Testimonials', 'chilly' ); ?></h3>
        <div id="carousel-testimonials" class="carousel slide" data-ride="carousel" data-interval="0">
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
            <li class="active"><img src="<?php echo get_template_directory_uri(); ?>/img/face5.jpg" alt="Navigation avatar" data-target="#carousel-testimonials" data-slide-to="0" class="img-fluid img-circle"></li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/img/face5.jpg" alt="Navigation avatar" data-target="#carousel-testimonials" data-slide-to="1" class="img-fluid img-circle"></li>
          </ol>
        </div>
      </div>
    </section>

    <!-- News
    ================================================== -->

    <section class="section-news">
      <div class="container">
        <h6 class="text-center text-uppercase"><?php _e( 'Featured Space', 'chilly' ); ?></h6>
        <div class="bg">
          <div class="row">
          	<?php
          		$loc_args = array( 'post_type' => 'space', 'posts_per_page' => 1 );
				$locations = new WP_Query( $loc_args );
				while ( $locations->have_posts() ) : $locations->the_post();?>
					<div class="col-md-6 p-r-0">
		              <figure class="has-light-mask m-b-0 image-effect">
		                <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id(), 'small'); ?>" alt="Article thumbnail" class="img-fluid">
		              </figure>
		            </div>
		            <div class="col-md-6 p-l-0">
		              <article>
		                <h5><a href="<?php echo get_permalink();?>"><?php the_title();?></a></h5>
		                <hr class="title-underlined"/>
		                <p class="m-b-0">
		                	<?php echo chillywp_excerpt('chillywp_index'); ?>
		                  <a href="#"><span class="label label-default text-uppercase"><span class="icon-tag"></span> Design Studio</span></a>
		                  <a href="#"><span class="label label-default text-uppercase"><span class="icon-time"></span> 1 Hour Ago</span></a>
		                </p>
		              </article>
		            </div>
			<?php
				endwhile;
			?>
        </div>
      </div>
    </section>

    <!-- Pricing
    ================================================== -->

    <section class="section-pricing bg-faded text-xs-center">
      <div class="container">
        <h6 class="text-uppercase"><?php _e( 'Featured Location', 'chilly' ); ?></h6>
        <div class="row p-y-3">
          <div class="col-md-4 p-t-md wp wp-5">
            <div class="card pricing-box">
              <div class="card-header text-uppercase">
                Personal
              </div>
              <div class="card-block">
                <p class="card-title">Sed risus feugiat fusce eu sit conubia venenatis aliquet nisl cras.</p>
                <h4 class="card-text">
                  <sup class="pricing-box-currency">$</sup>
                  <span class="pricing-box-price">19</span>
                  <small class="text-muted text-uppercase">/month</small>
                </h4>
              </div>
              <ul class="list-group list-group-flush p-x">
                <li class="list-group-item">Sed risus feugiat</li>
                <li class="list-group-item">Sed risus feugiat fusce eu sit</li>
                <li class="list-group-item">Sed risus feugiat fusce</li>
              </ul>
              <a href="#" class="btn btn-primary-outline">Get Started</a>
            </div>
          </div>
          <div class="col-md-4 stacking-top">
            <div class="card pricing-box pricing-best p-x-0">
              <div class="card-header text-uppercase">
                Professional
              </div>
              <div class="card-block">
                <p class="card-title">Sed risus feugiat fusce eu sit conubia venenatis aliquet nisl cras.</p>
                <h4 class="card-text">
                  <sup class="pricing-box-currency">$</sup>
                  <span class="pricing-box-price">49</span>
                  <small class="text-muted text-uppercase">/month</small>
                </h4>
              </div>
              <ul class="list-group list-group-flush p-x">
                <li class="list-group-item">Sed risus feugiat</li>
                <li class="list-group-item">Sed risus feugiat fusce eu sit</li>
                <li class="list-group-item">Sed risus feugiat fusce</li>
                <li class="list-group-item">Sed risus feugiat</li>
              </ul>
              <a href="#" class="btn btn-primary">Get Started</a>
            </div>
          </div>
          <div class="col-md-4 p-t-md wp wp-6">
            <div class="card pricing-box">
              <div class="card-header text-uppercase">
                Enterprise
              </div>
              <div class="card-block">
                <p class="card-title">Sed risus feugiat fusce eu sit conubia venenatis aliquet nisl cras.</p>
                <h4 class="card-text">
                  <sup class="pricing-box-currency">$</sup>
                  <span class="pricing-box-price">99</span>
                  <small class="text-muted text-uppercase">/month</small>
                </h4>
              </div>
              <ul class="list-group list-group-flush p-x">
                <li class="list-group-item">Sed risus feugiat</li>
                <li class="list-group-item">Sed risus feugiat fusce eu sit</li>
                <li class="list-group-item">Sed risus feugiat fusce</li>
              </ul>
              <a href="#" class="btn btn-primary-outline">Get Started</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    

    <!-- Text Content
    ================================================== -->

    <section class="section-text">
      <div class="container">
        <h3 class="text-xs-center">Make your mark on the product industry</h3>
        <div class="row p-y-3">
          <div class="col-md-5">
            <p class="wp wp-7">A posuere donec senectus suspendisse bibendum magna ridiculus a justo orci parturient suspendisse ad rhoncus cursus ut parturient viverra elit aliquam ultrices est sem. Tellus nam ad fermentum ac enim est duis facilisis congue a lacus adipiscing consequat risus consectetur scelerisque integer suspendisse a mus integer elit massa ut.</p>
          </div>
          <div class="col-md-5 col-md-offset-2 separator-x">
            <p class="wp wp-8">A posuere donec senectus suspendisse bibendum magna ridiculus a justo orci parturient suspendisse ad rhoncus cursus ut parturient viverra elit aliquam ultrices est sem. Tellus nam ad fermentum ac enim est duis facilisis congue a lacus adipiscing consequat risus consectetur scelerisque integer suspendisse a mus integer elit massa ut.</p>
          </div>
        </div>
      </div>
    </section>

<?php get_footer(); ?>
