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
class Call_To_Action_V1 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'heritaste_call_to_action_v1';
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
        return esc_html__( 'Call To Action V1', 'heritaste' );
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
            'call_to_action_v1',
            [
                'label' => esc_html__( 'Call To Action V1', 'heritaste' ),
            ]
        );
		$this->add_control(
			'style_two',
			 [
				'label'   => esc_html__( 'Choose Different Style', 'heritaste' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'one',
				'options' => array(
					'one' => esc_html__( 'Choose Style Withou BG Image', 'heritaste' ),
					'two'  => esc_html__( 'Choose Style With BG Image', 'heritaste' ),
				),
			 ]
		);
		$this->add_control(
			'cta_image1',
			[
				'label' => __( 'BG CTA Image', 'heritaste' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'show_pattern_images',
			[
				'label'       => __( 'Enable/Disable Pattern Images', 'heritaste' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'heritaste' ),
				'label_off' => __( 'Hide', 'heritaste' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
			'cta_image',
			[
				'label' => __( 'CTA Image', 'heritaste' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'blocks', 
			[
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
					],
				'fields' => 
				[
					
					[
						'name' => 'title',
						'label' => esc_html__('Title', 'heritaste'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('Enter your Title', 'heritaste')
					],
					[
						'name' => 'text',
						'label' => esc_html__('Text', 'heritaste'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('Enter your Text', 'heritaste')
					],
					[
						'name' => 'booking_title',
						'label' => esc_html__('Booking Title', 'heritaste'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('Enter your Booking Title', 'heritaste')
					],
					[
						'name' => 'phone_no',
						'label' => esc_html__('Phone Number', 'heritaste'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('Enter your Phone Number', 'heritaste')
					],
					[
						'name' => 'btn_title',
						'label' => esc_html__('Email Botton Title', 'heritaste'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('Enter your Email Botton Title', 'heritaste')
					],
					[
						'name' => 'btn_link',
						'label' => __( 'Botton Link', 'heritaste' ),
						'type' => Controls_Manager::URL,
						'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
					[
						'name' => 'style_two',
						'label'   => esc_html__( 'Choose Different Style', 'heritaste' ),
						'label_block' => true,
						'type'    => Controls_Manager::SELECT,
						'default' => 'one',
						'options' => array(
							'one' => esc_html__( 'Choose Style One', 'heritaste' ),
							'two' => esc_html__( 'Choose Style Two', 'heritaste' ),
						),
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
	
    <!-- cta-section -->
    <section class="cta-section <?php if($settings['style_two'] == 'two') echo 'alternat-2 bg-color-1 '; else echo ''; ?> centred">
        <div class="outer-container">
        	<?php if($settings['style_two'] == 'two') { ?>
            <div class="bg-layer" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['cta_image1']['id'])); ?>);"></div>
            <?php } ?>
			<?php if($settings['show_pattern_images']){ ?>
            <div class="pattern-layer">
                <div class="pattern-1" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-26.png);"></div>
                <div class="pattern-2" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-27.png);"></div>
                <div class="pattern-3" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-28.png);"></div>
                <div class="pattern-4" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-29.png);"></div>
                <div class="pattern-5" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-30.png);"></div>
                <div class="pattern-6" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-31.png);"></div>
            </div>
            <?php } ?>
			<?php if($settings['cta_image']['id']){ ?>
            <figure class="image-layer"><img src="<?php echo esc_url(wp_get_attachment_url($settings['cta_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></figure>
            <?php } ?>
            <div class="auto-container">
                <div class="row clearfix">
                    <?php foreach($settings['blocks'] as $key => $item): ?>
                    <div class="col-lg-5 col-md-12 col-sm-12 <?php if($item['style_two'] == 'two') echo 'offset-lg-2'; else echo ''; ?> content-column">
                        <div class="content-block-five">
                            <div class="content-box">
                                <?php if($item['title'] || $item['text']) { ?>
                                <div class="sec-title light">
                                    <?php if($item['title']) { ?><h2><?php echo wp_kses($item['title'], true);?></h2><?php } ?>
                                    <?php if($item['text']) { ?><p><?php echo wp_kses($item['text'], true);?></p><?php } ?>
                                </div>
                                <?php } ?>
                                <div class="inner-box">
                                    <?php if($item['booking_title']) { ?><h6><a href="<?php echo esc_url($item['btn_link']['url']);?>"><?php echo wp_kses($item['booking_title'], true);?></a></h6><?php } ?>
                                    <?php if($item['phone_no']) { ?><h3><a href="tel:<?php echo esc_attr($item['phone_no']);?>"><?php echo wp_kses($item['phone_no'], true);?></a></h3><?php } ?>
                                    <?php if($item['btn_title']) { ?><a href="<?php echo esc_url($item['btn_link']['url']);?>" class="theme-btn-two"><?php echo wp_kses($item['btn_title'], true);?></a><?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- cta-section end -->
        
        <?php
    }
}
