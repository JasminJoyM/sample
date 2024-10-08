<?php
/**
 * Merlin WP configuration file.
 *
 * @package   Merlin WP
 * @version   @@pkg.version
 * @link      https://merlinwp.com/
 * @author    Rich Tabor, from ThemeBeans.com & the team at ProteusThemes.com
 * @copyright Copyright (c) 2018, Merlin WP of Inventionn LLC
 * @license   Licensed GPLv3 for Open Source Use
 */

if ( ! class_exists( 'Merlin' ) ) {
	return;
}

defined('THEMEKALIA_IMPORT_VENDOR_PATH') || define('THEMEKALIA_IMPORT_VENDOR_PATH', get_template_directory() . '/demo-import/vendor/');

require_once THEMEKALIA_IMPORT_VENDOR_PATH . 'autoload.php';

if ( ! class_exists( '\WP_Importer' ) ) {
	require ABSPATH . '/wp-admin/includes/class-wp-importer.php';
}
require_once get_template_directory() . '/demo-import/importer/WPImporterLogger.php';
require_once get_template_directory() . '/demo-import/importer/WPImporterLoggerCLI.php';
require_once get_template_directory() . '/demo-import/importer/WXRImportInfo.php';
require_once get_template_directory() . '/demo-import/importer/WXRImporter.php';
require_once get_template_directory() . '/demo-import/importer/Importer.php';
/**
 * Set directory locations, text strings, and settings.
 */
$wizard = new Merlin(

	$config = array(
		'directory'            => 'demo-import',
		// Location / directory where Merlin WP is placed in your theme.
		'merlin_url'           => 'demo-import',
		// The wp-admin page slug where Merlin WP loads.
		'parent_slug'          => 'themes.php',
		// The wp-admin parent page slug for the admin menu item.
		'capability'           => 'manage_options',
		// The capability required for this menu to be displayed to the user.
		'child_action_btn_url' => 'https://codex.wordpress.org/child_themes',
		// URL for the 'child-action-link'.
		'dev_mode'             => true,
		// Enable development mode for testing.
		'license_step'         => false,
		// EDD license activation step.
		'license_required'     => false,
		// Require the license activation step.
		'license_help_url'     => '',
		// URL for the 'license-tooltip'.
		'edd_remote_api_url'   => '',
		// EDD_Theme_Updater_Admin remote_api_url.
		'edd_item_name'        => 'Heritaste',
		// EDD_Theme_Updater_Admin item_name.
		'edd_theme_slug'       => 'heritaste',
		// EDD_Theme_Updater_Admin item_slug.
		'ready_big_button_url' => home_url( '/' ),
		// Link for the big button on the ready step.
	),
	$strings = array(
		'admin-menu'          => esc_html__( 'ThemeKalia Import', 'heritaste' ),

		/* translators: 1: Title Tag 2: Theme Name 3: Closing Title Tag */
		'title%s%s%s%s'       => esc_html__( '%1$s%2$s Themes &lsaquo; Theme Setup: %3$s%4$s', 'heritaste' ),
		'return-to-dashboard' => esc_html__( 'Return to the dashboard', 'heritaste' ),
		'ignore'              => esc_html__( 'Disable this wizard', 'heritaste' ),

		'btn-skip'                 => esc_html__( 'Skip', 'heritaste' ),
		'btn-next'                 => esc_html__( 'Next', 'heritaste' ),
		'btn-start'                => esc_html__( 'Start', 'heritaste' ),
		'btn-no'                   => esc_html__( 'Cancel', 'heritaste' ),
		'btn-plugins-install'      => esc_html__( 'Install', 'heritaste' ),
		'btn-child-install'        => esc_html__( 'Install', 'heritaste' ),
		'btn-content-install'      => esc_html__( 'Install', 'heritaste' ),
		'btn-import'               => esc_html__( 'Import', 'heritaste' ),
		'btn-license-activate'     => esc_html__( 'Activate', 'heritaste' ),
		'btn-license-skip'         => esc_html__( 'Later', 'heritaste' ),

		/* translators: Theme Name */
		'license-header%s'         => esc_html__( 'Activate %s', 'heritaste' ),
		/* translators: Theme Name */
		'license-header-success%s' => esc_html__( '%s is Activated', 'heritaste' ),
		/* translators: Theme Name */
		'license%s'                => esc_html__( 'Enter your license key to enable remote updates and theme support.', 'heritaste' ),
		'license-label'            => esc_html__( 'License key', 'heritaste' ),
		'license-success%s'        => esc_html__( 'The theme is already registered, so you can go to the next step!', 'heritaste' ),
		'license-json-success%s'   => esc_html__( 'Your theme is activated! Remote updates and theme support are enabled.', 'heritaste' ),
		'license-tooltip'          => esc_html__( 'Need help?', 'heritaste' ),

		/* translators: Theme Name */
		'welcome-header%s'         => esc_html__( 'Welcome to %s', 'heritaste' ),
		'welcome-header-success%s' => esc_html__( 'Hi. Welcome back', 'heritaste' ),
		'welcome%s'                => esc_html__( 'This wizard will set up your theme, install plugins, and import content. It is optional & should take only a few minutes.', 'heritaste' ),
		'welcome-success%s'        => esc_html__( 'You may have already run this theme setup wizard. If you would like to proceed anyway, click on the "Start" button below.', 'heritaste' ),

		'child-header'         => esc_html__( 'Install Child Theme', 'heritaste' ),
		'child-header-success' => esc_html__( 'You\'re good to go!', 'heritaste' ),
		'child'                => esc_html__( 'Let\'s build & activate a child theme so you may easily make theme changes.', 'heritaste' ),
		'child-success%s'      => esc_html__( 'Your child theme has already been installed and is now activated, if it wasn\'t already.', 'heritaste' ),
		'child-action-link'    => esc_html__( 'Learn about child themes', 'heritaste' ),
		'child-json-success%s' => esc_html__( 'Awesome. Your child theme has already been installed and is now activated.', 'heritaste' ),
		'child-json-already%s' => esc_html__( 'Awesome. Your child theme has been created and is now activated.', 'heritaste' ),

		'plugins-header'         => esc_html__( 'Install Plugins', 'heritaste' ),
		'plugins-header-success' => esc_html__( 'You\'re up to speed!', 'heritaste' ),
		'plugins'                => esc_html__( 'Let\'s install some essential WordPress plugins to get your site up to speed.', 'heritaste' ),
		'plugins-success%s'      => esc_html__( 'The required WordPress plugins are all installed and up to date. Press "Next" to continue the setup wizard.', 'heritaste' ),
		'plugins-action-link'    => esc_html__( 'Advanced', 'heritaste' ),

		'import-header'      => esc_html__( 'Import Content', 'heritaste' ),
		'import'             => esc_html__( 'Let\'s import content to your website, to help you get familiar with the theme.', 'heritaste' ),
		'import-action-link' => esc_html__( 'Advanced', 'heritaste' ),

		'ready-header'      => esc_html__( 'All done. Have fun!', 'heritaste' ),

		/* translators: Theme Author */
		'ready%s'           => esc_html__( 'Your theme has been all set up. Enjoy your new theme by %s.', 'heritaste' ),
		'ready-action-link' => esc_html__( 'Extras', 'heritaste' ),
		'ready-big-button'  => esc_html__( 'View your website', 'heritaste' ),
		'ready-link-1'      => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', 'https://themeforest.net/user/themekalia/', esc_html__( '5 Star For Project Heritaste', 'heritaste' ) ),
		'ready-link-2'      => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', 'https://themekalia.com/support', esc_html__( 'Get Heritaste Theme Support', 'heritaste' ) ),
	)
);
