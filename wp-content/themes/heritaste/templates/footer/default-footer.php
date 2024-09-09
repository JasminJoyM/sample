<?php
/**
 * Footer Template  File
 *
 * @package HERITASTE
 * @author  Template Path
 * @version 1.0
 */

$options = heritaste_WSH()->option();

$allowed_html = wp_kses_allowed_html( 'post' );

?>
    
    <!-- main-footer -->
    <section class="main-footer bg-color-2">
        <?php if ( is_active_sidebar( 'footer-sidebar' ) ) { ?>
        <div class="footer-top">
            <div class="auto-container">
                <div class="row clearfix">
                    <?php dynamic_sidebar( 'footer-sidebar' ); ?>
                </div>
            </div>
        </div>
        <?php } ?>
        <div class="footer-bottom">
            <div class="auto-container">
                <div class="bottom-inner">
                    <?php if($options->get( 'footer_v1_copyright_text' )){?>
                    <div class="copyright">
                        <p><?php echo wp_kses( $options->get( 'footer_v1_copyright_text'), $allowed_html ); ?></p>
                    </div>
                    <?php } ?>
                    <?php if($options->get( 'footer_menu_v1' )){?>
                    <ul class="footer-nav">
                        <?php echo wp_kses( $options->get( 'footer_menu_v1'), $allowed_html ); ?>
                    </ul>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- main-footer end -->