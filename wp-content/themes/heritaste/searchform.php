<?php
/**
 * Search Form template
 *
 * @package HERITASTE
 * @author Theme Kalia
 * @version 1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}
?>

<div class="search-widget">
    <div class="search-form">
        <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="post">
            <div class="form-group">
                <input type="search" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr__( 'Search ...', 'heritaste' ); ?>" required="">
                <button type="submit"><i class="flaticon-search"></i></button>
            </div>
        </form>
    </div>
</div>