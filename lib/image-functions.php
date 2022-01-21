<?php
/**
 * UTC Tailwind Genesis.
 *
 * This file adds the image functions and markup to the UTC Tailwind Genesis Theme.
 *
 * @package UTC Tailwind Genesis
 * @author  Bridget Hornsby
 * @license GPL-2.0-or-later
 * @link    https://github.com/UTCWeb/utc-tailwind-genesis-the
 */

// Relocates the archive featured image.
remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
add_action( 'genesis_entry_header', 'genesis_do_post_image', 1 );

// Relocates the singular image.
remove_action( 'genesis_entry_content', 'genesis_do_singular_image', 8 );
add_action( 'genesis_entry_header', 'genesis_do_singular_image', 1 );

add_action( 'genesis_meta', 'utc_full_featured_image' );
/**
 * Runs functions if post has featured image and full-width content layout.
 *
 * @since 1.0.0
 */
function utc_full_featured_image() {

	$image = genesis_get_image();

	if ( genesis_site_layout() === 'full-width-content' && $image && is_singular() ) {

		// Relocates the singular image and adds a wrapper.
		remove_action( 'genesis_entry_header', 'genesis_do_singular_image', 1 );
		add_action( 'genesis_after_header', 'utc_singular_image_wrap_open', 11 );
		add_action( 'genesis_after_header', 'genesis_do_singular_image', 12 );
		add_action( 'genesis_after_header', 'utc_singular_image_wrap_close', 13 );

		// Changes the featured image size.
		add_filter( 'genesis_singular_image_size', 'utc_full_image_size' );

	}

}

/**
 * Filters the full width singular image size.
 *
 * @since 1.0.0
 *
 * @param string $size Singular featured image size.
 * @return string New singular featured image size.
 */
function utc_full_image_size( $size ) {

	$size = 'singular-full-width';
	return $size;

}

/**
 * Opens the full-width singular image wrapper.
 *
 * @since 1.0.0
 */
function utc_singular_image_wrap_open() {

	if ( genesis_singular_image_hidden_on_current_page() ) {
		return;
	}

	genesis_markup(
		[
			'open'    => '<div %s><div class="wrap">',
			'context' => 'singular-featured-image-wrap',
		]
	);

}

/**
 * Closes the full-width singular image wrapper.
 *
 * @since 1.0.0
 */
function utc_singular_image_wrap_close() {

	if ( genesis_singular_image_hidden_on_current_page() ) {
		return;
	}

	genesis_markup(
		[
			'close'   => '</div></div>',
			'context' => 'singular-featured-image-wrap',
		]
	);

}

add_filter( 'genesis_attr_entry-image-link', 'utc_attributes_entry_image_link' );
/**
 * Add attributes for entry image link element.
 *
 * @since 2.3.0
 *
 * @param array $attributes Existing attributes for entry image link element.
 * @return array Amended attributes for entry image link element.
 */
function utc_attributes_entry_image_link( $attributes ) {

	$alignment = genesis_get_option( 'image_alignment' );
	$size      = genesis_get_option( 'image_size' );
	$sizes     = ( 'featured-blog' === $size || 'genesis-singular-images' === $size || 'singular-full-width' === $size );

	$attributes['class'] .= ' archive-featured-image-wrap';

	if ( 'aligncenter' === $alignment || $sizes ) {
		$attributes['class'] .= ' image-zoom';
	}

	if ( ! empty( $alignment ) ) {
		$attributes['class'] .= ' image-' . $alignment;
	}

	if ( ! empty( $size ) ) {
		$attributes['class'] .= ' image-' . $size;
	}

	return $attributes;

}

add_filter( 'genesis_attr_entry', 'utc_image_entry_class', 10, 3 );
/**
 * Add attributes for entry element.
 *
 * @since 1.0.0
 *
 * @param array $attributes Existing attributes for entry element.
 * @param array $context Current element being filtered.
 * @param array $args The attribute arguments.
 * @return array Amended attributes for entry element.
 */
function utc_image_entry_class( $attributes, $context, $args ) {

	if ( is_singular() || isset( $args['params']['is_widget'] ) ) {
		return $attributes;
	}

	$alignment = genesis_get_option( 'image_alignment' );
	$size      = genesis_get_option( 'image_size' );

	$attributes['class'] .= ' archive-entry';

	if ( ! empty( $alignment ) ) {
		$attributes['class'] .= ' post-image-' . $alignment;
	}

	if ( ! empty( $size ) ) {
		$attributes['class'] .= ' post-image-' . $size;
	}

	return $attributes;

}
