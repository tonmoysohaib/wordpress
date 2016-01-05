<?php

/*
Plugin Name: Custom Widget
Plugin URI: http://inkthemes.com
Description: Building a Custom WordPress Widget.
Author: InkThemes
Version: 1
Author URI: http://inkthemes.com
*/




class site_contact_widget extends WP_Widget {

// constructor
function __construct() {
// Give widget name here
parent::__construct(false, $name = __('site contact Widget', 'wp_widget_plugin') );

}



function form($instance) {

// Check values
if( $instance) {
$title = esc_attr($instance['title']);
 // $textarea = $instance['textarea'];
} else {
 $title = '';
 // $textarea = '';
 }

?>



<p>
<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'wp_widget_plugin'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
</p>
<!-- <p>
<label for="<?php echo $this->get_field_id('textarea'); ?>"><?php _e('Description:', 'wp_widget_plugin'); ?></label>
<textarea class="widefat" id="<?php echo $this->get_field_id('textarea'); ?>" name="<?php echo $this->get_field_name('textarea'); ?>" rows="7" cols="20" ><?php echo $textarea; ?></textarea>
</p> -->
<?php
}






//<?php

function update($new_instance, $old_instance) {
$instance = $old_instance;
// Fields
$instance['title'] = strip_tags($new_instance['title']);
//$instance['textarea'] = strip_tags($new_instance['textarea']);
return $instance;
}




//<?php
// display widget
function widget($args, $instance) {
extract( $args );

// these are the widget options
$title = apply_filters('widget_title', $instance['title']);
//$textarea = $instance['textarea'];
echo $before_widget;


// Display the widget
// echo '<div class="widget-text wp_widget_plugin_box" style="width:269px; padding:5px 9px 20px 5px; border: 1px solid rgb(231, 15, 52); background: pink; border-radius: 5px; margin: 10px 0 25px 0;">';
// echo '<div class="widget-title" style="width: 90%; height:30px; margin-left:3%; ">';

// Check if title is set
if ( $title ) {
echo $before_title . $title . $after_title ;
}

echo do_shortcode('[sitepoint_contact_form]');
//echo '</div>';

// Check if textarea is set
//// if( $textarea ) {
// echo '<p class="wp_widget_plugin_textarea" style="font-size:15px;">'.$textarea.'</p>';
// }
// echo '</div>';
// echo '</div>';
echo $after_widget;
} // widget end
}





//<?php

// register widget
add_action('widgets_init', create_function('', 'return register_widget("site_contact_widget");'));

?>