<?php
/**
 * UTC appearance settings.
 *
 * @package UTC
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://www.utc.edu
 */

$utc_default_colors = [
	'link'   => '#0073e5',
	'accent' => '#0073e5',
];

$utc_link_color = get_theme_mod(
	'utc_link_color',
	$utc_default_colors['link']
);

$utc_accent_color = get_theme_mod(
	'utc_accent_color',
	$utc_default_colors['accent']
);

$utc_link_color_contrast   = utc_color_contrast( $utc_link_color );
$utc_link_color_brightness = utc_color_brightness( $utc_link_color, 35 );

return [
	'fonts-url'            => 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,700&display=swap',
	'content-width'        => 1062,
	'button-bg'            => $utc_link_color,
	'button-color'         => $utc_link_color_contrast,
	'button-outline-hover' => $utc_link_color_brightness,
	'link-color'           => $utc_link_color,
	'default-colors'       => $utc_default_colors,
	'editor-color-palette' => [
		[
			'name'  => __( 'Custom color', 'utc' ), // Called “Link Color” in the Customizer options. Renamed because “Link Color” implies it can only be used for links.
			'slug'  => 'theme-primary',
			'color' => $utc_link_color,
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
			'size' => 12,
			'slug' => 'small',
		],
		[
			'name' => __( 'Normal', 'utc' ),
			'size' => 18,
			'slug' => 'normal',
		],
		[
			'name' => __( 'Large', 'utc' ),
			'size' => 20,
			'slug' => 'large',
		],
		[
			'name' => __( 'Larger', 'utc' ),
			'size' => 24,
			'slug' => 'larger',
		],
	],
];
