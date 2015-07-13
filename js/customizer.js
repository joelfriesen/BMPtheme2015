/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );


	//Primary color
	wp.customize('primary_color',function( value ) {
		value.bind( function( newval ) {
			$('.navarea ul.menu li, .navarea ul.menu ul.sub-menu li').css('background-color', newval );
			$('h1, h1 a').css('color', newval );
		} );
	});
	//Secondary color
	wp.customize('secondary_color',function( value ) {
		value.bind( function( newval ) {
			$('.navarea ul.menu li a, h2, h2 a').css('color', newval );
		} );
	});
	//tertiary color
	wp.customize('tertiary_color',function( value ) {
		value.bind( function( newval ) {
			$('h3, h3 a').css('color', newval );
		} );
	});
	//tertiary color
	wp.customize('quaternary_color',function( value ) {
		value.bind( function( newval ) {
			$('h4, h4 a').css('color', newval );
		} );
	});

} )( jQuery );
