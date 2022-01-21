<?php
/**
 * UTC Tailwind Genesis.
 *
 * This file adds the title functions to the UTC Tailwind Genesis Theme.
 *
 * @package UTC Tailwind Genesis
 * @author  Bridget Hornsby
 * @license GPL-2.0-or-later
 * @link    https://github.com/UTCWeb/utc-tailwind-genesis-the
 */

// Reposition the archive descriptions.
remove_action( 'genesis_before_loop', 'genesis_do_taxonomy_title_description', 15 );
remove_action( 'genesis_before_loop', 'genesis_do_author_title_description', 15 );
remove_action( 'genesis_before_loop', 'genesis_do_cpt_archive_title_description' );
remove_action( 'genesis_before_loop', 'genesis_do_date_archive_title' );
remove_action( 'genesis_before_loop', 'genesis_do_posts_page_heading' );
remove_action( 'genesis_before_loop', 'genesis_do_blog_template_heading' );

add_action( 'genesis_after_header', 'genesis_do_taxonomy_title_description', 15 );
add_action( 'genesis_after_header', 'genesis_do_author_title_description', 15 );
add_action( 'genesis_after_header', 'genesis_do_cpt_archive_title_description', 15 );
add_action( 'genesis_after_header', 'genesis_do_date_archive_title', 15 );
add_action( 'genesis_after_header', 'genesis_do_posts_page_heading', 15 );
add_action( 'genesis_after_header', 'genesis_do_blog_template_heading', 15 );

add_action( 'genesis_archive_title_descriptions', 'utc_blog_description', 12 );
/**
 * Output posts page content as a description at the top of the posts page.
 *
 * @since 1.0.0
 */
function utc_blog_description() {

	$posts_page = get_option( 'page_for_posts' );

	if ( is_home() && $posts_page ) {
		echo apply_filters( 'the_content', get_post_field( 'post_content', $posts_page ) ); // phpcs:ignore
	}

}
