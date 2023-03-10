<?php
class Ts_Widget extends WP_Widget {

	function __construct() {
		$widget_ops = array(
			'classname'   => 'themestall',
			'description' => __( 'ThemeStall Shortcodes widget', 'themestall' )
		);
		$control_ops = array(
			'width'   => 300,
			'height'  => 350,
			'id_base' => 'themestall'
		);
		parent::__construct( 'themestall', __( 'ThemeStall Shortcodes', 'themestall' ), $widget_ops, $control_ops );
	}

	public static function register() {
		register_widget( 'Ts_Widget' );
	}

	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		$content = $instance['content'];
		echo $before_widget;
		if ( $title ) echo $before_title . $title . $after_title;
		echo '<div class="textwidget">' . do_shortcode( $content ) . '</div>';
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['content'] = $new_instance['content'];
		return $instance;
	}

	function form( $instance ) {
		$defaults = array(
			'title'   => __( 'ThemeStall Shortcodes', 'themestall' ),
			'content' => ''
		);
		$instance = wp_parse_args( ( array ) $instance, $defaults );
?>
				<p>
					<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'themestall' ); ?></label>
					<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
				</p>
				<p>
				<?php Ts_Generator::button( array( 'target' => $this->get_field_id( 'content' ) ) ); ?><br/>
					<textarea name="<?php echo $this->get_field_name( 'content' ); ?>" id="<?php echo $this->get_field_id( 'content' ); ?>" rows="7" class="widefat" style="margin-top:10px"><?php echo $instance['content']; ?></textarea>
				</p>
				<?php
	}

}

add_action( 'widgets_init', array( 'Ts_Widget', 'register' ) );
