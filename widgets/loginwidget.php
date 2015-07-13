<?php
/*
Plugin Name: Saanich BMP Admin and Login
Description: A simple Login/logout link
Version: 1
Author: Joel Friesen
Author URI: http://saanich.ca
License: GPL2
*/

class wp_my_plugin extends WP_Widget {

	// constructor
    function wp_my_plugin() {
        parent::WP_Widget(false, $name = __('Saanich BMP Login', 'wp_widget_plugin') );
    }
	
	// widget form creation
	function form($instance) {
		if( $instance) {
			$title = esc_attr($instance['title']);
		} else {
			$title = '';
		}
		?>
			<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title', 'wp_widget_plugin'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
			</p>
		<?php
	}

	// update widget
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}

	// display widget
	function widget($args, $instance)  {
		$title = apply_filters('widget_title', $instance['title']);
		echo $before_widget;
		if ( $title ) {
			echo '<h3>';
			echo $before_title . $title . $after_title;
			echo '</h3>';
		}
		echo '<div class="textwidget">';
		echo '<ul>';
		if ( is_user_logged_in() ) 
		{ 
			echo '<li class="loggedin">';
			echo wp_loginout('/');
			echo '</li>';
			echo '<li><a href="https://bmp.saanich.ca/wp-admin/edit.php?post_type=qa_faqs">Edit or add BMPS</a></li>';
		} else {
			echo '<li class="loggedout"><a href="https://bmp.saanich.ca/wp-login.php">Log in</a></li>';
		}
		echo '<li><a href="https://bmp.saanich.ca">BMP home page</a></li>';
		echo '<li><a href="http://www.env.gov.bc.ca/wld/BMP/bmpintro.html">Ministry of Environment BMP Guidelines</a></li>';
		echo '<li><a href="http://www.env.gov.bc.ca/wld/index.htm">Ministry of Environment Ecosystems Branch</a></li>';
		echo '</ul>';
		echo '</div>';
		echo $after_widget;
	}
}
// register widget
add_action('widgets_init', create_function('', 'return register_widget("wp_my_plugin");'));
?>