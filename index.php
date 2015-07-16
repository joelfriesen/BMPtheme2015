<?php get_header(); ?>

<?php
/**
 * @package bmp
 */
get_header(); ?>
  <div class="main container col4">
    <?php if ( get_theme_mod('slider_display') ) : ?>
      <?php echo bmp_slider_template(); ?>
    <?php endif; ?>
    <div class="col span3 maincol">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'content', 'index' ); ?>
      <?php endwhile; // end of the loop. ?>
      <div class="pagination"> 
        <?php kriesi_pagination(); ?> 
      </div>
    </div>
    <div class="col subcol">
      <?php dynamic_sidebar('frontpage') ?>
    </div>
  </div>
<?php get_footer(); ?>


