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
class Eat_Fresh extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'heritaste_eat_fresh';
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
        return esc_html__( 'Eat Fresh', 'heritaste' );
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
            'eat_fresh',
            [
                'label' => esc_html__( 'Eat Fresh', 'heritaste' ),
            ]
        );
		$this->add_control(
			'fresh_bg_image',
			[
				'label' => __( 'Fresh Background Image', 'heritaste' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'subt_itle',
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
			'features_list',
			[
				'label'       => __( 'Feature List', 'heritaste' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Feature List', 'heritaste' ),
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
    
    <!-- fresheat-section -->
    <section class="fresheat-section bg-color-1">
        <?php if($settings['fresh_bg_image']['id']) { ?>
        <div class="bg-layer" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['fresh_bg_image']['id'])); ?>);"></div>
        <?php } ?>
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-xl-6 col-lg-12 col-md-12 offset-xl-6 content-column">
                    <div class="content-block-seven">
                        <div class="content-box">
                            <div class="shape" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-40.png);"></div>
                            <?php if($settings['subt_itle']|| $settings['title'] || $settings['text']) { ?>
                            <div class="sec-title">
                                <?php if($settings['subt_itle']) { ?><span class="sub-title"><?php echo wp_kses($settings['subt_itle'], true);?></span><?php } ?>
                                <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                                <?php if($settings['text']) { ?><p><?php echo wp_kses($settings['text'], true);?></p><?php } ?>
                            </div>
                            <?php } ?>
                            
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
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- fresheat-section end -->
        
        <?php
    }
}
