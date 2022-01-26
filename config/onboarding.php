<?php
/**
 * UTC Tailwind Genesis.
 * 
 * Onboarding config to load plugins and homepage content on theme activation.
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
				'name'       => __( 'FontAwesome', 'utc' ),
				'slug'       => 'font-awesome/font-awesome.php',
				'public_url' => 'https://wordpress.org/plugins/genesis-enews-extended/',
			],
			[
				'name'       => __( 'Widget Options', 'utc' ),
				'slug'       => 'widget-options/plugin.php',
				'public_url' => 'https://wordpress.org/plugins/widget-options/',
			],
		],
	],
	// Full content omitted for this example leaving only keys.
	'content'          => [
		'page1' => [],
		'page2'    => [],
		'page3'  => [],
		'page4'   => [],
		'page5'  => [],
		'page6'  => [],
	],
	'navigation_menus' => [
		'primary' => [
			'page1' => [
				'title' => 'Page 1',
			],
			'page2'    => [
				'title' => 'Page 2',
			],
			'page3'  => [
				'title' => 'Page 3',
			],
			'page4'   => [
				'title' => 'Page 4',
			],
			'page5'  => [
				'title' => 'Page 5',
			],
			'page6'  => [
				'title' => 'Page 6',
			],
		],
		'secondary' => [],
		'sidebar' => [],
	],
	'widgets'          => [
		'footer-business-info' => [
			[
				'type' => 'block',
				'args' => [
					'title'  => '',
					'content'   => '<!-- wp:genesis-custom-blocks/department-info /-->',
				],
			],
		],
		'before-footer-cta'    => [
			[
				'type' => 'custom_html',
				'args' => [
					'title'   => '',
					'content' => '<div id="right-footer-menu" class="footer-menu">
						<nav role="navigation" aria-labelledby="" class="left-footer-menu text-right">
							<ul class="menu">
								<li class="menu-item"> <a href="/about/student-resources" data-drupal-link-system-path="node/38451">Students</a> </li>
								<li class="menu-item"> <a href="/about/faculty-and-staff-resources" data-drupal-link-system-path="node/38411">Faculty and Staff</a> </li>
								<li class="menu-item"> <a href="/about/alumni-and-friends" data-drupal-link-system-path="node/38376">Alumni and Friends</a> </li>
								<li class="menu-item"> <a href="/enrollment-management-and-student-affairs/admissions/parents" data-drupal-link-system-path="node/36067">Parents</a> </li>
								<li class="menu-item"> <a href="/finance-and-administration/auxiliary-services/parking-services" data-drupal-link-system-path="node/1296">Parking</a> </li>
								<li class="menu-item"> <a href="/about/emergency-preparedness" data-drupal-link-system-path="node/38406">Emergency Preparedness</a> </li>
								<li class="menu-item"> <a href="/enrollment-management-and-student-affairs/admissions/visit" data-drupal-link-system-path="node/36137">Visit</a> </li>
							</ul>
						</nav>
					</div>
					<div id="center-footer-menu">
						&nbsp;
					</div>
					<div id="right-footer-menu" class="footer-menu">
						<nav role="navigation" aria-labelledby="" id="" class="right-footer-menu">
							<ul class="menu">
								<li class="menu-item"> <a href="https://mymocs.utc.edu/">MyMocsNet</a> </li>
								<li class="menu-item"> <a href="https://office.com/">O365</a> </li>
								<li class="menu-item"> <a href="/information-technology/passwords" data-drupal-link-system-path="node/1831">Change Password</a> </li>
								<li class="menu-item"> <a href="https://people.utc.edu/eGuide/servlet/eGuide">People Directory</a> </li>
								<li class="menu-item"> <a href="https://events.utc.edu/MasterCalendar/MasterCalendar.aspx">Calendars</a> </li>
								<li class="menu-item"> <a href="https://www.utc.edu/finance-and-administration/human-resources/work" data-drupal-link-system-path="node/38406">Employment Opportunities</a> </li>
								<li class="menu-item"> <a href="https://blog.utc.edu/wp-login.php">CAS Log In</a> </li>
							</ul>
						</nav>
					</div>',
				],
			],
		],
		'footer-widget'        => [
			[
				'type' => 'custom_html',
				'args' => [
					'title'     => '',
					'content'  => '<div class="wrap">
						<div class="footer-copyright-container">
							<div class="footer-copyright"><h2 class="screen-reader-text">Footer</h2></div><div class="copyright"><p></p><div class="block"><a href="https://www.utc.edu/about/contact/" id="legal-questions">Questions?</a> ©&nbsp;2022 <a href="https://www.utc.edu" title="UTC homepage"> University&nbsp;of&nbsp;Tennessee&nbsp;at&nbsp;Chattanooga</a>. All&nbsp;rights&nbsp;reserved.</div>
								<div class="block">615&nbsp;McCallie&nbsp;Avenue
								| Chattanooga,&nbsp;TN&nbsp;37403 | 
								(423)&nbsp;425‑4111
								</div>
								<div class="block"><a href="https://www.utc.edu/sexual-misconduct/index.php#title-ix-statement" id="legal-title-ix">Title&nbsp;IX&nbsp;Statement</a> | <a href="/node/776/" id="legal-eeo">EEO&nbsp;Statement</a> | <a href="https://www.utc.edu/about/privacy.php" id="legal-privacy">Privacy&nbsp;Statement</a> | <a href="https://www.utc.edu/academic-affairs/accessible-information-materials-technology-program/">Accessibility</a> | <a href="https://utcwebdev.atlassian.net/servicedesk/customer/portals">Web&nbsp;Requests</a></div>
								<div class="block">A comprehensive, community-engaged campus of&nbsp;the <a href="http://www.tennessee.edu/" id="legal-ut">University&nbsp;of&nbsp;Tennessee&nbsp;System</a> and partner in the <a href="https://www.tntransferpathway.org">Tennessee&nbsp;Transfer&nbsp;Pathway</a>.</div>
								</div>
						</div>
					</div>',
				],
			],
		],
	],
];
