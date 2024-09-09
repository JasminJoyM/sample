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
    <section class="footer-style-two">
        <div class="footer-top">
            <div class="auto-container">
                <div class="top-inner">
                    <?php if($options->get( 'footer_upper_title_v3' ) || $options->get( 'footer_upper_text_v3' )){?>
                    <div class="text">
                        <div class="icon-box"><i class="flaticon-eating"></i></div>                        
                    	<?php if($options->get( 'footer_upper_title_v3' )){?><h2><?php echo wp_kses($options->get('footer_upper_title_v3'), true); ?></h2><?php } ?>
                        <?php if($options->get( 'footer_upper_text_v3' )){?><p><?php echo wp_kses($options->get('footer_upper_text_v3'), true); ?></p><?php } ?>
                    </div>                    
                    <div class="scroll-btn scroll-to-target" data-target=".main-header">
                        <i class="flaticon-up-chevron"></i>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php if ( is_active_sidebar( 'footer-sidebar3' ) ) { ?>
        <div class="widget-section">
            <div class="auto-container">
                <div class="row clearfix">
                    <?php dynamic_sidebar( 'footer-sidebar3' ); ?>
                </div>
            </div>
        </div>
		<?php } ?>
        <div class="footer-bottom">
            <div class="auto-container">
                <div class="bottom-inner">
                    <?php if($options->get( 'footer_v3_copyright_text' )){?>
                    <div class="copyright">
                        <p><?php echo wp_kses( $options->get( 'footer_v3_copyright_text'), $allowed_html ); ?></p>
                    </div>
                    <?php } ?>
                    <?php if($options->get( 'footer_menu_v3' )){?>
                    <ul class="footer-nav">
                        <?php echo wp_kses( $options->get( 'footer_menu_v3'), $allowed_html ); ?>
                    </ul>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- main-footer end -->
    