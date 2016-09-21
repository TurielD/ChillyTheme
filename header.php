<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/favicon/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/favicon/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>

	</head>
	<body <?php body_class(); ?>>
  <?php if (is_front_page()) {;?>
  <div id="preloader">
    <div class="inner"><h1>30 Days left till our grand opening</h1></div>
  </div>
  <? } ?>

	<nav class="navbar navbar-fixed-top <?php echo (! is_front_page() ? 'bg-inverse' : '');?>">
    <div class="container-fluid">
      <div class="col-xs-3 p-l-0">
      <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <img class="chilly-logo-header" src="<?php echo get_template_directory_uri(); ?>/img/chilly_spaces_logo.png"/>
      </a>
      </div>
      <div class="col-xs-6">
        <div id="collapsingNavbar" class="collapse navbar-toggleable-custom" role="tabpanel" aria-labelledby="collapsingNavbar">
          <ul class="nav navbar-nav">
          	<?php chilly_nav( array( 'theme_location' => 'main-menu' ) );?>
          </ul>
        </div>
      </div>
      <div class="col-xs-3">
        <a class="navbar-toggler hidden-md-up pull-xs-right p-r-0" data-toggle="collapse" href="#collapsingNavbar" aria-expanded="false" aria-controls="collapsingNavbar">
        &#9776;
        </a>
        <div class="social">
          <a href="https://twitter.com/ChillySpaces" target="_blank"><span class="icon-twitter"></span></a>
          <a href="https://www.facebook.com/ChillySpaces-147808725641974/" target="_blank"><span class="icon-facebook"></span></a>
          <a href="https://www.instagram.com/chillyspaces/" target="_blank"><span class="icon-instagram"></span></a>
        </div>
      </div>
    </div>
  </nav>
