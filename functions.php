<?php
/**
 * This is the child theme for PressBook theme.
 *
 * (See https://developer.wordpress.org/themes/advanced-topics/child-themes/#how-to-create-a-child-theme)
 *
 * @package PressBook_Dark
 */

defined( 'ABSPATH' ) || die();

define( 'PRESSBOOK_DARK_VERSION', '1.2.0' );

require get_stylesheet_directory() . '/inc/recommended-plugins.php';

/**
 * Set child theme services.
 *
 * @param  array $services Parent theme services.
 * @return array
 */
function pressbook_dark_services( $services ) {
	require get_stylesheet_directory() . '/classes/class-pressbook-dark-scripts.php';
	require get_stylesheet_directory() . '/classes/class-pressbook-dark-editor.php';
	require get_stylesheet_directory() . '/classes/class-pressbook-dark-block-patterns.php';

	foreach ( $services as $key => $service ) {
		if ( 'PressBook\Editor' === $service ) {
			$services[ $key ] = PressBook_Dark_Editor::class;
		} elseif ( 'PressBook\Scripts' === $service ) {
			$services[ $key ] = PressBook_Dark_Scripts::class;
		}
	}

	array_push( $services, PressBook_Dark_Block_Patterns::class );

	return $services;
}
add_filter( 'pressbook_services', 'pressbook_dark_services' );

/**
 * Load child theme text domain.
 */
function pressbook_dark_setup() {
	load_child_theme_textdomain( 'pressbook-dark', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'pressbook_dark_setup', 11 );

/**
 * Change default background args.
 *
 * @param  array $args Custom background args.
 * @return array
 */
function pressbook_dark_custom_background_args( $args ) {
	return array(
		'default-color' => '000000',
		'default-image' => '',
	);
}
add_filter( 'pressbook_custom_background_args', 'pressbook_dark_custom_background_args' );

/**
 * Change default styles.
 *
 * @param  array $styles Default sttyles.
 * @return array
 */
function pressbook_dark_default_styles( $styles ) {
	$styles['top_navbar_bg_color_1']    = '#181a2f';
	$styles['top_navbar_bg_color_2']    = '#121212';
	$styles['primary_navbar_bg_color']  = '#121212';
	$styles['header_bg_color']          = '#000000';
	$styles['site_title_color']         = '#ffffff';
	$styles['tagline_color']            = '#a7a7a7';
	$styles['button_bg_color_1']        = '#6b72fa';
	$styles['button_bg_color_2']        = '#6067e1';
	$styles['side_widget_border_color'] = '#121212';
	$styles['footer_bg_color']          = '#121212';
	$styles['footer_credit_link_color'] = '#ff7f7f';

	return $styles;
}
add_filter( 'pressbook_default_styles', 'pressbook_dark_default_styles' );

/**
 * Change welcome page title.
 *
 * @param  string $page_title Welcome page title.
 * @return string
 */
function pressbook_dark_welcome_page_title( $page_title ) {
	return esc_html_x( 'PressBook Dark', 'page title', 'pressbook-dark' );
}
add_filter( 'pressbook_welcome_page_title', 'pressbook_dark_welcome_page_title' );

/**
 * Change welcome page title.
 *
 * @param  string $page_title Welcome page title.
 * @return string
 */
function pressbook_dark_welcome_menu_title( $page_title ) {
	return esc_html_x( 'PressBook Dark', 'menu title', 'pressbook-dark' );
}
add_filter( 'pressbook_welcome_menu_title', 'pressbook_dark_welcome_menu_title' );
