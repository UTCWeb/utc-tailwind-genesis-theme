<?php
/**
 * UTC Tailwind Genesis.
 *
 * This file adds the Customizer additions to the UTC Tailwind Genesis Theme.
 *
 * @package UTC Tailwind Genesis
 * @author  Bridget Hornsby
 * @license GPL-2.0-or-later
 * @link    https://github.com/UTCWeb/utc-tailwind-genesis-the
 */

add_action( 'customize_register', 'utc_customizer_register' );
/**
 * Registers settings and controls with the Customizer.
 *
 * @since 1.0.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function utc_customizer_register( $wp_customize ) {

	$appearance = genesis_get_config( 'appearance' );

	$wp_customize->selective_refresh->add_partial(
		'utc_logo',
		[
			'selector'        => '.title-area',
			'settings'        => [ 'custom_logo' ],
			'render_callback' => function() {
				return genesis_do_header();
			},
		]
	);

	$wp_customize->add_section(
		'utc_theme_options',
		[
			'description' => __( 'Personalize your site with these available child theme options.', 'utc' ),
			'title'       => __( 'Child Theme Specific Settings', 'utc' ),
			'panel'       => 'genesis',
			'priority'    => 30,
		]
	);

	// Adds setting for link color.
	$wp_customize->add_setting(
		'utc_primary_color',
		[
			'default'           => $appearance['default-colors']['primary'],
			'sanitize_callback' => 'sanitize_hex_color',
		]
	);

	// Adds control for link color.
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'utc_primary_color',
			[
				'description' => __( 'Change the color used for the site title background, breadcrumb background, linked titles, menu links, entry meta link hover, pagination links, many buttons, & more.', 'utc' ),
				'label'       => __( 'Main Color', 'utc' ),
				'section'     => 'colors',
				'settings'    => 'utc_primary_color',
			]
		)
	);

	// Adds setting for accent color.
	$wp_customize->add_setting(
		'utc_accent_color',
		[
			'default'           => $appearance['default-colors']['accent'],
			'sanitize_callback' => 'sanitize_hex_color',
		]
	);

	// Adds control for accent color.
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'utc_accent_color',
			[
				'description' => __( 'Change the accent color used block underlay styles, overlay styles, & more.', 'utc' ),
				'label'       => __( 'Accent Color', 'utc' ),
				'section'     => 'colors',
				'settings'    => 'utc_accent_color',
			]
		)
	);

	// Adds setting for footer CTA background color.
	$wp_customize->add_setting(
		'utc_cta_color',
		[
			'default'           => $appearance['default-colors']['cta-color'],
			'sanitize_callback' => 'sanitize_hex_color',
		]
	);

	// Adds control for footer CTA background color.
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'utc_cta_color',
			[
				'description' => __( 'Change the background color for the before footer CTA widget area.', 'utc' ),
				'label'       => __( 'Before Footer CTA Color', 'utc' ),
				'section'     => 'colors',
				'settings'    => 'utc_cta_color',
			]
		)
	);

	// Adds setting for footer background color.
	$wp_customize->add_setting(
		'utc_footer_color',
		[
			'default'           => $appearance['default-colors']['footer'],
			'sanitize_callback' => 'sanitize_hex_color',
		]
	);

	// Adds control for footer background color.
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'utc_footer_color',
			[
				'description' => __( 'Change the footer background color.', 'utc' ),
				'label'       => __( 'Footer Background Color', 'utc' ),
				'section'     => 'colors',
				'settings'    => 'utc_footer_color',
			]
		)
	);

	// Adds control for search option.
	$wp_customize->add_setting(
		'utc_header_search',
		[
			'default'           => utc_customizer_get_default_search_setting(),
			'sanitize_callback' => 'absint',
		]
	);

	// Adds setting for search option.
	$wp_customize->add_control(
		'utc_header_search',
		[
			'label'       => __( 'Show Menu Search Icon?', 'utc' ),
			'description' => __( 'Check the box to show a search icon in the menu.', 'utc' ),
			'section'     => 'utc_theme_options',
			'type'        => 'checkbox',
			'settings'    => 'utc_header_search',
		]
	);

	// Adds control for the styled paragraph.
	$wp_customize->add_setting(
		'utc_intro_paragraph_styling',
		[
			'default'           => 1,
			'sanitize_callback' => 'absint',
		]
	);

	$wp_customize->add_control(
		'utc_intro_paragraph_styling',
		[
			'label'       => __( 'Enable the "intro" paragraph style on single posts?', 'utc' ),
			'description' => __( 'Check the box to automatically apply the "intro" font size and style to the first paragraph of all single posts.', 'utc' ),
			'section'     => 'utc_theme_options',
			'settings'    => 'utc_intro_paragraph_styling',
			'type'        => 'checkbox',
		]
	);

	// Adds control for the styled paragraph.
	$wp_customize->add_setting(
		'utc_meta_gravatar',
		[
			'default'           => 1,
			'sanitize_callback' => 'absint',
		]
	);

	$wp_customize->add_control(
		'utc_meta_gravatar',
		[
			'label'       => __( 'Show the gravatar before entry meta?', 'utc' ),
			'description' => __( 'Check the box to automatically show the author gravatar in the entry meta.', 'utc' ),
			'section'     => 'genesis_single',
			'settings'    => 'utc_meta_gravatar',
			'type'        => 'checkbox',
		]
	);

	// Adds control for the footer logo upload.
	$wp_customize->add_setting(
		'navigation-footer-logo',
		[
			'default'           => utc_get_default_footer_logo(),
			'sanitize_callback' => 'esc_attr',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'navigation-footer-logo',
			[
				'description' => __( 'Select an image to display above the footer credits. Images will display no more than 80px tall.', 'utc' ),
				'label'       => __( 'Footer Logo', 'utc' ),
				'section'     => 'title_tagline',
				'settings'    => 'navigation-footer-logo',
			]
		)
	);

}
