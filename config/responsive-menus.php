<?php
/**
 * UTC Tailwind Genesis.
 *
 * This file defines the responsive menu options.
 *
 * @package UTC Tailwind Genesis
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://github.com/UTCWeb/utc-tailwind-genesis-theme
 */

/**
 * Genesis responsive menus settings. (Requires Genesis 3.0+.)
 */
return [
	'script' => [
		'mainMenu'         => __( '', 'utc' ),
		'menuIconClass'       => 'ionicons-before ion-ios-menu',
		'menuIconOpenedClass' => 'ionicons-before ion-ios-close',
		'subMenuIconClass'    => 'ionicons-before ion-ios-arrow-down',
		'menuClasses'         => [
			'others' => [ '.nav-primary' ],
		],
	],
	'extras' => [
		'media_query_width' => '991px',
	],
];

