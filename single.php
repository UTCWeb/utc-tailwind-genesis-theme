<?php
 /**
 * UTC Tailwind Genesis.
 *
 * This file adds the single post template to the UTC Tailwind Genesis theme.
 *
 * @package UTC
 * @author  Bridget Hornsby
 * @license GPL-2.0-or-later
 * @link    https://github.com/UTCWeb/utc-tailwind-genesis-theme
 */

// Adds entry meta in entry footer.
add_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_open', 5 );
add_action( 'genesis_entry_footer', 'genesis_post_meta' );
add_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_close', 15 );

//Move the header on pages
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
add_action( 'genesis_after_header', 'genesis_entry_header_markup_open', 11 );
add_action( 'genesis_after_header', 'genesis_do_post_title', 12 );
add_action( 'genesis_after_header', 'genesis_entry_header_markup_close', 13 );


// Runs the Genesis loop.
genesis();
