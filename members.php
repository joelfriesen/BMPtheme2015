<?php
/*
Template Name: Members only page
*/
?>
<?php get_header(); ?>
  <div class="main container fourcol">
    <div class="col subcol">
      <h1 class="pagetitle"><span><?php the_title(); ?></span></h1>
      <h1 class="logo"><a href="<?php bloginfo('url'); ?>" ><span><?php bloginfo('name'); ?></span></a></h1>
      <?php dynamic_sidebar('underlogo') ?>
    </div>
    <div class="col spantwo maincol">
      <?php if (is_user_logged_in()) { ?>
        <?php while (have_posts()) : the_post(); ?>
          <h1 class="pagetitle"><span><?php the_title(); ?></span></h1>
          <div class="contentarea">
            <?php if (has_post_thumbnail()) : ?>
              <div class="wp-caption alignleft"> 
                <?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
                echo '<a href="' . $large_image_url[0] . '" title="' . the_title_attribute('echo=0') . '" >';
                the_post_thumbnail(
                  array(332,323),
                  array('class' => 'mainimage')); 
                echo '</a>';?>
              </div>
            <?php endif; ?>
            <?php the_content(); ?>
          </div>
        <?php endwhile; ?>   
      <?php } else { ?>
      <h1 class="pagetitle"><span><?php the_title(); ?></span></h1>
      <div class="contentarea">
        <p>I'm sorry, but you must be logged in to view this page.</p>
      </div>
      <?php } ?>
    </div>
    <div class="col subcol">
      <?php dynamic_sidebar('insidepage') ?>
      <?php if (is_user_logged_in()) { dynamic_sidebar('insidepageright2'); } ?>
    </div>
  </div>
<?php get_footer(); ?>