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
class About_Us_V3 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'heritaste_about_us_v3';
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
        return esc_html__( 'About Us V3', 'heritaste' );
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
            'about_us_v3',
            [
                'label' => esc_html__( 'About Us V3', 'heritaste' ),
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
			'about_image1',
			[
				'label' => __( 'About Image One', 'heritaste' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
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
			'features_list',
			[
				'label'       => __( 'Feature List', 'heritaste' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Feature List', 'kidum' ),
			]
		);
		$this->add_control(
			'btn_title',
			[
				'label'       => __( 'Botton Title', 'heritaste' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true, 
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Botton Title', 'heritaste' ),
			]
		);
		$this->add_control(
			'btn_link',
			[
				'label' => __( 'Botton Url', 'heritaste' ),
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
    
    <!-- about-style-three -->
    <section class="about-style-three bg-color-1">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12 col-sm-12 image-column">
                    <?php if($settings['about_image']['id']){ ?>
                    <div data-animation-box class="image-box">
                        <div class="image-shape" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-33.png);"></div>
                        <figure data-animation-text class="overlay-anim-black-bg image" data-animation="overlay-animation"><img src="<?php echo esc_url(wp_get_attachment_url($settings['about_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></figure>
                    </div>
                    <?php } ?>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 content-column">
                    <div class="content-block-six">
                        <div class="content-box">
                            <?php if($settings['subtitle'] || $settings['title']) { ?>
                            <div class="sec-title">
                                <?php if($settings['subtitle']) { ?><span class="sub-title"><?php echo wp_kses($settings['subtitle'], true);?></span><?php } ?>
                                <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                            </div>
                            <?php } ?>
                            <div class="inner-box">
                                <?php if($settings['about_image1']['id']){ ?><figure class="image-inner"><img src="<?php echo esc_url(wp_get_attachment_url($settings['about_image1']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></figure><?php } ?>
                                <?php if($settings['text']) { ?><p><?php echo wp_kses($settings['text'], true);?></p><?php } ?>
                                <?php $features_list = $settings['features_list'];
                                    if(!empty($features_list)){
                                    $features_list = explode("\n", ($features_list)); 
                                ?>
                                <ul class="list-item clearfix">
									 <?php foreach($features_list as $features): ?>
                                     <li><?php echo wp_kses($features, true); ?></li>
                                     <?php endforeach; ?>
                               </ul>
                               <?php } ?>
                               <?php if($settings['btn_title']) { ?>                                
                               <a href="<?php echo esc_url($settings['btn_link']['url']); ?>" class="theme-btn-two"><?php echo wp_kses($settings['btn_title'], true);?></a>
                               <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-style-three end -->
        
        <?php
    }
}
