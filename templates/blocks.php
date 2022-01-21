<?php
/**
 * UTC Tailwind Genesis.
 *
 * This file adds the unboxed content template to the UTC Tailwind Genesis Theme.
 *
 * Template Name: Full-Width Content
 * Template Post Type: page
 *
 * @package UTC Tailwind Genesis
 * @author  Bridget Hornsby
 * @license GPL-2.0-or-later
 * @link    https://github.com/UTCWeb/utc-tailwind-genesis-theme
 */

//force full-width
add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

add_filter( 'body_class', 'utc_unboxed_body_class' );
/**
 * Adds unboxed body class.
 *
 * @since 1.0.0
 *
 * @param array $classes Original body classes.
 * @return array Modified body classes.
 */
function utc_unboxed_body_class( $classes ) {

	$classes[] = 'full-width-content';
	return $classes;

}

// Runs the Genesis loop.
genesis();
