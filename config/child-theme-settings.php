<?php
/**
 * UTC Tailwind Genesis theme settings.
 *
 * Genesis 2.9+ updates these settings when themes are activated.
 *
 * @package UTC Tailwind Genesis
 * @author  Bridget Hornsby
 * @license GPL-2.0-or-later
 * @link    https://github.com/UTCWeb/utc-tailwind-genesis-the
 */

return [
	GENESIS_SETTINGS_FIELD => [
		'breadcrumb_front_page'     => 0,
		'breadcrumb_home'           => 0,
		'breadcrumb_posts_page'     => 1,
		'breadcrumb_single'         => 1,
		'breadcrumb_page'           => 1,
		'breadcrumb_archive'        => 1,
		'breadcrumb_404'            => 0,
		'breadcrumb_attachment'     => 0,
		'content_archive'           => 'excerpts',
		'content_archive_limit'     => 100,
		'content_archive_thumbnail' => 1,
		'entry_meta_after_content'  => '[post_categories before="' . __( 'Categories', 'utc' ) . ': "][post_tags before="' . __( 'Tags', 'utc' ) . ': "] [post_edit]',
		'entry_meta_before_content' => '[post_author_posts_link before="' . __( '', 'utc' ) . '<br>"][post_date before="' . __( '', 'utc' ) . '<br>"] [post_comments before="' . __( '', 'utc' ) . '" zero="' . __( 'No comments yet', 'utc' ) . '"]',
		'image_alignment'           => 'alignleft',
		'image_size'                => 'featured-blog',
		'posts_nav'                 => 'numeric',
		'show_featured_image_post'  => 1,
		'show_featured_image_page'  => 1,
		'site_layout'               => 'sidebar-content',
		'utc_intro_paragraph_styling' => 1,
	],
	'posts_per_page'       => 5,
];
