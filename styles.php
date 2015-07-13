<?php

function bmp_custom_styles($custom) {
	//Primary color
	$primary_color = esc_html(get_theme_mod( 'primary_color' ));
	if ( $primary_color != '#D9D4A6' ) {
		$custom = ".navarea ul.menu li, .navarea ul.menu ul.sub-menu li { background-color: {$primary_color}; }"."\n";
		$custom .= "h1, h1 a { color: {$primary_color}; }"."\n";
	}
	//Secondary color
	$secondary_color = esc_html(get_theme_mod( 'secondary_color' ));
	if ( $secondary_color != '#3296B8' ) {
		$custom .= ".main-navigation  { background-color: {$secondary_color}; }"."\n";
		$custom .= ".navarea ul.menu li a,  h2, h2 a { color: {$secondary_color}; }"."\n";
	}
	//Tertiary color
	$tertiary_color = esc_html(get_theme_mod( 'tertiary_color' ));
	if ( $tertiary_color != '#B4AA51' ) {
		$custom .= "h3, h3 a { color: {$tertiary_color}; }"."\n";
	}
	//Quaternaryy color
	$quaternary_color = esc_html(get_theme_mod( 'quaternary_color' ));
	if ( $quaternary_color != '#025269' ) {
		$custom .= "h4, h4 a { color: {$quaternary_color}; }"."\n";
	}


	
	//Fonts
	$headings_font = esc_html(get_theme_mod('headings_fonts'));	
	$body_font = esc_html(get_theme_mod('body_fonts'));	
	
	if ( $headings_font ) {
		$font_pieces = explode(":", $headings_font);
		$custom .= "h1, h2, h3, h4, h5, h6 { font-family: {$font_pieces[0]}; }"."\n";
	}
	if ( $body_font ) {
		$font_pieces = explode(":", $body_font);
		$custom .= "body { font-family: {$font_pieces[0]}; }"."\n";
	}	
	
	//Output all the styles
	wp_add_inline_style( 'bmp-style', $custom );	
}
add_action( 'wp_enqueue_scripts', 'bmp_custom_styles' );