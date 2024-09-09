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
class History_Section extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'heritaste_history_section';
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
        return esc_html__( 'History Section', 'heritaste' );
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
            'history_section',
            [
                'label' => esc_html__( 'History Section', 'heritaste' ),
            ]
        );
		$this->add_control(
			'bg_title',
			[
				'label'       => __( 'BG Title', 'heritaste' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'heritaste' ),
			]
		);
		$this->add_control(
			'image',
			[
				'label' => __( 'Image', 'heritaste' ),
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
			'icon_image',
			[
				'label' => __( 'Icon Image', 'heritaste' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'year',
			[
				'label'       => __( 'Year', 'heritaste' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Year', 'heritaste' ),
			]
		);
		$this->add_control(
			'sub_title',
			[
				'label'       => __( 'Sub Title', 'heritaste' ),
				'label_block' => true,
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
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
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
			'icon_image2',
			[
				'label' => __( 'Icon Image', 'heritaste' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
           'features', 
		   [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title' => esc_html__('Started our Journey', 'heritaste')],
						['block_title' => esc_html__('Rising Star Chef Award', 'heritaste')],
					],
				'fields' => 
				[
					[
						'name' => 'icon_image3',
						'label' => esc_html__('Icon Image', 'heritaste'),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'block_year',
						'label' => esc_html__('Year', 'heritaste'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('Enter your Text', 'heritaste')
					],
					[
						'name' => 'block_sub_title',
						'label' => esc_html__('Sub Title', 'heritaste'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('Enter your Text', 'heritaste')
					],
					[
						'name' => 'block_title',
						'label' => esc_html__('Title', 'heritaste'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('Enter your Text', 'heritaste')
					],
					[
						'name' => 'block_text',
						'label' => esc_html__('Text', 'heritaste'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('Enter your Text', 'heritaste')
					],
				],
				'title_field' => '{{block_title}}',
			 ]
        );
		$this->add_control(
			'btn_title',
			[
				'label'       => __( 'Button Title', 'heritaste' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Button Title', 'heritaste' ),
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
	
    <!-- history-section -->
    <section class="history-section">
        <?php if($settings['bg_title']) { ?><span class="big-text"><?php echo wp_kses($settings['bg_title'], true);?></span><?php } ?>
        <?php if($settings['image']['id'] || $settings['image2']['id']){ ?>
        <div data-animation-box class="image-layer">
            <figure data-animation-text class="overlay-anim-white-bg image-1" data-animation="overlay-animation"><img src="<?php echo esc_url(wp_get_attachment_url($settings['image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></figure>
            <figure data-animation-text class="overlay-anim-white-bg image-2" data-animation="overlay-animation"><img src="<?php echo esc_url(wp_get_attachment_url($settings['image2']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></figure>
        </div>
        <?php } ?>
        <div class="shape" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-56.png);"></div>
        <div class="auto-container">
            <div class="inner-container">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 inner-column">
                        <div class="inner-box text-right">
                            <div class="single-item">
                                <?php if($settings['icon_image']['id']){ ?>
                                <div class="icon-box"><img src="<?php echo esc_url(wp_get_attachment_url($settings['icon_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></div>
                                <?php } ?>
                                <div class="text">
                                    <?php if($settings['year']) { ?><span class="year special-font"><?php echo wp_kses($settings['year'], true);?></span><?php } ?>
                                    <?php if($settings['sub_title']) { ?><h6><?php echo wp_kses($settings['sub_title'], true);?></h6><?php } ?>
                                    <?php if($settings['title']) { ?><h3><?php echo wp_kses($settings['title'], true);?></h3><?php } ?>
                                    <?php if($settings['text']) { ?><p><?php echo wp_kses($settings['text'], true);?></p><?php } ?>
                                </div>
                            </div>
                            <?php if($settings['icon_image2']['id']){ ?>
                            <div class="single-item">
                                <div class="icon-box"><img src="<?php echo esc_url(wp_get_attachment_url($settings['icon_image2']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 inner-column">
                        <div class="inner-box">
                            <?php foreach($settings['features'] as $key => $item): ?>
                            <div class="single-item">
                                <div class="text">
                                    <span class="year special-font"><?php echo wp_kses($item['block_year'], true);?></span>
                                    <h6><?php echo wp_kses($item['block_sub_title'], true);?></h6>
                                    <h3><?php echo wp_kses($item['block_title'], true);?></h3>
                                    <p><?php echo wp_kses($item['block_text'], true);?></p>
                                </div>
                                <?php if($item['icon_image3']['id']) { ?>
                                <div class="icon-box"><img src="<?php echo esc_url(wp_get_attachment_url($item['icon_image3']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'heritaste');?>"></div>
                            	<?php } ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php if($settings['btn_title']) { ?>
            <div class="more-btn centred">
                <a href="<?php echo esc_url($settings['btn_link']['url']); ?>" class="theme-btn-two"><?php echo wp_kses($settings['btn_title'], true);?></a>
            </div>
            <?php } ?>
        </div>
    </section>
    <!-- history-section end -->
             
        <?php
    }
}
