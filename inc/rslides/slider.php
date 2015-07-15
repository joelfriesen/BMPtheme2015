<?php
	function bmp_slider_scripts() {
		if ( get_theme_mod('slider_display') ) {
			
			wp_enqueue_style( 'rslides-style', get_template_directory_uri() . '/inc/rslides/responsiveslides.css' );
			wp_enqueue_script( 'rslides-script', get_template_directory_uri() .  '/inc/rslides/js/responsiveslides.min.js', array( 'jquery' ), true );
			wp_enqueue_script( 'rslides-init', get_template_directory_uri() .  '/inc/rslides/js/rslides-init.js', array(), true );
			
			//Slider speed options
			if ( ! get_theme_mod('slideshowspeed') ) {
				$slideshowspeed = 500;
			} else {
				$slideshowspeed = absint(get_theme_mod('slideshowspeed'));
			}			
			if ( ! get_theme_mod('animationspeed') ) {
				$animationspeed = 4000;
			} else {
				$animationspeed = absint(get_theme_mod('animationspeed'));
			}	
			if ( get_theme_mod('sliderrandom') ) {
				$sliderrandom = true;
			} else {
				$sliderrandom = false;
			}		
			if ( get_theme_mod('slidernav') ) {
				$slidernav = true;
			} else {
				$slidernav = false;
			}	
			if ( get_theme_mod('sliderpager') ) {
				$sliderpager = true;
			} else {
				$sliderpager = false;
			}		
			if ( get_theme_mod('sliderauotstart') ) {
				$sliderauotstart = true;
			} else {
				$sliderauotstart = false;
			}		
			$slider_options = array(
				'speed' => $slideshowspeed,
				'timeout' => $animationspeed,
				'random' => $sliderrandom,
				'nav' => $slidernav,
				'pager' => $sliderpager,
				'auto' => $sliderauotstart,
				);			

			// $reshuffled_data = array(
			//     'l10n_print_after' => 'sliderOptions = ' . json_encode( $slider_options )
			// );
	
			wp_localize_script('rslides-init', 'sliderOptions', $slider_options) ;			
		}		
	}
	add_action( 'wp_enqueue_scripts', 'bmp_slider_scripts' );


function bmp_slider_template() {	
	if ( get_theme_mod('slider_display') ) {
?>
		<div id="slider" class="rslides_container col4">
			<ul class="rslides col span4">

	



				<?php 
				if ( ! get_theme_mod('slider_image1')  ) {
						$slider_text1 = ''; ?>

				<?php }
				if ( ! get_theme_mod('slider_text1') && get_theme_mod('slider_image1') ) {
						$slider_text1 = ''; ?>
					<li class="slide1">	
					</li>
				<?php }
				if ( get_theme_mod('slider_text1') && get_theme_mod('slider_image1') ) {
					$slider_text1 = get_theme_mod('slider_text1'); ?>
					<li class="slide1">
						<div class="slidetext"><?php echo $slider_text1; ?></div>
					</li>
				<?php }	?>

				<?php 
				if ( ! get_theme_mod('slider_image2')  ) {
						$slider_text2 = ''; ?>

				<?php }
				if ( ! get_theme_mod('slider_text2') && get_theme_mod('slider_image2') ) {
						$slider_text2 = ''; ?>
					<li class="slide2">	
					</li>
				<?php }
				if ( get_theme_mod('slider_text2') && get_theme_mod('slider_image2') ) {
					$slider_text2 = get_theme_mod('slider_text2'); ?>
					<li class="slide2">
						<div class="slidetext"><?php echo $slider_text2; ?></div>
					</li>
				<?php }	?>

				<?php 
				if ( ! get_theme_mod('slider_image3')  ) {
						$slider_text3 = ''; ?>

				<?php }
				if ( ! get_theme_mod('slider_text3') && get_theme_mod('slider_image3') ) {
						$slider_text3 = ''; ?>
					<li class="slide3">	
					</li>
				<?php }
				if ( get_theme_mod('slider_text3') && get_theme_mod('slider_image3') ) {
					$slider_text3 = get_theme_mod('slider_text3'); ?>
					<li class="slide3">
						<div class="slidetext"><?php echo $slider_text3; ?></div>
					</li>
				<?php }	?>

				<?php 
				if ( ! get_theme_mod('slider_image4')  ) {
						$slider_text4 = ''; ?>

				<?php }
				if ( ! get_theme_mod('slider_text4') && get_theme_mod('slider_image4') ) {
						$slider_text4 = ''; ?>
					<li class="slide4">	
					</li>
				<?php }
				if ( get_theme_mod('slider_text4') && get_theme_mod('slider_image4') ) {
					$slider_text4 = get_theme_mod('slider_text4'); ?>
					<li class="slide4">
						<div class="slidetext"><?php echo $slider_text4; ?></div>
					</li>
				<?php }	?>

			</ul>
		</div>

		<style>
		<?php 
			if ( ! get_theme_mod('slider_image1') ) {
					$slider_image1 = '';
			} else { $slider_image1 = get_theme_mod('slider_image1'); ?>
				#slider li.slide1 {
				background-image: url(<?php echo $slider_image1; ?>);}
		<?php }	?>
		<?php 
			if ( ! get_theme_mod('slider_image2') ) {
					$slider_image2 = '';
			} else { $slider_image2 = get_theme_mod('slider_image2'); ?>
				#slider li.slide2 {
				background-image: url(<?php echo $slider_image2; ?>);}
		<?php }	?>
		<?php 
			if ( ! get_theme_mod('slider_image3') ) {
					$slider_image3 = '';
			} else { $slider_image3 = get_theme_mod('slider_image3'); ?>
				#slider li.slide3 {
				background-image: url(<?php echo $slider_image3; ?>);}
		<?php }	?>
		<?php 
			if ( ! get_theme_mod('slider_image4') ) {
					$slider_image4 = '';
			} else { $slider_image4 = get_theme_mod('slider_image4'); ?>
				#slider li.slide4 {
				background-image: url(<?php echo $slider_image4; ?>);}
		<?php }	?>
		</style>
		<?php 
	} }
?>		