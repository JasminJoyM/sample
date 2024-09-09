<?php 

namespace HERITASTEPLUGIN\Element;

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
class Coming_Soon extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'heritaste_coming_soon';
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
        return esc_html__( 'Coming Soon', 'heritaste' );
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
            'coming_soon',
            [
                'label' => esc_html__( 'Coming Soon', 'heritaste' ),
            ]
        );
		$this->add_control(
			'image',
			[
			  'label' => __( 'Background Image', 'heritaste' ),
			  'type' => Controls_Manager::MEDIA,
			  'label_block' => true,
			  'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
	    );
		$this->add_control(
			'logo',
			[
			  'label' => __( 'Logo Image', 'heritaste' ),
			  'type' => Controls_Manager::MEDIA,
			  'label_block' => true,
			  'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
	    );
		$this->add_control(
			'title',
			[
				'label'       => __( 'Heading', 'heritaste' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title Here', 'heritaste' ),
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
				'placeholder' => __( 'Enter your Text Here', 'heritaste' ),
			]
		);
		$this->add_control(
			'counter',
			[
				'label'       => __( 'Counter', 'heritaste' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Value Here', 'heritaste' ),
			]
		);	
		$this->add_control(
			'btn_title',
			[
				'label'       => __( 'Button Title', 'heritaste' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title Here', 'heritaste' ),
			]
		);
		$this->add_control(
			'btn_link',
			[
				'label' => __( 'Button Url', 'heritaste' ),
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
			'image2',
			[
			  'label' => __( 'Image Two', 'heritaste' ),
			  'type' => Controls_Manager::MEDIA,
			  'label_block' => true,
			  'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
	    );
		$this->add_control(
			'mailchimp_form_url',
			[
				'label'       => __( 'Newsletter Form Url', 'heritaste' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Form Url Here', 'heritaste' ),
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
	
    <!-- comingsoon-section -->
    <section class="comingsoon-section" <?php if($settings[ 'image' ]['id']) { ?> style="background-image: url(<?php echo esc_url( wp_get_attachment_url( $settings[ 'image' ]['id'] ) );?>);"<?php } ?>>
        <div class="outer-container">
            <div class="bg-shape" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-62.png);"></div>
            <div class="row clearfix">
                <div class="col-lg-7 col-md-12 col-sm-12 content-column">
                    <div class="content-box centred">
                        <?php if($settings[ 'logo' ]['id']) { ?>
                        <figure class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( wp_get_attachment_url( $settings[ 'logo' ]['id'] ) );?>" alt="<?php esc_attr_e('Awesome Image', 'heritaste');?>"></a></figure>
                        <?php } ?>
                        <?php if($settings[ 'title']) { ?><h2><?php echo wp_kses( $settings[ 'title'], true  );?></h2><?php } ?>
                        <?php if($settings[ 'text']) { ?><p><?php echo wp_kses( $settings[ 'text'], true  );?></p><?php } ?>
                        <?php if($settings[ 'counter']) { ?>
                        <div class="timer">
                            <div class="cs-countdown" data-countdown="<?php echo wp_kses( $settings[ 'counter'], true  );?>"></div>
                        </div>
                        <?php } ?>
                        <?php if($settings[ 'btn_title']) { ?>
                        <div class="btn-box">
                            <a href="<?php echo esc_url( $settings[ 'btn_link' ][ 'url' ] );?>" class="theme-btn-two"><?php echo wp_kses( $settings[ 'btn_title'], true  );?></a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12 inner-column">
                    <div class="inner-box" <?php if($settings[ 'image2' ]['id']) { ?> style="background-image: url(<?php echo esc_url( wp_get_attachment_url( $settings[ 'image2' ]['id'] ) );?>);"<?php } ?>>
                        <div class="form-inner">
                            <?php echo do_shortcode($settings['mailchimp_form_url']);?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- comingsoon-section end -->
    
    <?php
    }
}