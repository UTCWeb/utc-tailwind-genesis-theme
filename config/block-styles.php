<?php
/**
 * Block styles specific to UTC Tailwind Genesis.
 *
 * @package UTC Tailwind Genesis
 * @author  Bridget Hornsby
 * @license GPL-2.0-or-later
 * @link    https://github.com/UTCWeb/utc-tailwind-genesis-the
 */

return [
	'core/button'                => [
		[
			'name'  => 'button-line',
			'label' => __( 'Button Line', 'utc' ),
		],
	],
	'core/heading'               => [
		[
			'name'         => 'xl-text',
			'label'        => __( 'Extra Large', 'utc' ),
			'inline_style' => '.is-style-xl-text, .editor-styles-wrapper .is-style-xl-text { font-size: 80px; }',
		],
		[
			'name'         => 'small-text',
			'label'        => __( 'Small Capitals', 'utc' ),
			'inline_style' => '.is-style-small-text, .editor-styles-wrapper .is-style-small-text { font-family: Exo, sans-serif; font-size: 18px; text-transform: uppercase; letter-spacing: 1px;}',
		],
	],
	'core/image'                 => [
		[
			'name'  => 'book-style',
			'label' => __( 'Book Style', 'utc' ),
		],
	],
	'core/paragraph'             => [
		[
			'name'         => 'highlight-text',
			'label'        => __( 'Heading Font', 'utc' ),
			'inline_style' => 'p.is-style-highlight-text { font-family: Open Sans, Helvetica, Arial, sans-serif; font-weight: 400; letter-spacing: -1px; line-height: 1.6; }',
		],
		[
			'name'         => 'capital-text',
			'label'        => __( 'Capitals', 'utc' ),
			'inline_style' => '.is-style-capital-text, .editor-styles-wrapper .is-style-capital-text { font-family: Open Sans, sans-serif; font-size: 18px; text-transform: uppercase; letter-spacing: 1px;}',
		],
	],
	'core/quote'                 => [
		[
			'name'  => 'quote-underlay',
			'label' => __( 'Styled Underlay', 'utc' ),
		],
	],
	'core/separator'             => [
		[
			'name'         => 'theme-separator',
			'label'        => __( 'Theme Separator', 'utc' ),
			'inline_style' => '.wp-block-separator.is-style-theme-separator { border-bottom: 1px solid currentColor !important; border-left: 1px solid currentColor; height: 20px !important; margin: 2.2em 0 2em 4em; max-width: 100% !important; }',
		],
	],
];
