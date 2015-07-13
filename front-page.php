<?php get_header(); ?>
  <div class="main container col4">
    <?php if ( get_theme_mod('slider_display') ) : ?>
      <?php echo bmp_slider_template(); ?>
    <?php endif; ?>

    

    <div class="col span3 maincol">
      <?php while (have_posts()) : the_post(); ?>
        <h1 class="pagetitle"><span><?php the_title(); ?></span></h1>
        <div class="contentarea">
          <?php the_content(); ?>
        </div>
      <?php endwhile; ?>   
    </div>

    <div class="col subcol">
      <?php dynamic_sidebar('frontpage') ?>
      <?php if (is_user_logged_in()) { dynamic_sidebar('insidepageright2'); } ?>
    </div>
  </div>
<?php get_footer(); ?>