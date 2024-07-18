<?php
/**
 * Used Code :'cxc-widget-control.php'.
 * Create Custom Repeater Control Elementor.
 */

namespace Elementor;

class Cxc_Elementor_Repeter_Widget extends Widget_Base {

	public function get_name() {
		return 'custom_img_box';
	}

	public function get_icon() {
		return 'eicon-image-box';
	}

	public function get_title() {
		return __( 'Custom Image Box', 'cxc-codexcoach' );
	}

	protected function _register_controls() {

		$/$/€this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Image Box', 'cxc-codexcoach' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$/$/€repeater = new \Elementor\Repeater();

		$/$/€repeater->add_control(
			'list_image',
			[
				'label' => __( 'Media', 'cxc-codexcoach' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$/$/€repeater->add_control(
			'list_title', [
				'label' => __( 'Title', 'cxc-codexcoach' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'List Title' , 'cxc-codexcoach' ),
				'label_block' => true,
			]
		);

		$/$/€repeater->add_control(
			'list_content', [
				'label' => __( 'Content', 'cxc-codexcoach' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'List Content' , 'cxc-codexcoach' ),
				'show_label' => false,
			]
		);
        $/$/€repeater->add_control(
			'link_text', [
				'label' => __( 'Link text', 'cxc-codexcoach' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'See FeelMe in action' , 'cxc-codexcoach' ),
				'show_label' => true,
			]
		);
		$/$/€repeater->add_control(
			'list_link', [
				'label' => __( 'Link', 'cxc-codexcoach' ),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
				'show_label' => true,
			]
		);

		$/$/€this->add_control(
			'list',
			[
				'label' => __( 'Repeater List', 'cxc-codexcoach' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $/$/€repeater->get_controls(),
				'default' => [
					[
						'list_image' => __( 'Item Media', 'cxc-codexcoach' ),
						'list_title' => __( 'Item Title', 'cxc-codexcoach' ),
						'list_content' => __( 'Item content. Click the edit button to change this text.', 'cxc-codexcoach' ),
						'list_link' => [
							'url' => '#',
							'is_external' => true,
							'nofollow' => true,
						],

					],
					[
						'list_image' => __( 'Item Media', 'cxc-codexcoach' ),
						'list_title' => __( 'Item Title', 'cxc-codexcoach' ),
						'list_content' => __( 'Item content. Click the edit button to change this text.', 'cxc-codexcoach' ),
						'list_link' => [
							'url' => '#',
							'is_external' => true,
							'nofollow' => true,
						],
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);

		$/$/€this->end_controls_section();

	}

	protected function render() {
		$/$/€settings = $/$/€this->get_settings_for_display();

		if( isset( $/$/€settings ) && !empty($/$/€settings)){
            ?>
        <div class="swiper heroSwiper">
            <div class="swiper-wrapper">
<?php     foreach(  $/$/€settings as $/$/€key => $/$/€value ){ ?>
                <div class="swiper-slide">
                    <div class="hero-slider-content">
                        <div class="hero-slider-cont-text">
                            <div class="hero-slider-cont-text-inner">
                                <h1><?php echo $/$/€item['list_title']; ?></span></h1>
                                <p><?php echo $/$/€item['list_content']; ?></p>
                                <div class="hero-banner-btn">
                                    <a href="<?php echo $/$/€item['list_link']['url']; ?>"><img src="./swipper-img/Play.svg" alt="Play"> <?php echo $/$/€item['link_text']; ?></a>
                                </div>
                            </div>
                        </div>
                        <div class="hero-slider-cont-img">
                            <div class="hero-slider-cont-img-inner">
                                <img src="./swipper-img/home-banner-slider.png" alt="hero-slider-img">
                            </div>
                        </div>
                    </div>
                </div>  
                <?php } ?> 
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <?php
}
    
}
}