<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

require 'theme-update-checker/theme-update-checker.php';
$myUpdateChecker = new Puc_v4p7_Vcs_themeUpdateChecker(
    new Puc_v4p7_Vcs_GitLabApi('https:/https://gitlab.com/jguiles-wordpress-themes/divi-child-theme'),
    __FILE__,
    'divi-cild-theme'
);
$myUpdateChecker->setAuthentication('JZrxETpiuYtQKHqN8LVf');

// BEGIN ENQUEUE PARENT ACTION

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array(  ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

// END ENQUEUE PARENT ACTION
