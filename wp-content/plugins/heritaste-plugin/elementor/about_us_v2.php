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
class About_Us_V2 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'heritaste_about_us_v2';
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
        return esc_html__( 'About Us V2', 'heritaste' );
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
            'about_us_v2',
            [
                'label' => esc_html__( 'About Us V2', 'heritaste' ),
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
			'about_image',
			[
				'label' => __( 'About Image', 'heritaste' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'about_image_1',
			[
				'label' => __( 'About Image One', 'heritaste' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'year',
			[
				'label'       => __( 'Started Year', 'heritaste' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Starting Year', 'heritaste' ),
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
			'text_title',
			[
				'label'       => __( 'Text Title', 'heritaste' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text Title', 'heritaste' ),
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
				'placeholder' => __( 'Enter your Text', 'heritaste' ),
			]
		);
		$this->add_control(
			'features_list',
			[
				'label'       => __( 'Feature List', 'kidum' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Feature List', 'kidum' ),
			]
		);
		$this->add_control(
			'sign_image',
			[
				'label' => __( 'Signature Image', 'heritaste' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'author_name',
			[
				'label'       => __( 'Author Name', 'heritaste' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Author Name', 'heritaste' ),
			]
		);
		$this->add_control(
			'designation',
			[
				'label'       => __( 'Designation', 'heritaste' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text Designation', 'heritaste' ),
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
    ?>
	
    <!-- about-style-two -->
    <section class="about-style-two <?php if($settings['style_two'] == 'two') echo 'about-page'; else echo ''; ?>">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                    <div class="image-block-three">
                        <?php if($settings['about_image']['id'] || $settings['about_image_1']['id']){ ?>
                        <div class="image-box">
                        	<?php if($settings['style_two'] == 'two'): ?>
                            <div class="image-shape" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-53.png);"></div>
                            <?php else :?>
                            <div class="image-shape" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-16.png);"></div>
                            <?php endif; ?>
							<?php if($settings['about_image']['id']){ ?><figure class="image image-1"><img src="<?php echo esc_url(wp_get_attachment_url($settings['about_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></figure><?php } ?>
                            <?php if($settings['about_image_1']['id']){ ?><figure class="image image-2"><img src="<?php echo esc_url(wp_get_attachment_url($settings['about_image_1']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></figure><?php } ?>
                            <?php if($settings['year']) { ?>
                            <div class="text">
                            	<?php if($settings['style_two'] == 'two'): ?>
                                <div class="text-shape" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-54.png);"></div>
                                <?php else :?>
                                <div class="text-shape" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-17.png);"></div>
                                <?php endif; ?>
                                <span class="special-font"><?php echo wp_kses($settings['year'], true);?></span>
                            </div>
                            <?php } ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div class="content-block-three">
                        <div class="content-box">
                            <?php if($settings['subtitle']|| $settings['title']) { ?>
                            <div class="sec-title <?php if($settings['style_two'] == 'two') echo ''; else echo 'light'; ?>">
                                <?php if($settings['subtitle']) { ?><span class="sub-title"><?php echo wp_kses($settings['subtitle'], true);?></span><?php } ?>
                                <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                            </div>
                            <?php } ?>
                            <div class="inner-box">
                                <?php if($settings['style_two'] == 'two'): ?>
                                <div class="shape" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-55.png);"></div>
                                <?php else :?>
                                <div class="shape" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-18.png);"></div>
                                <?php endif; ?>
								<?php if($settings['text_title']|| $settings['text']) { ?>
                                <div class="text">
                                    <?php if($settings['text_title']) { ?><h5><?php echo wp_kses($settings['text_title'], true);?></h5><?php } ?>
                                    <?php if($settings['text']) { ?><p><?php echo wp_kses($settings['text'], true);?></p><?php } ?>
                                </div>
                                <?php } ?>
                                <?php $features_list = $settings['features_list'];
                                    if(!empty($features_list)){
                                    $features_list = explode("\n", ($features_list)); 
                                ?>
                                <ul class="list-item clearfix">
									 <?php foreach($features_list as $features): ?>
                                     <li><?php echo wp_kses($features, true); ?></li>
                                     <?php endforeach; ?>
                                </ul>
                                <?php } ?>
                                <div class="author-box">
                                    <?php if($settings['sign_image']['id']){ ?><figure class="signature"><img src="<?php echo esc_url(wp_get_attachment_url($settings['sign_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></figure><?php } ?>
                                    <?php if($settings['author_name']|| $settings['designation']) { ?>
                                    <div class="author-info">
                                        <?php if($settings['author_name']) { ?><h3><?php echo wp_kses($settings['author_name'], true);?></h3><?php } ?>
                                        <?php if($settings['designation']) { ?><h6><?php echo wp_kses($settings['designation'], true);?></h6><?php } ?>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-style-two end -->       
        
        <?php
    }
}
