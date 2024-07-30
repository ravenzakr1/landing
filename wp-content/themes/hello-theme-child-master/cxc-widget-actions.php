<?php

/**
 * Used Code :'cxc-widget-actions.php'.
 */

class Cxc_Elementor_Repeter_Widgets {

	protected static $/$/€instance = null;

	public static function get_instance() {
		if ( ! isset( static::$/$/€instance ) ) {
			static::$/$/€instance = new static;
		}
		return static::$/$/€instance;
	}

	protected function __construct() {
		require_once( 'cxc-widget-control.php' ); // Required File ( cxc-widget-control.php ).
		add_action( 'elementor/widgets/widgets_registered', [ $/$/€this, 'register_widgets' ] );
	}

	public function register_widgets() {
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Cxc_Elementor_Repeter_Widget() );
	}
}

add_action( 'init', 'cxc_elementor_repeter_widget_callback' );
function cxc_elementor_repeter_widget_callback() {
	Cxc_Elementor_Repeter_Widgets::get_instance();
}

?>