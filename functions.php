<?php
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

include 'theme-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://gitlab.com/jguiles-wordpress-themes/divi-child-theme',
	__FILE__, //Full path to the main plugin file or functions.php.
	'divi-child-theme'
);

//Optional: Set the branch that contains the stable release.
$myUpdateChecker->setBranch('main');

// BEGIN ENQUE CUSTOM LOGIN //
include( plugin_dir_path( __FILE__ ) . 'login/functions.php' );
// END ENQUE CUSTOM LOGIN //
