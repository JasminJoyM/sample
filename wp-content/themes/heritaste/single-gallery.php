<?php get_header();
$data = \HERITASTE\Includes\Classes\Common::instance()->data('single-gallery')->get(); ?>

<!-- Page Title -->
<section class="page-title">
    <div class="bg-layer" style="background-image: url('<?php echo esc_url( $data->get( 'banner' ) ); ?>');"></div>
    <div class="auto-container">
        <div class="content-box">
            <h1><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( the_title( ) ); ?></h1>
            <ul class="bread-crumb clearfix">
                <?php echo heritaste_the_breadcrumb(); ?>
            </ul>
        </div>
    </div>
</section>
<!-- End Page Title -->

<?php while (have_posts()) : the_post(); ?>

<!--
=====================================================
    Team Details
=====================================================
-->
<!-- gallery-details -->
<section class="gallery-details">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                <div class="project-sidebar">
                    <h2><?php esc_html_e( 'Project Information', 'heritaste' ); ?></h2>
                    <ul class="info-list clearfix">
                        <li>
                            <h6><?php esc_html_e( 'Client:', 'heritaste' ); ?></h6>
                            <p><?php echo (get_post_meta( get_the_id(), 'client', true ));?></p>
                        </li>
                        <li>
                            <h6><?php esc_html_e( 'Chef Team:', 'heritaste' ); ?></h6>
                            <p><?php echo (get_post_meta( get_the_id(), 'team_members', true ));?></p>
                        </li>
                        <li>
                            <h6><?php esc_html_e( 'Event:', 'heritaste' ); ?></h6>
                            <p><?php echo (get_post_meta( get_the_id(), 'new_product', true ));?></p>
                        </li>
                        <li>
                            <h6><?php esc_html_e( 'Date:', 'heritaste' ); ?></h6>
                            <p><?php echo (get_post_meta( get_the_id(), 'date', true ));?></p>
                        </li>
                        <li>
                            <h6><?php esc_html_e( 'Location:', 'heritaste' ); ?></h6>
                            <p><?php echo (get_post_meta( get_the_id(), 'location', true ));?></p>
                        </li>
                    </ul>
                    <?php 
						$icons = get_post_meta( get_the_id(), 'social_profile2', true );
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
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                <div class="project-details-content">
                    <?php the_content();?>
                </div>
            </div>
        </div>
    </div>
    <?php if((get_previous_post()) || (get_next_post())): ?>
    <div class="project-nav-btn">
        <div class="auto-container">
            <div class="btn-inner">
                <?php global $post; $prev_post = get_previous_post();
					if (!empty($prev_post)):
					$post_thumbnail_id = get_post_thumbnail_id($prev_post->ID);
					$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
				?>
                <div class="single-btn prev-btn">
                    <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>"><i class="flaticon-left-chevron"></i><i class="flaticon-left-chevron"></i><span><?php esc_html_e('Prev', 'heritaste'); ?></span></a>
                </div>
                <?php endif; ?>
                
                <?php global $post; $next_post = get_next_post();
					if (!empty($next_post)):
					$post_thumbnail_ids = get_post_thumbnail_id($next_post->ID);
					$post_thumbnail_urls = wp_get_attachment_url( $post_thumbnail_ids );
				?>
                <div class="icon-box"><i class="flaticon-menu"></i></div>
                <div class="single-btn next-btn">
                    <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>"><span><?php esc_html_e('Next', 'heritaste'); ?></span><i class="flaticon-right-chevron"></i><i class="flaticon-right-chevron"></i></a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
</section>
<!-- gallery-details end -->

<?php endwhile; ?>

<?php get_footer(); ?>