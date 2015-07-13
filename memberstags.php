<?php
/*
Template Name: Members only tags list.
*/
?>
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
      <?php if (is_user_logged_in()) { ?>
        <h1 class="pagetitle"><span><?php the_title(); ?></span></h1>
        <div class="contentarea">
          <div class="tags">
          <?php
          $tags = get_tags();
            foreach($tags as $tag) { 
              echo '<a href="' . get_tag_link( $tag->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $tag->name ) . '" ' . '>' . $tag->name.'</a>  ';
           } 
          ?>
          </div>  
        </div>  
        <?php if ( $wp_query->max_num_pages > 1 ) : ?> 
          <div class="pagination"> 
            <?php kriesi_pagination(); ?> 
          </div>        
        <?php endif;  ?>
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