<?php
/**
 * bmp Theme Customizer
 *
 * @package bmp
 */
 
function bmp_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	//Extends the customizer with a categories dropdown control.
	class Categories_Dropdown extends WP_Customize_Control {
        public function render_content() {
            $dropdown = wp_dropdown_categories(
                array(
                    'name'              => '_customize-dropdown-categories-' . $this->id,
                    'echo'              => 0,
                    'show_option_none'  => __( '&mdash; Select &mdash;', 'bmp' ),
                    'option_none_value' => '0',
                    'selected'          => $this->value(),
                )
            );
 
            $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );
 
            printf(
                '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
                $this->label,
                $dropdown
            );
        }
    }

	//___General___//
    $wp_customize->add_section(
        'bmp_general',
        array(
            'title' => __('General', 'bmp'),
            'priority' => 9,
        )
    );
	//Logo Upload
	$wp_customize->add_setting(
		'site_logo',
		array(
			'default-image' => '',
		)
	);
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'site_logo',
            array(
               'label'          => __( 'Upload your logo', 'bmp' ),
			   'type' 			=> 'image',
               'section'        => 'bmp_general',
               'settings'       => 'site_logo',
            )
        )
    );
	//Favicon Upload
	$wp_customize->add_setting(
		'site_favicon',
		array(
			'default-image' => '',
		)
	);
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'site_favicon',
            array(
               'label'          => __( 'Upload your favicon', 'bmp' ),
			   'type' 			=> 'image',
               'section'        => 'bmp_general',
               'settings'       => 'site_favicon',
            )
        )
    );

    //Description Display
	$wp_customize->add_setting(
		'description_display',
		array(
			'sanitize_callback' => 'bmp_sanitize_checkbox',
		)		
	);
	$wp_customize->add_control(
		'description_display',
		array(
			'type' => 'checkbox',
			'label' => __('Check this box to display the site description.', 'bmp'),
			'section' => 'bmp_general',
		)
	);

	// $wp_customize->add_setting(
	// 	'bmp_scroller',
	// 	array(
	// 		'sanitize_callback' => 'bmp_sanitize_checkbox',
	// 		'default' => 0,			
	// 	)		
	// );
	// $wp_customize->add_control(
	// 	'bmp_scroller',
	// 	array(
	// 		'type' => 'checkbox',
	// 		'label' => __('Check this box if you want to disable the custom scroller.', 'bmp'),
	// 		'section' => 'bmp_general',
 	//      'priority' => 9,			
	// 	)
	// );    


	//Layout
	// $wp_customize->add_setting(
	// 	'bmp_layout',
	// 	array(
	// 		'default' => 'content-sidebar',
	// 	)
	// );
	 
	// $wp_customize->add_control(
	// 	'bmp_layout',
	// 	array(
	// 		'type' => 'radio',
	// 		'label' => __('Layout', 'bmp'),
	// 		'section' => 'bmp_general',
	// 		'choices' => array(
	// 			'content-sidebar' => 'Content-Sidebar',
	// 			'sidebar-content' => 'Sidebar-Content',
	// 		),
	// 	)
	// );

	
	// //Full content posts
	// $wp_customize->add_setting(
	// 	'bmp_full_content',
	// 	array(
	// 		'sanitize_callback' => 'bmp_sanitize_checkbox',
	// 		'default' => 0,			
	// 	)		
	// );
	// $wp_customize->add_control(
	// 	'bmp_full_content',
	// 	array(
	// 		'type' => 'checkbox',
	// 		'label' => __('Check this box to display the full content of the posts on the home page.', 'bmp'),
	// 		'section' => 'bmp_general',
    //         'priority' => 11,			
	// 	)
	// );	
	//___Fonts___//
    $wp_customize->add_section(
        'bmp_typography',
        array(
            'title' => __('Fonts', 'bmp' ),
            'priority' => 11,
        )
    );
	$font_choices = 
		array(
			'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',		
			'Droid Sans:400,700' => 'Droid Sans',
			'Lato:400,700,400italic,700italic' => 'Lato',
			'Arvo:400,700,400italic,700italic' => 'Arvo',
			'Lora:400,700,400italic,700italic' => 'Lora',
			'PT Sans:400,700,400italic,700italic' => 'PT Sans',
			'PT+Sans+Narrow:400,700' => 'PT Sans Narrow',
			'Arimo:400,700,400italic,700italic' => 'Arimo',
			'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
			'Bitter:400,700,400italic' => 'Bitter',
			'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
			'Open+Sans:400italic,700italic,400,700' => 'Open Sans',
			'Roboto:400,400italic,700,700italic' => 'Roboto',
			'Oswald:400,700' => 'Oswald',
			'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
			'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
			'Raleway:400,700' => 'Raleway',
			'Roboto Slab:400,700' => 'Roboto Slab',
			'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
			'Rokkitt:400' => 'Rokkitt',
		);
	
	$wp_customize->add_setting(
		'headings_fonts',
		array(
			'sanitize_callback' => 'bmp_sanitize_fonts',
		)
	);
	
	$wp_customize->add_control(
		'headings_fonts',
		array(
			'type' => 'select',
			'label' => __('Select your desired font for the headings.', 'bmp'),
			'section' => 'bmp_typography',
			'choices' => $font_choices
		)
	);
	
	$wp_customize->add_setting(
		'body_fonts',
		array(
			'sanitize_callback' => 'bmp_sanitize_fonts',
		)
	);
	
	$wp_customize->add_control(
		'body_fonts',
		array(
			'type' => 'select',
			'label' => __('Select your desired font for the body.', 'bmp'),
			'section' => 'bmp_typography',
			'choices' => $font_choices
		)
	);
	//___Slider___//
    $wp_customize->add_section(
        'bmp_slider',
        array(
            'title' => __('Slider', 'bmp'),
            'priority' => 12,
        )
    );
	//Display
	$wp_customize->add_setting(
		'slider_display',
		array(
			'sanitize_callback' => 'bmp_sanitize_checkbox',
		)		
	);
	$wp_customize->add_control(
		'slider_display',
		array(
			'type' => 'checkbox',
			'label' => __('Check this box to display the slider.', 'bmp'),
			'section' => 'bmp_slider',
		)
	);

	//Slider image 1
	$wp_customize->add_setting( 'slider_image1', array(
		'default-image' => '',
	) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'slider_image1', array(
       'label'          => __( 'Upload your first image', 'bmp' ),
	   'type' 			=> 'image',
       'section'        => 'bmp_slider',
       'settings'   	=> 'slider_image1',
    ) ) );
    //Slider text 1
	$wp_customize->add_setting( 'slider_text1', array(
		'default' => '',
	) );
    $wp_customize->add_control( 'slider_text1', array(
       'label'          => __( 'Slider 1 text', 'bmp' ),
       'section'        => 'bmp_slider',
       'type' 			=> 'text',
    ) );

	//Slider image 2
	$wp_customize->add_setting( 'slider_image2', array(
		'default-image' => '',
	) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'slider_image2', array(
       'label'          => __( 'Upload your second image', 'bmp' ),
	   'type' 			=> 'image',
       'section'        => 'bmp_slider',
       'settings'   	=> 'slider_image2',
    ) ) );
    //Slider text 2
	$wp_customize->add_setting( 'slider_text2', array(
		'default' => '',
	) );
    $wp_customize->add_control( 'slider_text2', array(
       'label'          => __( 'Slider 2 text', 'bmp' ),
       'section'        => 'bmp_slider',
       'type' 			=> 'text',
    ) );



	//Slider image 3
	$wp_customize->add_setting( 'slider_image3', array(
		'default-image' => '',
	) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'slider_image3', array(
       'label'          => __( 'Upload your third image', 'bmp' ),
	   'type' 			=> 'image',
       'section'        => 'bmp_slider',
       'settings'   	=> 'slider_image3',
    ) ) );
    //Slider text 3
	$wp_customize->add_setting( 'slider_text3', array(
		'default' => '',
	) );
    $wp_customize->add_control( 'slider_text3', array(
       'label'          => __( 'Slider 3 text', 'bmp' ),
       'section'        => 'bmp_slider',
       'type' 			=> 'text',
    ) );


	//Slider image 4
	$wp_customize->add_setting( 'slider_image4', array(
		'default-image' => '',
	) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'slider_image4', array(
       'label'          => __( 'Upload your fourth image', 'bmp' ),
	   'type' 			=> 'image',
       'section'        => 'bmp_slider',
       'settings'   	=> 'slider_image4',
    ) ) );
    //Slider text 4
	$wp_customize->add_setting( 'slider_text4', array(
		'default' => '',
	) );
    $wp_customize->add_control( 'slider_text4', array(
       'label'          => __( 'Slider 4 text', 'bmp' ),
       'section'        => 'bmp_slider',
       'type' 			=> 'text',
    ) );


	//Slideshow speed
	$wp_customize->add_setting(
		'slideshowspeed',
		array(
			'default' => '500',
			'sanitize_callback' => 'bmp_sanitize_int',
		)
	);	
	$wp_customize->add_control(
		'slideshowspeed',
		array(
			'label' => __('Speed of the transition, in milliseconds.', 'bmp'),
			'section' => 'bmp_slider',
			'type' => 'text',
		)
	);
	
	//Animation speed
	$wp_customize->add_setting(
		'animationspeed',
		array(
			'default' => '4000',
			'sanitize_callback' => 'bmp_sanitize_int',
		)
	);
		
	$wp_customize->add_control(
		'animationspeed',
		array(
			'label' => __('Time between slide transitions, in milliseconds.', 'bmp'),
			'section' => 'bmp_slider',
			'type' => 'text',
		)
	);	


	
	// //Category
	// $wp_customize->add_setting( 'slider_cat', array(
	// 	'default'        => '',
	// 	'sanitize_callback' => 'bmp_sanitize_int',
	// ) );
	
	// $wp_customize->add_control( new Categories_Dropdown( $wp_customize, 'slider_cat', array(
	// 	'label'   => __('Select which category to show in the slider', 'bmp'),
	// 	'section' => 'bmp_slider',
	// 	'settings'   => 'slider_cat',
	// ) ) );
	

	// //Number of posts
	// $wp_customize->add_setting(
	// 	'slider_number',
	// 	array(
	// 		'default' => '6',
	// 		'sanitize_callback' => 'bmp_sanitize_int',
	// 	)
	// );
	// $wp_customize->add_control(
	// 	'slider_number',
	// 	array(
	// 		'label' => __('Enter the number of posts you want to show in the slider.', 'bmp'),
	// 		'section' => 'bmp_slider',
	// 		'type' => 'text',
	// 	)
	// );



	
	//___Single posts___//
    $wp_customize->add_section(
        'bmp_singles',
        array(
            'title' => __('Single posts/pages', 'bmp'),
            'priority' => 13,
        )
    );
	//Single posts
	$wp_customize->add_setting(
		'bmp_post_img',
		array(
			'sanitize_callback' => 'bmp_sanitize_checkbox',
		)		
	);
	$wp_customize->add_control(
		'bmp_post_img',
		array(
			'type' => 'checkbox',
			'label' => __('Check this box to show featured images on single posts', 'bmp'),
			'section' => 'bmp_singles',
		)
	);
	//Pages
	$wp_customize->add_setting(
		'bmp_page_img',
		array(
			'sanitize_callback' => 'bmp_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'bmp_page_img',
		array(
			'type' => 'checkbox',
			'label' => __('Check this box to show featured images on pages', 'bmp'),
			'section' => 'bmp_singles',
		)
	);
	//Author bio
	$wp_customize->add_setting(
		'author_bio',
		array(
			'sanitize_callback' => 'bmp_sanitize_checkbox',
		)		
	);
	$wp_customize->add_control(
		'author_bio',
		array(
			'type' => 'checkbox',
			'label' => __('Check this box to display the author bio on single posts. You can add your author bio and social links on the Users screen in the Your Profile section.', 'bmp'),
			'section' => 'bmp_singles',
		)
	);
	//___Colors___//
	//Primary color
	$wp_customize->add_setting(
		'primary_color',
		array(
			'default'			=> '#D9D4A6',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'			=> 'postMessage'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'primary_color',
			array(
				'label' => __('Primary color', 'bmp'),
				'section' => 'colors',
				'settings' => 'primary_color',
				'priority' => 12
			)
		)
	);	
	//Secondary color
	$wp_customize->add_setting(
		'secondary_color',
		array(
			'default'			=> '#3296B8',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'			=> 'postMessage'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'secondary_color',
			array(
				'label' => __('Secondary color', 'bmp'),
				'section' => 'colors',
				'settings' => 'secondary_color',
				'priority' => 12
			)
		)
	);
	//tertiary color
	$wp_customize->add_setting(
		'tertiary_color',
		array(
			'default'			=> '#B4AA51',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'			=> 'postMessage'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'tertiary_color',
			array(
				'label' => __('Tertiary color', 'bmp'),
				'section' => 'colors',
				'settings' => 'tertiary_color',
				'priority' => 12
			)
		)
	);
	//quaternary_color color
	$wp_customize->add_setting(
		'quaternary_color',
		array(
			'default'			=> '#025269',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'			=> 'postMessage'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'quaternary_color',
			array(
				'label' => __('Quaternary color', 'bmp'),
				'section' => 'colors',
				'settings' => 'quaternary_color',
				'priority' => 12
			)
		)
	);
}
add_action( 'customize_register', 'bmp_customize_register' );

/**
 * Sanitization
 */
//Checkboxes
function bmp_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}
//Integers
function bmp_sanitize_int( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}
//Fonts
function bmp_sanitize_fonts( $input ) {
    $valid = array(
			'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',		
			'Droid Sans:400,700' => 'Droid Sans',
			'Lato:400,700,400italic,700italic' => 'Lato',
			'Arvo:400,700,400italic,700italic' => 'Arvo',
			'Lora:400,700,400italic,700italic' => 'Lora',
			'PT Sans:400,700,400italic,700italic' => 'PT Sans',
			'PT+Sans+Narrow:400,700' => 'PT Sans Narrow',
			'Arimo:400,700,400italic,700italic' => 'Arimo',
			'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
			'Bitter:400,700,400italic' => 'Bitter',
			'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
			'Open+Sans:400italic,700italic,400,700' => 'Open Sans',
			'Roboto:400,400italic,700,700italic' => 'Roboto',
			'Oswald:400,700' => 'Oswald',
			'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
			'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
			'Raleway:400,700' => 'Raleway',
			'Roboto Slab:400,700' => 'Roboto Slab',
			'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
			'Rokkitt:400' => 'Rokkitt',
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bmp_customize_preview_js() {
	wp_enqueue_script( 'bmp_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), true );
}
add_action( 'customize_preview_init', 'bmp_customize_preview_js' );
