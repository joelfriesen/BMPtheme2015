<?php get_header(); ?>
  
  <!-- PAGE -->
  <div class="main container col4">


    <div class="col span3 maincol">
      <?php while (have_posts()) : the_post(); ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
      </div>
      <?php endwhile; ?>   
    </div>

    <div class="col subcol">
      <?php dynamic_sidebar('insidepage') ?>
      <?php if (is_user_logged_in()) { dynamic_sidebar('insidepageright2'); } ?>
    </div>

  </div>
<?php get_footer(); ?>