<?php

if ( ! function_exists( 'bmp_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bmp_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    load_theme_textdomain( 'bmp', get_template_directory() . '/languages' );

    // =======================================================
    // Add default posts and comments RSS feed links to head.
    // =======================================================
    add_theme_support( 'automatic-feed-links' );

    // =======================================================
    // Set the content width based on the theme's design and stylesheet.
    // =======================================================
    global $content_width;
    if ( ! isset( $content_width ) ) {
        $content_width = 640; /* pixels */
    }   
    
    // =======================================================
    // Add featured image support
    // ======================================================= 
    add_theme_support( 'post-thumbnails' ); 

    // =======================================================
    // Register two menus
    // ======================================================= 
    register_nav_menus( array(
      'primary-menu' => __( 'Primary Menu', 'bmp' ),
      'secondary-menu' => __( 'Mobile Menu', 'bmp' )
    ) );

    // =======================================================
    // Enable support for Post Formats.
    // ======================================================= 
    add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

    // =======================================================
    // Setup the WordPress core custom background feature.
    // =======================================================
    add_theme_support( 'custom-background', apply_filters( 'bmp_custom_background_args', array(
        'default-color' => 'ffffff'
    ) ) );

    // =======================================================
    // Enable support for HTML5 markup.
    // =======================================================
    add_theme_support( 'html5', array(
        'comment-list',
        'search-form',
        'comment-form',
        'gallery',
        'caption',
    ) );
}
endif; // bmp_setup
add_action( 'after_setup_theme', 'bmp_setup' );

// =======================================================
// Register some sidebars and widgets
// =======================================================
function bmp_widgets_init() {
    register_sidebar(array(
    'name' => __( 'Front page' ),
    'id' => 'frontpage',
    'description' => __( 'Right hand column, front page' ),
    'before_widget' => '<div>',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
    ));

    register_sidebar(array(
    'name' => __( 'Inside page' ),
    'id' => 'insidepage',
    'description' => __( 'Right hand column, inside page' ),
    'before_widget' => '<div>',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
    ));

    register_sidebar(array(
    'name' => __( 'Top bar' ),
    'id' => 'topbar',
    'description' => __( 'Found on the top of the site on every page, the top bar lives on the top right side of the header. Intended for search.' ),
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
    ));

    register_sidebar(array(
    'name' => __( 'Under the Logo' ),
    'id' => 'underlogo',
    'description' => __( 'Left hand column, under the logo.' ),
    'before_widget' => '<div>',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
    ));

    register_sidebar(array(
    'name' => __( 'Under the logo - logged in' ),
    'id' => 'insidepage2',
    'description' => __( 'This will be displayed under the logo only if you are logged in.' ),
    'before_widget' => '<div>',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
    ));

    register_sidebar(array(
    'name' => __( 'Right hand side - logged in' ),
    'id' => 'insidepageright2',
    'description' => __( 'This will be displayed under the logo only if you are logged in.' ),
    'before_widget' => '<div>',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
    ));

    //Register the custom widgets
    register_widget( 'bmp_Recent_Posts' );
    register_widget( 'bmp_Recent_Comments' );
    register_widget( 'bmp_Social_Profile' );
    register_widget( 'bmp_Video_Widget' );
}
add_action( 'widgets_init', 'bmp_widgets_init' );

// =======================================================
// Load the custom widgets.
// ======================================================= 
require get_template_directory() . "/widgets/recent-posts.php";
require get_template_directory() . "/widgets/recent-comments.php";
require get_template_directory() . "/widgets/social-profile.php";
require get_template_directory() . "/widgets/video-widget.php";

// =======================================================
// Enqueue scripts and styles.
// ======================================================= 
function bmp_scripts() {
    
    // CSS
    wp_enqueue_style( 'bmp-style', get_stylesheet_uri(), '', '1.0' );
    wp_enqueue_style( 'bmp-font-awesome', get_template_directory_uri() . '/fonts/font-awesome.min.css' );
    wp_enqueue_style( 'bmp-fancybox-css', get_template_directory_uri() . '/js/fancybox/jquery.fancybox-1.3.4.css' );

    $headings_font = esc_html(get_theme_mod('headings_fonts'));
    $body_font = esc_html(get_theme_mod('body_fonts'));
    if( $headings_font ) {
        wp_enqueue_style( 'bmp-headings-fonts', '//fonts.googleapis.com/css?family='. $headings_font );  
    } else {
        wp_enqueue_style( 'bmp-headings-fonts', '//fonts.googleapis.com/css?family=Raleway');
    }   
    if( $body_font ) {
        wp_enqueue_style( 'bmp-body-fonts', '//fonts.googleapis.com/css?family='. $body_font );  
    } else {
        wp_enqueue_style( 'bmp-body-fonts', '//fonts.googleapis.com/css?family=Muli:300');
    }

    // SCRIPTS
    wp_enqueue_script( 'bmp-navigation', get_template_directory_uri() . '/js/menu.js', array('jquery'), '', false   );
    wp_enqueue_script( 'bmp-fancybox-1', get_template_directory_uri() . '/js/fancybox/jquery.easing-1.3.pack.js', array('jquery'), '', true  );
    wp_enqueue_script( 'bmp-fancybox-2', get_template_directory_uri() . '/js/fancybox/jquery.mousewheel-3.0.4.pack.js', array('jquery'), '', true  );
    wp_enqueue_script( 'bmp-fancybox-3', get_template_directory_uri() . '/js/fancybox/jquery.fancybox-1.3.4.pack.js', array('jquery'), '', true  );
    wp_enqueue_script( 'bmp-fancybox-4', get_template_directory_uri() . '/js/fancysettings.js', array('jquery'), '', true );
    wp_enqueue_script( 'bmp-flexvideo', get_template_directory_uri() . '/js/flexvideo.js', array('jquery'), '', true   );
    wp_enqueue_script( 'bmp-analytics', get_template_directory_uri() . '/js/analytics.js', array(), '', true  );


    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    if ( get_theme_mod('bmp_layout') == 'sidebar-content' )  {
        wp_enqueue_style( 'bmp-left-sidebar', get_template_directory_uri() . '/layouts/sidebar-content.css' );
    }   
}
add_action( 'wp_enqueue_scripts', 'bmp_scripts' );

// =======================================================
// Load html5shiv
// =======================================================
function bmp_html5shiv() {
    echo '<!--[if lt IE 9]>' . "\n";
    echo '<script src="' . esc_url( get_template_directory_uri() . '/js/html5shiv.js' ) . '"></script>' . "\n";
    echo '<![endif]-->' . "\n";
}
add_action( 'wp_head', 'bmp_html5shiv' ); 
// =======================================================
// Login Script and logo change
// ======================================================= 

//styles
function new_login_styles() { ?>
    <style type="text/css">
        body.login {background:#fff;}
        body.login div#login h1 a {
            background-image: url(<?php echo get_bloginfo( 'template_directory' ) ?>/images/logo.png);
            padding-bottom: 30px;
            height: 140px;
            width:230px;
            background-size: auto;
        }
    </style>
<?php }
add_action('login_head','new_login_styles');

//Establish home url and apply to logo and login redirect
function new_login_url() {
    return home_url( '/' );
}
add_filter('login_headerurl', 'new_login_url'); 
add_filter('login_redirect', 'new_login_url'); 

//Title the page with the name of the blog
function new_login_title() {
    return get_option('blogname');
}
add_filter('login_headertitle', 'new_login_title');



// =======================================================
// Change the [...] at the end of the excerpt
// ======================================================= 
function new_excerpt_more( $more ) {
    return ' <div class="excerpt"><span>...</span></div>';
}
add_filter('excerpt_more', 'new_excerpt_more');


// =======================================================
// Change the length the excerpt
// ======================================================= 
function custom_excerpt_length( $length ) {
    return 40;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


// =======================================================
// Remove custom post_type from search results
// ======================================================= 
function searchfilter($query) {

    if ($query->is_search && !is_admin() ) {
        $query->set('post_type',array('page'));
    }
    if ($query->is_search && is_user_logged_in() ) {
        $query->set('post_type',array('bmps','tag','tag_id'));
    }
return $query;
}

add_filter('pre_get_posts','searchfilter');

// =======================================================
// Add tags to search
// ======================================================= 
function my_smart_search( $search, &$wp_query ) {
    global $wpdb;
 
    if ( empty( $search ))
        return $search;
 
    $terms = $wp_query->query_vars[ 's' ];
    $exploded = explode( ' ', $terms );
    if( $exploded === FALSE || count( $exploded ) == 0 )
        $exploded = array( 0 => $terms );
         
    $search = '';
    foreach( $exploded as $tag ) {
        $search .= " AND (
            (wp_posts.post_title LIKE '%$tag%')
            OR (wp_posts.post_content LIKE '%$tag%')
            OR EXISTS
            (
                SELECT * FROM wp_comments
                WHERE comment_post_ID = wp_posts.ID
                    AND comment_content LIKE '%$tag%'
            )
            OR EXISTS
            (
                SELECT * FROM wp_terms
                INNER JOIN wp_term_taxonomy
                    ON wp_term_taxonomy.term_id = wp_terms.term_id
                INNER JOIN wp_term_relationships
                    ON wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id
                WHERE taxonomy = 'post_tag'
                    AND object_id = wp_posts.ID
                    AND wp_terms.name LIKE '%$tag%'
            )
        )";
    }
 
    return $search;
}
 
add_filter( 'posts_search', 'my_smart_search', 500, 2 );


// =======================================================
// Variable & intelligent excerpt length.
// ======================================================= 
function print_excerpt($length) { // Max excerpt length. Length is set in characters
    global $post;
    $text = $post->post_excerpt;
    if ( '' == $text ) {
        $text = get_the_content('');
        $text = apply_filters('the_content', $text);
        $text = str_replace(']]>', ']]>', $text);
    }
    $text = strip_shortcodes($text); // optional, recommended
    $text = strip_tags($text); // use ' $text = strip_tags($text,'<p><a>'); ' if you want to keep some tags
    $text = substr($text,0,$length);
    $excerpt = reverse_strrchr($text, '.', 1);
    if( $excerpt ) {
        echo apply_filters('the_excerpt',$excerpt);
    } else {
        echo apply_filters('the_excerpt',$text);
    }
}
function reverse_strrchr($haystack, $needle, $trail) {
    return strrpos($haystack, $needle) ? substr($haystack, 0, strrpos($haystack, $needle) + $trail) : false;
}


// =======================================================
// Pagination
// ======================================================= 
function kriesi_pagination($pages = '', $range = 2)
{  
     $showitems = ($range * 2)+1;  
     global $paged;
     if(empty($paged)) $paged = 1;
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   
     if(1 != $pages)
     {
         
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }
         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
        
     }
}



// =======================================================
// Removes posts and pages from menu options in dashboard for those that aren't administrator.
// ======================================================= 

function remove_menus () {
    if(!current_user_can('administrator'))
    {
        remove_menu_page( 'wpcf7' );                      //Contactform 7
        remove_menu_page( 'edit.php' );                   //Posts
        remove_menu_page( 'upload.php' );                 //Media
    //  remove_menu_page( 'edit.php?post_type=page' );    //Pages
        remove_menu_page( 'edit-comments.php' );          //Comments
        remove_menu_page( 'themes.php' );                 //Appearance
        remove_menu_page( 'plugins.php' );                //Plugins
        remove_menu_page( 'users.php' );                  //Users
        remove_menu_page( 'tools.php' );                  //Tools
        remove_menu_page( 'options-general.php' );        //Settings  
        add_filter('screen_options_show_screen', 'remove_screen_options');
    }
}
add_action('admin_menu', 'remove_menus');



// =======================================================
// Removes admin bar menus for those that aren't administrator, but are editor.
// =======================================================

function admin_bar_edit() {
    if(!current_user_can('administrator'))
    {
        global $wp_admin_bar;
        $wp_admin_bar->remove_menu('wp-logo');
        $wp_admin_bar->remove_menu('my-account-with-avatar'); 
        $wp_admin_bar->remove_menu('edit-profile');
        $wp_admin_bar->remove_menu('search');
        //$wp_admin_bar->remove_menu('edit');
        //$wp_admin_bar->remove_menu('new-content');
        $wp_admin_bar->remove_menu('new-post'); 
        $wp_admin_bar->remove_menu('new-page'); 
        $wp_admin_bar->remove_menu('new-media');
        $wp_admin_bar->remove_menu('new-link'); 
        $wp_admin_bar->remove_menu('new-user'); 
        $wp_admin_bar->remove_menu('new-theme'); 
        $wp_admin_bar->remove_menu('new-plugin');
        $wp_admin_bar->remove_menu('comments');
    }
}

// =======================================================
// Adds topbar menus
// =======================================================
add_action('set_current_user', 'csstricks_hide_admin_bar');
function csstricks_hide_admin_bar() {
  if (current_user_can('subscriber')) {
    show_admin_bar(false);
  }
}

// =======================================================
// Adds topbar menus
// =======================================================

add_action( 'wp_before_admin_bar_render', 'admin_bar_edit' );

function admin_bar_sitelink() {
    global $wp_admin_bar;
    $wp_admin_bar->add_menu( array(  
        'id' => 'backhome', 
        'title' => __('Request help from Joel'),  
        'href' => ('http://joelf.com/contact') 
        ) 
    ); 
}
add_action( 'wp_before_admin_bar_render', 'admin_bar_sitelink' );


// =======================================================
// Change welcome text
// =======================================================

function custom_howdy( $text ) {
    $greeting = 'You are logged in';
    if (!current_user_can('administrator') ) {
        $text = str_replace( 'Howdy', $greeting, $text );
    }
    return $text;
}
add_filter( 'gettext', 'custom_howdy' );


// =======================================================
// Remove widgets from the dashboard.
// =======================================================

function remove_dashboard_widgets() {
    if(!current_user_can('administrator'))
    {
    remove_meta_box('dashboard_right_now', 'dashboard', 'normal');   // Right Now
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); // Recent Comments
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');  // Incoming Links
    remove_meta_box('dashboard_plugins', 'dashboard', 'normal');   // Plugins
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');  // Quick Press
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');  // Recent Drafts
    remove_meta_box('dashboard_primary', 'dashboard', 'side');   // WordPress blog
    remove_meta_box('dashboard_secondary', 'dashboard', 'side');   // Other WordPress News
    // use 'dashboard-network' as the second parameter to remove widgets from a network dashboard.
    } 
}
add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );



// =======================================================
// Add a widget to the dashboard.
// =======================================================

function bmp_add_dashboard_widgets() {

    wp_add_dashboard_widget(
                 'bmp_dashboard_widget',              // Widget slug.
                 'How to add BMPs',                   // Title.
                 'bmp_dashboard_widget_function'      // Display function.
        );  
}
add_action( 'wp_dashboard_setup', 'bmp_add_dashboard_widgets' );
function bmp_dashboard_widget_function() {
    echo "
    <h1>Welcome</h1>
    <p>To the BMP Theme</p>
    ";
} 

function bmp_edit_dashboard_widgets() {

    wp_add_dashboard_widget(
                 'bmpedit_dashboard_widget',            // Widget slug.
                 'How to edit BMPs',                    // Title.
                 'bmpedit_dashboard_widget_function'    // Display function.
        );  
}
add_action( 'wp_dashboard_setup', 'bmp_edit_dashboard_widgets' );
function bmpedit_dashboard_widget_function() {
    echo "

    <h1>Editing a BMP</h1>
    <p>To edit a BMP, hover over, or click on the BMP menu to the left.</p>
    ";
} 
function bmp_delete_dashboard_widgets() {

    wp_add_dashboard_widget(
                 'bmpdelete_dashboard_widget',            // Widget slug.
                 'How to delete BMPs',                    // Title.
                 'bmpdelete_dashboard_widget_function'    // Display function.
        );  
}
add_action( 'wp_dashboard_setup', 'bmp_delete_dashboard_widgets' );
function bmpdelete_dashboard_widget_function() {
    echo "
    <h1>Deleting a BMP</h1>
    <p>To erase a BMP, hover over, or click on the BMP menu to the left.</p>
    ";
} 

// =======================================================
// Register Custom Post Type
// =======================================================


function custom_events() {

  $labels = array(
    'name'                => _x( 'Events', 'Post Type General Name', 'text_domain' ),
    'singular_name'       => _x( 'Event', 'Post Type Singular Name', 'text_domain' ),
    'menu_name'           => __( 'Events', 'text_domain' ),
    'parent_item_colon'   => __( 'Parent Event:', 'text_domain' ),
    'all_items'           => __( 'All Events', 'text_domain' ),
    'view_item'           => __( 'View Events', 'text_domain' ),
    'add_new_item'        => __( 'Add New Event', 'text_domain' ),
    'add_new'             => __( 'New Event', 'text_domain' ),
    'edit_item'           => __( 'Edit Event', 'text_domain' ),
    'update_item'         => __( 'Update Event', 'text_domain' ),
    'search_items'        => __( 'Search Events', 'text_domain' ),
    'not_found'           => __( 'No Events found', 'text_domain' ),
    'not_found_in_trash'  => __( 'No Events found in Trash', 'text_domain' ),
  );
  $rewrite = array(
    'slug'                => 'Eventarchive',
    'with_front'          => true,
    'pages'               => true,
    'feeds'               => true,
  );
  $args = array(
    'label'               => __( 'Events', 'text_domain' ),
    'description'         => __( 'Event information pages', 'text_domain' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', ),
    'taxonomies'          => array( 'Events', 'post_tag', 'category' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 5,
    'menu_icon'           => get_bloginfo('template_directory'). '/images/custom_event_icon.png',
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'rewrite'             => $rewrite,
    'capability_type'     => 'post'
  );
  register_post_type( 'custom_events', $args );

}

// Hook into the 'init' action
add_action( 'init', 'custom_events', 0 );

// =======================================================
// Add custom post taxonomies to the standard categories and tags
// =======================================================
function add_custom_types_to_tax( $query ) {
  if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
    $post_types = get_post_types();
    $query->set( 'post_type', $post_types );
      return $query;
  }
}
add_filter( 'pre_get_posts', 'add_custom_types_to_tax' );


// ======================================================= 
// WLW Disabler - removes version number and emoji from the header of the site
// ======================================================= 

remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'print_emoji_detection_script', 7 );
remove_action('wp_print_styles', 'print_emoji_styles' );

// ======================================================= 
// Adds class to the first and last main menu item
// =======================================================

//Add some drowdown hinting
function menu_set_dropdown( $sorted_menu_items, $args ) {
    $last_top = 0;
    foreach ( $sorted_menu_items as $key => $obj ) {
        // it is a top lv item?
        if ( 0 == $obj->menu_item_parent ) {
            // set the key of the parent
            $last_top = $key;
        } else {
            $sorted_menu_items[$last_top]->classes['menu-dropdown'] = 'menu-dropdown';
        }
    }
    return $sorted_menu_items;
}
add_filter( 'wp_nav_menu_objects', 'menu_set_dropdown', 10, 2 );

//find the last dropdown and give it a class of last
function add_first_and_last($output) {
  $output = preg_replace('/class="menu-item/', 'class="first-menu-item menu-item', $output, 1);
  $output = substr_replace($output, 'class="last-menu-item menu-item', strripos($output, 'class="menu-item'), strlen('class="menu-item'));
  $output = substr_replace($output, 'last-dropdown menu-dropdown', strripos($output, 'menu-dropdown'), strlen('menu-dropdown'));
  
  return $output;
}
add_filter('wp_nav_menu', 'add_first_and_last');

// ======================================================= 
// Remove inline width from images
// =======================================================

add_shortcode( 'wp_caption', 'fixed_img_caption_shortcode' );
add_shortcode( 'caption', 'fixed_img_caption_shortcode' );

function fixed_img_caption_shortcode($attr, $content = null) {
     if ( ! isset( $attr['caption'] ) ) {
         if ( preg_match( '#((?:<a [^>]+>s*)?<img [^>]+>(?:s*</a>)?)(.*)#is', $content, $matches ) ) {
         $content = $matches[1];
         $attr['caption'] = trim( $matches[2] );
         }
     }
     $output = apply_filters( 'img_caption_shortcode', '', $attr, $content );
         if ( $output != '' )
         return $output;
     extract( shortcode_atts(array(
     'id'      => '',
     'align'   => 'alignnone',
     'width'   => '',
     'caption' => ''
     ), $attr));
     if ( 1 > (int) $width || empty($caption) )
     return $content;
     if ( $id ) $id = 'id="' . esc_attr($id) . '" ';
     return '<div ' . $id . 'class="wp-caption ' . esc_attr($align) . '" >'
     . do_shortcode( $content ) . '<p class="wp-caption-text">' . $caption . '</p></div>';
}

// ======================================================= 
// Customizer additions.
// =======================================================
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/styles.php';
require get_template_directory() . '/inc/rslides/slider.php';


?>