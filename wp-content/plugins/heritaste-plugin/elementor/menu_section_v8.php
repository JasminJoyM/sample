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
class Menu_Section_V8 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'heritaste_menu_section_v8';
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
		return esc_html__( 'Menu Section V8', 'heritaste' );
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
			'menu_section_v8',
			[
				'label' => esc_html__( 'Menu Section V8', 'heritaste' ),
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
		  'features_tab', 
		  [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['title' => esc_html__('Item1', 'heritaste')],
						['title' => esc_html__('Item2', 'heritaste')],
						['title' => esc_html__('Item3', 'heritaste')],
						['title' => esc_html__('Item4', 'heritaste')],
						['title' => esc_html__('Item5', 'heritaste')],
					],
				'fields' => 
				[
					[
						'name' => 'title',
						'label' => esc_html__('Title', 'heritaste'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'heritaste')
					],
					[
						'name' => 'working_hours',
						'label' => esc_html__('Working Hours', 'heritaste'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
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
				'title_field' => '{{title}}',
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
    
    <!-- static-menu -->
    <section class="static-menu">
        <?php if($settings['image']['id']) { ?>
        <div class="bg-layer" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['image']['id'])); ?>);"></div>
        <?php } ?>
        <div class="static-menu-content">
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
            <div class="content-box">
                <?php if($item['title']) { ?><span class="big-text"><?php echo wp_kses($item['title'], true ); ?></span><?php } ?>
                <div class="title-box">
                    <?php if($item['title']) { ?><h2><?php echo wp_kses($item['title'], true ); ?></h2><?php } ?>
                    <?php if($item['working_hours']) { ?><p><?php echo wp_kses($item['working_hours'], true ); ?></p><?php } ?>
                </div>
                <?php 
					global $post;
					while ( $query->have_posts() ) : $query->the_post(); 
					$post_thumbnail_id = get_post_thumbnail_id($post->ID);
					$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
				?>
                <div class="single-item">
                    <h3><a href="<?php echo esc_url(get_post_meta( get_the_id(), 'menu_url', true ));?>"><?php the_title(); ?></a></h3>
                    <p><?php echo wp_kses(heritaste_trim(get_the_content(), $item['text_limit']), true); ?></p>
                    <h5><?php echo (get_post_meta( get_the_id(), 'menu_price', true ));?></h5>
                </div>
                <?php endwhile;?>
            </div>
            <?php endif;?>
            <?php $count++; endforeach; ?>
        </div>
    </section>
    <!-- static-menu end -->
        
        <?php 
	}

}