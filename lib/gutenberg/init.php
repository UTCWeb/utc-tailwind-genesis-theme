<?php
/**
 * Gutenberg theme support.
 *
 * @package UTC Tailwind Genesis
 * @author  Bridget Hornsby
 * @license GPL-2.0-or-later
 * @link    https://github.com/UTCWeb/utc-tailwind-genesis-the
 */

add_action( 'wp_enqueue_scripts', 'utc_pro_enqueue_gutenberg_frontend_styles' );
/**
 * Enqueues Gutenberg front-end styles.
 *
 * @since 2.7.0
 */
function utc_pro_enqueue_gutenberg_frontend_styles() {

	wp_enqueue_style(
		genesis_get_theme_handle() . '-gutenberg',
		get_stylesheet_directory_uri() . '/lib/gutenberg/front-end.css',
		[ genesis_get_theme_handle() ],
		genesis_get_theme_version()
	);

}

add_action( 'enqueue_block_editor_assets', 'utc_pro_block_editor_styles' );
/**
 * Enqueues Gutenberg admin editor fonts and styles.
 *
 * @since 2.7.0
 */
function utc_pro_block_editor_styles() {

	$appearance = genesis_get_config( 'appearance' );

	wp_enqueue_style(
		genesis_get_theme_handle() . '-editor-fonts',
		$appearance['fonts-url'],
		[],
		genesis_get_theme_version()
	);

	wp_enqueue_style(
		genesis_get_theme_handle() . '-editor-icons',
		$appearance['icons-url'],
		[],
		genesis_get_theme_version()
	);

}

// Adds support for editor styles.
add_theme_support( 'editor-styles' );

// Enqueues editor styles.
add_editor_style( '/lib/gutenberg/style-editor.css' );

// Adds support for block alignments.
add_theme_support( 'align-wide' );

// Makes media embeds responsive.
add_theme_support( 'responsive-embeds' );

$utc_appearance = genesis_get_config( 'appearance' );

// Adds support for editor font sizes.
add_theme_support(
	'editor-font-sizes',
	$utc_appearance['editor-font-sizes']
);

require_once get_stylesheet_directory() . '/lib/gutenberg/inline-styles.php';

add_theme_support(
	'editor-color-palette',
	$utc_appearance['editor-color-palette']
);

add_action( 'after_setup_theme', 'utc_pro_content_width', 0 );
/**
 * Sets content width to match the “wide” Gutenberg block width.
 *
 * @since 1.0.0
 */
function utc_pro_content_width() {

	$appearance = genesis_get_config( 'appearance' );

	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound -- See https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/924
	$GLOBALS['content_width'] = apply_filters( 'utc_pro_content_width', $appearance['content-width'] );

}

add_action( 'init', 'utc_custom_block_style' );
/**
 * Adds custom styles to WordPress core blocks.
 *
 * @since 1.0.0
 */
function utc_custom_block_style() {

	if ( ! function_exists( 'register_block_style' ) ) {
		return;
	}

	$names = genesis_get_config( 'block-styles' );

	foreach ( $names as $name => $styles ) {
		foreach ( $styles as $style ) {
			register_block_style( $name, $style );
		}
	}

}
