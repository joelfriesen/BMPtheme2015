jQuery(document).ready(function($){
	$('.menu li ul.sub-menu').attr('class', 'sub-menu subhide');	
	$('.main-nav .menu li').hover(
		function() { $('> ul', this).attr('class', 'sub-menu subshow');},
		function() { $('> ul', this).attr('class', 'sub-menu subhide');}
	);

	$('.mobile-nav .menu li.menu-item-has-children').prepend( "<a href='#' class='navdrop'><span>subnav</span></a>" );
	$('.mobile-nav .menu .navdrop').toggle(
		function() { $('~ ul', this).attr('class', 'sub-menu subshow');},
		function() { $('~ ul', this).attr('class', 'sub-menu subhide');}
	);
	$('.mobile-nav .menu .navdrop').toggle(
		function() { $(this).attr('class','navdropover');},
		function() { $(this).attr('class','navdrop');}
	);
});