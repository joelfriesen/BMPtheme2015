<?php get_header(); ?>
  <div class="main container fourcol">
    <div class="col subcol">
      <h1 class="pagetitle"><span><?php the_title(); ?></span></h1>
      <h1 class="logo"><a href="<?php bloginfo('url'); ?>" ><span><?php bloginfo('name'); ?></span></a></h1>
      <?php dynamic_sidebar('underlogo') ?>
      <?php if (is_user_logged_in()) { dynamic_sidebar('insidepage2'); } ?>
      <?php if (is_user_logged_in()) { ?>
      <form method="get" id="searchform" class="searchbmps" action="/">
        <div>
        <input class="text" type="search" placeholder="search BMPs" value=" " name="s" id="s">
        <input type="submit" class="submit" name="Submit" value="Search BMPs">
        <input type="hidden" name="post_type" value="bmparchive" />
        </div>
      </form>
      <?php } ?>
    </div>
    <div class="col spantwo maincol">
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
          <h4>Category</h4>
          <?php
          $categories = get_the_category();
          $separator = ' ';
          $output = '';
          if($categories){

            foreach($categories as $category) {
              $output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
            }
          echo '<div class="categories">';
          echo trim($output, $separator);
          echo '</div>';
          }
          ?>
          <h4>Tags</h4>
          <?php the_tags('<div class="tags">', ' ', '</div>'); ?> 
          
        </div>
      <?php endwhile; ?>   

    </div>
    <div class="col subcol">
      <?php dynamic_sidebar('insidepage') ?>
      <?php if (is_user_logged_in()) { dynamic_sidebar('insidepageright2'); } ?>
    </div>
  </div>
<?php get_footer(); ?>