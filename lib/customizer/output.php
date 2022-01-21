<?php
/**
 * UTC Tailwind Genesis.
 *
 * This file adds the required CSS to the front end to the UTC Tailwind Genesis Theme.
 *
  * @package UTC Tailwind Genesis
 * @author  Bridget Hornsby
 * @license GPL-2.0-or-later
 * @link    https://github.com/UTCWeb/utc-tailwind-genesis-the
 */

add_action( 'wp_enqueue_scripts', 'utc_css' );
/**
 * Checks the settings for the customized colors.
 * If any of these values are set the appropriate CSS is output.
 *
 * @since 1.0.0
 */
function utc_css() {

	$appearance = genesis_get_config( 'appearance' );

	$color_primary = get_theme_mod( 'utc_primary_color', $appearance['default-colors']['primary'] );
	$footer_cta    = get_theme_mod( 'utc_cta_color', $appearance['default-colors']['cta-color'] );
	$footer        = get_theme_mod( 'utc_footer_color', $appearance['default-colors']['footer'] );

	$css = '';

	$css .= ( $appearance['default-colors']['primary'] !== $color_primary ) ? sprintf(
		'

		a,
		.entry-meta a:focus,
		.entry-meta a:hover,
		.entry-title a,
		.genesis-nav-menu a,
		.genesis-nav-menu .toggle-header-search,
		.genesis-responsive-menu .genesis-nav-menu a:focus,
		.genesis-responsive-menu .genesis-nav-menu a:hover,
		.sidebar .widget-title a,
		.sub-menu-toggle:focus,
		.sub-menu-toggle:hover,
		#genesis-mobile-nav-primary:focus,
		#genesis-mobile-nav-primary:hover {
			color: %1$s;
		}

		button,
		button:hover,
		button:focus,
		input[type="button"],
		input[type="button"]:focus,
		input[type="button"]:hover,
		input[type="reset"],
		input[type="reset"]:focus,
		input[type="reset"]:hover,
		input[type="submit"],
		input[type="submit"]:focus,
		input[type="submit"]:hover,
		.archive-pagination a:focus,
		.archive-pagination a:hover,
		.archive-pagination li.active a,
		.before-footer-cta button:focus,
		.before-footer-cta button:hover,
		.before-footer-cta input[type="button"]:focus,
		.before-footer-cta input[type="button"]:hover,
		.before-footer-cta input[type="reset"]:focus,
		.before-footer-cta input[type="reset"]:hover,
		.before-footer-cta input[type="submit"]:focus,
		.before-footer-cta input[type="submit"]:hover,
		.before-footer-cta .button:focus,
		.before-footer-cta .button:hover,
		.button,
		.button:focus,
		.button:hover,
		.more-link,
		.more-link:focus,
		.more-link:hover,
		.nav-primary .genesis-nav-menu .sub-menu a:focus,
		.nav-primary .genesis-nav-menu .sub-menu a:hover,
		.site-container div.wpforms-container-full .wpforms-form input[type="submit"],
		.site-container div.wpforms-container-full .wpforms-form button[type="submit"],
		.site-container div.wpforms-container-full .wpforms-form input[type="submit"]:focus,
		.site-container div.wpforms-container-full .wpforms-form input[type="submit"]:hover,
		.site-container div.wpforms-container-full .wpforms-form button[type="submit"]:focus,
		.site-container div.wpforms-container-full .wpforms-form button[type="submit"]:hover,
		.site-title a,
		.site-title a:focus,
		.site-title a:hover {
			background-color: %1$s;
			color: %2$s;
		}

		.breadcrumb {
			background-color: %1$s;
			background-image: linear-gradient(-145deg, rgba(250, 247, 244, 0.2) 0%%, %1$s 50%%);
			color: %2$s;
		}

		.breadcrumb a,
		.breadcrumb a:focus,
		.breadcrumb a:hover {
			color: %2$s;
		}

		.site-header .genesis-nav-menu > .menu-item > a:focus,
		.site-header .genesis-nav-menu > .menu-item > a:hover,
		.site-header .genesis-nav-menu > .menu-item:focus-within > a,
		.site-header .genesis-nav-menu > .menu-item:hover > a,
		.site-header .genesis-nav-menu > .menu-item.current-menu-item > a{
			border-color: %1$s;
		}

		@media only screen and (max-width: 1023px) {
			.genesis-responsive-menu .genesis-nav-menu a:focus,
			.genesis-responsive-menu .genesis-nav-menu a:hover,
			.genesis-responsive-menu .genesis-nav-menu .sub-menu .menu-item a:focus,
			.genesis-responsive-menu .genesis-nav-menu .sub-menu .menu-item a:hover,
			.genesis-responsive-menu.nav-primary .genesis-nav-menu .sub-menu .current-menu-item > a {
				color: %1$s;
			}
		}

		',
		$color_primary,
		$appearance['color-contrast']['primary']
	) : '';

	$css .= ( $appearance['default-colors']['cta-color'] !== $footer_cta ) ? sprintf(
		'
		.before-footer-cta {
			background-color: %1$s;
			background-image: linear-gradient(75deg, %1$s 0%%, rgba(0, 0, 0, 0.3) 100%%);
		}

		.before-footer-cta,
		.before-footer-cta a,
		.before-footer-cta p,
		.before-footer-cta .widget-title {
			color: %2$s;
		}
		',
		$footer_cta,
		$appearance['color-contrast']['cta-color']
	) : '';

	$css .= ( $appearance['default-colors']['footer'] !== $footer ) ? sprintf(
		'
		.site-footer {
			background-color: %1$s;
		}

		.site-footer a,
		.site-footer a:focus,
		.site-footer a:hover,
		.site-footer p,
		.site-footer .genesis-nav-menu a:focus,
		.site-footer .genesis-nav-menu a:hover,
		.site-footer .genesis-nav-menu .current-menu-item > a,
		.site-footer .genesis-nav-menu .current-menu-item > a:focus,
		.site-footer .genesis-nav-menu .current-menu-item > a:hover,
		.site-footer .genesis-nav-menu a,
		.site-footer .widget-title {
			color: %2$s;
		}
		',
		$footer,
		$appearance['color-contrast']['footer']
	) : '';

	$intro_paragraph = get_theme_mod( 'utc_intro_paragraph_styling', 1 );

	$css .= ( $intro_paragraph ) ? sprintf(
		'
		.single .content .entry-content > p:first-of-type {
			border-bottom: 1px solid rgba(0, 0, 0, 0.07);
			font-size: 22px;
			padding-bottom: 34px;
		}
		'
	) : '';

	if ( $css ) {
		wp_add_inline_style( genesis_get_theme_handle(), $css );
	}

}
