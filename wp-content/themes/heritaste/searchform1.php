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

<form method="post" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="form-group">
        <fieldset>
            <input type="search" class="form-control" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr__( 'Type your keyword and hit', 'heritaste' ); ?>" required >
            <button type="submit"><i class="far fa-search"></i></button>
        </fieldset>
    </div>
</form>