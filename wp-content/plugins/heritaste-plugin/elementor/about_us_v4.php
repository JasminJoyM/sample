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
class About_Us_V4 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'heritaste_about_us_v4';
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
        return esc_html__( 'About Us V4', 'heritaste' );
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
            'about_us_v4',
            [
                'label' => esc_html__( 'About Us V4', 'heritaste' ),
            ]
        );
		$this->add_control(
			'subtitle',
			[
				'label'       => __( 'Sub Title', 'heritaste' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'heritaste' ),
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
			'show_circle',
			[
				'label'       => __( 'Enable/Disable Exp Box', 'heritaste' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'hairly' ),
				'label_off' => __( 'Hide', 'hairly' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
			'years',
			[
				'label'       => __( 'Years ', 'heritaste' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Years ', 'heritaste' ),
			]
		);
		$this->add_control(
			'hotel_name',
			[
				'label'       => __( 'Hotel Name ', 'heritaste' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Hotel Name ', 'heritaste' ),
			]
		);
		$this->add_control(
			'description',
			[
				'label'       => __( 'Description ', 'heritaste' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Description ', 'heritaste' ),
			]
		);
		$this->add_control(
			'about_image',
			[
				'label' => __( 'About Image ', 'heritaste' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'text_title',
			[
				'label'       => __( 'Text Title', 'heritaste' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text title ', 'heritaste' ),
			]
		);
		$this->add_control(
			'text',
			[
				'label'       => __( 'Text ', 'heritaste' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text ', 'heritaste' ),
			]
		);
		$this->add_control(
			'lower_sign_title',
			[
				'label'       => __( 'Lower Sign Title', 'heritaste' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your lower Sign Title ', 'heritaste' ),
			]
		);
		$this->add_control(
			'sign_image',
			[
				'label' => __( 'Signature Image ', 'heritaste' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'owner',
			[
				'label'       => __( 'Owner', 'heritaste' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Owner Name ', 'heritaste' ),
			]
		);
		$this->add_control(
			'big_text',
			[
				'label'       => __( 'Big Text ', 'heritaste' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Big Text ', 'heritaste' ),
			]
		);
		$this->add_control(
			'hours_title',
			[
				'label'       => __( 'Hours title ', 'heritaste' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text ', 'heritaste' ),
			]
		);
		$this->add_control(
			'days_date',
			[
				'label'       => __( 'Days And Date ', 'heritaste' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Days And Date ', 'heritaste' ),
			]
		);
		$this->add_control(
			'weakend_day_date',
			[
				'label'       => __( 'Weakend Day Date ', 'heritaste' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Weakend Day Date ', 'heritaste' ),
			]
		);
		$this->add_control(
			'box_title',
			[
				'label'       => __( 'Box Title', 'heritaste' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Box Title', 'heritaste' ),
			]
		);
		$this->add_control(
			'box_text',
			[
				'label'       => __( 'Box Text', 'heritaste' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Box Text', 'heritaste' ),
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
						'name' => 'icons',
						'label' => esc_html__('Select Icon', 'heritaste'),
						'label_block' => true,
						'type' => Controls_Manager::SELECT2,
						'options' => get_fontawesome_icons(),
					],
					[
						'name' => 'block_title',
						'label' => esc_html__('Block  Title', 'heritaste'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('Enter your Block Title', 'heritaste')
					],
					[
						'name' => 'block_text',
						'label' => esc_html__('Text', 'heritaste'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('Enter your Block Text', 'heritaste')
					],
					[
						'name' => 'block_btn_link',
						'label' => __( 'Button Link', 'heritaste' ),
						'type' => Controls_Manager::URL,
						'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
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
        <!-- about-style-four -->
        <section class="about-style-four">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-12 col-sm-12 content-column">
                        <div class="content-block-eight">
                            <div class="content-box">
                            	<?php if($settings['subtitle'] || $settings['title']) { ?>
                                <div class="sec-title light">
                                    <?php if($settings['subtitle']) { ?><span class="sub-title"><?php echo wp_kses($settings['subtitle'], true);?></span><?php } ?>
                                    <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                                </div>
                                <?php } ?>
                                <div class="inner-box">
                                    <div class="image-box">
                                    	<?php if($settings['show_circle']) {?>
                                        <div class="curve-text">
                                            <?php if($settings['years']) { ?><div class="years special-font"><?php echo wp_kses($settings['years'], true);?></div><?php } ?>
                                            <?php if($settings['hotel_name']) { ?><span class="curved-circle-8"><?php echo wp_kses($settings['hotel_name'], true);?></span><?php } ?>
                                            <?php if($settings['description']) { ?><span class="curved-circle-9"><?php echo wp_kses($settings['description'], true);?></span><?php } ?>
                                        </div>
                                        <?php } ?>
                                        <?php if($settings['about_image']['id']) { ?>
                                        <figure class="image"><img src="<?php echo esc_url(wp_get_attachment_url($settings['about_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></figure>
                                        <?php } ?>
                                    </div>                                    
                                    <?php if($settings['text_title'] || $settings['text']) { ?>
                                    <div class="text">
                                        <?php if($settings['text_title']) { ?><h3><?php echo wp_kses($settings['text_title'], true);?></h3><?php } ?>
                                        <?php if($settings['text']) { ?><?php echo wp_kses($settings['text'], true);?><?php } ?>
                                    </div>
                                    <?php } ?>
                                    <?php if($settings['lower_sign_title']  || $settings['sign_image']['id'] || $settings['owner']) { ?>
                                    <div class="lower-box">
                                        <div class="shape" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-42.png);"></div>
                                        <?php if($settings['lower_sign_title']) { ?><h3><?php echo wp_kses($settings['lower_sign_title'], true);?></h3><?php } ?>
                                        <?php if($settings['sign_image']['id']) { ?><figure class="signature"><img src="<?php echo esc_url(wp_get_attachment_url($settings['sign_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></figure><?php } ?>
                                        <?php if($settings['owner']) { ?><h6><?php echo wp_kses($settings['owner'], true);?></h6><?php } ?>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 content-column">
                        <div class="content-block-nine">
                            <?php if($settings['big_text']) { ?><span class="big-text"><?php echo wp_kses($settings['big_text'], true);?></span><?php } ?>
                            <div class="content-box">
                                <div class="schedule-box text-right">
                                    <?php if($settings['hours_title']) { ?><h6><?php echo wp_kses($settings['hours_title'], true);?></h6><?php } ?>
                                    <ul class="list clearfix">
                                        <?php if($settings['days_date']) { ?><li><?php echo wp_kses($settings['days_date'], true);?></li><?php } ?>
                                        <?php if($settings['weakend_day_date']) { ?><li><?php echo wp_kses($settings['weakend_day_date'], true);?></li><?php } ?>
                                    </ul>
                                </div>
                                <div class="inner-box">
                                	<?php if($settings['box_title'] || $settings['box_text']) { ?>
                                    <div class="text">
                                        <?php if($settings['box_title']) { ?><h3><?php echo wp_kses($settings['box_title'], true);?></h3><?php } ?>
                                        <?php if($settings['box_text']) { ?><p><?php echo wp_kses($settings['box_text'], true);?></p><?php } ?>
                                    </div>
                                    <?php } ?>
                                    <div class="inner">
                                        <?php foreach($settings['blocks'] as $key => $item): ?>
                                        <div class="single-item">
                                            <div class="icon-box"><i class="<?php echo esc_attr(str_replace( "icon ",  "", $item['icons']));?>"></i></div>
                                            <h3><?php echo wp_kses($item['block_title'], true);?></h3>
                                            <p><?php echo wp_kses($item['block_text'], true);?></p>
                                            <?php if($item['block_btn_link']['url']) { ?>
                                            <div class="link"><a href="<?php echo esc_url($item['block_btn_link']['url']); ?>"><i class="flaticon-right-chevron"></i></a></div>
                                        	<?php } ?>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-style-four end -->
        
        <?php
    }
}
