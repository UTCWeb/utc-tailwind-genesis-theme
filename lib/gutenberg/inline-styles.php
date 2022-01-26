<?php
/**
 * Adds front-end inline styles for the custom Gutenberg color palette.
 *
 * @package UTC Tailwind Genesis
 * @author  Bridget Hornsby
 * @license GPL-2.0-or-later
 * @link    https://github.com/UTCWeb/utc-tailwind-genesis-the
 */

add_action( 'wp_enqueue_scripts', 'utc_custom_gutenberg_css' );
/**
 * Outputs front-end inline styles for `editor-color-palette` colors.
 *
 * These colors can be changed in the Customizer, so CSS is set dynamically.
 *
 * @since 1.1.0
 */
function utc_custom_gutenberg_css() {

	$appearance = genesis_get_config( 'appearance' );

	$css = <<<CSS
.gb-block-post-grid .gb-block-post-grid-byline a:focus,
.gb-block-post-grid .gb-block-post-grid-byline a:hover,
.gb-block-post-grid header .gb-block-post-grid-title a:focus,
.gb-block-post-grid header .gb-block-post-grid-title a:hover {
	color: {$appearance['primary-color']};
}

.site-container .is-style-angled-underlay::before,
.site-container .is-style-overlay .gb-block-post-grid-image,
.site-container .wp-block-quote.is-style-quote-underlay::after,
.site-container .wp-block-quote.is-style-quote-underlay p::after,
.site-container .wp-block-button .wp-block-button__link {
	background-color: {$appearance['button-bg']};
}

.wp-block-button .wp-block-button__link:not(.has-background),
.wp-block-button .wp-block-button__link:not(.has-background):focus,
.wp-block-button .wp-block-button__link:not(.has-background):hover {
	color: {$appearance['button-color']};
}

.site-container .wp-block-button.is-style-outline .wp-block-button__link {
	color: {$appearance['button-bg']};
}

.site-container .wp-block-button.is-style-outline .wp-block-button__link:focus,
.site-container .wp-block-button.is-style-outline .wp-block-button__link:hover {
	color: {$appearance['button-outline-hover']};
}

.site-container .gb-block-post-grid a.gb-block-post-grid-more-link:focus,
.site-container .gb-block-post-grid a.gb-block-post-grid-more-link:hover,
.site-container figure.is-style-caption-overlay.wp-block-image,
.site-container .is-style-caption-overlay.wp-block-image figcaption,
.site-container .is-style-caption-overlay figure:not(.is-style-caption-overlay),
.site-container .wp-block-pullquote.is-style-solid-color {
	background-color: {$appearance['primary-color']};
}

.site-container .gb-block-post-grid a.gb-block-post-grid-more-link:focus,
.site-container .gb-block-post-grid a.gb-block-post-grid-more-link:hover,
.site-container .is-style-caption-overlay.wp-block-image figcaption,
.site-container .is-style-caption-overlay.wp-block-image figcaption a,
.site-container .wp-block-pullquote.is-style-solid-color {
	color: {$appearance['color-contrast']['primary']};
}

.has-theme-primary-background-color,
.has-theme-primary-background-color.wp-block-button__link:focus,
.has-theme-primary-background-color.wp-block-button__link:hover,
.has-theme-primary-background-color.wp-block-button__link:visited,
.has-theme-primary-background-color.wp-block-pullquote.is-style-solid-color {
	color: {$appearance['color-contrast']['primary']};
}

.has-theme-secondary-background-color,
.has-theme-secondary-background-color.wp-block-button__link:focus,
.has-theme-secondary-background-color.wp-block-button__link:hover,
.has-theme-secondary-background-color.wp-block-button__link:visited,
.has-theme-secondary-background-color.wp-block-pullquote.is-style-solid-color,
.is-style-overlay .has-post-thumbnail .gb-block-post-grid-title,
.is-style-overlay .has-post-thumbnail .gb-block-post-grid-title a,
.is-style-overlay .has-post-thumbnail .gb-block-post-grid-title a:focus,
.is-style-overlay .has-post-thumbnail .gb-block-post-grid-title a:hover {
	color: {$appearance['color-contrast']['accent']};
}
CSS;

	$css .= utc_inline_font_sizes();
	$css .= utc_inline_color_palette();

	wp_add_inline_style( genesis_get_theme_handle() . '-gutenberg', $css );

}

add_action( 'enqueue_block_editor_assets', 'utc_custom_gutenberg_admin_css' );
/**
 * Outputs back-end inline styles for link state.
 *
 * Causes the custom color to apply to elements with the Gutenberg editor.
 * The custom color is set in the Customizer in the Colors panel.
 *
 * @since 1.1.0
 */
function utc_custom_gutenberg_admin_css() {

	$appearance = genesis_get_config( 'appearance' );

	$css = <<<CSS
.gb-block-post-grid .gb-block-post-grid-byline a:focus,
.gb-block-post-grid .gb-block-post-grid-byline a:hover,
.block-editor__container .editor-styles-wrapper .gb-block-post-grid header .gb-block-post-grid-title a:focus,
.block-editor__container .editor-styles-wrapper .gb-block-post-grid header .gb-block-post-grid-title a:hover,
.block-editor__container .editor-styles-wrapper a,
.product-title,
.product-price {
	color: {$appearance['primary-color']};
}

.editor-styles-wrapper .editor-rich-text .button,
.editor-styles-wrapper .wp-block-button .wp-block-button__link:not(.has-background) {
	background-color: {$appearance['button-bg']};
	color: {$appearance['button-color']};
}

.editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link {
	color: {$appearance['button-bg']};
}

.editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link:focus,
.editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link:hover {
	color: {$appearance['button-outline-hover']};
}

.editor-styles-wrapper .wp-block .is-style-angled-underlay::before,
.editor-styles-wrapper .wp-block .is-style-overlay.gb-block-post-grid .gb-block-post-grid-image,
.editor-styles-wrapper .wp-block .wp-block-quote.is-style-quote-underlay::after,
.editor-styles-wrapper .wp-block .wp-block-quote.is-style-quote-underlay p::before {
	background-color: {$appearance['button-bg']};
}

.editor-styles-wrapper .wp-block .gb-block-post-grid a.gb-block-post-grid-more-link:focus,
.editor-styles-wrapper .wp-block .gb-block-post-grid a.gb-block-post-grid-more-link:hover,
.editor-styles-wrapper .wp-block figure.is-style-caption-overlay.wp-block-image,
.editor-styles-wrapper .wp-block .is-style-caption-overlay.wp-block-image figcaption,
.wp-block-pullquote.is-style-solid-color {
	background-color: {$appearance['primary-color']};
}

.editor-styles-wrapper .wp-block .gb-block-post-grid a.gb-block-post-grid-more-link:focus,
.editor-styles-wrapper .wp-block .gb-block-post-grid a.gb-block-post-grid-more-link:hover,
.editor-styles-wrapper .wp-block .is-style-caption-overlay.wp-block-image figcaption,
.editor-styles-wrapper .wp-block .is-style-caption-overlay.wp-block-image figcaption a,
.wp-block-pullquote.is-style-solid-color {
	color: {$appearance['color-contrast']['primary']};
}

.has-theme-primary-background-color,
.has-theme-primary-background-color.wp-block-button__link:focus,
.has-theme-primary-background-color.wp-block-button__link:hover,
.has-theme-primary-background-color.wp-block-button__link:visited,
.has-theme-primary-background-color.wp-block-pullquote.is-style-solid-color {
	color: {$appearance['color-contrast']['primary']};
}

.has-theme-secondary-background-color,
.has-theme-secondary-background-color.wp-block-button__link:focus,
.has-theme-secondary-background-color.wp-block-button__link:hover,
.has-theme-secondary-background-color.wp-block-button__link:visited,
.has-theme-secondary-background-color.wp-block-pullquote.is-style-solid-color,
.editor-styles-wrapper .is-style-overlay .has-post-thumbnail header .gb-block-post-grid-title,
.editor-styles-wrapper .is-style-overlay .has-post-thumbnail header .gb-block-post-grid-title a,
.editor-styles-wrapper .is-style-overlay .has-post-thumbnail header .gb-block-post-grid-title a:focus,
.editor-styles-wrapper .is-style-overlay .has-post-thumbnail header .gb-block-post-grid-title a:hover {
	color: {$appearance['color-contrast']['accent']};
}
CSS;

	$css .= utc_editor_inline_color_palette();

	wp_add_inline_style( genesis_get_theme_handle() . '-editor-fonts', $css );

}

/**
 * Generate CSS for editor font sizes from the provided theme support.
 *
 * @since 1.2.0
 *
 * @return string The CSS for editor font sizes if theme support was declared.
 */
function utc_inline_font_sizes() {

	$css               = '';
	$editor_font_sizes = get_theme_support( 'editor-font-sizes' );

	if ( ! $editor_font_sizes ) {
		return '';
	}

	foreach ( $editor_font_sizes[0] as $font_size ) {
		$css .= <<<CSS
		.site-container .has-{$font_size['slug']}-font-size {
			font-size: {$font_size['size']}px;
		}
CSS;
	}

	return $css;

}

/**
 * Generate CSS for editor colors based on theme color palette support.
 *
 * @since 1.2.0
 *
 * @return string The editor colors CSS if `editor-color-palette` theme support was declared.
 */
function utc_inline_color_palette() {

	$css                  = '';
	$appearance           = genesis_get_config( 'appearance' );
	$editor_color_palette = $appearance['editor-color-palette'];

	foreach ( $editor_color_palette as $color_info ) {
		$css .= <<<CSS
		.site-container .has-{$color_info['slug']}-color,
		.site-container .wp-block-button .wp-block-button__link.has-{$color_info['slug']}-color,
		.site-container .wp-block-button.is-style-outline .wp-block-button__link.has-{$color_info['slug']}-color {
			color: {$color_info['color']};
		}

		.site-container .has-{$color_info['slug']}-background-color,
		.site-container .wp-block-button .wp-block-button__link.has-{$color_info['slug']}-background-color,
		.site-container .wp-block-pullquote.is-style-solid-color.has-{$color_info['slug']}-background-color {
			background-color: {$color_info['color']};
		}
CSS;
	}

	return $css;

}

/**
 * Generate CSS for editor colors based on theme color palette support.
 *
 * @since 1.1.0
 *
 * @return string The editor colors CSS if `editor-color-palette` theme support was declared.
 */
function utc_editor_inline_color_palette() {

	$css                  = '';
	$appearance           = genesis_get_config( 'appearance' );
	$editor_color_palette = $appearance['editor-color-palette'];

	foreach ( $editor_color_palette as $color_info ) {
		$css .= <<<CSS
		.has-{$color_info['slug']}-color {
			color: {$color_info['color']};
		}
CSS;
	}

	return $css;

}