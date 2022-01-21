
<div class="department-footer bg-utc-blue-100 text-center mt-12 pt-6 pb-12">
	    <h2 class="text-3xl"><?php block_field( 'utc-section' ); ?></h2>
		<div>
			<address class="flex-list not-italic text-lg">
                <div id="dpt-building" class="utc-dpt dpt-building separate"><?php block_field( 'building' ); ?></div>
                <div id="dpt-mail-code" class="utc-dpt dpt-mail-code separate"><?php block_field( 'mail-code' ); ?></div>
                <div id="dpt-address" class="utc-dpt dpt-address separate"><?php block_field( 'street-address' ); ?>, Chattanooga, TN 37403</div>
                <div id="dpt-phone" class="utc-dpt dpt-phone separate"><i class="fas fa-phone"></i>&nbsp;<a class="dpt-link text-utc-blue-500 hover:text-utc-links-hoverFooterIcons" href="tel:<?php block_field( 'phone' ); ?>"><?php block_field( 'phone' ); ?></a></div>	
                <div id="dpt-email" class="utc-dpt dpt-email"><i class="fas fa-envelope"></i>&nbsp;<a class="dpt-link text-utc-blue-500 hover:text-utc-links-hoverFooterIcons" href="mailto:<?php block_field( 'email' ); ?>"><?php block_field( 'email' ); ?></a></div>
			</address>
		</div>	
		<div class="mt-6">
            <ul class="inline horizontal">
                <li class="inline horizontal px-2">
                    <a class="text-utc-blue-500 hover:text-utc-links-hoverFooterIcons" href="<?php block_field( 'webpage-url' ); ?>" target="_self" aria-label="Back to our departmental homepage" title="Back to our departmental homepage">
                    <span class="fa fa-home fa-2x"></span>
                    </a>
                </li>
                <li class="inline horizontal px-2">
                    <a class="text-utc-blue-500 hover:text-utc-links-hoverFooterIcons" href="<?php block_field( 'blog-page-url' ); ?>" target="_self" aria-label="Follow our Blog/News" title="Follow our Blog/News">
                        <span class="fa fa-blog fa-2x"></span>
                    </a>
                </li>
                <li class="inline horizontal px-2">
                    <a class="text-utc-blue-500 hover:text-utc-links-hoverFooterIcons" href="<?php block_field( 'linkedin-url' ); ?>" target="_self" aria-label="Find us on LinkedIn" title="Find us on LinkedIn">
                        <span class="fa fa-linkedin fa-2x"></span>
                    </a>
                </li>
                <li class="inline horizontal px-2">
                    <a class="text-utc-blue-500 hover:text-utc-links-hoverFooterIcons" href="<?php block_field( 'youtube-url' ); ?>" target="_self" aria-label="Find us on Youtube" title="Find us on Youtube">
                        <span class="fa fa-youtube fa-2x"></span>
                    </a>
                </li>
                <li class="inline horizontal px-2">
                   <a class="text-utc-blue-500 hover:text-utc-links-hoverFooterIcons" href="<?php block_field( 'twitter-url' ); ?>" target="_self" aria-label="Find us on Twitter" title="Find us on Twitter">
                        <span class="fa fa-twitter fa-2x"></span>
                    </a>
                </li>
                <li class="inline horizontal px-2">
                    <a class="text-utc-blue-500 hover:text-utc-links-hoverFooterIcons" href="<?php block_field( 'instagram-url' ); ?>" target="_self" aria-label="Find us on Instagram" title="Find us on Instagram">
                        <span class="fa fa-instagram fa-2x"></span>
                    </a>
                </li>
                <li class="inline horizontal px-2">
                    <a class="text-utc-blue-500 hover:text-utc-links-hoverFooterIcons" href="<?php block_field( 'facebook-url' ); ?>" target="_self" aria-label="Find us on Facebook" title="Find us on Facebook">
                        <span class="fa fa-facebook fa-2x"></span>
                    </a>
                </li>
            </ul>
		</div>
	</div>
