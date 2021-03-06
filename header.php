<?php
/**
 * @package bmp
 */
?><!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"><!--<![endif]-->
<head>
<!-- Basic Page Needs
================================================== -->
<meta charset="<?php bloginfo( 'charset' ); ?>">
<title><?php wp_title(''); ?><?php if(wp_title(' ', false)) { echo ' - '; } ?><?php bloginfo('name'); ?></title>
<meta name="description" content="XXXXXX"/>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<meta name="author" content="XXXXXX">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<!-- Favicons
================================================== -->
<?php if ( get_theme_mod('site_favicon') ) : ?>
<link rel="shortcut icon" href="<?php echo esc_url(get_theme_mod('site_favicon')); ?>" />
<?php endif; ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'bmp' ); ?></a>

  <?php if ( has_nav_menu( 'secondary-menu' ) ) : ?>
    <input type="checkbox" class="main-nav-check" id="main-nav-check" /> 
    <label for="main-nav-check" class="toggle-menu">Navigation</label>
    <nav class="menubar mobile-nav" id="mobile-nav">
      <?php wp_nav_menu(array( 'theme_location' => 'secondary-menu', 'container_class' => 'container' ) );?>
    </nav> 
  <?php endif; ?>

  <div class="topbar container col4"> 
  <?php if ( get_theme_mod('description_display') &&  get_theme_mod('site_logo') ||  get_theme_mod('title_display') &&  get_theme_mod('site_logo') ) : ?>
  <div class="col span1">
  <?php else : ?>
  <div class="col span4">
  <?php endif; ?>
   
  <?php if ( get_theme_mod('site_logo') ) : ?>
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo esc_url(get_theme_mod('site_logo')); ?>" alt="<?php bloginfo('name'); ?>" /></a> 
  <?php endif; ?>
  
    </div>
    <?php if ( get_theme_mod('description_display') &&  get_theme_mod('title_display') ) : ?>
    <div class="col span3">
      <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
      <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
    </div>
    <?php elseif ( get_theme_mod('description_display') ) : ?>
    <div class="col span3">
      <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
    </div>
    <?php elseif ( get_theme_mod('title_display') ) : ?>
    <div class="col span3">
      <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
    </div>
    <?php endif; ?>
  </div>


  <div class="navarea container col4">
       <nav class="menubar main-nav col span4" id="main-nav">
        <?php wp_nav_menu(array('theme_location' => 'primary-menu'));?>
      </nav>

  </div>
