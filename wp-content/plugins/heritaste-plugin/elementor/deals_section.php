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
class Deals_Section extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'heritaste_deals_section';
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
        return esc_html__( 'Deals_Section', 'heritaste' );
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
            'deals_section',
            [
                'label' => esc_html__( 'Deals Section', 'heritaste' ),
            ]
        );
		$this->add_control(
			'left_bg_image',
			[
				'label' => __( 'Left Column BG Image', 'heritaste' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'left_col_subtitle',
			[
				'label'       => __( 'Left Column subTitle', 'heritaste' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Left Block subTitle', 'heritaste' ),
			]
		);
		$this->add_control(
			'left_col_title',
			[
				'label'       => __( 'Left Column Title', 'heritaste' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Left Block Title', 'heritaste' ),
			]
		);
		$this->add_control(
			'left_col_discount',
			[
				'label'       => __( 'Left Column Discount', 'heritaste' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Left Column Discount', 'heritaste' ),
			]
		);
		$this->add_control(
			'left_arrow_link',
			[
				'label' => __( 'left Arrow Url', 'heritaste' ),
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
			'deals', 
			[
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
					],
				'fields' => 
				[
					[
						'name' => 'deal_image',
						'label' => __( 'Deal Image', 'heritaste' ),
						 'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'price',
						'label' => esc_html__('Price', 'heritaste'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('Enter your Price', 'heritaste')
					],
					[
						'name' => 'subtitle',
						'label' => esc_html__('Sub  Title', 'heritaste'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('Enter your SubTitle', 'heritaste')
					],
					[
						'name' => 'title',
						'label' => esc_html__('Title', 'heritaste'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('Enter your Title', 'heritaste')
					],
					[
						'name' => 'title_link',
						'label' => __( 'Title Link', 'heritaste' ),
						'type' => Controls_Manager::URL,
						'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
				],
			 ]
        );
		$this->add_control(
			'right_bg_image',
			[
				'label' => __( 'Right Column BG Image', 'heritaste' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'right_col_subtitle',
			[
				'label'       => __( 'Right Column subTitle', 'heritaste' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Right Block subTitle', 'heritaste' ),
			]
		);
		$this->add_control(
			'right_col_title',
			[
				'label'       => __( 'Right Column Title', 'heritaste' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Right Block Title', 'heritaste' ),
			]
		);
		$this->add_control(
			'right_col_discount',
			[
				'label'       => __( 'Right Column Discount', 'heritaste' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Right Column Discount', 'heritaste' ),
			]
		);
		$this->add_control(
			'right_arrow_link',
			[
				'label' => __( 'Right Arrow Url', 'heritaste' ),
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
    
    <!-- deals-section -->
    <section class="deals-section">
        <div class="outer-container clearfix">
            <div class="single-item centred">
                <?php if($settings['left_bg_image']['id']) { ?>
                <div class="inner-box" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['left_bg_image']['id'])); ?>);">
                <?php } ?>
                    <?php if($settings['left_col_subtitle']) { ?><h6><?php echo wp_kses($settings['left_col_subtitle'], true);?></h6><?php } ?>
                    <?php if($settings['left_col_title']) { ?><h2><?php echo wp_kses($settings['left_col_title'], true);?></h2><?php } ?>
                    <?php if($settings['left_col_discount']) { ?><div class="offer-box text-left"><h3><?php echo wp_kses($settings['left_col_discount'], true);?></h3></div><?php } ?>
                    <?php if($settings['left_arrow_link']['url']) { ?><div class="link"><a href="<?php echo esc_url($settings['left_arrow_link']['url']); ?>"><i class="flaticon-right-chevron"></i></a></div><?php } ?>
                </div>
            </div>
            <div class="carousel-inner text-right">
                <div class="single-item-carousel owl-carousel owl-theme owl-nav-none">
                    <?php foreach($settings['deals'] as $key => $item): ?>
                    <div class="carousel-content" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($item['deal_image']['id'])); ?>);">
                        <div class="offer-box text-left"><h3><?php echo wp_kses($item['price'], true);?></h3></div>
                        <h6><?php echo wp_kses($item['subtitle'], true);?></h6>
                        <h2><a href="<?php echo esc_url($item['title_link']['url']); ?>"><?php echo wp_kses($item['title'], true);?></a></h2>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="single-item centred">
                <?php if($settings['right_bg_image']['id']) { ?>
                <div class="inner-box" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['right_bg_image']['id'])); ?>);">
                <?php } ?>
                    <?php if($settings['right_arrow_link']['url']) { ?><div class="link"><a href="<?php echo esc_url($settings['right_arrow_link']['url']); ?>"><i class="flaticon-right-chevron"></i></a></div><?php } ?>
                    <?php if($settings['right_col_discount']) { ?><div class="offer-box text-left"><h3><?php echo wp_kses($settings['right_col_discount'], true);?></h3></div><?php } ?>
                    <?php if($settings['right_col_subtitle']) { ?><h6><?php echo wp_kses($settings['right_col_subtitle'], true);?></h6><?php } ?>
                    <?php if($settings['right_col_title']) { ?><h2><?php echo wp_kses($settings['right_col_title'], true);?></h2><?php } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- deals-section end -->      
      
        <?php
    }
}

