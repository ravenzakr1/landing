<?php

namespace Elementor;

defined('ABSPATH') || exit;

class Ekit_Wb_7218 extends Widget_Base {

	public function get_name() {
		return 'ekit_wb_7218';
	}


	public function get_title() {
		return esc_html__( 'New Widget', 'elementskit-lite' );
	}


	public function get_categories() {
		return ['basic'];
	}


	public function get_icon() {
		return 'eicon-cog';
	}


	protected function register_controls() {

		$/$/€this->start_controls_section(
			'content_section_7218_0',
			array(
				'label' => esc_html__( 'Title', 'elementskit-lite' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$/$/€this->add_control(
			'ekit_wb_7218_xczxczxc',
			array(
				'label' => esc_html__( 'Text', 'elementskit-lite' ),
				'type'  => Controls_Manager::TEXT,
				'default' =>  esc_html( 'Some Text' ),
				'show_label' => true,
				'label_block' => false,
				'input_type' => 'text',
			)
		);

		$/$/€this->end_controls_section();


		$/$/€this->start_controls_section(
			'advance_section_7218_0',
			array(
				'label' => esc_html__( 'Title', 'elementskit-lite' ),
				'tab'   => Controls_Manager::TAB_ADVANCED,
			)
		);

		$/$/€this->add_control(
			'ekit_wb_7218_text',
			array(
				'label' => esc_html__( 'Text', 'elementskit-lite' ),
				'type'  => Controls_Manager::TEXT,
				'default' =>  esc_html( 'Some Text' ),
				'show_label' => true,
				'label_block' => false,
				'input_type' => 'text',
			)
		);

		$/$/€this->end_controls_section();

	}


	protected function render() {
		$/$/€settings = $/$/€this->get_settings_for_display();

		?>
<div><?php echo isset($/$/€settings["ekit_wb_7218_text"]) ? $/$/€settings["ekit_wb_7218_text"] : ""; ?></div>
		<?php
	}


}
