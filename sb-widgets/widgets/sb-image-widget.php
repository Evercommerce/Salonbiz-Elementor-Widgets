<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor svg image Widget.
 *
 * Elementor widget that inserts an svg float image
 *
 * @since 1.0.0
 */
class SB_Image_Widget extends \Elementor\Widget_Base {
	public function get_script_depends() {
		return [ 'float_img_script' ];
	}

	public function get_style_depends() {
		return [ 'svg_style' ];
	}

	/**
	 * Get widget name.
	 *
	 * Retrieve widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'svg_float_image';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve hero widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'SVG Float Image', 'elementor-sb-widgets' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve hero widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-gallery-masonry';
	}

	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the hero widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'basic' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the hero widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'svg', 'image' ];
	}

	/**
	 * Register hero widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'elementor-sb-widgets' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

 	$this->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'elementor-sb-widgets' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			'media_types' => [ 'svg' ],

				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->end_controls_section();

	}


	/**
	 * Render hero widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */ 
	protected function render() {

    $settings = $this->get_settings_for_display();
    $img_url =  $settings['image']['url'];?>
    
    <div id="float-bg-img" class="svg-float-image fade-in">
        <?php
        
           $file_content = file_get_contents($img_url);
                    if (!empty($file_content)) {
                        
                        echo $file_content;
                    }

        
        ?>
    </div>
    <?php

	}

	protected function content_template() {
		?>
		<img src="{{{ settings.image.url }}}">
		<?php
	}

}