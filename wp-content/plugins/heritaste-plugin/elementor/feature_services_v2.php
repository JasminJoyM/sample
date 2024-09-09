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
class Feature_Services_V2 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'heritaste_feature_services_v2';
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
		return esc_html__( 'Feature Services V2', 'heritaste' );
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
			'feature_services_v2',
			[
				'label' => esc_html__( 'Feature Services V2', 'heritaste' ),
			]
		);
		$this->add_control(
			'servcie_bg_image',
			[
				'label' => __( 'BG Image', 'heritaste' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'show_pattern_image',
			[
				'label'       => __( 'Enable/Disable Pattern', 'heritaste' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'heritaste' ),
				'label_off' => __( 'Hide', 'heritaste' ),
				'return_value' => 'yes',
				'default' => 'no',
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
				'placeholder' => __( 'Enter your Sub Title', 'heritaste' ),
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
			'text_limit',
			[
				'label'   => esc_html__( 'Text Limit', 'heritaste' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 15,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);
		$this->add_control(
			'query_number',
			[
				'label'   => esc_html__( 'Number of post', 'heritaste' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);
		$this->add_control(
			'query_orderby',
			[
				'label'   => esc_html__( 'Order By', 'heritaste' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => array(
					'date'       => esc_html__( 'Date', 'heritaste' ),
					'title'      => esc_html__( 'Title', 'heritaste' ),
					'menu_order' => esc_html__( 'Menu Order', 'heritaste' ),
					'rand'       => esc_html__( 'Random', 'heritaste' ),
				),
			]
		);
		$this->add_control(
			'query_order',
			[
				'label'   => esc_html__( 'Order', 'heritaste' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => array(
					'DESC' => esc_html__( 'DESC', 'heritaste' ),
					'ASC'  => esc_html__( 'ASC', 'heritaste' ),
				),
			]
		);
		$this->add_control(
            'query_category', 
			[
			  'type' => Controls_Manager::SELECT,
			  'label' => esc_html__('Category', 'heritaste'),
			  'label_block' => true,
			  'options' => get_service_categories()
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
		
        $paged = get_query_var('paged');
		$paged = heritaste_set($_REQUEST, 'paged') ? esc_attr($_REQUEST['paged']) : $paged;

		$this->add_render_attribute( 'wrapper', 'class', 'templatepath-heritaste' );
		$args = array(
			'post_type'      => 'service',
			'posts_per_page' => heritaste_set( $settings, 'query_number' ),
			'orderby'        => heritaste_set( $settings, 'query_orderby' ),
			'order'          => heritaste_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if( heritaste_set( $settings, 'query_category' ) ) $args['service_cat'] = heritaste_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
		{ 
	?>
    
    <!-- service-section -->
    <section class="service-section centred">
        <?php if($settings['servcie_bg_image']['id']) { ?><div class="bg-layer" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['servcie_bg_image']['id'])); ?>);"></div><?php } ?>
        <?php if($settings['show_pattern_image']) { ?>
        <div class="shape-box">
            <div class="shape-1" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/top-shape.png);"></div>
            <div class="shape-2" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/bottom-shape.png);"></div>
        </div>
        <?php } ?>
        <div class="auto-container">
            <?php if($settings['subtitle'] || $settings['title']) { ?>
            <div class="sec-title light">
                <?php if($settings['subtitle']) { ?><span class="sub-title"><?php echo wp_kses($settings['subtitle'], true);?></span><?php } ?>
                <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
            </div>
            <?php } ?>
            <div class="row clearfix">
                <?php 
                    global $post;
					while ( $query->have_posts() ) : $query->the_post(); 
					$post_thumbnail_id = get_post_thumbnail_id($post->ID);
					$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id ); 
                ?>
                <div class="col-lg-4 col-md-6 col-sm-12 service-block">
                    <div class="service-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <div class="block-bg" style="background-image: url(<?php echo esc_url($post_thumbnail_url);?>);"></div>
                            <div class="content-box">
                                <div class="icon-box">
                                    <div class="icon"><i class="<?php echo wp_kses(str_replace( "icon ",  "", get_post_meta(get_the_id(), 'service_icon', true )), true); ?>"></i></div>
                                </div>
                                <ul class="rating clearfix">
                                    <li><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icons/icon-10.png" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></li>
                                    <li><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icons/icon-10.png" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></li>
                                    <li><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icons/icon-10.png" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></li>
                                </ul>
                                <h3><a href="<?php echo esc_url(get_post_meta( get_the_id(), 'service_url', true ));?>"><?php the_title(); ?></a></h3>
                                <p><?php echo wp_kses(heritaste_trim(get_the_content(), $settings['text_limit']), true); ?></p>
                                <div class="btn-box">
                                    <a href="<?php echo esc_url(get_post_meta( get_the_id(), 'service_url', true ));?>" class="theme-btn-one"><span><?php esc_html_e('Read More', 'heritaste'); ?></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
    <!-- service-section end -->
        
        <?php }
		wp_reset_postdata();
	}

}