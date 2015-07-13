<?php
/*
Template Name: Members only categories list.
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
      
        <!-- ?php  An attempt to limit categories per page - worked at limiting it, but pagionation did not work, and blank categories showed up.
        $posts_per_page = 10;
        $page = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;
        $offset = ( $page - 1 );
        $categories = get_categories();
        for( $i = $offset * $posts_per_page; $i < ( $offset + 1 ) * $posts_per_page; $i++ ) {
            $category = $categories[$i];
            echo '<div class="categories">';
            echo '<a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> ';
            echo '</div>';
         } 
         unset( $category );
        ? -->

        <?php
        $categories = get_categories();
          foreach($categories as $category) { 
            echo '<div class="categories">';
            echo '<a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> ';
            echo '</div>';
         } 
        ?>

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