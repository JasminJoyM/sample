<?php
$options = heritaste_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );

//Home Five Logo Settings
$shome_logo2 = $options->get( 'search_form_logo' );
$shome_logo_dimension2 = $options->get( 'search_form_logo_dimension' );

//Home Mobile Logo Settings
$home_mobile_logo1 = $options->get( 'home_mobile_logo' );
$home_mobile_logo_dimension1 = $options->get( 'home_mobile_logo_dimension' );

//Home Mobile Logo Settings
$home_logo2 = $options->get( 'home_two_logo' );
$home_logo_dimension2 = $options->get( 'home_two_logo_dimension' );

$logo_type = '';
$logo_text = '';
$logo_typography = ''; ?>

<div class="boxed_wrapper">
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
	<?php if( $options->get('show_seach_form_v6') ){?>
    <!--Search Popup-->
    <div id="search-popup" class="search-popup">
        <div class="popup-inner">
            <div class="upper-box clearfix">
                <figure class="logo-box pull-left"><?php echo heritaste_logo( $logo_type, $shome_logo2, $shome_logo_dimension2, $logo_text, $logo_typography ); ?></figure>
                <div class="close-search pull-right"><span class="far fa-times"></span></div>
            </div>
            <div class="overlay-layer"></div>
            <div class="auto-container">
                <div class="search-form">
                    <?php get_template_part('searchform1')?>
                </div>
            </div>
        </div>
    </div>
	<?php } ?>

    <!-- main header -->
    <header class="main-header header-style-six">
        <!-- header-lower -->
        <div class="header-lower">
            <div class="outer-box">
                <div class="menu-area">
                    <div class="logo-box">
                        <figure class="logo"><?php echo heritaste_logo( $logo_type, $home_logo2, $home_logo_dimension2, $logo_text, $logo_typography ); ?></figure>
                    </div>
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
                    <ul class="info">
                        <?php if( $options->get('show_seach_form_v6') ){?>
                        <li>
                            <div class="search-box-outer search-toggler">
                                <i class="flaticon-search"></i>
                            </div>
                        </li>
                        <?php } ?>
                        <?php 
							if( $options->get('show_cart_icon_v6') ){
							if( function_exists( 'WC' ) ): global $woocommerce;
							$cart_url = wc_get_cart_url();	
						?>
                        <li>
                            <a href="<?php echo esc_url($cart_url); ?>"><i class="flaticon-shopping-bag"></i></a>
                        </li>
                        <?php endif; } ?>
                        <?php if($options->get('btn_ulink_v6')){ ?>
                        <li class="user-box"> 
                            <a href="<?php echo esc_url($options->get('btn_ulink_v6')); ?>"><i class="far fa-user"></i></a>
                        </li>
                        <?php } ?>
                    </ul>
                    <?php if($options->get('btn_title_v6')){ ?>
                    <div class="link"><h6><i class="flaticon-desk-bell"></i><a href="<?php echo esc_url($options->get('btn_link_v6')); ?>"><?php echo wp_kses($options->get('btn_title_v6'), true); ?></a></h6></div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </header>
    <!-- main-header end -->


    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><i class="fas fa-times"></i></div>
        
        <nav class="menu-box">
            <div class="nav-logo"><?php echo heritaste_logo( $logo_type, $home_mobile_logo1, $home_mobile_logo_dimension1, $logo_text, $logo_typography ); ?></div>
            <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
            <div class="contact-info">
                <?php if($options->get('contact_title_v6')){ ?><h4><?php echo wp_kses($options->get('contact_title_v6'), true); ?></h4><?php } ?>
                <ul>
                    <?php if($options->get('address_v6')){ ?><li><?php echo wp_kses($options->get('address_v6'), true); ?></li><?php } ?>
                    <?php if($options->get('contact_no_v6')){ ?><li><a href="tel:<?php echo esc_attr($options->get('contact_no_v6')); ?>"><?php echo wp_kses($options->get('contact_no_v6'), true); ?></a></li><?php } ?>
                    <?php if($options->get('our_email6')){ ?><li><a href="mailto:<?php echo esc_attr($options->get('our_email6')); ?>"><?php echo wp_kses($options->get('our_email6'), true); ?></a></li><?php } ?>
                </ul>
            </div>
            <div class="social-links">
                <?php
					if( $options->get('show_msocial_share_v6') ):
					$icons = $options->get( 'mheader_social_share_v6' );
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

    
