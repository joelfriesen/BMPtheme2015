<?php
/**
 * @package bmp
 */
get_header(); ?>
  <div class="main container col4">
    <div class="col span3 maincol">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'content', 'page' ); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
    <div class="col subcol">
      <?php dynamic_sidebar('insidepage') ?>
      <?php if (is_user_logged_in()) { dynamic_sidebar('insidepageright2'); } ?>
      <?php get_sidebar(); ?>
    </div>
  </div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>