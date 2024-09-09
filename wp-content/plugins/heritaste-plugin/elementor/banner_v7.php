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
class Banner_V7 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'heritaste_banner_v7';
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
        return esc_html__( 'Banner V7', 'heritaste' );
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
            'banner_v7',
            [
                'label' => esc_html__( 'Banner V7', 'heritaste' ),
            ]
        );
		$this->add_control(
			'bg_image',
			[
				'label' => __( 'BG Image', 'heritaste' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'video_link',
			[
				'label' => __( 'Video Url', 'heritaste' ),
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
			'slides', 
			[
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['title' => esc_html__('Item1', 'heritaste')],
						['title' => esc_html__('Item2', 'heritaste')],
						['title' => esc_html__('Item3', 'heritaste')],
					],
				'fields' => 
				[
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
						'name' => 'btn_title',
						'label' => esc_html__('Button Title', 'heritaste'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('Read More', 'heritaste')
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
				'title_field' => '{{title}}',
			 ]
        );
		$this->add_control(
			'social', 
			[
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['social_link' => esc_html__('#', 'heritaste')],
						['social_link' => esc_html__('#', 'heritaste')],
						['social_link' => esc_html__('#', 'heritaste')],
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
						'name' => 'social_link',
						'label' => __( 'Social Link', 'heritaste' ),
						'type' => Controls_Manager::URL,
						'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
				],
				'title_field' => '{{social_link}}',
			 ]
        );
		$this->add_control(
			'since_text',
			[
				'label'       => __( 'Left Title', 'heritaste' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true, 
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Since Title', 'heritaste' ),
			]
		);
		$this->add_control(
			'btn_text',
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
			'text_link',
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
    
    <!-- banner-section -->
    <section class="banner-style-seven centred">
        <div class="element-with-video-bg jquery-background-video-wrapper">
            <?php if($settings['video_link']['url'] || $settings['bg_image']['id']) { ?>
            <video class="my-background-video jquery-background-video" loop autoplay muted playsinline poster="<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>">
                <source src="<?php echo esc_url($settings['video_link']['url']); ?>" type="video/mp4">
            </video>
            <?php } ?>
        </div>
        <div class="banner-carousel owl-theme owl-carousel owl-nav-none">
            <?php foreach($settings['slides'] as $key => $item): ?>
            <div class="slide-item">
                <div class="auto-container">
                    <div class="content-box">
                        <h3><?php echo wp_kses($item['sub_title'], true); ?></h3>
                        <span class="big-text special-font"><?php echo wp_kses($item['title'], true); ?></span>
                        <p><?php echo wp_kses($item['text'], true); ?></p>
                        <?php if($item['btn_title']){ ?>
                        <div class="btn-box">
                            <a href="<?php echo esc_url($item['btn_link']['url']); ?>" class="theme-btn-two"><?php echo wp_kses($item['btn_title'], true); ?></a>
                        </div>
                        <?php } ?>
                    </div>  
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <ul class="social-links clearfix">
        	<?php foreach($settings['social'] as $key => $item): ?>
            <li><a href="<?php echo esc_url($item['social_link']['url']); ?>"><i class="<?php echo wp_kses(str_replace( "icon ",  "", $item['icons']), true);?>"></i></a></li>
            <?php endforeach; ?>
        </ul>
        <?php if($settings['since_text']) { ?><div class="text"><h6><?php echo wp_kses($settings['since_text'], true);?></h6></div><?php } ?>
        <?php if($settings['btn_text']) { ?>
        <div class="link-text"><a href="<?php echo esc_url($settings['text_link']['url']); ?>"><?php echo wp_kses($settings['btn_text'], true);?></a></div>
        <?php } ?>
    </section>
    <!-- banner-section end -->
        
        <?php
    }
}
