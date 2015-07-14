<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package crayon
 */
?>
<?php if ( ! dynamic_sidebar( 'insidepage' ) ) : ?>
	<?php get_search_form(); ?>
<?php endif; // end sidebar widget area ?>