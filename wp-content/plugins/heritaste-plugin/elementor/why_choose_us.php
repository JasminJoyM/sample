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
class Why_Choose_Us extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'heritaste_why_choose_us';
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
        return esc_html__( 'Why Choose Us', 'heritaste' );
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
            'why_choose_us',
            [
                'label' => esc_html__( 'Why Choose Us', 'heritaste' ),
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
						'name' => 'title',
						'label' => esc_html__('Title', 'heritaste'),
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
						'name' => 'btn_title',
						'label' => esc_html__('Button Title', 'heritaste'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('Enter Your Button Title', 'heritaste')
					],
					[
						'name' => 'btn_link',
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
    
    <!-- chooseus-section -->
    <section class="chooseus-section bg-color-1">
        <div class="auto-container">
            <div class="row clearfix">
                <?php $i=1; foreach($settings['blocks'] as $key => $item): ?>
                <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                    <div class="chooseus-block-one wow fadeInLeft animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <div class="shape" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-39.png);"></div>
                            <div class="icon-box">
                                <span class="count-text special-font"><?php $i = sprintf('%02d', $i); echo $i; ?></span>
                                <div class="icon"><i class="<?php echo esc_attr(str_replace( "icon ",  "", $item['icons']));?>"></i></div>
                            </div>
                            <?php if($item['title']) { ?><h3><?php echo wp_kses($item['title'], true);?></h3><?php } ?>
                            <?php if($item['text']) { ?><p><?php echo wp_kses($item['text'], true);?></p><?php } ?>
                            <?php if($item['btn_link']) { ?><a href="<?php echo esc_url($item['btn_link']['url']);?>" class="theme-btn-one"><span><?php echo wp_kses($item['btn_title'], true);?></span></a><?php } ?>
                        </div>
                    </div>
                </div>
                <?php $i++; endforeach; ?>
            </div>
        </div>
    </section>
    <!-- chooseus-section end -->
        
            
        <?php
    }
}
