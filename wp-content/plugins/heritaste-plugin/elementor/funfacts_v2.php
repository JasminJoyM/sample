<?php namespace HERITASTEPLUGIN\Element;

use Elementor\Controls_Manager;
use Elementor\Controls_Stack;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Border;
use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Utils;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Plugin;

/**
 * Elementor button widget.
 * Elementor widget that displays a button with the ability to control every
 * aspect of the button design.
 *
 * @since 1.0.0
 */
class Funfacts_V2 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'heritaste_funfacts_v2';
    }

    /**
     * Get widget title.
     * Retrieve button widget title.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Funfacts V2', 'heritaste' );
    }

    /**
     * Get widget icon.
     * Retrieve button widget icon.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-library-open';
    }

    /**
     * Get widget categories.
     * Retrieve the list of categories the button widget belongs to.
     * Used to determine where to display the widget in the editor.
     *
     * @since  2.0.0
     * @access public
     * @return array Widget categories.
     */
    public function get_categories() {
        return [ 'heritaste' ];
    }

    /**
     * Register button widget controls.
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since  1.0.0
     * @access protected
     */
    protected function register_controls() {
        $this->start_controls_section(
            'funfacts_v2',
            [
                'label' => esc_html__( 'Funfacts V2', 'heritaste' ),
            ]
        );
		$this->add_control(
			'funfact', 
			[
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
					],
				'fields' => 
				[
					 
					[
						'name' => 'icons',
						'label' => esc_html__('Enter The icons', 'heritaste'),
						'label_block' => true,
						'type' => Controls_Manager::SELECT2,
						'options'  => get_fontawesome_icons(),
					],
					[
						'name' => 'counter_start',
						'label' => esc_html__('Start Value', 'heritaste'),
						'type' => Controls_Manager::NUMBER,
						'default' => esc_html__('0', 'heritaste')
					],
					[
						'name' => 'counter_stop',
						'label' => esc_html__('Stop Value', 'heritaste'),
						'type' => Controls_Manager::NUMBER,
						'default' => esc_html__('0', 'heritaste')
					],
					[
						'name' => 'alphabet_letter',
						'label' => esc_html__('Alphabet Letters', 'heritaste'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'heritaste')
					],
					[
						'name' => 'title',
						'label' => esc_html__('Title', 'heritaste'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'heritaste')
					],
				],
			 ]
        );
		$this->end_controls_section();
    }

    /**
     * Render button widget output on the frontend.
     * Written in PHP and used to generate the final HTML.
     *
     * @since  1.0.0
     * @access protected
     */
    protected function render() {
        $settings = $this->get_settings_for_display();
        $allowed_tags = wp_kses_allowed_html('post');
    ?>
        
    <!-- funfact-section -->
    <section class="funfact-section home-4">
        <div class="funfact-inner">
            <?php foreach($settings['funfact'] as $key => $item): ?>
            <div class="funfact-block-one">
                <div class="inner-box">
                    <div class="icon-box"><i class="<?php echo wp_kses(str_replace( "icon ",  "", $item['icons']), true);?>"></i></div>
                    <div class="count-outer count-box special-font">
                        <span class="count-text" data-speed="1500" data-stop="<?php echo esc_attr($item['counter_stop']);?>"><?php echo esc_attr($item['counter_start']);?></span><span class="symble"><?php echo esc_attr($item['alphabet_letter']);?></span>
                    </div>
                    <h3><?php echo wp_kses($item['title'], true);?></h3>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>
    <!-- funfact-section end -->
        
        
        <?php
    }
}
