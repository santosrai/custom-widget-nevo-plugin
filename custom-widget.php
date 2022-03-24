<?php
/**
 * Plugin Name: Custom-Widget-nevo-plugin
 * Plugin URI: https://github.com/santosrai/custom-widget-nevo-plugin/
 * Description: Custom widget plugin
 * Version: 1.0
 * Author: Santosh Rai
 * Author URI: https://santosrai.github.io/
 */
 
 
// Creating the widget 
class custom_widget_nevo extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'custom_widget_nevo', 

// Widget name will appear in UI
__('Cloudways Widget', 'custom_widget_nevo_domain'), 

// Widget description
array( 'description' => __( 'Sample widget based on Testing Widgets', 'custom_widget_nevo_domain' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance )
{
$title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output
echo __($title, 'custom_widget_nevo_domain' );
echo $args['after_widget'];
}
  
// Widget Backend 
public function form( $instance ) {
	
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'custom_widget_nevo_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />

</p>

<?php 
}
 
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class custom_widget_nevo ends here

// Register and load the widget
function cw_load_widget() {
 register_widget( 'custom_widget_nevo' );
}
add_action( 'widgets_init', 'cw_load_widget' );


