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
class Menu_Section_V5 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'heritaste_menu_section_v5';
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
		return esc_html__( 'Menu Section V5', 'heritaste' );
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
			'menu_section_v5',
			[
				'label' => esc_html__( 'Menu Section V5', 'heritaste' ),
			]
		);
		$this->add_control(
			'style_two',
			 [
				'label'   => esc_html__( 'Choose Different Style', 'heritaste' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'one',
				'options' => array(
					'one' => esc_html__( 'Choose Style One', 'heritaste' ),
					'two' => esc_html__( 'Choose Style Two', 'heritaste' ),
				),
			 ]
		);
		$this->add_control(
			'show_pattern_images',
			[
				'label'       => __( 'Enable/Disable Pattern Images', 'heritaste' ),
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
			'image',
			[
				'label' => __( 'Image', 'heritaste' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
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
			  'options' => get_menu_categories()
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
		$this->add_control(
			'working_title',
			[
				'label'       => __( 'Working Title', 'heritaste' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Working Title', 'heritaste' ),
			]
		);
		$this->add_control(
			'image2',
			[
				'label' => __( 'Right Image', 'heritaste' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
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
			'post_type'      => 'menu',
			'posts_per_page' => heritaste_set( $settings, 'query_number' ),
			'orderby'        => heritaste_set( $settings, 'query_orderby' ),
			'order'          => heritaste_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if( heritaste_set( $settings, 'query_category' ) ) $args['menu_cat'] = heritaste_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
		{ 
	?>
    
    <!-- menu-style-five -->
    <section class="menu-style-five <?php if($settings['style_two'] == 'two') echo 'alternet-2 white-bg'; else echo 'white-bg'; ?>">
        <div class="outer-container">
            <div class="sec-title light centred">
                <?php if($settings['show_pattern_images']) { ?>
                <div class="title-shape">
                    <div class="shape-1" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-46.png);"></div>
                    <div class="shape-2" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-47.png);"></div>
                </div>
                <?php } ?>
                <?php if($settings['subtitle']) { ?><span class="sub-title"><?php echo wp_kses($settings['subtitle'], true);?></span><?php } ?>
                <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
            </div>
            <div data-animation-box class="menu-content">
                <?php if($settings['image']['id']) { ?>
                <div class="<?php if($settings['style_two'] == 'two') echo 'image-box-two'; else echo 'image-box-one'; ?>">
                    <div class="image-shape" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-48.png);"></div>
                    <figure data-animation-text class="overlay-anim-black-bg image" data-animation="overlay-animation"><img src="<?php echo esc_url(wp_get_attachment_url($settings['image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></figure>
                </div>
                <?php } ?>
                <div class="content-box">
                    <div class="inner-box">                        
                        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                        <div class="single-item">
                            <h3><a href="<?php echo esc_url(get_post_meta( get_the_id(), 'menu_url', true ));?>"><?php the_title(); ?></a></h3>
                            <p><?php echo wp_kses(heritaste_trim(get_the_content(), $settings['text_limit']), true); ?></p>
                            <h5><?php echo (get_post_meta( get_the_id(), 'menu_price', true ));?></h5>
                        </div>
                        <?php endwhile; ?>
                    </div>
                    <div class="lower-box clearfix">
                        <?php if($settings['btn_title']) { ?><div class="link"><a href="<?php echo esc_url($settings['btn_link']['url']); ?>"><i class="flaticon-next"></i><?php echo wp_kses($settings['btn_title'], true);?></a></div><?php } ?>
                        <?php if($settings['show_pattern_images']) { ?>
                        <ul class="rating clearfix pull-right">
                            <li><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icons/icon-1.png" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></li>
                            <li><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icons/icon-1.png" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></li>
                            <li><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icons/icon-1.png" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></li>
                        </ul>
                        <?php } ?>
                    </div>
                </div>
                <div class="<?php if($settings['style_two'] == 'two') echo 'image-box-one'; else echo 'image-box-two'; ?>">
                    <?php if($settings['working_title']) { ?><span class="open-hours special-font <?php if($settings['style_two'] == 'two') echo 'text-right'; else echo ''; ?>"><?php echo wp_kses($settings['working_title'], true);?></span><?php } ?>
                    <?php if($settings['image2']['id']) { ?>
                    <figure data-animation-text class="overlay-anim-black-bg image" data-animation="overlay-animation"><img src="<?php echo esc_url(wp_get_attachment_url($settings['image2']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></figure>
                	<?php } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- menu-style-five end -->
        
        <?php }
		wp_reset_postdata();
	}

}