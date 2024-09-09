<?php

/**
 * Blog Content Template
 *
 * @package    WordPress
 * @subpackage HERITASTE
 * @author     Theme Kalia
 * @version    1.0
 */

if (class_exists('Erdunt_Resizer')) {
    $img_obj = new Erdunt_Resizer();
} else {
    $img_obj = array();
}
$options = heritaste_WSH()->option();
$allowed_tags = wp_kses_allowed_html('post');

global $post;
$post_thumbnail_id = get_post_thumbnail_id($post->ID);
$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);

?>


<div <?php post_class(); ?>>
    
    <div class="news-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
        <div class="inner-box">
            <div class="lower-content">
                <ul class="post-info clearfix">
                    <?php if( $options->get( 'blog_post_date' ) ){ ?><li><?php echo wp_kses(get_the_date(), true); ?></li><?php } ?>
                    <?php if( $options->get( 'blog_post_author' ) ){ ?><li><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta('ID') )); ?>"><?php esc_html_e('By', 'heritaste'); ?> <?php the_author(); ?></a></li><?php } ?>
                    <?php if( $options->get( 'blog_post_comments' ) ){ ?><li><a href="<?php echo esc_url(get_permalink(get_the_id()).'#comments'); ?>"><?php comments_number( wp_kses(__('0 Comments' , 'heritaste'), true), wp_kses(__('1 Comment' , 'heritaste'), true), wp_kses(__('% Comments' , 'heritaste'), true)); ?></a></li><?php } ?>
                </ul>
                <h2><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h2>
            </div>
            <?php if(has_post_thumbnail()){ ?>
            <div class="image-box">
                <div class="category"><?php the_category(' '); ?></div>
                <figure class="image"><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_post_thumbnail('heritaste_1170x470'); ?></a></figure>
            </div>
            <?php } ?>
            <div class="text">
                <?php the_excerpt(); ?>
                <div class="btn-box">
                    <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>" class="theme-btn-one"><span><?php esc_html_e('Read More', 'heritaste'); ?></span></a>
                </div>
            </div>
        </div>
    </div>   
    
</div>