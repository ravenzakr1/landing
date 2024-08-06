<?php

/**
 * Used Code :'product-iso.php'.
 */

class Elementor_Repeter_Widgets {

	protected static $instance = null;

	public static function get_instance() {
		if ( ! isset( static::$instance ) ) {
			static::$instance = new static;
		}

		return static::$instance;
	}

	protected function __construct() {
		require_once('product-iso-widget.php');
		require_once('image-slider.php');
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );

	}


	public function register_widgets() {
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Elementor_Repeter_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Elementor_Image_Slider_Repeter_Widget() );
	}
}

add_action( 'init', 'elementor_repeter_widget_callback' );
function elementor_repeter_widget_callback() {
	Elementor_Repeter_Widgets::get_instance();
}