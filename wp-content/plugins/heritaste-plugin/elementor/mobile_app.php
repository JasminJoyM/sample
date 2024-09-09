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
class Mobile_App extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'heritaste_mobile_app';
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
        return esc_html__( 'Mobile App', 'heritaste' );
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
            'mobile_app',
            [
                'label' => esc_html__( 'Mobile App', 'heritaste' ),
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
			'bg_title',
			[
				'label'       => __( 'Background Title', 'heritaste' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Background Title', 'heritaste' ),
			]
		);
		$this->add_control(
			'mobile_image',
			[
				'label' => __( 'Mobile Image', 'heritaste' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'location_title',
			[
				'label'       => __( 'Location Title', 'heritaste' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Location Title', 'heritaste' ),
			]
		);$this->add_control(
			'delivery_time',
			[
				'label'       => __( 'Delivery Time', 'heritaste' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Delivery Time', 'heritaste' ),
			]
		);
		$this->add_control(
			'subtitle',
			[
				'label'       => __( 'Sub Title', 'heritaste' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Sub Title', 'heritaste' ),
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
				'placeholder' => __( 'Enter your Title', 'heritaste' ),
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
				'placeholder' => __( 'Enter Text', 'heritaste' ),
			]
		);
		$this->add_control(
			'icon', 
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
						'label' => esc_html__('Select Icon', 'metlife'),
						'label_block' => true,
						'type' => Controls_Manager::SELECT2,
						'options' => get_fontawesome_icons(),
					],
					[
						'name' => 'icon_link',
						'label' => __( 'Button Link', 'heritaste' ),
						'type' => Controls_Manager::URL,
						'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
				],
			 ]
        );
		$this->add_control(
			'patners',
			[
				'label'       => __( 'Patners Title', 'heritaste' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Title', 'heritaste' ),
			]
		);
		$this->add_control(
			'client', 
			[
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
					],
				'fields' => 
				[
					[
						'name' => 'client_image',
						'label' => __( 'Client logo Image', 'eminent' ),
						 'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
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
    
    <!-- apps-section -->
    <section class="apps-section bg-color-1">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-7 col-md-12 col-sm-12 image-column">
                    <div class="image-block-two">
                        <div class="image-box">
                            <?php if($settings['show_pattern_images']) { ?>
                            <div class="shape">
                                <div class="shape-1" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-11.png);"></div>
                                <div class="shape-2" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-12.png);"></div>
                            </div>
                            <?php } ?>
                            <?php if($settings['bg_title']) { ?><span class="big-text"><?php echo wp_kses($settings['bg_title'], true);?></span><?php } ?>
                            <?php if($settings['mobile_image']) { ?><figure class="image"><img src="<?php echo esc_url(wp_get_attachment_url($settings['mobile_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></figure><?php } ?>
                            <?php if($settings['location_title']) { ?>
                            <div class="location-box one">
                                <div class="icon"><i class="flaticon-pin"></i></div>
                                <h6><?php echo wp_kses($settings['location_title'], true);?></h6>
                            </div>
                            <?php } ?>
                            <?php if($settings['delivery_time']) { ?>
                            <div class="location-box two">
                                <div class="icon"><i class="flaticon-clock"></i></div>
                                <h6><?php echo wp_kses($settings['delivery_time'], true);?></h6>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12 content-column">
                    <div class="content-block-two">
                        <div class="content-box">
                            <?php if($settings['subtitle']|| $settings['title'] || $settings['text']) { ?>
                            <div class="sec-title">
                                <?php if($settings['subtitle']) { ?><span class="sub-title"><?php echo wp_kses($settings['subtitle'], true);?></span><?php } ?>
                                <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                                <?php if($settings['text']) { ?><p><?php echo wp_kses($settings['text'], true);?></p><?php } ?>
                            </div>
                            <?php } ?>
                            <div class="inner-box">
                                <ul class="download-list clearfix">
                                    <?php foreach($settings['icon'] as $key => $item): ?>
                                    <li><a href="<?php echo esc_url($item['icon_link']['url']); ?>"><i class="<?php echo esc_attr(str_replace( "icon ",  "", $item['icons']));?>"></i></a></li>
                                    <?php endforeach; ?>
                                </ul>
                                <div class="clients-box">
                                    <?php if($settings['patners']) { ?><h3><?php echo wp_kses($settings['patners'], true);?></h3><?php } ?>
                                    <ul class="clients-logo clearfix">
                                        <?php foreach($settings['client'] as $key => $item): ?>
                                        <li><img src="<?php echo esc_url(wp_get_attachment_url($item['client_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- apps-section end -->
        
        <?php
    }
}

