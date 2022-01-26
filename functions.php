<?php
/**
 * UTC Tailwind Genesis.
 *
 * Based off of the Navigation Pro child theme. This file adds functions to the UTC Tailwind Genesis theme.
 *
 * @package UTC Tailwind Genesis
 * @author  Bridget Hornsby
 * @license GPL-2.0-or-later
 * @link    https://github.com/UTCWeb/utc-tailwind-genesis-theme
 */

// Start the engine.
require_once get_template_directory() . '/lib/init.php';

//Set localization (do not remove).
add_action( 'after_setup_theme', 'utc_localization_setup' );
function utc_localization_setup() {
	load_child_theme_textdomain( 'utc', get_stylesheet_directory() . '/languages' );
}

// Adds the theme helper functions.
require_once get_stylesheet_directory() . '/lib/helper-functions.php';

// Adds theme markup functions.
require_once get_stylesheet_directory() . '/lib/search-markup.php';

// Adds Image upload and Color select to WordPress Theme Customizer.
require_once get_stylesheet_directory() . '/lib/customizer/customize.php';

// Includes Customizer CSS.
require_once get_stylesheet_directory() . '/lib/customizer/output.php';

// Adds the title helper functions.
require_once get_stylesheet_directory() . '/lib/title-functions.php';

// Adds the image helper functions.
require_once get_stylesheet_directory() . '/lib/image-functions.php';

//add_filter( 'show_admin_bar', '__return_true' );
//Add  theme supports.
add_action( 'after_setup_theme', 'utc_theme_support', 1 );
function utc_theme_support() {

	$theme_supports = genesis_get_config( 'theme-supports' );

	foreach ( $theme_supports as $feature => $args ) {
		add_theme_support( $feature, $args );
	}

}

//Add post type supports.
add_action( 'after_setup_theme', 'utc_post_type_support', 9 );
function utc_post_type_support() {

	$post_type_supports = genesis_get_config( 'post-type-supports' );

	foreach ( $post_type_supports as $post_type => $args ) {
		add_post_type_support( $post_type, $args );
	}

}

//Add Gutenber opt-in features and styling
add_action( 'after_setup_theme', 'genesis_child_gutenberg_support' );
function genesis_child_gutenberg_support() { // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedFunctionFound -- using same in all child themes to allow action to be unhooked.
	require_once get_stylesheet_directory() . '/lib/gutenberg/init.php';
}

// Register the responsive menu.
if ( function_exists( 'genesis_register_responsive_menus' ) ) {
	genesis_register_responsive_menus( genesis_get_config( 'responsive-menus' ) );
}


// Enqueue script files
add_action( 'wp_enqueue_scripts', 'utc_enqueue_scripts_styles' );
function utc_enqueue_scripts_styles() {

	$appearance = genesis_get_config( 'appearance' );

	wp_enqueue_style(
		genesis_get_theme_handle() . '-fonts',
		$appearance['fonts-url'],
		[],
		genesis_get_theme_version()
	);

	wp_enqueue_style(
		genesis_get_theme_handle() . '-icons',
		$appearance['icons-url'],
		[],
		genesis_get_theme_version()
	);

	if ( genesis_is_amp() ) {

		wp_enqueue_style(
			genesis_get_theme_handle() . '-amp',
			get_stylesheet_directory_uri() . '/lib/amp/amp.css',
			[ genesis_get_theme_handle() ],
			genesis_get_theme_version()
		);

		return; // Load no further scripts and styles on AMP pages.

	}

	wp_enqueue_script(
		genesis_get_theme_handle() . '-global-script',
		get_stylesheet_directory_uri() . '/js/global.js',
		[ 'jquery' ],
		genesis_get_theme_version(),
		true
	);

}

// Add image sizes.
add_image_size( 'featured-blog', 520, 780, true );
add_image_size( 'genesis-singular-images', 780, 400, true );
add_image_size( 'singular-full-width', 1700, 660, true );

//Add featured-blog image size to Media Library.
add_filter( 'image_size_names_choose', 'utc_media_library_sizes' );
function utc_media_library_sizes( $sizes ) {

	$sizes['featured-blog']           = __( 'Featured Blog - 520px by 780px', 'utc' );
	$sizes['genesis-singular-images'] = __( 'Singular - 780px by 400px', 'utc' );
	$sizes['singular-full-width']     = __( 'Singular Full - 1700px by 660px', 'utc' );

	return $sizes;

}

// Remove header right widget area.
unregister_sidebar( 'header-right' );

// Remove secondary sidebar.
unregister_sidebar( 'sidebar-alt' );

// Remove site layouts.
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );

// Reposition the breadcrumbs.
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
add_action( 'genesis_after_header', 'genesis_do_breadcrumbs' );

//Modify the breadcrumbs with a separator.
add_filter( 'genesis_breadcrumb_args', 'utc_breadcrumb_args' );
function utc_breadcrumb_args( $args ) {

	$args['labels']['prefix'] = '';
	$args['sep']              = '<span class="separator" aria-label="breadcrumb separator">/</span>';

	return $args;

}

// Reposition primary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav', 12 );

remove_action( 'genesis_header', 'genesis_do_header' );
add_action( 'genesis_header', 'genesis_do_utcheader' );

// Reposition secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_header_right', 'genesis_do_subnav', 9 );


// Reposition headline under the main menu instead of inside the article.
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
add_action( 'genesis_after_header', 'genesis_do_post_title', 9 );

//Create custom header markup.
function genesis_do_utcheader() {

	global $wp_registered_sidebars;

	genesis_markup(
		[
			'open'    => '<div class="header-first-row"><div %s>',
			'context' => 'title-area',
		]
	);
	do_action( 'genesis_site_title' );
	do_action( 'genesis_site_description' );
	genesis_markup(
		[
			'close'   => '</div>',
			'context' => 'title-area',
		]
	);

	if ( has_action( 'genesis_header_right' ) || ( isset( $wp_registered_sidebars['header-right'] ) && is_active_sidebar( 'header-right' ) ) ) {

		genesis_markup(
			[
				'open'    => '<div %s>',
				'context' => 'header-widget-area',
			]
		);
		do_action( 'genesis_header_right' );
		add_filter( 'wp_nav_menu_args', 'genesis_header_menu_args' );
		add_filter( 'wp_nav_menu', 'genesis_header_menu_wrap' );
		dynamic_sidebar( 'header-right' );
		remove_filter( 'wp_nav_menu_args', 'genesis_header_menu_args' );
		remove_filter( 'wp_nav_menu', 'genesis_header_menu_wrap' );

		genesis_markup(
			[
				'close'   => '</div></div>',
				'context' => 'header-widget-area',
			]
		);

	}

}

//Add the search icon to the header. (Must be selected in the customize child theme under Appearance.)
add_action( 'genesis_meta', 'utc_add_search_icon' );
function utc_add_search_icon() {

	if ( genesis_is_amp() ) {
		return;
	}

	$show_icon = get_theme_mod( 'utc_header_search', utc_customizer_get_default_search_setting() );

	// Exit early if option set to false.
	if ( ! $show_icon ) {
		return;
	}

	add_action( 'genesis_header', 'utc_do_header_search_form', 14 );
	add_filter( 'genesis_nav_items', 'utc_add_search_menu_item', 10, 2 );
	add_filter( 'wp_nav_menu_items', 'utc_add_search_menu_item', 10, 2 );

}


//Modify the menu item output of the header menu with the Apply Now ribbon and search toggle.
function utc_add_search_menu_item( $items, $args ) {

	$search_toggle = sprintf( '<li class="menu-item search-icon-menu-item">%s</li><li class="menu-item ribbon-container"><div class="ribbon-wrapper">
	<a href="https://webapp.utc.edu/apply/" title="Apply Now"> 
    <div id="menuribbon" class="ribbon up" style="--color: #112e51;">
      <div class="ribbon-content">
        <p id="apply-now-ribbon" class="apply-now-ribbon">Apply</br>Now</p>
      </div>
    </div>
	</a>
  </div></li>', utc_get_header_search_toggle() );

	if ( 'secondary' === $args->theme_location ) {
		$items .= $search_toggle;
	}

	return $items;

}

//TEMPORARILY ADD HERO IMAGE FOR SPEC 
/* add_action( 'genesis_after_header', 'after_header_image',1 );

function after_header_image() {

    $image = sprintf( '%s/images/sample-hero.png', get_stylesheet_directory_uri() );
    
    $output = sprintf( '<img src="%s" class="after-header w-full" alt="Sample Hero Image" />', $image );
    
    echo $output;
} */
//REMOVE THE ABOVE TEMPORARY HERO IMAGE BEFORE PUSHING TO GIT 

remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );


//Modify size of the Gravatar in the author box. (Inherited from starter child theme.)
add_filter( 'genesis_author_box_gravatar_size', 'utc_author_box_gravatar' );
function utc_author_box_gravatar( $size ) {

	return 100;

}

// Adds entry meta in entry footer.
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
add_action( 'genesis_entry_footer', 'genesis_post_info' );


//Change "About" text in author box titles for single posts. (Inherited from starter child theme.)
add_filter( 'genesis_author_box_title', 'utc_author_box_title', 10, 2 );
function utc_author_box_title( $title, $context ) {

	if ( 'archive' === $context ) {
		$title = ' <span itemprop="name">' . get_the_author_meta( 'display_name' ) . '</span>';
	}

	return $title;

}

//Modify comment author `says` text. (Inherited from starter child theme.)
add_filter( 'comment_author_says_text', 'utc_comment_author_says_text' );
function utc_comment_author_says_text() {

	return '';

}

//Modify the content limit more link markup for posts. (Inherited from starter child theme.)
add_filter( 'get_the_content_limit', 'utc_content_limit_read_more_markup', 10, 3 );
function utc_content_limit_read_more_markup( $output, $content, $link ) {

	if ( is_page_template( 'page_blog.php' ) || is_home() || is_archive() || is_search() ) {
		$link = sprintf( '<a href="%s" class="more-link button text">%s</a>', get_the_permalink(), genesis_a11y_more_link( __( 'Continue Reading', 'utc' ) ) );
	}

	$output = sprintf( '<p>%s &#x02026;</p><p class="more-link-wrap">%s</p>', $content, str_replace( '&#x02026;', '', $link ) );

	return $output;

}

//Add a paragraph tag around the WordPress more link markup. (Inherited from starter child theme.)
add_filter( 'the_content_more_link', 'utc_wrap_more_link' );
function utc_wrap_more_link( $more ) {

	return '<p class="more-link-wrap">' . $more . '</p>';

}

//Filter the output of the post date to add a wrapper like other shortcodes. (Inherited from starter child theme.)
add_filter( 'genesis_post_date_shortcode', 'utc_custom_date_shortcode', 10, 2 );
function utc_custom_date_shortcode( $output, $atts ) {

	if ( 'relative' === $atts['format'] ) {
		$display  = genesis_human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ), $atts['relative_depth'] ); // phpcs:ignore WordPress.DateTime.CurrentTimeTimestamp.Requested
		$display .= ' ' . __( 'ago', 'utc' );
	} else {
		$display = get_the_time( $atts['format'] );
	}

	$output = sprintf( '<span class="entry-date"><time %s>', genesis_attr( 'entry-time' ) ) . $atts['before'] . $atts['label'] . '<span class="entry-time-date">' . $display . '</span>' . $atts['after'] . '</time></span>';

	return $output;

}
//* Enable the block-based widget editor
//add_filter( 'use_widgets_block_editor', '__return_true' );

//Hook in before footer the UTC Dept. info and menu/map widget area.
add_action( 'genesis_footer', 'utc_before_footer_cta', 2 );
function utc_before_footer_cta() {
	genesis_widget_area(
		'footer-business-info',
		[
			'before' => '<div id="department-info" class="department-info">',
			'after'  => '</div>',
		]
	);
	genesis_widget_area(
		'before-footer-cta',
		[
			'before' => '<div class="before-footer-menu-map"><div class="wrap"><h2 class="screen-reader-text">' . __( 'Explore more', 'utc' ) . '</h2>',
			'after'  => '</div></div>',
		]
	);

}

// Relocates the footer copyright area.
remove_action( 'genesis_footer', 'genesis_do_footer' );
add_action( 'utc_footer_copyright', 'genesis_do_footer' );

add_action( 'genesis_footer', 'utc_custom_footer_content', 7 );
function utc_custom_footer_content() {

	echo '<div class="footer-copyright-container"><div class="footer-copyright"><h2 class="screen-reader-text">' . esc_html__( 'Footer', 'utc' ) . '</h2>';

	echo '</div><div class="copyright">';

	do_action( 'utc_footer_copyright' );

	echo '</div></div>';

	genesis_widget_area(
		'footer-widget',
		[
			'before' => '<div class="footer-widgets widget-area">',
			'after'  => '</div>',
		]
	);

}

add_action( 'after_setup_theme', 'utc_register_sidebars' );
/**
 * Registers widget areas.
 */
function utc_register_sidebars() {

	// Registers widget areas.
	genesis_register_sidebar(
		[
			'id'          => 'footer-business-info',
			'name'        => __( 'Footer 1: Department Information', 'utc' ),
			'description' => __( 'Add your department name, address, and other information to this footer area.', 'utc' ),
		]
	);

	genesis_register_sidebar(
		[
			'id'          => 'before-footer-cta',
			'name'        => __( 'Footer 2: Menus and Map', 'utc' ),
			'description' => __( 'This is the section before the bottom footer that holds the footer menus and map.', 'utc' ),
		]
	);

}


//Add compiled css & js
function utc_custom_style(){
	wp_enqueue_style( 'custom', get_stylesheet_directory_uri() . '/dist/style.css', 999 );
} 
add_action( 'wp_enqueue_scripts', 'utc_custom_style' );
  
function utc_custom_scripts() {
	  wp_enqueue_script( 'app-js', get_stylesheet_directory_uri() . '/dist/app.js', array(),'',true );
}
add_action( 'wp_enqueue_scripts', 'utc_custom_scripts', 999 );


//Allow SVG option for image uploads
function add_file_types_to_uploads($file_types){
  $new_filetypes = array();
  $new_filetypes['svg'] = 'image/svg+xml';
  $file_types = array_merge($file_types, $new_filetypes );
  return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');


//Add the category of a post as a class to the body tag.
add_filter( 'body_class', 'pn_body_class_add_categories' );
function pn_body_class_add_categories( $classes ) {
	if ( !is_single() )
		return $classes;
	$post_categories = get_the_category();
	foreach( $post_categories as $current_category ) {
	$classes[] = 'category-' . $current_category->slug;
	}
	return $classes;
}


//Replace the WordPress default for the excerpts continuum [...]
add_filter('excerpt_more', 'new_excerpt_more');
function new_excerpt_more( $more ) {
	return '... <a class="read_more" href="'. get_permalink($post->ID) . '">' . 'READ MORE' . '</a>';
}

	
// Wrap entry titles on 'single' pages in h1 tags
add_filter( 'genesis_entry_title_wrap', 'sk_set_custom_entry_title_wrap' );
function sk_set_custom_entry_title_wrap( $wrap ) {
	if ( is_singular() ) {
		$wrap = is_singular() ? 'h1' : 'h2';
	}
	return $wrap;
}

//* Add description to menu items
add_filter( 'widget_nav_menu', 'be_add_description', 10, 2 );
function be_add_description( $item_output, $item ) {
	$description = $item->post_content;
	if (' ' !== $description ) 
	return preg_replace( '/(<a.*?>[^<]*?)</', '$1' . '<span class="menu-description">' . $description . '</span><', $item_output);
	else
	return $item_output;
}


// Add go to the top button 
add_action( 'genesis_before', 'genesis_to_top');
	function genesis_to_top() {
	 echo '<a href="#0" class="to-top" title="Back To Top">Top</a>';
}


//Add "I am..." and "Quick Links" to the main menu
