<?php
/**
 * Block Editor settings specific to UTC Tailwind Genesis.
 *
 * @package UTC Tailwind Genesis
 * @author  Bridget Hornsby
 * @license GPL-2.0-or-later
 * @link    https://github.com/UTCWeb/utc-tailwind-genesis-the
 */

$utc_default_colors = [
	'primary'   => '#112e51',
	'accent'    => '#fdb736',
	'cta-color' => '#112e51',
	'footer'    => '#050E18',
];

$utc_primary_color = get_theme_mod(
	'utc_primary_color',
	$utc_default_colors['primary']
);

$utc_accent_color = get_theme_mod(
	'utc_accent_color',
	$utc_default_colors['accent']
);

$utc_footer_color = get_theme_mod(
	'utc_footer_color',
	$utc_default_colors['footer']
);

$utc_cta_color = get_theme_mod(
	'utc_cta_color',
	$utc_default_colors['cta-color']
);

$utc_color_contrast   = [
	'primary'   => utc_color_contrast( $utc_primary_color ),
	'accent'    => utc_color_contrast( $utc_accent_color ),
	'footer'    => utc_color_contrast( $utc_footer_color ),
	'cta-color' => utc_color_contrast( $utc_cta_color ),
];
$utc_color_brightness = [
	'primary'   => utc_color_brightness( $utc_primary_color, 35 ),
	'accent'    => utc_color_brightness( $utc_accent_color, 35 ),
	'footer'    => utc_color_brightness( $utc_footer_color, 35 ),
	'cta-color' => utc_color_brightness( $utc_cta_color, 35 ),
];

return [
	'fonts-url'            => '//fonts.googleapis.com/css?family=Exo:400,400i,700,700i|Open+Sans:400,400i,700,700i&display=swap',
	'icons-url'            => get_stylesheet_directory_uri() . '/lib/css/ionicons.min.css',
	'content-width'        => 1200,
	'button-bg'            => $utc_accent_color,
	'button-color'         => $utc_color_contrast['accent'],
	'button-outline-hover' => $utc_color_brightness['accent'],
	'primary-color'        => $utc_primary_color,
	'default-colors'       => $utc_default_colors,
	'color-brightness'     => $utc_color_brightness,
	'color-contrast'       => $utc_color_contrast,
	'cta-color'            => $utc_cta_color,
	'footer'               => $utc_footer_color,
	'editor-color-palette' => [
		[
			'name'  => __( 'Main color', 'utc' ),
			'slug'  => 'theme-primary',
			'color' => $utc_primary_color,
		],
		[
			'name'  => __( 'Accent color', 'utc' ),
			'slug'  => 'theme-secondary',
			'color' => $utc_accent_color,
		],
	],
	'editor-font-sizes'    => [
		[
			'name' => __( 'Small', 'utc' ),
			'size' => 14,
			'slug' => 'small',
		],
		[
			'name' => __( 'Normal', 'utc' ),
			'size' => 18,
			'slug' => 'normal',
		],
		[
			'name' => __( 'Large', 'utc' ),
			'size' => 22,
			'slug' => 'large',
		],
		[
			'name' => __( 'Larger', 'utc' ),
			'size' => 26,
			'slug' => 'larger',
		],
	],
];
