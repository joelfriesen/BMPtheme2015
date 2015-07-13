<?php
/*
Template Name: Two Column
*/
?>
<?php get_header(); ?>
  <div class="main container fourcol">
    <div class="col subcol">
      <h1 class="pagetitle"><span><?php the_title(); ?></span></h1>
      <h1 class="logo"><a href="<?php bloginfo('url'); ?>" ><span><?php bloginfo('name'); ?></span></a></h1>
      <?php dynamic_sidebar('underlogo') ?>
    </div>
    <div class="col spanthree maincol">
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

    </div>
  </div>
<?php get_footer(); ?>