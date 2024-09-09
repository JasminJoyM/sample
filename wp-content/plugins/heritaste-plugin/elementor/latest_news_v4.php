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
class Latest_News_V4 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'heritaste_latest_news_v4';
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
		return esc_html__( 'Latest News V4', 'heritaste' );
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
			'latest_news_v4',
			[
				'label' => esc_html__( 'Latest News V4', 'heritaste' ),
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
			  'options' => get_blog_categories()
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
			'post_type'      => 'post',
			'posts_per_page' => heritaste_set( $settings, 'query_number' ),
			'orderby'        => heritaste_set( $settings, 'query_orderby' ),
			'order'          => heritaste_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if( heritaste_set( $settings, 'query_category' ) ) $args['category_name'] = heritaste_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
		{ 
	?>
	
    <!-- news-style-two -->
    <section class="news-style-two blog-page-three">
        <div class="auto-container">
            <div class="sortable-masonry">
                <div class="items-container row clearfix">
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="news-block masonry-item small-column <?php if(get_post_meta( get_the_id(), 'dimension', true) == 'extra_height') echo 'col-lg-4 col-md-6 col-sm-12'; elseif(get_post_meta( get_the_id(), 'dimension', true) == 'medium_height') echo 'col-lg-4 col-md-6 col-sm-12'; else echo 'col-lg-4 col-md-6 col-sm-12'?>">
                        <div class="news-block-two">
                            <div class="inner-box">
                                <?php if(has_post_thumbnail()){ ?>
                                <div class="image-box">
                                    <figure class="image">
                                    	<a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>">
											<?php 
												$dimention = get_post_meta( get_the_id(), 'dimension', true );
												if($dimention == 'extra_height'){
													$image_size = 'heritaste_355x500';
												} elseif($dimention == 'medium_height'){
													$image_size = 'heritaste_355x350';
												} else{
													$image_size = 'heritaste_355x230'; 
												}
												the_post_thumbnail($image_size);
											?>
                                        </a>
                                    </figure>
                                    <div class="tags"><?php the_category(' '); ?></div>
                                </div>
                                <?php } ?>
                                <div class="lower-content">
                                    <div class="upper-box">
                                        <h3><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h3>
                                        <ul class="post-info clearfix">
                                            <li><?php echo get_the_date( ); ?></li>
                                            <li><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta('ID') )); ?>"><?php esc_html_e('by', 'heritaste'); ?> <?php the_author(); ?></a></li>
                                        </ul>
                                    </div>
                                    <div class="text">
                                        <p><?php echo wp_kses(heritaste_trim(get_the_content(), $settings['text_limit']), true); ?></p>
                                        <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><span><?php esc_html_e('Read More', 'heritaste'); ?></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- news-style-two end -->
        
               
        <?php }
		wp_reset_postdata();
	}

}
