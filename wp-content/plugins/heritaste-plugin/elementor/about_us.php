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
class About_Us extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'heritaste_about_us';
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
        return esc_html__( 'About Us', 'heritaste' );
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
            'about_us',
            [
                'label' => esc_html__( 'About Us', 'heritaste' ),
            ]
        );
		$this->add_control(
			'about_image',
			[
				'label' => __( 'About Image', 'heritaste' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'about_image_1',
			[
				'label' => __( 'About Image 1', 'heritaste' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'show_quality_block',
			[
				'label'       => __( 'Enable/Disable Quality Box', 'heritaste' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'heritaste' ),
				'label_off' => __( 'Hide', 'heritaste' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
			'quality_title',
			[
				'label'       => __( 'Quality Title', 'heritaste' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Quality Title', 'heritaste' ),
			]
		);
		$this->add_control(
			'quality_description',
			[
				'label'       => __( 'Quality Description', 'heritaste' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Quality Description', 'heritaste' ),
			]
		);
		$this->add_control(
			'year_title',
			[
				'label'       => __( 'Year Title', 'heritaste' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Year Title', 'heritaste' ),
			]
		);
		$this->add_control(
			'year_expirence',
			[
				'label'       => __( 'Year Expirence', 'heritaste' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Year Expirence', 'heritaste' ),
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
			'text',
			[
				'label'       => __( 'Text', 'heritaste' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'heritaste' ),
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
						'label' => esc_html__('Enter The icons', 'heritaste'),
						'label_block' => true,
						'type' => Controls_Manager::SELECT2,
						'options'  => get_fontawesome_icons(),
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
						'name' => 'block_btn_title',
						'label' => esc_html__('Button Title', 'heritaste'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('Read More', 'heritaste')
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
    
    <!-- about-section -->
    <section class="about-section sec-pad bg-color-1">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                    <div class="image-block-one">
                        <div class="image-box">
                            <?php if($settings['about_image']['id']) { ?><figure class="image image-1"><img src="<?php echo esc_url(wp_get_attachment_url($settings['about_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></figure><?php } ?>
                            <?php if($settings['about_image_1']['id']) { ?><figure class="image image-2"><img src="<?php echo esc_url(wp_get_attachment_url($settings['about_image_1']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></figure><?php } ?>
                            <?php if($settings['show_quality_block']) { ?>
                            <div class="text-box">
                                <?php if($settings['quality_title']) { ?><span class="curved-circle curved-text-1"><?php echo wp_kses($settings['quality_title'], true);?></span><?php } ?>
                                <?php if($settings['quality_description']) { ?><span class="curved-circle-2 curved-text-2"><?php echo wp_kses($settings['quality_description'], true);?></span><?php } ?>
                                <?php if($settings['year_title'] || $settings['year_expirence']){ ?>
                                <div class="text">
                                    <div class="inner">
                                        <h2><?php echo wp_kses($settings['year_title'], true);?></h2>
                                        <h6><?php echo wp_kses($settings['year_expirence'], true);?></h6>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div class="content-block-one">
                        <div class="content-box">
                        	<?php if($settings['subtitle']|| $settings['title'] || $settings['text']) { ?>
                            <div class="sec-title">
                                <?php if($settings['subtitle']) { ?><span class="sub-title"><?php echo wp_kses($settings['subtitle'], true);?></span><?php } ?>
                                <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                                <?php if($settings['text']) { ?><p><?php echo wp_kses($settings['text'], true);?></p><?php } ?>
                            </div>
                            <?php } ?>
                            <div class="inner-box">
                            	<?php foreach($settings['blocks'] as $key => $item): ?>
                                <div class="single-item">
                                    <div class="icon-box"><i class="<?php echo esc_attr(str_replace( "icon ",  "", $item['icons']));?>"></i></div>
                                    <h3><?php echo wp_kses($item['block_title'], true);?></h3>
                                    <p><?php echo wp_kses($item['block_text'], true);?></p>
                                    <?php if($item['block_btn_title']) { ?>
                                    <a href="<?php echo esc_url($item['block_btn_link']['url']); ?>" class="theme-btn-one"><span><?php echo wp_kses($item['block_btn_title'], true);?></span></a>
                                	<?php } ?>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-section end -->        
      
        <?php
    }
}
