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
class Our_Team_V4 extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'heritaste_our_team_v4';
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
		return esc_html__( 'Our Team V4', 'heritaste' );
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
			'our_team_v4',
			[
				'label' => esc_html__( 'Our Team V4', 'heritaste' ),
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
			'subtitle',
			[
				'label'       => __( 'Sub Title', 'heritaste' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'heritaste' ),
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
			'query_number',
			[
				'label'   => esc_html__( 'Number of post', 'heritaste' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 4,
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
			  'options' => get_team_categories()
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
			'post_type'      =>  'team',
			'posts_per_page' => heritaste_set( $settings, 'query_number' ),
			'orderby'        => heritaste_set( $settings, 'query_orderby' ),
			'order'          => heritaste_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		
		if( heritaste_set( $settings, 'query_category' ) ) $args['team_cat'] = heritaste_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );
		if ( $query->have_posts() ) 
		{ ?>
    
    <!-- team-section -->
    <section class="team-section <?php if($settings['style_two'] == 'two') echo 'alternat-2'; else echo 'team-page-1'; ?> sec-pad">
        <div class="auto-container">
            <?php if($settings['subtitle'] || $settings['title']) { ?>
            <div class="sec-title <?php if($settings['style_two'] == 'two') echo ''; else echo 'light'; ?> centred">
                <?php if($settings['subtitle']) { ?><span class="sub-title"><?php echo wp_kses($settings['subtitle'], true);?></span><?php } ?>
                <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
            </div>
            <?php } ?>
            <div class="row clearfix">
                <?php 
                    while ( $query->have_posts() ) : $query->the_post(); 
                ?>
                <div class="col-lg-4 col-md-6 col-sm-12 team-block">
                    <div class="team-block-one">
                        <div class="inner-box">
                            <div class="image-box">
                                <?php
                                    $icons = get_post_meta( get_the_id(), 'social_profile', true );
                                    if ( ! empty( $icons ) ) :
                                ?>
                                <ul class="social-links clearfix">
        
                                    <?php
                                        foreach ( $icons as $h_icon ) :
                                        $header_social_icons = json_decode( urldecode( heritaste_set( $h_icon, 'data' ) ) );
                                        if ( heritaste_set( $header_social_icons, 'enable' ) == '' ) {
                                            continue;
                                        }
                                        $icon_class = explode( '-', heritaste_set( $header_social_icons, 'icon' ) );
                                        ?>
                                        <li><a href="<?php echo esc_url(heritaste_set( $header_social_icons, 'url' )); ?>" <?php if( heritaste_set( $header_social_icons, 'background' ) || heritaste_set( $header_social_icons, 'color' ) ):?>style="background-color:<?php echo esc_attr(heritaste_set( $header_social_icons, 'background' )); ?>; color: <?php echo esc_attr(heritaste_set( $header_social_icons, 'color' )); ?>"<?php endif;?>><i class="fab <?php echo esc_attr( heritaste_set( $header_social_icons, 'icon' ) ); ?>"></i></a></li>
                                    <?php endforeach; ?>
                            
                                </ul>
                                <?php endif; ?>
                                <figure class="image"><?php the_post_thumbnail('heritaste_370x480'); ?></figure>
                            </div>
                            <div class="content-box">
                                <div class="shape" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-58.png);"></div>
                                <h3><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h3>
                                <span class="designation"><?php echo (get_post_meta( get_the_id(), 'designation', true ));?></span>
                                <div class="video-btn">
                                    <a href="<?php echo (get_post_meta( get_the_id(), 'video_link', true ));?>" class="video-icon" data-rel="lightcase:myCollection"><i class="flaticon-play"></i><?php esc_html_e('Favourite Recipe', 'heritaste'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
    <!-- team-section end -->
           	
	<?php }
    wp_reset_postdata();
	}
}