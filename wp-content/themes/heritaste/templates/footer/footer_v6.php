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
    
    <!-- contact-info-section -->
    <div class="contact-info-section">
        <div class="outer-container clearfix">
            <?php if($options->get( 'footer_address_v6' )){?>
            <div class="single-item">
                <p><?php echo wp_kses($options->get('footer_address_v6'), true); ?></p>
            </div>
            <?php } ?>
            <?php if($options->get( 'footer_working_v6' )){?>
            <div class="single-item">
                <p><?php echo wp_kses($options->get('footer_working_v6'), true); ?></p>
            </div>
            <?php } ?>
            <?php if($options->get( 'footer_phone_v6' )){?>
            <div class="single-item">
                <p><?php echo wp_kses($options->get('footer_phone_v6'), true); ?></p>
            </div>
            <?php } ?>
            <?php if($options->get( 'footer_email_v6' )){?>
            <div class="single-item">
                <p><?php echo wp_kses($options->get('footer_email_v6'), true); ?></p>
            </div>
            <?php } ?>
            <div class="single-item">
                <?php
					if( $options->get('show_social_share_v6') ):
					$icons = $options->get( 'header_social_share_v6' );
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
            </div>
        </div>
    </div>
    <!-- contact-info-section end -->
    