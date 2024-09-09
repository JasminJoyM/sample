<?php
return array(
	'title'      => 'Heritaste Setting',
	'id'         => 'heritaste_meta',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'page', 'post', 'team', 'gallery', 'menu', 'product', 'service' ),
	'sections'   => array(
		require_once HERITASTEPLUGIN_PLUGIN_PATH . '/metabox/header.php',
		require_once HERITASTEPLUGIN_PLUGIN_PATH . '/metabox/banner.php',
		require_once HERITASTEPLUGIN_PLUGIN_PATH . '/metabox/sidebar.php',
		require_once HERITASTEPLUGIN_PLUGIN_PATH . '/metabox/footer.php',
	),
);