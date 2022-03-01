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
		'breadcrumb_posts_page'     => 0,
		'breadcrumb_single'         => 0,
		'breadcrumb_page'           => 0,
		'breadcrumb_archive'        => 0,
		'breadcrumb_404'            => 0,
		'breadcrumb_attachment'     => 0,
		'content_archive'           => 'full',
		'content_archive_limit'     => 130,
		'content_archive_thumbnail' => 1,
		'entry_meta_after_content'  => '[post_categories before="' . __( 'Categories', 'utc' ) . ': "][post_tags before="' . __( 'Tags', 'utc' ) . ': "] [post_edit]',
		'entry_meta_before_content' => '[post_author_posts_link before="' . __( 'Written by', 'utc' ) . ':<br>"][post_date before="' . __( 'Published on', 'utc' ) . ':<br>"] [post_comments before="' . __( 'Thoughts', 'utc' ) . ':<br>" zero="' . __( 'No comments yet', 'utc' ) . '"]',
		'image_alignment'           => 'alignleft',
		'image_size'                => 'featured-blog',
		'posts_nav'                 => 'numeric',
		'show_featured_image_post'  => 1,
		'show_featured_image_page'  => 1,
		'site_layout'               => 'sidebar-content',
	],
	'posts_per_page'       => 4,
];
