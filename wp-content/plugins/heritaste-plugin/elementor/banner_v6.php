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
class Banner_V6 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'heritaste_banner_v6';
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
        return esc_html__( 'Banner V6', 'heritaste' );
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
            'banner_v6',
            [
                'label' => esc_html__( 'Banner V6', 'heritaste' ),
            ]
        );
		$this->add_control(
		  'features_tab', 
		  [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title' => esc_html__('Breakfast', 'heritaste')],
						['block_title' => esc_html__('Lunch', 'heritaste')],
						['block_title' => esc_html__('Dinner', 'heritaste')],
						['block_title' => esc_html__('Starters', 'heritaste')],
						['block_title' => esc_html__('Beverages', 'heritaste')],
					],
				'fields' => 
				[
					[
						'name' => 'alphabet_letter',
						'label' => esc_html__('Alphabet Letter', 'heritaste'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'heritaste')
					],
					[
						'name' => 'block_title',
						'label' => esc_html__('Menu Title', 'heritaste'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'heritaste')
					],
					[
						'name' => 'vector_image',
						'label' => __( 'Vector Image', 'heritaste' ),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'bg_image',
						'label' => __( 'BG Image', 'heritaste' ),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'block_title1',
						'label' => esc_html__('Menu Title', 'heritaste'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'heritaste')
					],
					[
						'name' => 'block_text',
						'label' => esc_html__('Menu Text', 'heritaste'),
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
					[
						'name' => 'btn_title',
						'label' => esc_html__('Button Title', 'heritaste'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('View All menu', 'heritaste')
					],
					[
						'name' => 'btn_link',
						'label' => __( 'Button Link', 'heritaste' ),
						'type' => Controls_Manager::URL,
						'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
				],
				'title_field' => '{{block_title}}',
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
    
    <!-- menu-style-six -->
    <section class="menu-style-six">
        <div class="outer-container clearfix">
            <?php 
				$count = 1;
			    foreach($settings['features_tab'] as $keys => $item): 
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
            <div class="single-menu-box">
                <div class="inner-box">
                    <?php if($count % 2) { ?>
					<div class="content-box">
                        <span class="big-text"><?php echo wp_kses($item['alphabet_letter'], true); ?></span>
                        <h2><?php echo wp_kses($item['block_title'], true); ?></h2>
                        <?php if($item['vector_image']['id']){ ?><figure class="vector-image"><img src="<?php echo esc_url(wp_get_attachment_url($item['vector_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></figure><?php } ?>
                    </div>
                    <?php } else { ?>
                    <div class="content-box">
                        <?php if($item['vector_image']['id']){ ?><figure class="vector-image"><img src="<?php echo esc_url(wp_get_attachment_url($item['vector_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></figure><?php } ?>
                        <span class="big-text"><?php echo wp_kses($item['alphabet_letter'], true); ?></span>
                        <h2><?php echo wp_kses($item['block_title'], true); ?></h2>
                    </div>
                    <?php } ?>
                    
                    <div class="overlay-content" <?php if($item['bg_image']['id']){ ?>style="background-image: url(<?php echo esc_url(wp_get_attachment_url($item['bg_image']['id'])); ?>);"<?php } ?>>
                        <div class="inner">
                            <div class="menu-content">
                                <div class="title-box">
                                    <h2><?php echo wp_kses($item['block_title1'], true); ?></h2>
                                    <span><?php echo wp_kses($item['block_text'], true); ?></span>
                                </div>
                                <div class="menu-inner">
                                    <?php 
										while ( $query->have_posts() ) : $query->the_post(); 
									?>
                                    <div class="single-item">
                                        <h3><a href="<?php echo esc_url(get_post_meta( get_the_id(), 'menu_url', true ));?>"><?php the_title(); ?></a></h3>
                                        <p><?php echo wp_kses(heritaste_trim(get_the_content(), $item['text_limit']), true); ?></p>
                                        <h5><?php echo (get_post_meta( get_the_id(), 'menu_price', true ));?></h5>
                                    </div>
                                    <?php endwhile;?>
                                </div>
                                <?php if($item['btn_link']['url'] || $item['btn_title']){ ?>
                                <div class="lower-box clearfix">
                                    <div class="link"><a href="<?php echo esc_url($item['btn_link']['url']); ?>"><?php echo wp_kses($item['btn_title'], true); ?></a></div>
                                    <div class="close-btn text-right"><a href="<?php echo esc_url($item['btn_link']['url']); ?>"><i class="flaticon-left-arrow"></i></a></div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
			wp_reset_postdata();
			$count++; endif;  endforeach; ?>
        </div>
    </section>
    <!-- menu-style-six end -->
    
	<?php 
	}
}