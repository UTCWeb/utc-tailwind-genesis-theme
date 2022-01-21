


<?php
/**
 * UTC Tailwind Genesis.
 *
 * This file adds the single post template to the UTC Tailwind Genesis Theme.
 *
 * @package UTC Tailwind Genesis
 * @author  Bridget Hornsby
 * @license GPL-2.0-or-later
 * @link    https://github.com/UTCWeb/utc-tailwind-genesis-theme
 */

//force full-width
add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

// Adds entry meta in entry footer.
remove_action( 'genesis_loop', 'genesis_do_loop' );
remove_action( 'genesis_loop', 'genesis_404' );

add_action( 'genesis_loop', 'custom_entry_content' ); // Add custom loop

function custom_entry_content() {

		genesis_markup(
			[
				'open'    => '<article class="entry">',
				'context' => 'entry-404',
			]
		);
	
		genesis_markup(
			[
				'open'    => '<h1 %s>',
				'close'   => '</h1>',
				'content' => apply_filters( 'genesis_404_entry_title', __( 'Page not found.', 'genesis' ) ),
				'context' => 'entry-title',
			]
		);
	
		$genesis_404_content = sprintf(
			/* translators: %s: URL for current website. */
			__( 'The page you are looking for has either moved or does not exist. Perhaps you can return back to the <a href="%s">homepage</a> and see if you can find what you are looking for. Or, you can try finding it by using the search form below.', 'genesis' ),
			esc_url( trailingslashit( home_url() ) )
		);
	
		$genesis_404_content = sprintf( '<p>%s</p>', $genesis_404_content );
	
		/**
		 * The 404 content (wrapped in paragraph tags).
		 *
		 * @since 2.2.0
		 *
		 * @param string $genesis_404_content The content.
		 */
		$genesis_404_content = apply_filters( 'genesis_404_entry_content', $genesis_404_content );
	
		genesis_markup(
			[
				'open'    => '<div %s>',
				'close'   => '</div>',
				'content' => $genesis_404_content . get_search_form( 0 ),
				'context' => 'entry-content',
			]
		);
	
		genesis_markup(
			[
				'close'   => '</article>',
				'context' => 'entry-404',
			]
		);
	

}

// Runs the Genesis loop.
genesis();



