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
class Feature_Services_V4 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'heritaste_feature_services_v4';
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
		return esc_html__( 'Feature Services V4', 'heritaste' );
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
			'feature_services_v4',
			[
				'label' => esc_html__( 'Feature Services V4', 'heritaste' ),
			]
		);
		$this->add_control(
			'sub_title',
			[
				'label'       => __( 'Sub Title', 'heritaste' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
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
		
        $paged = heritaste_set($_POST, 'paged') ? esc_attr($_POST['paged']) : 1;

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

		if ( $query->have_posts()) { 
		
		$count = 1;
		$left_arr = array();
   		$right_arr = array();			
		?>
        
		<?php while ( $query->have_posts() ) : $query->the_post();
				
				if($count > 2) $count = 1;
			?>
			<?php if( ($count == 1)):
				$left_arr[get_the_id()] = ' <div class="single-item wow fadeInLeft animated" data-wow-delay="00ms" data-wow-duration="1500ms">
												<span class="count-text special-font">'.get_post_meta(get_the_id(), 'number', true ).'</span>
												<div class="icon-box"><i class="'.(get_post_meta(get_the_id(), 'service_icon', true )).'"></i></div>
												<h3>'.get_the_title(get_the_id()).'</h3>
												<p>'.heritaste_trim(get_the_content(), $settings['text_limit']).'</p>
											</div>';
			?>
			<?php else:
					$right_arr[get_the_id()] = '<div class="single-item wow fadeInRight animated" data-wow-delay="00ms" data-wow-duration="1500ms">
													<span class="count-text special-font">'.get_post_meta(get_the_id(), 'number', true ).'</span>
													<div class="icon-box"><i class="'.(get_post_meta(get_the_id(), 'service_icon', true )).'"></i></div>
													<h3>'.get_the_title(get_the_id()).'</h3>
													<p>'.heritaste_trim(get_the_content(), $settings['text_limit']).'</p>
												</div>';
			?>
			<?php endif; ?>
			<?php $count++; endwhile; ?>	
    
    <!-- chooseus-style-two -->
    <section class="chooseus-style-two">
        <div class="auto-container">
            <div class="sec-title centred light">
                <?php if($settings['sub_title']){ ?><span class="sub-title"><?php echo wp_kses($settings['sub_title'], true);?></span><?php } ?>
                <?php if($settings['title']){ ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
            </div>
            <div class="row clearfix">
                <div class="col-lg-4 col-md-6 col-sm-12 content-column">
                    <div class="inner-box">
                        <?php foreach($left_arr as $key => $content):?>
							<?php echo wp_kses_post($content);?>
                        <?php endforeach;?>   
                    </div>
                </div>
                <?php if($settings['image']['id']) { ?>
                <div class="col-lg-4 col-md-6 col-sm-12 image-column">
                    <div class="image-box">
                        <figure class="image"><img src="<?php echo esc_url(wp_get_attachment_url($settings['image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></figure>
                    </div>
                </div>
                <?php } ?>
                <div class="col-lg-4 col-md-6 col-sm-12 content-column">
                    <div class="inner-box text-right">
                        <?php foreach($right_arr as $key => $right_content):?>
                            <?php echo wp_kses_post($right_content);?>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- chooseus-style-two end -->
        
	<?php }
    wp_reset_postdata();
	}

}
