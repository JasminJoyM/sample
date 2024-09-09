<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.6.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );
	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
	 $allowed_tags = wp_kses_allowed_html('post');
?>
<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="row clearfix">
        <div class="image-column col-xl-5 col-lg-6 col-md-12 col-sm-12">
            <div class="image-box">
            	<figure class="image">
                	<?php
                        /**
                         * woocommerce_before_single_product_summary hook.
                         *
                         * @hooked woocommerce_show_product_sale_flash - 10
                         * @hooked woocommerce_show_product_images - 20
                         */
                        do_action( 'woocommerce_before_single_product_summary' );
                    ?>
                </figure>
            </div>
        </div>
        <div class="content-column col-xl-7 col-lg-6 col-md-12 col-sm-12">
    
            <?php
                /**
                 * woocommerce_single_product_summary hook.
                 *
                 * @hooked woocommerce_template_single_title - 5
                 * @hooked woocommerce_template_single_rating - 10
                 * @hooked woocommerce_template_single_price - 10
                 * @hooked woocommerce_template_single_excerpt - 20
                 * @hooked woocommerce_template_single_add_to_cart - 30
                 * @hooked woocommerce_template_single_meta - 40
                 * @hooked woocommerce_template_single_sharing - 50
                 * @hooked WC_Structured_Data::generate_product_data() - 60
                 */
                do_action( 'woocommerce_single_product_summary' );
            ?>
            
            <div class="shop-details-content">
            	<?php woocommerce_template_single_price();?>
                <?php woocommerce_template_single_rating(); ?>
                
                <div class="text-content">
					<?php woocommerce_template_single_excerpt();?>
                </div>
                
                <div class="other-options clearfix">
					<?php woocommerce_template_single_add_to_cart();?>
                </div>
                <div class="button-group">
                    <?php woocommerce_template_single_meta();?>
                </div>
           	</div>        
        </div><!-- .summary -->
    </div>	
    
    <?php
		/**
		 * woocommerce_after_single_product_summary hook.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>
    
</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
