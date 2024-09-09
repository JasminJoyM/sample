<?php
/**
 * Blog Post Main File.
 *
 * @package HERITASTE
 * @author  Theme Kalia
 * @version 1.0
 */

get_header();
$options = heritaste_WSH()->option();

$data    = \HERITASTE\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
$layout = ( $layout ) ? $layout : 'right';
$sidebar = ( $sidebar ) ? $sidebar : 'default-sidebar';
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12 col-lg-12' : 'col-lg-8 col-md-12 col-sm-12';


if ( class_exists( '\Elementor\Plugin' ) && $data->get( 'tpl-type' ) == 'e') {
	
	while(have_posts()) {
	   the_post();
	   the_content();
    }

} else {
?>

<?php if ( $data->get( 'enable_banner' ) ) : ?>
	<?php do_action( 'heritaste_banner', $data );?>
<?php else:?>

<?php endif;?>

<!-- sidebar-page-container -->
<section class="sidebar-page-container blog-details">
    <div class="auto-container">
        <div class="row clearfix">
        	<?php
				if ( $data->get( 'layout' ) == 'left' ) {
					do_action( 'heritaste_sidebar', $data );
				}
			?>
            <div class="content-side <?php echo esc_attr( $class ); ?>">
            	
				<?php while ( have_posts() ) : the_post(); ?>
				
                <div class="blog-details-content">
                	
                    <div class="thm-unit-test">    
                        
                        <div class="news-block-one">
                            <div class="inner-box">
                                <div class="lower-content">
                                    <ul class="post-info clearfix">
                                        <?php if( $options->get( 'blog_post_date' ) ){ ?><li><?php echo wp_kses(get_the_date(), true); ?></li><?php } ?>
                                        <?php if( $options->get( 'blog_post_author' ) ){ ?><li><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta('ID') )); ?>"><?php esc_html_e('By', 'heritaste'); ?> <?php the_author(); ?></a></li><?php } ?>
                                        <?php if( $options->get( 'blog_post_comments' ) ){ ?><li><a href="<?php echo esc_url(get_permalink(get_the_id()).'#comments'); ?>"><?php comments_number( wp_kses(__('0 Comments' , 'heritaste'), true), wp_kses(__('1 Comment' , 'heritaste'), true), wp_kses(__('% Comments' , 'heritaste'), true)); ?></a></li><?php } ?>
                                    </ul> 
                                    <h2><?php the_title();?></h2>                                   
                                </div>
                                <?php if(has_post_thumbnail()){ ?>
                                <div class="image-box">
                                    <div class="category"><?php the_category(' '); ?></div>
                                    <figure class="image"><?php the_post_thumbnail('heritaste_1170x470'); ?></figure>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        
                        <div class="text"><?php the_content(); ?></div>
                        <div class="clearfix"></div>
                        <?php wp_link_pages(array('before'=>'<div class="paginate-links m-t30">'.esc_html__('Pages: ', 'heritaste'), 'after' => '</div>', 'link_before'=>'<span>', 'link_after'=>'</span>')); ?>
                        
                        <?php if(function_exists('bunch_share_us_two') || has_tag()):?>
                        <div class="post-share-option">
                            <?php if(has_tag()){ ?>
                            <div class="post-tags">
                                <h5><i class="flaticon-ribbon"></i><?php esc_html_e('Tags', 'heritaste'); ?></h5>
                                <ul class="tags-list clearfix">
                                   <?php the_tags( '<li>', '</li><li>', '</li>' ); ?>
                                </ul>
                            </div>
                            <?php } ?>
                            <div class="share-option text-right">
                                <h5><i class="flaticon-share"></i><?php esc_html_e('Share', 'heritaste'); ?></h5>
                                <?php if(function_exists('bunch_share_us_two')):?>
								<?php echo wp_kses(bunch_share_us_two(get_the_id(),$post->post_name ), true);?>
                        		<?php endif;?>
                            </div>
                        </div>
                        <?php endif;?>
                        
                        <?php if((get_previous_post()) || (get_next_post())): ?>
                        <div class="post-btn">
                            <?php global $post; $prev_post = get_previous_post();
								if (!empty($prev_post)):
								$post_thumbnail_id = get_post_thumbnail_id($prev_post->ID);
								$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
							?>
                            <div class="single-post-btn prev-btn text-left">
                                <?php if($post_thumbnail_url):?>
                                <figure class="btn-image" style="background-image:url(<?php echo esc_url($post_thumbnail_url); ?>); "></figure>
                                <?php endif; ?>
                                <div class="link-btn"><a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>"><i class="flaticon-left-chevron"></i></a></div>
                                <h6><a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>"><?php esc_html_e('Prev Post', 'heritaste'); ?></a></h6>
                                <h5><?php echo wp_kses_post($prev_post->post_title); ?></h5>
                            </div>
                            <?php endif; ?>
                            
                            <?php global $post; $next_post = get_next_post();
								if (!empty($next_post)):
								$post_thumbnail_ids = get_post_thumbnail_id($next_post->ID);
								$post_thumbnail_urls = wp_get_attachment_url( $post_thumbnail_ids );
							?>
                            <div class="single-post-btn next-btn text-right">
                                <?php if($post_thumbnail_urls):?>
                                <figure class="btn-image" style="background-image:url(<?php echo esc_url($post_thumbnail_urls); ?>); "></figure>
                                <?php endif; ?>
                                <div class="link-btn"><a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>"><i class="flaticon-right-chevron"></i></a></div>
                                <h6><a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>"><?php esc_html_e('Next Post', 'heritaste'); ?></a></h6>
                                <h5><?php echo wp_kses_post($next_post->post_title); ?></h5>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                        
                        <?php if( $options->get( 'single_post_author_box' ) ):?>
                        <div class="author-box">
                            <?php if($avatar = get_avatar(get_the_author_meta('ID')) !== FALSE): ?>
                            <div class="shape" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-69.png);"></div>
                            <figure class="image-box"><?php echo get_avatar(get_the_author_meta('ID'), 140); ?></figure>
                            <?php endif; ?>
                            <div class="content-box">
                                <h6><?php esc_html_e('Written By', 'heritaste'); ?></h6>
                                <h3><?php the_author(); ?></h3>
                                <p><?php the_author_meta( 'description', get_the_author_meta('ID') ); ?></p>
                                <?php if( $options->get( 'single_post_author_links' ) ):?>
								<?php $icons = $options->get( 'single_post_author_social_share' );
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
								<?php endif; endif; ?>
                            </div>
                        </div>
                        <?php endif;?>                      
                                                
                        <!--End post-details-->
                        <?php comments_template(); ?>
                    
                	</div>
					<!--End thm-unit-test-->
                </div>
                <!--End blog-content-->
				<?php endwhile; ?>
                
            </div>
        	<?php
				if ( $data->get( 'layout' ) == 'right' ) {
					do_action( 'heritaste_sidebar', $data );
				}
			?>
        </div>
    </div>
</section>
<!--End blog area--> 

<?php
}
get_footer();
