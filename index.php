<?php get_header(); ?>
  <!-- INDEX -->
  <div class="main container fourcol">
    <div class="col subcol">
      <h1 class="pagetitle"><span>Search Results</span></h1>
      <h1 class="logo"><a href="<?php bloginfo('url'); ?>" ><span><?php bloginfo('name'); ?></span></a></h1>
      <?php dynamic_sidebar('underlogo') ?>
    </div>
    <div class="col spantwo maincol"><h1 class="pagetitle"><span>Search Results</span></h1>  
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>  
          <div class="contentarea">
          <!-- If there's a post thumbnail, add it at the specified size -->
          <?php if (has_post_thumbnail()) : ?>
          <div class="indexbox">
             <div class="wp-caption alignleft">
             <a href="<?php the_permalink(); ?>">
             <?php  the_post_thumbnail(
                  array(170, 170),
                  array(
                        'class' => 'thumbnail'
                      )
                ); ?> 
              </a>
              </div>
            </div>
            <?php endif; ?> 
            <h3 class="headline"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>
            <?php print_excerpt(5000); ?>
            <a href="<?php the_permalink(); ?>" class="more-link">View BMP</a>
          </div>
          <!-- Add the The Permalink to the article -->
          
        <?php endwhile; ?> 
      <?php else : ?>
        <div class="contentarea"> 
          <h2><span><?php _e('Sorry!'); ?></span></h2>
          <p>I couldn't find the page you were looking for.</p>
        </div>
      <?php endif; ?> 
      <?php if ( $wp_query->max_num_pages > 1 ) : ?> 
        <div class="pagination"> 
          <?php kriesi_pagination(); ?> 
        </div>
      <?php endif;  ?>
    </div>
    <div class="col subcol">
      <?php dynamic_sidebar('insidepage') ?>
    </div>
  </div>
<?php get_footer(); ?>