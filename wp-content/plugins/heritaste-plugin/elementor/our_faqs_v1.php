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
class Our_Faqs_V1 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'heritaste_our_faqs_v1';
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
		return esc_html__( 'Our Faqs V1', 'heritaste' );
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
			'our_faqs_v1',
			[
				'label' => esc_html__( 'Our Faqs V1', 'heritaste' ),
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
			'bg_title',
			[
				'label'       => __( 'BG Title', 'heritaste' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your BG title', 'heritaste' ),
			]
		);
		$this->add_control(
			'btn_title',
			[
				'label'       => __( 'Button Title', 'heritaste' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Button title', 'heritaste' ),
			]
		);
		$this->add_control(
			'btn_link',
			[
				'label'       => __( 'Button Title', 'heritaste' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
				'show_external' => true,
				'default' => [
					'url' => '','is_external' => true,'nofollow' => true,
				],
			]
		);
		$this->add_control(
		  'features_tab', 
		  [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['btn_title' => esc_html__('Item1', 'heritaste')],
						['btn_title' => esc_html__('Item2', 'heritaste')],
						['btn_title' => esc_html__('Item3', 'heritaste')],
						['btn_title' => esc_html__('Item4', 'heritaste')],
						['btn_title' => esc_html__('Item5', 'heritaste')],
					],
				'fields' => 
				[
					[
						'name' => 'btn_title',
						'label' => esc_html__('Tab Button Title', 'heritaste'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'heritaste')
					],
					[
						'name' => 'tab_text',
						'label' => esc_html__('Text', 'heritaste'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'heritaste')
					],
				],
				'title_field' => '{{btn_title}}',
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
	?>
    
    <!-- faq-section -->
    <section class="faq-section">
        <?php if($settings['bg_image']['id']) { ?>
        <div class="bg-layer" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>);"></div>
        <?php } ?>
        <div class="auto-container">
            <div class="inner-container">
                <div class="bg-shape" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-45.png);"></div>
                <?php if($settings['bg_title']) { ?><span class="big-text"><?php echo wp_kses($settings['bg_title'], true ); ?></span><?php } ?>
                <div class="tabs-box">
                    <div class="row clearfix">
                        <div class="col-lg-8 col-md-12 col-sm-12 btn-column">
                            <div class="tab-btn-box">
                                <div class="tab-btns tab-buttons clearfix">
                                    <?php $count = 1; foreach($settings['features_tab'] as $key => $item): ?>
                                    <div class="tab-btn <?php if($count == 1) echo 'active-btn' ?>" data-tab="#tab-<?php echo esc_attr($count); ?>"><h3><?php echo wp_kses($item['btn_title'], true); ?></h3></div>
                                    <?php $count++; endforeach; ?>
                                </div>
                                <?php if($settings['btn_title']) { ?>
                                <div class="btn-box">
                                    <a href="<?php echo esc_url($settings['btn_link']['url']); ?>"><?php echo wp_kses($settings['btn_title'], true ); ?></a>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 content-column">
                            <div class="tabs-content">
                                <?php $count = 1; foreach($settings['features_tab'] as $keys => $item): ?>
                                <div class="tab <?php if($count == 1) echo 'active-tab';?>" id="tab-<?php echo esc_attr($count);?>">
                                    <div class="text">
                                        <h3><?php esc_html_e('Answer:', 'heritaste'); ?></h3>
                                        <p><?php echo wp_kses($item['tab_text'], true); ?></p>
                                    </div>
                                </div>
                                <?php $count++; endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- faq-section end -->

		<?php 
	}

}