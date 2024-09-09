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
class Booking_Form extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'heritaste_booking_form';
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
        return esc_html__( 'Booking Form', 'heritaste' );
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
            'booking_form',
            [
                'label' => esc_html__( 'booking Form', 'heritaste' ),
            ]
        );
		$this->add_control(
			'bg_image',
			[
				'label' => __( 'Background Image', 'heritaste' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'bg_image_1',
			[
				'label' => __( 'Background Image One', 'heritaste' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'left_block_subtitle',
			[
				'label'       => __( 'Left Block subTitle', 'heritaste' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Left Block subTitle', 'heritaste' ),
			]
		);
		$this->add_control(
			'left_block_title',
			[
				'label'       => __( 'Left Block Title', 'heritaste' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Left Block Title', 'heritaste' ),
			]
		);
		$this->add_control(
			'left_block_discount',
			[
				'label'       => __( 'Left Block Discount', 'heritaste' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Left Block Discount', 'heritaste' ),
			]
		);
		$this->add_control(
			'left_block_arrowlink',
			[
				'label' => __( 'Left Block Arrow Url', 'heritaste' ),
				'type' => Controls_Manager::URL,
				'label_block' => true, 
				'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
				'show_external' => true,
				'default' => [
				'url' => '',
				'is_external' => true,
				'nofollow' => true,
				],
			]
		);
		$this->add_control(
			'form_title',
			[
				'label'       => __( 'Form Title', 'heritaste' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Form Title', 'heritaste' ),
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
		$this->add_control(
			'bg_image_2',
			[
				'label' => __( 'Background Image Two', 'heritaste' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'right_block_subtitle',
			[
				'label'       => __( 'Right Block subTitle', 'heritaste' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Right Block subTitle', 'heritaste' ),
			]
		);
		$this->add_control(
			'right_block_title',
			[
				'label'       => __( 'Right Block Title', 'heritaste' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Right Block Title', 'heritaste' ),
			]
		);
		$this->add_control(
			'right_block_discount',
			[
				'label'       => __( 'Right Block Discount', 'heritaste' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Right Block Discount', 'heritaste' ),
			]
		);
		$this->add_control(
			'right_block_arrowlink',
			[
				'label' => __( 'Right Block Arrow Url', 'heritaste' ),
				'type' => Controls_Manager::URL,
				'label_block' => true, 
				'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
				'show_external' => true,
				'default' => [
				'url' => '',
				'is_external' => true,
				'nofollow' => true,
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
        
    <!-- booking-section -->
    <section class="booking-section centred">
        <?php if($settings['bg_image']['id']){ ?><div class="bg-layer" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>);"></div><?php } ?>
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12 col-sm-12 cards-column">
                    <div class="cards-box">
                        <?php if($settings['bg_image_1']['id']){ ?><div class="inner-box" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image_1']['id'])); ?>);"><?php } ?>
                            <?php if($settings['left_block_subtitle']) { ?><h6><?php echo wp_kses($settings['left_block_subtitle'], true);?></h6><?php } ?>
                            <?php if($settings['left_block_title']) { ?><h2><?php echo wp_kses($settings['left_block_title'], true);?></h2><?php } ?>
                            <?php if($settings['left_block_discount']) { ?><div class="offer-box text-left"><h3><?php echo wp_kses($settings['left_block_discount'], true);?></h3></div><?php } ?>
                            <?php if($settings['left_block_arrowlink']['url']) { ?><div class="link"><a href="<?php echo esc_url($settings['left_block_arrowlink']['url']); ?>"><i class="flaticon-right-chevron"></i></a></div><?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 form-column">
                    <div class="form-inner">
                        <?php if($settings['form_title']) { ?><h2><?php echo wp_kses($settings['form_title'], true);?></h2><?php } ?>
                        <?php echo do_shortcode($settings['contact_form_url'], true);?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 cards-column">
                    <div class="deal-box">
                        <?php if($settings['bg_image_2']['id']){ ?><div class="inner-box" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image_2']['id'])); ?>);"><?php } ?>
                            <?php if($settings['right_block_subtitle']) { ?><h6><?php echo wp_kses($settings['right_block_subtitle'], true);?></h6><?php } ?>
                            <?php if($settings['right_block_title']) { ?><h2><?php echo wp_kses($settings['right_block_title'], true);?></h2><?php } ?>
                            <?php if($settings['right_block_discount']) { ?><div class="offer-box text-right"><h3><?php echo wp_kses($settings['right_block_discount'], true);?></h3></div><?php } ?>
                            <?php if($settings['right_block_arrowlink']['url']) { ?><div class="link"><a href="<?php echo esc_url($settings['right_block_arrowlink']['url']); ?>"><i class="flaticon-right-chevron"></i></a></div><?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- booking-section end -->
      
        <?php
    }
}