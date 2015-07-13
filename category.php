<?php get_header(); ?>
  <!-- CATEGORY TEMPLATE -->
  <div class="main container fourcol">
    <div class="col subcol">
      <h1 class="pagetitle"><span>BMPs by Category</span></h1>
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
    	<h1 class="pagetitle"><span>BMPs by Category</span></h1>

      <?php 
      // if ( is_category() ) {
      // $this_category = get_category($cat);
      // if($this_category->category_parent):
      //   echo "is child";
      // endif;
      // if($this_category->category_child):
      //   echo "is parent";
      // endif;
      //else:
      //   $this_category = wp_list_categories('orderby=id&depth=5&show_count=0&title_li=&use_desc_for_title=1&child_of='.$this_category->cat_ID."&echo=0");
      //echo '<ul>'. $this_category . '</ul>';
      //endif;
      // } 
      ?>

      <?php if (is_user_logged_in()) { ?>
        <?php if ( have_posts() ) : ?>
          <div class="contentarea">
            <h2><?php single_tag_title(); ?></h2>
            <?php while ( have_posts() ) : the_post(); ?>
              <div class="bmplist">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </div>
            <?php endwhile; ?>
            
            <?php 
            //if (is_category()) {
            //  $this_category = get_category($cat);
            //  if (get_category_children($this_category->cat_ID) != "") {
            //    echo "<h2>Related Categories</h2>";
            //    echo "<div class='bmplist'>";
            //    wp_list_categories('orderby=id&show_count=0&style=&title_li=&use_desc_for_title=1&child_of='.$this_category->cat_ID);
            //    echo "</div>";
            //  }
            //  if (get_category_parents($this_category->cat_ID) != "") {
            //    echo "<h2>Related Categories</h2>";
            //    echo "<div class='bmplist'>";
            //    echo get_category_parents( $cat, true, ' ' );
            //    echo "</div>";
            //  }
            //}
            ?>

          </div>
        <?php endif; ?> 
        <?php if ( $wp_query->max_num_pages > 1 ) : ?> 
          <div class="pagination"> 
            <?php kriesi_pagination(); ?> 
          </div>
        <?php endif;  ?>
        <?php } else { ?>
        <h1 class="pagetitle"><span>All BMPs</span></h1>
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