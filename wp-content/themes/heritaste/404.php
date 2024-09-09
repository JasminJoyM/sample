<?php
/**
 * 404 page file
 *
 * @package    WordPress
 * @subpackage Heritaste
 * @author     Template Path <admin@template_path.com>
 * @version    1.0
 */

$allowed_html = wp_kses_allowed_html( 'post' );

$error_image = $options->get( 'error_image' );
$error_image = heritaste_set( $error_image, 'url', HERITASTE_URI . 'assets/images/resource/error-1.jpg' );

$error_image2 = $options->get( 'error_image2' );
$error_image2 = heritaste_set( $error_image2, 'url', HERITASTE_URI . 'assets/images/resource/error-2.jpg' );

?>
<?php get_header();
$data = \HERITASTE\Includes\Classes\Common::instance()->data( '404' )->get();
$options = heritaste_WSH()->option();
if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'tpl-type' ) == 'e' AND $data->get( 'tpl-elementor' ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'tpl-elementor' ) );
} else {
?>

<?php if ( $data->get( 'enable_banner' ) ) : ?>
	<?php do_action( 'heritaste_banner', $data );?>
<?php else:?>

<?php endif;?>    
    
    
    <!-- error-section -->
    <section class="error-section centred">
        <div class="pattern-layer">
            <div class="pattern-1" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-60.png);"></div>
            <div class="pattern-2 float-bob-x" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-61.png);"></div>
        </div>
        <div class="image-layer">
            <figure class="image-1"><img src="<?php echo esc_url($error_image); ?>" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></figure>
            <figure class="image-2"><img src="<?php echo esc_url($error_image2); ?>" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></figure>
        </div>
        <div class="auto-container">
            <div class="content-box">
                <h1>
					<?php 
						if( $options->get( '404_page_title' ) ){
							echo wp_kses( $options->get( '404_page_title' ), true );
						}else{
							esc_html_e( '404', 'heritaste' );
						}
					?>
                </h1>
                <h1 class="hidden-text">
               		<?php 
						if( $options->get( '404_page_title' ) ){
							echo wp_kses( $options->get( '404_page_title' ), true );
						}else{
							esc_html_e( '404', 'heritaste' );
						}
					?>
                </h1>
                <span class="special-text">
                	<?php 
						if( $options->get( '404_page_title2' ) ){
							echo wp_kses( $options->get( '404_page_title2' ), true );
						}else{
							esc_html_e( 'ooops!', 'heritaste' );
						}
					?>
                </span>
                <h2>
                	<?php if( $options->get( '404_page_text' ) ):?>
                            <?php echo wp_kses( $options->get( '404_page_text' ), true );?>
                    <?php else:?>
                            <?php esc_html_e( 'This page could not be found!', 'heritaste' );?>
                        	<br>
                            <?php esc_html_e( 'the page is doesn’t exist or deleted', 'heritaste' );?>
                    <?php endif;?>                
                </h2>
                <p>
                	<?php if( $options->get( '404_page_text2' ) ):?>
                            <?php echo wp_kses( $options->get( '404_page_text2' ), true );?>
                    <?php else:?>
                            <?php esc_html_e( 'Checkout that you typed the address correctly or search to find something specific.', 'heritaste' );?>
                    <?php endif;?>                
                </p>
                <div class="search-form">
                    <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="post">
                        <div class="form-group">
                            <input type="search" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr__( 'Search ...', 'heritaste' ); ?>" required="">
                            <button type="submit"><i class="flaticon-search"></i></button>
                        </div>
                    </form>
                </div>
                <?php if ( $options->get( 'back_home_btn', true ) ) : ?>
                <div class="btn-box">
                	
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="theme-btn-two">
                        <?php 
                            if( $options->get( 'back_home_btn_label' ) ){
                                echo wp_kses( $options->get( 'back_home_btn_label' ), true );
                            }else{
                                esc_html_e( 'Home Page', 'heritaste' );
                            }
                        ?>
                    </a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- error-section end --> 
    
        
<?php
}
get_footer(); ?>
