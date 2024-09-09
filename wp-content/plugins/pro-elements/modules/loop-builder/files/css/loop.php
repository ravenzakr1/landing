<?php
namespace ElementorPro\Modules\LoopBuilder\Files\Css;

use ElementorPro\Modules\ThemeBuilder\Files\CSS\Template;
use ElementorPro\Plugin;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class Loop extends Template {

    use Loop_Css_Trait;

    /**
     * Elementor Loop CSS file prefix.
     */
    const FILE_PREFIX = 'loop-';

    /**
     * @var int Post ID.
     */
    protected $post_id;

    /**
     * Loop constructor.
     *
     * @param int $loop_template_id Post ID.
     */
    public function __construct( $loop_template_id ) {
        $this->post_id = $loop_template_id;

        parent::__construct( $loop_template_id );
    }

    /**
     * Get CSS file name.
     *
     * @return string
     */
    public function get_name() {
        return 'loop';
    }

    /**
     * Get file handle ID.
     *
     * @since 1.2.0
     *
     * @return string
     */
    protected function get_file_handle_id() {
        return static::FILE_PREFIX . $this->post_id;
    }
}
