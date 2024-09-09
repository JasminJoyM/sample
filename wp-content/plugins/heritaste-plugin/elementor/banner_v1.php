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
class Banner_V1 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'heritaste_banner_v1';
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
        return esc_html__( 'Banner V1', 'heritaste' );
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
            'banner_v1',
            [
                'label' => esc_html__( 'Banner V1', 'heritaste' ),
            ]
        );
		$this->add_control(
           	'slides', 
		    [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['title' => esc_html__('Heritaste Food,Folks & Fun all together', 'heritaste')],
						['title' => esc_html__('Heritaste Perfectly light in every bite', 'heritaste')],
						['title' => esc_html__('Heritaste Choose & taste to your place', 'heritaste')],
					],
				'fields' => 
				[
					[
						'name' => 'show_pattern_images',
						'label' => __( 'Enable/Disable Pattern Images', 'heritaste' ),
						'type' => Controls_Manager::SWITCHER,
						'label_on' => __( 'Show', 'heritaste' ),
						'label_off' => __( 'Hide', 'heritaste' ),
							'return_value' => 'yes',
							'default' => 'no',
					],
					[
						'name' => 'bg_image',
						'label' => esc_html__('Slide BG Image', 'heritaste'),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'icons',
						'label' => esc_html__('Select Icon', 'heritaste'),
						'label_block' => true,
						'type' => Controls_Manager::SELECT2,
						'options' => get_fontawesome_icons(),
					],
					[
						'name' => 'sub_title',
						'label' => esc_html__('Sub Title', 'heritaste'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'heritaste')
					],
					[
						'name' => 'title',
						'label' => esc_html__('Title', 'heritaste'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'heritaste')
					],
					[
						'name' => 'text',
						'label' => esc_html__('Text', 'heritaste'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'heritaste')
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
				'title_field' => '{{title}}',
			 ]
        );
		$this->add_control(
			'show_banner_text',
			[
				'label'       => __( 'Enable/Disable Banner Text', 'heritaste' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'heritaste' ),
				'label_off' => __( 'Hide', 'heritaste' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
			'text',
			[
				'label'       => __( 'Text', 'heritaste' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'heritaste' ),
				'default'     => __( '', 'heritaste' ),
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
    
    <!-- banner-section -->
    <section class="banner-section centred">
        <div class="banner-carousel owl-theme owl-carousel owl-dots-none">
            <?php foreach($settings['slides'] as $key => $item): ?>
            <div class="slide-item <?php if($item['style_two'] == 'two') echo 'style-two'; else echo ''; ?>">
                <?php if($item['bg_image']['id']){ ?>
                <div class="image-layer" style="background-image:url(<?php echo esc_url(wp_get_attachment_url($item['bg_image']['id'])); ?>)"></div>
                <?php } ?>
                <?php if($item['show_pattern_images']) {?>
                <div class="shape">
                    <div class="shape-1 float-bob-x" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-1.png);"></div>
                    <div class="shape-2 float-bob-y" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-2.png);"></div>
                    <div class="shape-3 rotate-me" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-3.png);"></div>
                </div>
                <?php } ?>
                <div class="auto-container">
                    <div class="content-box">
                        <div class="icon-box"><i class="<?php echo esc_attr(str_replace( "icon ",  "", $item['icons']));?>"></i></div>
                        <span class="special-text"><?php echo wp_kses($item['sub_title'], true); ?></span>
                        <h2><?php echo wp_kses($item['title'], true); ?></h2>
                        <p><?php echo wp_kses($item['text'], true); ?></p>
                        <div class="mouse-btn-down scroll-to-target" data-target=".about-section">
                            <div class="scroll-arrow-box">
                                <i class="flaticon-down-chevron"></i>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>
    <!-- banner-section end -->
	<?php if($settings['show_banner_text']) {?>
    <div class="open-hours centred">
        <div class="auto-container">
            <div class="text">
                <h6><i class="flaticon-clock"></i><?php echo wp_kses($settings['text'], true); ?></h6>
            </div>
        </div>
    </div>
    <?php } ?>
        
        
    <?php
    }
}
