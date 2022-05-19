<?php
/**
 * UTC Tailwind Genesis.
 *
 * This file adds the title functions to the UTC Tailwind Genesis Theme.
 *
 * @package UTC Tailwind Genesis
 * @author  Bridget Hornsby
 * @license GPL-2.0-or-later
 * @link    https://github.com/UTCWeb/utc-tailwind-genesis-theme
 */

// Forces the layout on the search page.
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

add_filter( 'genesis_pre_get_option_content_archive', 'utc_search_excerpts' );
/**
 * Forces the search results page to use excerpts.
 *
 * @since 1.0.0
 */
function utc_search_excerpts() {

	return 'content';

}

add_filter( 'genesis_pre_get_option_content_archive_limit', 'utc_search_content_limit' );
/**
 * Forces the search results page to use 130 character content limit.
 *
 * @since 1.0.0
 */
function utc_search_content_limit() {

	return '180';

}

add_filter( 'genesis_pre_get_option_image_size', 'utc_search_image_size' );
/**
 * Forces the image size.
 *
 * @since 1.0.0
 */
function utc_search_image_size() {

	return 'genesis-singular-images';

}

add_filter( 'genesis_pre_get_option_image_alignment', 'utc_search_image_alignment' );
/**
 * Forces the image alignment.
 *
 * @since 1.0.0
 */
function utc_search_image_alignment() {

	return 'aligncenter';

}

// Removes the entry footer and markup.
remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_open', 5 );
remove_action( 'genesis_entry_footer', 'genesis_post_info' );
remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_close', 15 );
add_action( 'genesis_after_header', 'utc_do_search_title', 15 );
add_action( 'genesis_entry_footer', 'genesis_post_info' );
/**
 * Echo the title with the search term.
 *
 * @since 1.9.0
 */
function utc_do_search_title() {

	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound -- preserving the Genesis filter
	$title = sprintf( '<div class="archive-description"><div class="description-wrap"><h1 class="archive-title">%s %s</h1></div></div>', apply_filters( 'genesis_search_title_text', __( 'Search Results for:', 'utc' ) ), get_search_query() );

	echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		'genesis_search_title_output', // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound -- preserving the Genesis filter
		$title
	) . "\n";

}

//Wrap search word in <strong>
add_action ('genesis_before_content', 'search_word_wrapper');
function search_word_wrapper() {
    if (is_search()){
        add_action ('genesis_before_loop', 'search_word_open_wrapper');
        add_action ('genesis_after_loop', 'search_word_close_wrapper');
    }
}
function search_word_open_wrapper() {
    echo '<strong>';
}
function search_word_close_wrapper() {
    echo '</strong>';
}

$search_classes = get_body_class();
if (in_array('search-no-results',$search_classes)) {
	remove_action( 'genesis_after_header', 'utc_do_search_title', 15 );
	remove_action( 'genesis_before_content_sidebar_wrap', 'genesis_do_breadcrumbs' );
}

remove_action( 'genesis_loop_else', 'genesis_do_noposts' );
add_action( 'genesis_loop_else', 'utc_do_noposts' );

$search_word = get_search_query();

function utc_do_noposts() {

    echo '<h1 class="archive-title">';
    echo _e('We\'re sorry.', 'responsive'); 
    echo '</h1><h3 class="mt-8 block text-center">We\'re unable to find what you were looking for.</h3><p class="text-center mt-8 font-normal">';
    echo _e('Don&#39;t worry. Let&#39;s explore our options.', 'responsive');
    echo '</p><h5 class="text-center my-8 mx-auto w-fit">';
    echo _e( 'You can return', 'responsive' ); 
    echo '<a href="/" title="';
    echo esc_attr_e( 'Home', 'responsive' );
    echo '">';
    echo _e( ' &#9166; Home', 'responsive' );
    echo '</a> ';
    echo _e( 'or try another search.', 'responsive' );
    echo '</h5>';
    echo get_search_form();
    
}

// Runs the genesis loop.
genesis();
