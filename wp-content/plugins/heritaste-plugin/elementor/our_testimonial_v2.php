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
class Our_Testimonial_V2 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'heritaste_our_testimonial_v2';
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
		return esc_html__( 'Our Testimonials V2', 'heritaste' );
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
			'our_testimonial_v2',
			[
				'label' => esc_html__( 'Our Testimonials V2', 'heritaste' ),
			]
		);
		$this->add_control(
			'test_bg_image',
			[
				'label' => __( 'Testimonial Background Image', 'heritaste' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'curved_title',
			[
				'label'       => __( 'Curved Title', 'heritaste' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'heritaste' ),
			]
		);
		$this->add_control(
			'dish_image',
			[
				'label' => __( 'Dish Image', 'heritaste' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'text_limit',
			[
				'label'   => esc_html__( 'Text Limit', 'heritaste' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 25,
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
			  'options' => get_testimonials_categories()
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
		
        $paged = heritaste_set($_POST, 'paged') ? esc_attr($_POST['paged']) : 1;

		$this->add_render_attribute( 'wrapper', 'class', 'templatepath-heritaste' );
		$args = array(
			'post_type'      => 'testimonials',
			'posts_per_page' => heritaste_set( $settings, 'query_number' ),
			'orderby'        => heritaste_set( $settings, 'query_orderby' ),
			'order'          => heritaste_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if( heritaste_set( $settings, 'query_category' ) ) $args['testimonials_cat'] = heritaste_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
		{ 
	?>
    
    <!-- testimonial-style-two -->
    <section class="testimonial-style-two centred">
        <?php if($settings['test_bg_image']['id']){ ?><div class="bg-layer" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['test_bg_image']['id'])); ?>);"></div><?php } ?>
        <div class="shape-box">
            <div class="shape-1" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/top-shape.png);"></div>
            <div class="shape-2" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/bottom-shape.png);"></div>
        </div>
        <div class="pattern-layer" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-25.png);"></div>
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 offset-lg-3 inner-column">
                    <div class="testimonial-inner">
                        <div class="shape" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-24.png);"></div>
                        <?php if($settings['curved_title']){ ?>
                        <div class="curve-text">
                            <div class="icon-box"><i class="flaticon-double-quotes"></i></div>
                            <span class="curved-circle-5"><?php echo wp_kses($settings['curved_title'], true);?></span>
                        </div>
                        <?php } ?>
                        <?php if($settings['dish_image']['id']){ ?>
                        <figure class="image-layer"><img src="<?php echo esc_url(wp_get_attachment_url($settings['dish_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></figure>
                        <?php } ?>
                        <div class="single-item-carousel owl-carousel owl-theme nav-style-one">
                            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                            <div class="testimonial-block-two">
                                <div class="inner-box">
                                    <div class="thumb-box">
                                        <figure class="thumb"><?php the_post_thumbnail('heritaste_110x110'); ?></figure>
                                    </div> 
                                    <ul class="rating clearfix">
                                    	<?php $rating = get_post_meta( get_the_id(), 'testimonial_rating', true );
											if(!empty($rating)){
											for ($x = 1; $x <= 5; $x++) {
												if($x <= $rating) echo '<li><i class="flaticon-star"></i></li>'; else echo '<li><i class="flaticon-star-2"></i></li>';
											}
										} ?>
                                    </ul>                                    
                                    <p><?php echo wp_kses(heritaste_trim(get_the_content(), $settings['text_limit']), true); ?></p>
                                    <h3><?php the_title(); ?></h3>
                                    <span class="designation"><?php echo (get_post_meta( get_the_id(), 'author_designation', true ));?></span>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial-style-two end -->
        
        <?php }
		wp_reset_postdata();
	}

}
