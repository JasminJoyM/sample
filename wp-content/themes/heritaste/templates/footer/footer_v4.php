<?php
/**
 * Footer Template  File
 *
 * @package HERITASTE
 * @author  Template Path
 * @version 1.0
 */

$options = heritaste_WSH()->option();

$footer_logo = $options->get( 'footer_logo4' );
$footer_logo = heritaste_set( $footer_logo, 'url', HERITASTE_URI . 'assets/images/footer-logo.png' );

$allowed_html = wp_kses_allowed_html( 'post' );

?>
    
    <!-- main-footer -->
    <section class="footer-style-three">
        <div class="footer-top">
            <div class="auto-container">
                <div class="top-inner">
                    <?php
						if($options->get( 'show_social_icons' )):
						$icons = $options->get( 'footer_v4_social_share' );
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
							<li><a href="<?php echo esc_url(heritaste_set( $header_social_icons, 'url' )); ?>" <?php if( heritaste_set( $header_social_icons, 'background' ) || heritaste_set( $header_social_icons, 'color' ) ):?>style="background-color:<?php echo esc_attr(heritaste_set( $header_social_icons, 'background' )); ?>; color: <?php echo esc_attr(heritaste_set( $header_social_icons, 'color' )); ?>"<?php endif;?>><span class="fab <?php echo esc_attr( heritaste_set( $header_social_icons, 'icon' ) ); ?>"></span></a></li>
						<?php endforeach; ?>
					 </ul>
					<?php endif; endif; ?>
                    <figure class="footer-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($footer_logo); ?>" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></a></figure>
                    <?php if($options->get( 'footer_v4_copyright_text' )){?>
                    <div class="copyright">
                        <h5><?php echo wp_kses( $options->get( 'footer_v4_copyright_text'), $allowed_html ); ?></h5>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php if ( is_active_sidebar( 'footer-sidebar4' ) ) { ?>
        <div class="widget-section centred">
            <div class="auto-container">
                <div class="row clearfix">
                    <?php dynamic_sidebar( 'footer-sidebar4' ); ?>
                </div>
            </div>
        </div>
        <?php } ?>
        <div class="footer-menu centred">
            <div class="auto-container">
                <ul class="menu-list">
                    <?php wp_nav_menu( array( 'theme_location' => 'footer_menu', 'container_id' => 'navbar-collapse-1',
						'container_class'=>'navbar-collapse collapse navbar-right',
						'menu_class'=>'nav navbar-nav',
						'fallback_cb'=>false,
						'items_wrap' => '%3$s',
						'container'=>false,
						'depth'=>'3',
						'walker'=> new Bootstrap_walker()
					) ); ?> 
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="auto-container">
                <div class="bottom-inner">
                    <?php if($options->get( 'footer_menu_v4' )){?>
                    <ul class="footer-nav">
                        <?php echo wp_kses( $options->get( 'footer_menu_v4'), $allowed_html ); ?>
                    </ul>
                    <?php } ?>
                    <?php if($options->get( 'footer_icons_v4' )){?>
                    <ul class="card-list">
                        <?php echo wp_kses( $options->get( 'footer_icons_v4'), $allowed_html ); ?>
                    </ul>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- main-footer end -->