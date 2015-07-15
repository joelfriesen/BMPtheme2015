<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package bmp
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('contentarea'); ?>>

	<h3 class="headline"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>
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
            <?php if ( ! has_excerpt() ) : 
             the_content(); 
              else : 
             print_excerpt(5000); ?>
         	<a href="<?php the_permalink(); ?>" class="more-link">More</a>
            <?php endif; ?>
    
	<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'bmp' ),
			'after'  => '</div>',
		) );
	?>
</div>

