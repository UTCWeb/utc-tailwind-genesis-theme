<?php
/**
 * UTC.
 *
 * This file adds the default theme settings to the UTC Theme.
 *
 * @package UTC
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://www.utc.edu
 */

add_filter( 'simple_social_default_styles', 'utc_social_default_styles' );
/**
 * Set Simple Social Icon defaults.
 *
 * @since 1.0.0
 *
 * @param array $defaults Social style defaults.
 * @return array Modified social style defaults.
 */
function utc_social_default_styles( $defaults ) {

	$args = genesis_get_config( 'simple-social-icons-settings' );

	return wp_parse_args( $args, $defaults );

}
