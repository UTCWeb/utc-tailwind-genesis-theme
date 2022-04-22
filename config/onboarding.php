<?php
/**
 * UTC Tailwind Genesis.
 * 
 * Onboarding config to load plugins and minimal content on theme activation.
 *
 * Visit `/wp-admin/admin.php?page=genesis-getting-started` to trigger import.
 * 
 *
 * @package UTC Tailwind Genesis
 * @author  Bridget Hornsby
 * @license GPL-2.0-or-later
 * @link    https://github.com/UTCWeb/utc-tailwind-genesis-theme
 */

return [
	'dependencies'     => [
		'plugins' => [
			[
				'name'       => __( 'Genesis Blocks', 'utc' ),
				'slug'       => 'genesis-blocks/genesis-blocks.php',
				'public_url' => 'https://wordpress.org/plugins/genesis-blocks/',
			],
			[
				'name'       => __( 'Genesis Custom Blocks', 'utc' ),
				'slug'       => 'genesis-custom-blocks/genesis-custom-blocks.php',
				'public_url' => 'https://www.studiopress.com/genesis-custom-blocks/',
			],
			[
				'name'       => __( 'Widget Options', 'utc' ),
				'slug'       => 'widget-options/plugin.php',
				'public_url' => 'https://wordpress.org/plugins/widget-options/',
			],
		],
	],
	'widgets'          => [
		'footer-dept-info' => [
			[
				'type' => 'block',
				'args' => [
					'title'  => '',
					'content'   => '<div class="department-footer bg-utc-blue-100 text-center mt-12 pt-6 pb-12">
					<h2 class="text-3xl">The University of Tennessee at Chattanooga</h2>
					<div>
						<address class="flex-list not-italic text-lg">
							<div id="dpt-building" class="utc-dpt dpt-building separate"></div>
							<div id="dpt-mail-code" class="utc-dpt dpt-mail-code separate"></div>
							<div id="dpt-address" class="utc-dpt dpt-address separate">615 McCallie Ave, Chattanooga, TN 37403</div>
							<div id="dpt-phone" class="utc-dpt dpt-phone separate"><i class="fas fa-phone"></i>&nbsp;<a class="dpt-link text-utc-blue-500 hover:bg-white" href="tel:  423-425-4111">  423-425-4111</a></div>	
							
						</address>
					</div>	
					<div class="mt-6">
						<ul class="inline horizontal">
							<li class="inline horizontal px-2">
								<a class="text-utc-blue-500 hover:text-utc-links-hoverFooterIcons" href="https://www.utc.edu" target="_self" aria-label="Back to our departmental homepage" title="Back to our departmental homepage">
								<span class="fa fa-home fa-2x"></span>
								</a>
							</li>
							<li class="inline horizontal px-2">
								<a class="text-utc-blue-500 hover:text-utc-links-hoverFooterIcons" href="https://blog.utc.edu/news/" target="_self" aria-label="Follow our Blog/News" title="Follow our Blog/News">
									<span class="fa fa-blog fa-2x"></span>
								</a>
							</li>
							<li class="inline horizontal px-2">
								<a class="text-utc-blue-500 hover:text-utc-links-hoverFooterIcons" href="https://www.linkedin.com/school/27384/" target="_self" aria-label="Find us on LinkedIn" title="Find us on LinkedIn">
									<span class="fa fa-linkedin fa-2x"></span>
								</a>
							</li>
							<li class="inline horizontal px-2">
								<a class="text-utc-blue-500 hover:text-utc-links-hoverFooterIcons" href="https://www.youtube.com/UTChattanooga" target="_self" aria-label="Find us on Youtube" title="Find us on Youtube">
									<span class="fa fa-youtube fa-2x"></span>
								</a>
							</li>
							<li class="inline horizontal px-2">
							   <a class="text-utc-blue-500 hover:text-utc-links-hoverFooterIcons" href="https://www.twitter.com/UTChattanooga" target="_self" aria-label="Find us on Twitter" title="Find us on Twitter">
									<span class="fa fa-twitter fa-2x"></span>
								</a>
							</li>
							<li class="inline horizontal px-2">
								<a class="text-utc-blue-500 hover:text-utc-links-hoverFooterIcons" href="https://www.instagram.com/utchattanooga" target="_self" aria-label="Find us on Instagram" title="Find us on Instagram">
									<span class="fa fa-instagram fa-2x"></span>
								</a>
							</li>
							<li class="inline horizontal px-2">
								<a class="text-utc-blue-500 hover:text-utc-links-hoverFooterIcons" href="https://www.facebook.com/UTChattanooga" target="_self" aria-label="Find us on Facebook" title="Find us on Facebook">
									<span class="fa fa-facebook fa-2x"></span>
								</a>
							</li>
						</ul>
					</div>
				</div>',
				],
			],
		],
	],
	'content'          => [
		'placeholder' => [],
	],
	'navigation_menus' => [
		'secondary' => [
			'placeholder' => [
				'title' => ' ',
			],
		],
	],
];

