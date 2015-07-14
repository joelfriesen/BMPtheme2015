<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package bmp
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php the_title( '<h1 class="pagetitle"><span>', '</span></h1>' ); ?>
	<?php if ( (has_post_thumbnail()) && ( get_theme_mod( 'bmp_page_img' )) ) : ?>
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
	<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'bmp' ),
			'after'  => '</div>',
		) );
	?>

	<?php edit_post_link( __( 'Edit', 'bmp' ), '<span class="edit-link">', '</span>' ); ?>
</div>
