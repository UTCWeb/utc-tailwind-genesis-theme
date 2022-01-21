<?php
/**
 * UTC Tailwind Genesis.
 *
 * This file adds the landing page template to the UTC Tailwind Genesis Theme.
 *
 * Template Name: Landing
 *
  * @package UTC Tailwind Genesis
 * @author  Bridget Hornsby
 * @license GPL-2.0-or-later
 * @link    https://github.com/UTCWeb/utc-tailwind-genesis-theme
 */



//force full-width
add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

 add_filter( 'body_class', 'utc_landing_body_class' );
/**
 * Adds landing page body class.
 *
 * @since 1.0.0
 *
 * @param array $classes Original body classes.
 * @return array Modified body classes.
 */
function utc_landing_body_class( $classes ) {

	$classes[] = 'landing-page full-width-content';
	return $classes;

}

// Removes Skip Links.
remove_action( 'genesis_before_header', 'genesis_skip_links', 5 );

add_action( 'wp_enqueue_scripts', 'utc_dequeue_skip_links' );
/**
 * Dequeues Skip Links Script.
 *
 * @since 1.1.0
 */
function utc_dequeue_skip_links() {

	wp_dequeue_script( 'skip-links' );

}

// Removes site header elements.
remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
remove_action( 'genesis_header', 'genesis_do_header' );
remove_action( 'genesis_header', 'genesis_header_markup_close', 15 );

// Removes navigation.
remove_theme_support( 'genesis-menus' );

// Removes before footer CTA widget area.
/* remove_action( 'genesis_before_footer', 'utc_before_footer_cta' ); */

// Removes site footer elements. Keep the copyright and doc info.
remove_action( 'genesis_footer', 'utc_before_footer_cta', 2 );


// Runs the Genesis loop.
genesis();
