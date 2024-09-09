<?php
$options = heritaste_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );

//Home Five Logo Settings
$shome_logo7 = $options->get( 'search_form_logo7' );
$shome_logo_dimension7 = $options->get( 'search_form_logo_dimension7' );

//Home Mobile Logo Settings
$home_mobile_logo1 = $options->get( 'home_mobile_logo' );
$home_mobile_logo_dimension1 = $options->get( 'home_mobile_logo_dimension' );

$logo_type = '';
$logo_text = '';
$logo_typography = ''; ?>

<div class="boxed_wrapper home_7">

	<?php if( $options->get( 'theme_preloader' ) ):?>
    <!-- preloader -->
    <div class="loader-wrap">
        <div class="preloader">
            <div class="preloader-close">x</div>
            <div id="handle-preloader" class="handle-preloader">
                <div class="layer layer-one"><span class="overlay"></span></div>
                <div class="layer layer-two"><span class="overlay"></span></div>        
                <div class="layer layer-three"><span class="overlay"></span></div> 
                <div class="animation-preloader">
                    <div class="spinner"></div>
                    <div class="txt-loading">
                        <?php echo wp_kses($options->get('preloader_text'), true); ?>
                    </div>
                </div>  
            </div>
        </div>
    </div>
    <!-- preloader end -->
	<?php endif; ?>

    <!-- home7-top -->
    <section class="home7-top">
        <figure class="logo"><?php echo heritaste_logo( $logo_type, $shome_logo7, $shome_logo_dimension7, $logo_text, $logo_typography ); ?></figure>
        <div class="outer-container">
            <div class="left-column">
                <ul class="info">
                    <?php if($options->get('address_v7')){ ?><li><?php echo wp_kses($options->get('address_v7'), true); ?></li><?php } ?>
                    <?php if($options->get('whours_v7')){ ?><li><?php echo wp_kses($options->get('whours_v7'), true); ?></li><?php } ?>
                    <?php if($options->get('phone_no_v7')){ ?><li><strong><?php esc_html_e('Phone', 'heritaste'); ?></strong> : <a href="tel:<?php echo esc_attr($options->get('phone_no_v7')); ?>"><?php echo wp_kses($options->get('phone_no_v7'), true); ?></a></li><?php } ?>
                </ul>
            </div>
            <div class="menu-area">
                <div class="mobile-nav-toggler">
                    <i class="icon-bar"></i>
                    <i class="icon-bar"></i>
                    <i class="icon-bar"></i>
                </div>
            </div>
            <?php if( $options->get('show_search_form_v7') ){?>
            <div class="right-column">
                <div class="search-inner">
                    <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="post">
                        <div class="form-group">
                            <input type="search" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr__( 'Enter Keyword...', 'heritaste' ); ?>" required="">
                            <button type="submit"><i class="flaticon-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>
    <!-- home7-top end -->


    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><i class="fas fa-times"></i></div>
        
        <nav class="menu-box">
            <div class="nav-logo"><?php echo heritaste_logo( $logo_type, $home_mobile_logo1, $home_mobile_logo_dimension1, $logo_text, $logo_typography ); ?></div>
            <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
            <div class="contact-info">
                <?php if($options->get('contact_title_v7')){ ?><h4><?php echo wp_kses($options->get('contact_title_v7'), true); ?></h4><?php } ?>
                <ul>
                    <?php if($options->get('mobile_address_v7')){ ?><li><?php echo wp_kses($options->get('mobile_address_v7'), true); ?></li><?php } ?>
                    <?php if($options->get('contact_no_v7')){ ?><li><a href="tel:<?php echo esc_attr($options->get('contact_no_v7')); ?>"><?php echo wp_kses($options->get('contact_no_v7'), true); ?></a></li><?php } ?>
                    <?php if($options->get('our_email7')){ ?><li><a href="mailto:<?php echo esc_attr($options->get('our_email7')); ?>"><?php echo wp_kses($options->get('our_email7'), true); ?></a></li><?php } ?>
                </ul>
            </div>
            <div class="social-links">
                <?php
					if( $options->get('show_msocial_share_v7') ):
					$icons = $options->get( 'mheader_social_share_v7' );
					if ( ! empty( $icons ) ) :
				?>
				<ul class="clearfix">
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
        </nav>
    </div><!-- End Mobile Menu -->


    <!-- banner-section -->
    <section class="banner-style-seven centred">
        <?php echo do_shortcode( $options->get('slider_code') );?>
        <?php
			if( $options->get('show_social_share_v7') ):
			$icons = $options->get( 'header_social_share_v7' );
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
        <?php if($options->get('since_v7')){ ?><div class="text"><h6><?php echo wp_kses($options->get('since_v7'), true); ?></h6></div><?php } ?>
        <?php if($options->get('right_text_v7')){ ?><div class="link-text"><a href="<?php echo esc_url($options->get('text_link_v7')); ?>"><?php echo wp_kses($options->get('right_text_v7'), true); ?></a></div><?php } ?>
    </section>
    <!-- banner-section end -->


    <!-- main header -->
    <header class="main-header header-style-seven">
        <!-- header-lower -->
        <div class="header-lower">
            <div class="outer-box">
                <div class="menu-area">
                    <!--Mobile Navigation Toggler-->
                    <div class="mobile-nav-toggler">
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                    </div>
                    <nav class="main-menu navbar-expand-md navbar-light">
                        <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                <?php wp_nav_menu( array( 'theme_location' => 'main_menu', 'container_id' => 'navbar-collapse-1',
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
                    </nav>
                </div>
                <div class="menu-right">
                    <?php 
						if( $options->get('show_cart_v7') ){
						if( function_exists( 'WC' ) ): global $woocommerce;
						$cart_url = wc_get_cart_url();	
					?>
                    <div class="cart-box">
                        <p><a href="<?php echo esc_url($cart_url); ?>"><i class="flaticon-shopping-bag"></i><?php esc_html_e('Cart', 'heritaste'); ?> (<?php echo wp_kses( $woocommerce->cart->cart_contents_count, true )?>)</a></p>
                    </div>
                    <?php endif; } ?>
                    <?php if($options->get('btn_title_v7') || $options->get('btn_title2_v7')){ ?>
                    <div class="user-box">
                        <p><i class="far fa-user"></i><a href="<?php echo esc_url($options->get('btn_link_v7')); ?>"><?php echo wp_kses($options->get('btn_title_v7'), true); ?></a> / <a href="<?php echo esc_url($options->get('btn_link2_v7')); ?>"><?php echo wp_kses($options->get('btn_title2_v7'), true); ?></a></p>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </header>
    <!-- main-header end -->


    
