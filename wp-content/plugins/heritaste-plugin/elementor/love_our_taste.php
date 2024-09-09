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
class Love_Our_Taste extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'heritaste_love_our_taste';
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
        return esc_html__( 'Love Our Taste', 'heritaste' );
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
            'love_our_taste',
            [
                'label' => esc_html__( 'Love Our Taste', 'heritaste' ),
            ]
        );
		$this->add_control(
			'image1',
			[
				'label' => __( 'Image One', 'heritaste' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'image2',
			[
				'label' => __( 'Image Two', 'heritaste' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'sub_title',
			[
				'label'       => __( 'Sub Title', 'heritaste' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true, 
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
				'type'        => Controls_Manager::TEXT,
				'label_block' => true, 
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'heritaste' ),
			]
		);
		$this->add_control(
			'left_image',
			[
				'label' => __( 'Left Image', 'heritaste' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'left_sub_title',
			[
				'label'       => __( 'Left sub Title', 'heritaste' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true, 
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Left Block subTitle', 'heritaste' ),
			]
		);
		$this->add_control(
			'left_title',
			[
				'label'       => __( 'Left Block Title', 'heritaste' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true, 
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Left Block Title', 'heritaste' ),
			]
		);
		$this->add_control(
			'left_text',
			[
				'label'       => __( 'Left Text', 'heritaste' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'heritaste' ),
			]
		);
		$this->add_control(
			'left_btn_title',
			[
				'label'       => __( 'Left Button Title', 'heritaste' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true, 
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Button Title', 'heritaste' ),
			]
		);
		$this->add_control(
			'left_btn_link',
			[
				'label' => __( 'Left Button Url', 'heritaste' ),
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
			'bg_image',
			[
				'label' => __( 'Background Image', 'heritaste' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'right_image',
			[
				'label' => __( 'Right Image', 'heritaste' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'right_sub_title',
			[
				'label'       => __( 'Right sub Title', 'heritaste' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true, 
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Right Block subTitle', 'heritaste' ),
			]
		);
		$this->add_control(
			'right_title',
			[
				'label'       => __( 'Right Block Title', 'heritaste' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true, 
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Right Block Title', 'heritaste' ),
			]
		);
		$this->add_control(
			'right_text',
			[
				'label'       => __( 'Right Text', 'heritaste' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'heritaste' ),
			]
		);
		$this->add_control(
			'right_btn_title',
			[
				'label'       => __( 'Right Button Title', 'heritaste' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true, 
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Button Title', 'heritaste' ),
			]
		);
		$this->add_control(
			'right_btn_link',
			[
				'label' => __( 'Right Button Url', 'heritaste' ),
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
    
    <!-- welcome-section -->
    <section class="welcome-section sec-pad centred">
        <div class="pattern-layer" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-4.png);"></div>
        <?php if($settings['image1']['id']) { ?><figure class="image-layer-1"><img src="<?php echo esc_url(wp_get_attachment_url($settings['image1']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></figure><?php } ?>
        <?php if($settings['image2']['id']) { ?><figure class="image-layer-2"><img src="<?php echo esc_url(wp_get_attachment_url($settings['image2']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></figure><?php } ?>
        <div class="auto-container">
            <?php if($settings['sub_title'] || $settings['title']) { ?>
            <div class="sec-title light">
                <?php if($settings['sub_title']) { ?><span class="sub-title"><?php echo wp_kses($settings['sub_title'], true);?></span><?php } ?>
                <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
            </div>
            <?php } ?>
            <div class="row clearfix">
                <div class="col-lg-4 col-md-6 col-sm-12 welcome-block">
                    <div class="welcome-block-one">
                        <div class="inner-box">
                            <div class="decore">
                                <div class="decore-1" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-5.png);"></div>
                                <div class="decore-2" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-5.png);"></div>
                            </div>
                            <?php if($settings['left_image']['id']) { ?>
                            <div class="image-box">
                                <figure class="image"><img src="<?php echo esc_url(wp_get_attachment_url($settings['left_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></figure>
                            </div>
                            <?php } ?>
                            <div class="lower-content">
                                <?php if($settings['left_sub_title']) { ?>
                                <ul class="rating clearfix">
                                    <li><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icons/icon-4.png" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></li>
                                    <li><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icons/icon-4.png" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></li>
                                    <li><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icons/icon-4.png" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></li>
                                </ul>
                                <h6><?php echo wp_kses($settings['left_sub_title'], true);?></h6>
                                <?php } ?>
                                <?php if($settings['left_title']) { ?><h3><a href="<?php echo esc_url($settings['left_btn_link']['url']); ?>"><?php echo wp_kses($settings['left_title'], true);?></a></h3><?php } ?>
                                <?php if($settings['left_text']) { ?><p><?php echo wp_kses($settings['left_text'], true);?></p><?php } ?>
                                <?php if($settings['left_btn_title']) { ?>
                                <div class="btn-box">
                                    <a href="<?php echo esc_url($settings['left_btn_link']['url']); ?>" class="theme-btn-one"><span><?php echo wp_kses($settings['left_btn_title'], true);?></span></a>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if($settings['bg_image']['id']){ ?>
                <div class="col-lg-4 col-md-6 col-sm-12 image-column">
                    <div class="image-inner">
                        <figure class="image"><img src="<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></figure>
                    </div>
                </div>
                <?php } ?>
                <div class="col-lg-4 col-md-6 col-sm-12 welcome-block">
                    <div class="welcome-block-one">
                        <div class="inner-box">
                            <div class="decore">
                                <div class="decore-1" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-5.png);"></div>
                                <div class="decore-2" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-5.png);"></div>
                            </div>
                            <?php if($settings['right_image']['id']) { ?>
                            <div class="image-box">
                                <figure class="image"><img src="<?php echo esc_url(wp_get_attachment_url($settings['right_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></figure>
                            </div>
                            <?php } ?>
                            <div class="lower-content">
                                <?php if($settings['right_sub_title']) { ?>
                                <ul class="rating clearfix">
                                    <li><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icons/icon-4.png" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></li>
                                    <li><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icons/icon-4.png" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></li>
                                    <li><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icons/icon-4.png" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></li>
                                </ul>
                                <h6><?php echo wp_kses($settings['right_sub_title'], true);?></h6>
                                <?php } ?>
                                <?php if($settings['right_title']) { ?><h3><a href="<?php echo esc_url($settings['right_btn_link']['url']); ?>"><?php echo wp_kses($settings['right_title'], true);?></a></h3><?php } ?>
                                <?php if($settings['right_text']) { ?><p><?php echo wp_kses($settings['right_text'], true);?></p><?php } ?>
                                <?php if($settings['right_btn_title']) { ?>
                                <div class="btn-box">
                                    <a href="<?php echo esc_url($settings['right_btn_link']['url']); ?>" class="theme-btn-one"><span><?php echo wp_kses($settings['right_btn_title'], true);?></span></a>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- welcome-section end -->
      
        <?php
    }
}