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
class Booking_Form_V2 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'heritaste_booking_form_v2';
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
        return esc_html__( 'Booking Form V2', 'heritaste' );
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
            'booking_form_v2',
            [
                'label' => esc_html__( 'Booking Form V2', 'heritaste' ),
            ]
        );
		$this->add_control(
			'subtitle',
			[
				'label'       => __( 'Sub subTitle', 'heritaste' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Left Block subTitle', 'heritaste' ),
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'heritaste' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Left Block Title', 'heritaste' ),
			]
		);
		$this->add_control(
			'text',
			[
				'label'       => __( 'Text', 'heritaste' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'heritaste' ),
			]
		);		
		$this->add_control(
			'booking_image',
			[
				'label' => __( 'Booking Image', 'heritaste' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'contact_form_url',
			[
				'label'       => __( 'Contact Form 7 Url', 'heritaste' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Contact Form 7 Url', 'heritaste' ),
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
    
    <!-- booking-style-two -->
    <section class="booking-style-two">
        <div class="upper-box">
            <div class="auto-container">
                <?php if($settings['subtitle'] || $settings['title'] || $settings['text']) { ?>
                <div class="sec-title light centred">
                    <div class="icon-box">
                        <div class="icon"><i class="flaticon-calendar"></i></div>
                    </div>
                    <?php if($settings['subtitle']) { ?><span class="sub-title"><?php echo wp_kses($settings['subtitle'], true);?></span><?php } ?>
                    <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                    <?php if($settings['text']) { ?><p><?php echo wp_kses($settings['text'], true);?></p><?php } ?>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="lower-box">
            <?php if($settings['booking_image']['id']){ ?>
            <div class="bg-layer" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['booking_image']['id'])); ?>);"></div>
            <?php } ?>
            <div class="auto-container">
                <div class="form-inner">
                   <?php echo do_shortcode($settings['contact_form_url'], true);?> 
                </div>
            </div>
        </div>
    </section>
    <!-- booking-style-two end -->        
      
        <?php
    }
}

