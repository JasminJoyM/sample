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
class Funfact_And_Video extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'heritaste_funfact_and_video';
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
        return esc_html__( 'Funfact And Video', 'heritaste' );
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
            'funfact_and_video',
            [
                'label' => esc_html__( 'Funfact And Video', 'heritaste' ),
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
			'funfact', 
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
						'name' => 'counter_start',
						'label' => esc_html__('Start Value', 'heritaste'),
						'type' => Controls_Manager::NUMBER,
						'default' => esc_html__('0', 'heritaste')
					],
					[
						'name' => 'counter_stop',
						'label' => esc_html__('Stop Value', 'heritaste'),
						'type' => Controls_Manager::NUMBER,
						'default' => esc_html__('0', 'heritaste')
					],
					[
						'name' => 'alphabet_letter',
						'label' => esc_html__('Alphabet Letters', 'heritaste'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'heritaste')
					],
					[
						'name' => 'title',
						'label' => esc_html__('Title', 'heritaste'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'heritaste')
					],
				],
			 ]
        );
		$this->add_control(
			'video_link',
			[
				  'label' => __( 'Video Url', 'educamb' ),
				  'type' => Controls_Manager::URL,
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
			'text',
			[
				'label'       => __( 'Text', 'heritaste' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'heritaste' ),
				'default'     => __( '', 'heritaste' ),
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
						'name' => 'iconss',
						'label' => esc_html__('Enter The icons', 'heritaste'),
						'label_block' => true,
						'type' => Controls_Manager::SELECT2,
						'options'  => get_fontawesome_icons(),
					],
					[
						'name' => 'block_title',
						'label' => esc_html__('block Title', 'heritaste'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'heritaste')
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
    
    <!-- funfact-section -->
    <section class="funfact-section">
        <?php if($settings['bg_image']['id']){ ?>
        <div class="bg-layer" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>);"></div>
        <?php } ?>
        <div class="funfact-inner">
            <?php foreach($settings['funfact'] as $key => $item): ?>
            <div class="funfact-block-one">
                <div class="inner-box">
                    <div class="icon-box"><i class="<?php echo wp_kses(str_replace( "icon ",  "", $item['icons']), true);?>"></i></div>
                    <div class="count-outer count-box special-font">
                        <span class="count-text" data-speed="1500" data-stop="<?php echo esc_attr($item['counter_stop']);?>"><?php echo esc_attr($item['counter_start']);?></span><span class="symble"><?php echo esc_attr($item['alphabet_letter']);?></span>
                    </div>
                    <h3><?php echo wp_kses($item['title'], true);?></h3>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php if($settings['video_link']['url']){ ?>
        <div class="video-inner centred">
            <div class="video-btn">
                <a href="<?php echo esc_url($settings['video_link']['url']); ?>" class="video-icon" data-rel="lightcase:myCollection"><i class="flaticon-play"></i></a>
            </div>
        </div>
        <?php } ?>
        <div class="facilities-inner">
            <div class="auto-container">
                <div class="row align-items-center clearfix">
                    <?php if($settings['text']) { ?>
                    <div class="col-lg-6 col-md-12 col-sm-12 text-column">
                        <div class="text">
                            <h2><?php echo wp_kses($settings['text'], true);?></h2>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="col-lg-6 col-md-12 col-sm-12 inner-column">
                        <div class="inner-box centred">
                            <div class="row clearfix">
                                <?php foreach($settings['blocks'] as $key => $item): ?>
                                <div class="col-lg-4 col-md-6 col-sm-12 single-column">
                                    <div class="single-item">
                                        <div class="icon-box"><i class="<?php echo wp_kses(str_replace( "icon ",  "", $item['iconss']), true);?>"></i></div>
                                        <h6><?php echo wp_kses($item['block_title'], true);?></h6>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- funfact-section end -->      
                 
        <?php
    }
}
