<?php
/**
 * @package bmp
 */
get_header(); ?>

  <div class="main container col4">
  <?php if ( get_theme_mod('right_col') &&  get_theme_mod('left_col') ) : ?>
    <div class="col subcol">
      <?php dynamic_sidebar('leftcol') ?>
    </div>
    <div class="col span2 maincol">
    <?php elseif ( get_theme_mod('left_col') ) : ?>
    <div class="col subcol">
      <?php dynamic_sidebar('leftcol') ?>
    </div>
    <div class="col span3 maincol">
  <?php elseif ( get_theme_mod('right_col') ) : ?>
    <div class="col span3 maincol">
  <?php else : ?>
    <div class="col span4 maincol">
  <?php endif; ?>

      <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'content', 'page' ); ?>
      <?php endwhile; // end of the loop. ?>
    </div>


    <?php if ( get_theme_mod('right_col') ) : ?>
      <div class="col subcol">
        <?php dynamic_sidebar('rightcol') ?>
      </div>
    <?php endif; ?>

  </div>

<?php get_footer(); ?>