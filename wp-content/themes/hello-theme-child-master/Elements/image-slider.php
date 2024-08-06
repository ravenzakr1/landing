<?php

/**
 * Used Code :'image-slider.php'.
 * Create Custom Repeater Control Elementor.
 */

namespace Elementor;

class Elementor_Image_Slider_Repeter_Widget extends Widget_Base {


	public function get_name() {
		return 'image_slider_repeater';
	}
	
	public function get_icon() {
		return 'eicon-carousel-loop';
	}

	public function get_title() {
		return __( 'Image Slider Repeater', 'elementor' );
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'list_image',
			[
				'label' => __( 'Image', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'list',
			[
				'label' => __( 'Repeater List', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_image' => __( 'Item Image', 'plugin-domain' ),
					],
					[
						'list_image' => __( 'Item Image', 'plugin-domain' ),
						
					],
				],
				'title_field' => 'Item Image',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		if ( $settings['list'] ) {  ?>
			<div class="home-img-slider">
				<!-- Slider main container -->
				<div class="home-img-swipper-container swiper-container">
					<!-- Additional required wrapper -->
					<div class="swiper-wrapper">
						<!-- Slides -->
						<?php
						foreach ( $settings['list'] as $item ) { 
							$image_url = isset($item['list_image']['url']) ? $item['list_image']['url'] : ''; ?>
							<div class="swiper-slide">
								<img src="<?php echo $image_url; ?>" alt="">
							</div>
							<?php
						}
						?>
					</div>
					<div class="swiper-button-prev"></div>
					<div class="swiper-button-next"></div>
					<div class="swiper-pagination"></div>
				</div>
			</div>
			<?php
		}
	}

}
