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
class Menu_Section_V1 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'heritaste_menu_section_v1';
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
		return esc_html__( 'Menu Section V1', 'heritaste' );
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
			'menu_section_v1',
			[
				'label' => esc_html__( 'Menu Section V1', 'heritaste' ),
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
			'sub_title',
			[
				'label'       => __( 'Sub Title', 'heritaste' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Sub title', 'heritaste' ),
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => __( ' Title', 'heritaste' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your title', 'heritaste' ),
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
				'placeholder' => __( 'Enter your text', 'heritaste' ),
			]
		);
		$this->add_control(
		  'features_tab', 
		  [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['btn_title' => esc_html__('Breakfast', 'heritaste')],
						['btn_title' => esc_html__('Lunch', 'heritaste')],
						['btn_title' => esc_html__('Dinner', 'heritaste')],
						['btn_title' => esc_html__('Starters', 'heritaste')],
						['btn_title' => esc_html__('Beverages', 'heritaste')],
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
						'name' => 'btn_title',
						'label' => esc_html__('Tab Button Title', 'heritaste'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'heritaste')
					],
					[
						'name' => 'text_limit',
						'label'   => esc_html__( 'Number of Text', 'heritaste' ),
						'type'    => Controls_Manager::NUMBER,
						'default' => 3,
						'min'     => 1,
						'max'     => 100,
						'step'    => 1,
					],
					[
						'name' => 'query_number',
						'label'   => esc_html__( 'Number of post', 'heritaste' ),
						'type'    => Controls_Manager::NUMBER,
						'default' => 3,
						'min'     => 1,
						'max'     => 100,
						'step'    => 1,
					],
					[
						'name' => 'query_orderby',
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
					],
					[
						'name' => 'query_order',
						'label'   => esc_html__( 'Order', 'heritaste' ),
						'label_block' => true,
						'type'    => Controls_Manager::SELECT,
						'default' => 'DESC',
						'options' => array(
							'DESC' => esc_html__( 'DESC', 'heritaste' ),
							'ASC'  => esc_html__( 'ASC', 'heritaste' ),
						),
					],
					[
					  'name' => 'query_category',
					  'type' => Controls_Manager::SELECT,
					  'label' => esc_html__('Category', 'heritaste'),
					  'label_block' => true,
					  'options' => get_menu_categories()
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
    
    <!-- menu-section -->
    <section class="menu-section sec-pad bg-color-1">
        <?php if($settings['show_pattern_images']) { ?>
        <div class="pattern-layer" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-9.png);"></div>
        <figure class="image-layer-1"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/resource/food-1.png" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></figure>
        <figure class="image-layer-2"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/resource/food-2.png" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></figure>
        <figure class="image-layer-3"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/resource/food-3.png" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></figure>
        <figure class="image-layer-4"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/resource/food-4.png" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></figure>
        <?php } ?>
        
        <div class="auto-container">
            <div class="sec-title centred">
                <?php if($settings['sub_title']) { ?><span class="sub-title"><?php echo wp_kses($settings['sub_title'], true ); ?></span><?php } ?>
                <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true ); ?></h2><?php } ?>
                <?php if($settings['text']) { ?><p><?php echo wp_kses($settings['text'], true ); ?></p><?php } ?>
            </div>
            <div class="menu-tab">
                <div class="tab-btn-box">
                    <div class="tab-btns product-tab-btns clearfix centred">
                        <?php $count = 1; foreach($settings['features_tab'] as $key => $item): ?>
                        <div class="p-tab-btn <?php if($count == 1) echo 'active-btn' ?>" data-tab="#tab-<?php echo esc_attr($count); ?>">
                            <h5><i class="<?php echo wp_kses(str_replace( "icon ",  "", $item['iconss']), true);?>"></i><?php echo wp_kses($item['btn_title'], true); ?></h5>
                        </div>
                        <?php $count++; endforeach; ?>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-12 col-sm-12 offset-lg-2">
                        <div class="p-tabs-content">
                            <?php $count = 1; foreach($settings['features_tab'] as $keys => $item): 
								$paged = heritaste_set($_POST, 'paged') ? esc_attr($_POST['paged']) : 1;
						
								$this->add_render_attribute( 'wrapper', 'class', 'templatepath-heritaste' );
								$args = array(
									'post_type'      => 'menu',
									'posts_per_page' => heritaste_set( $item, 'query_number' ),
									'orderby'        => heritaste_set( $item, 'query_orderby' ),
									'order'          => heritaste_set( $item, 'query_order' ),
									'text_limit'     => heritaste_set( $item, 'text_limit' ),
									'paged'         => $paged
								);
								
								if( heritaste_set( $item, 'query_category' ) ) $args['menu_cat'] = heritaste_set( $item, 'query_category' );
								$query = new \WP_Query( $args );
								if ( $query->have_posts()):	
							?>
                            <div class="p-tab <?php if($count == 1) echo 'active-tab';?>" id="tab-<?php echo esc_attr($count);?>">
                                <div class="single-item-carousel owl-carousel owl-theme nav-style-one">
                                    
                                    <div class="content-inner">
                                        <div class="shape">
                                            <div class="shape-1"></div>
                                            <div class="shape-2"></div>
                                            <div class="shape-3"></div>
                                            <div class="shape-4"></div>
                                            <div class="shape-5" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-8.png);"></div>
                                            <div class="shape-6" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-8.png);"></div>
                                        </div>
                                        <div class="content-box">
                                            <?php 
												$counts = 0;
												global $post;
												while ( $query->have_posts() ) : $query->the_post(); 
												$post_thumbnail_id = get_post_thumbnail_id($post->ID);
												$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
												$term_list = wp_get_post_terms(get_the_id(), 'menu_cat', array("fields" => "names"));
											?>
                                            <?php if(($counts%4) == 0 && $counts != 0):?>
                                        </div>
                                    </div>
                                    
                                    <div class="content-inner">
                                        <div class="shape">
                                            <div class="shape-1"></div>
                                            <div class="shape-2"></div>
                                            <div class="shape-3"></div>
                                            <div class="shape-4"></div>
                                            <div class="shape-5" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-8.png);"></div>
                                            <div class="shape-6" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-8.png);"></div>
                                        </div>
                                        <div class="content-box">
                                            <?php endif; ?>
                                            <div class="menu-block-one">
                                                <div class="inner-box">
                                                    <div class="price"><h5><?php echo (get_post_meta( get_the_id(), 'menu_price', true ));?></h5></div>
                                                    <h3><a href="<?php echo esc_url(get_post_meta( get_the_id(), 'menu_url', true ));?>"><?php the_title(); ?></a></h3>
                                                    <p><?php echo wp_kses(heritaste_trim(get_the_content(), $item['text_limit']), true); ?></p>
                                                    <figure class="menu-image"><?php the_post_thumbnail('heritaste_77x77'); ?></figure>
                                                </div>
                                            </div>
                                            <?php $counts++; endwhile;?>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                            <?php endif; $count++; endforeach; ?>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- menu-section end -->

	<?php 
	}
}