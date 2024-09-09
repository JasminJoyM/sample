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
    <section class="main-footer">
        <div class="auto-container">
            <?php if ( is_active_sidebar( 'footer-sidebar2' ) ) { ?>
            <div class="footer-top-two">
                <div class="row clearfix">
                    <?php dynamic_sidebar( 'footer-sidebar2' ); ?>
                </div>
            </div>
            <?php } ?>
            <div class="footer-bottom">
                <div class="bottom-inner">
                    <?php if($options->get( 'footer_menu_v2' )){?>
                    <ul class="footer-nav">
                        <?php echo wp_kses( $options->get( 'footer_menu_v2'), $allowed_html ); ?>
                    </ul>
                    <?php } ?>
                    <div class="scroll-btn scroll-to-target" data-target=".main-header">
                        <h6><i class="far fa-arrow-up"></i>Back to Top</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- main-footer end -->