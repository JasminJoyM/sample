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
class Branches_Section extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'heritaste_branches_section';
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
        return esc_html__( 'Branches Section', 'heritaste' );
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
            'branches_section',
            [
                'label' => esc_html__( 'Branches Section', 'heritaste' ),
            ]
        );
		$this->add_control(
			'info', 
			[
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title' => esc_html__('Main Address', 'heritaste')],
						['block_title' => esc_html__('Email Address', 'heritaste')],
						['block_title' => esc_html__('Main Address', 'heritaste')],
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
						'name' => 'block_title',
						'label' => esc_html__('Title', 'heritaste'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'heritaste')
					],
					[
						'name' => 'block_text',
						'label' => esc_html__('Description', 'heritaste'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'heritaste')
					],
					[
						'name' => 'phone_no',
						'label' => esc_html__('Phone Number', 'heritaste'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'heritaste')
					],
					[
						'name' => 'btn_title',
						'label' => esc_html__('Button Title', 'heritaste'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('Read More', 'heritaste')
					],
					[
						'name' => 'btn_link',
						'label' => __( 'Button Link', 'heritaste' ),
						'type' => Controls_Manager::URL,
						'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
				],
				'title_field' => '{{block_title}}',
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
    ?>
	
    <!-- branches-section -->
    <section class="branches-section centred">
        <div class="auto-container">
            <div class="row clearfix">
                <?php foreach($settings['info'] as $key => $item): ?>
                <div class="col-lg-3 col-md-6 col-sm-12 single-column">
                    <div class="single-item">
                        <div class="icon-box"><i class="<?php echo wp_kses(str_replace( "icon ",  "", $item['icons']), true);?>"></i></div>
                        <h3><?php echo wp_kses($item['block_title'], true);?></h3>
                        <p><?php echo wp_kses($item['block_text'], true);?><br /><a href="tel:<?php echo esc_attr($item['phone_no']); ?>"><?php echo wp_kses($item['phone_no'], true);?></a></p>
                        <div class="mail-box"><a href="<?php echo esc_url($item['btn_link']['url']); ?>"><?php echo wp_kses($item['btn_title'], true); ?></a></div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- branches-section end -->
                     
        <?php
    }
}


