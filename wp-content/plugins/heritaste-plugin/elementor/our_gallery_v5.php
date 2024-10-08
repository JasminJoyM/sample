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
class Our_Gallery_V5 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'heritaste_our_gallery_v5';
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
		return esc_html__( 'Our Gallery V5', 'heritaste' );
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
			'our_gallery_v5',
			[
				'label' => esc_html__( 'Our Gallery V5', 'heritaste' ),
			]
		);
		$this->add_control(
			'number',
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
			'cat_exclude',
			[
				'label'       => esc_html__( 'Exclude', 'heritaste' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Exclude categories, etc. by ID with comma separated.', 'heritaste' ),
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
			'show_pagination',
			[
				'label'       => __( 'Enable/Disable Pagination', 'heritaste' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'heritaste' ),
				'label_off' => __( 'Hide', 'heritaste' ),
				'return_value' => 'yes',
				'default' => 'no',
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
			'post_type'      => 'gallery',
			'posts_per_page' => heritaste_set( $settings, 'number' ),
			'orderby'        => heritaste_set( $settings, 'query_orderby' ),
			'order'          => heritaste_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		$terms_array = explode(",",heritaste_set( $settings, 'cat_exclude' ));
		if(heritaste_set( $settings, 'cat_exclude' )) $args['tax_query'] = array(array('taxonomy' => 'gallery_cat','field' => 'id','terms' => $terms_array,'operator' => 'NOT IN',));
		$allowed_tags = wp_kses_allowed_html('post');
		$query = new \WP_Query( $args );
		$t = '';
		$data_filtration = '';
		$data_posts = '';
		if ( $query->have_posts() ) 
		{
		ob_start();
		?>
  
		<?php 
            $count = 0; 
            $fliteration = array();
            while( $query->have_posts() ): $query->the_post();
            global  $post;
            $meta = ''; //printr($meta);
            $meta1 = ''; //_WSH()->get_meta();
            $post_terms = get_the_terms( get_the_id(), 'gallery_cat');// printr($post_terms); exit();
            foreach( (array)$post_terms as $pos_term ) $fliteration[$pos_term->term_id] = $pos_term;
            $temp_category = get_the_term_list(get_the_id(), 'gallery_cat', '', ', ');
            
            $post_terms = wp_get_post_terms( get_the_id(), 'gallery_cat'); 
            $term_slug = '';
            if( $post_terms ) foreach( $post_terms as $p_term ) $term_slug .= $p_term->slug.' ';
        	
			$term_list = wp_get_post_terms(get_the_id(), 'gallery_cat', array("fields" => "names"));
			$post_thumbnail_id = get_post_thumbnail_id($post->ID);
			$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
			
            ?>
            
           <div class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all <?php echo esc_attr($term_slug); ?>">
                <div class="gallery-block-one">
                    <div class="inner-box">
                        <figure class="image-box"><?php the_post_thumbnail('heritaste_570x570'); ?></figure>
                        <div class="content-box">
                            <div class="shape" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-22.png);"></div>
                            <div class="inner">
                                <div class="view-btn">
                                    <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><i class="flaticon-fullscreen"></i></a>
                                </div>
                                <h3><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            
			<?php endwhile;?>

            <?php wp_reset_postdata();
            $data_posts = ob_get_contents();
            ob_end_clean();
            
            ob_start();?>
            
            <?php $terms = get_terms(array('gallery_cat')); ?>
			
            <!-- gallery-three-columns -->
            <section class="gallery-three-columns sec-pad centred">
                <div class="auto-container">
                    <div class="sortable-masonry">
                        <div class="filters">
                            <ul class="filter-tabs filter-btns clearfix">
                                <li class="active filter" data-role="button" data-filter=".all"><?php esc_attr_e('View All', 'heritaste');?></li>
                                <?php foreach( $fliteration as $t ): ?>
                                <li class="filter" data-role="button" data-filter=".<?php echo esc_attr(heritaste_set( $t, 'slug' )); ?>"><?php echo heritaste_set( $t, 'name'); ?></li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                        <div class="items-container row clearfix">
                            <?php echo wp_kses($data_posts, true); ?>
                        </div>
                        <?php if($settings['show_pagination']) { ?>
                        <div class="pagination-wrapper centred">
                            <div class="pagination clearfix">
                                <?php heritaste_the_pagination2(array('total'=>$query->max_num_pages, 'next_text' => '<i class="flaticon-right-chevron"></i>', 'prev_text' => '<i class="flaticon-left-chevron"></i>')); ?>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
            <!-- gallery-three-columns end -->
        
        <?php }
		wp_reset_postdata();
	}

}
