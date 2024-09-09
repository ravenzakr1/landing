<?php

/**
 * Used Code :'product-iso-widget.php'.
 * Create Custom Repeater Control Elementor.
 */

namespace Elementor;

class Elementor_Repeter_Widget extends Widget_Base {


	public function get_name() {
		return 'slider_repeater';
	}
	
	public function get_icon() {
		return 'eicon-carousel-loop';
	}

	public function get_title() {
		return __( 'Slider Repeater', 'elementor' );
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

		$repeater->add_control(
			'list_title', [
				'label' => __( 'Title', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'List Title' , 'plugin-domain' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'list_content', [
				'label' => __( 'Content', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'List Content' , 'plugin-domain' ),
				'show_label' => false,
			]
		);

		$repeater->add_control(
			'button_image',
			[
				'label' => __( 'Button Image', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'button_link', [
				'label' => __( 'Button Link', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '#' , 'plugin-domain' ),
				'show_label' => true,
			]
		);


		$repeater->add_control(
			'button_title', [
				'label' => __( 'Button Title', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Button Title' , 'plugin-domain' ),
				'label_block' => true,
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
						'list_title' => __( 'Item Title', 'plugin-domain' ),
						'list_content' => __( 'Item content. Click the edit button to change this text.', 'plugin-domain' ),
						'button_image' => __( 'Button Image', 'plugin-domain' ),
						'button_link' => [
							'url' => '#',
							'is_external' => true,
							'nofollow' => true,
						],
						'button_title' => __( 'Button Title', 'plugin-domain' ),
					],
					[
						'list_image' => __( 'Item Image', 'plugin-domain' ),
						'list_title' => __( 'Item Title', 'plugin-domain' ),
						'list_content' => __( 'Item content. Click the edit button to change this text.', 'plugin-domain' ),
						'button_image' => __( 'Button Image', 'plugin-domain' ),
						'button_link' => [
							'url' => '#',
							'is_external' => true,
							'nofollow' => true,
						],
						'button_title' => __( 'Button Title', 'plugin-domain' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		if ( $settings['list'] ) { ?>
			<div class="swiper heroSwiper">
				<div class="swiper-wrapper">
					
						<?php
						foreach ( $settings['list'] as $item ) { 
							$image_url = isset($item['list_image']['url']) ? $item['list_image']['url'] : '';
							$button_url = isset($item['button_image']['url']) ? $item['button_image']['url'] : '';
							$button_link = isset($item['button_link']) ? $item['button_link'] : '';

							?>
							<div class="swiper-slide">
								<div class="hero-slider-content">
									<div class="hero-slider-cont-text">
										<div class="hero-slider-cont-text-inner">
											<?php if( $item['list_title'] ) { ?>
												<h1><?php echo $item['list_title']; ?></h1>
											<?php } ?>
											<?php if( $item['list_content'] ) { ?>
												<?php  echo $item['list_content']; ?>
											<?php } ?>
											<div class="hero-banner-btn">
												<a href="<?php echo $button_link; ?>"><img src="<?php echo $button_url; ?>" alt="Play"><?php echo $item['button_title']; ?></a>
											</div>
										</div>
									</div>
									<div class="hero-slider-cont-img">
										<div class="hero-slider-cont-img-inner">
											<img src="<?php echo $image_url; ?>" alt="">
										</div>
									</div>
								</div>
							</div>
							<?php
						}
						?>
				</div>				
			<div class="swiper-pagination"></div>
			</div>
			
			<?php
		}
	}

}
