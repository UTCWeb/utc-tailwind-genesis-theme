<?php
    $building = block_field( 'building', false );
    $mail_code = block_field( 'mail-code', false );
    $street_address = block_field( 'street-address', false );
    $phone = block_field( 'phone', false );
    $phone = str_replace(' ', '', $phone);
    $email = block_field( 'email', false );
    $email = str_replace(' ', '', $email);
    $home = block_field( 'webpage-url', false );
    $blog = block_field( 'blog-page-url', false );
    $linkedin = block_field( 'linkedin-url', false );
    $youtube = block_field( 'youtube-url', false );
    $twitter = block_field( 'twitter-url', false );
    $instagram = block_field( 'instagram-url', false );
    $facebook = block_field( 'facebook-url', false );
    $days = block_field( 'days-open', false );
    $hours = block_field( 'hours-open', false );
?>

<div class="department-footer bg-utc-blue-100 text-center mt-12 py-6">
	    <h2 class="text-3xl"><?php block_field( 'utc-section' ); ?></h2>
		<div>
			<address class="flex-list not-italic text-lg">
                <?php 
                    if ( ! empty( $building ) ) {
                        echo '<div id="dpt-building" class="utc-dpt dpt-building separate">'; 
                        echo $building; 
                        echo '</div>';
                    } 
                    if ( ! empty( $mail_code ) ) {
                        echo '<div id="dpt-mail-code" class="utc-dpt dpt-mail-code separate">'; 
                        echo $mail_code; 
                        echo '</div>';
                    } 
                    if ( ! empty( $street_address ) ) {
                        echo '<div id="dpt-address" class="utc-dpt dpt-address separate">'; 
                        echo $street_address; 
                        echo ', Chattanooga, TN 37403</div>';
                    } 
                    if ( ! empty( $phone ) ) {
                        echo '<div id="dpt-phone" class="utc-dpt dpt-phone separate"><i class="fas fa-phone"></i>&nbsp;<a class="dpt-link text-utc-blue-500 hover:bg-white" href="tel:'; 
                        echo $phone; 
                        echo '" >';
                        echo $phone; 
                        echo '</a></div>';
                    } 
                    if ( ! empty( $email ) ) {
                        echo '<div id="dpt-email" class="utc-dpt dpt-email separate"><i class="fas fa-envelope"></i>&nbsp;<a class="dpt-link text-utc-blue-500 hover:bg-white" href="mailto:'; 
                        echo $email; 
                        echo '" >';
                        echo $email; 
                        echo '</a></div>';
                    } 
                ?>
			</address>
		</div>	
		<div class="mt-6">
            <ul class="inline horizontal">
                <?php 
                    if ( ! empty( $home ) ) {
                        echo '<li class="inline horizontal px-2">
                            <a class="text-white hover:text-utc-gold-500" href="';
                            echo $home; 
                            echo '" target="_self" aria-label="Go to our departmental homepage" title="Go to our departmental homepage">
                                <span class="fa fa-home fa-2x"></span>
                            </a>
                        </li>';
                    }
                    if ( ! empty( $blog ) ) {
                        echo '<li class="inline horizontal px-2">
                            <a class="text-white hover:text-utc-gold-500" href="';
                            echo $blog; 
                            echo '" target="_self" aria-label="Follow our Blog/News" title="Follow our Blog/News">
                                <span class="fa fa-blog fa-2x"></span>
                            </a>
                        </li>';
                    }
                    if ( ! empty( $linkedin ) ) {
                        echo '<li class="inline horizontal px-2">
                            <a class="text-white hover:text-utc-gold-500" href="';
                            echo $linkedin; 
                            echo '" target="_self" aria-label="Find us on LinkedIn" title="Find us on LinkedIn">
                                <span class="fa fa-linkedin fa-2x"></span>
                            </a>
                        </li>';
                    }
                    if ( ! empty( $youtube ) ) {
                        echo '<li class="inline horizontal px-2">
                            <a class="text-white hover:text-utc-gold-500" href="';
                            echo $youtube; 
                            echo '" target="_self" aria-label="Find us on YouTube" title="Find us on YouTube">
                                <span class="fa fa-youtube fa-2x"></span>
                            </a>
                        </li>';
                    }
                    if ( ! empty( $twitter ) ) {
                        echo '<li class="inline horizontal px-2">
                            <a class="text-white hover:text-utc-gold-500" href="';
                            echo $twitter; 
                            echo '" target="_self" aria-label="Find us on Twitter" title="Find us on Twitter">
                                <span class="fa fa-twitter fa-2x"></span>
                            </a>
                        </li>';
                    }
                    if ( ! empty( $instagram ) ) {
                        echo '<li class="inline horizontal px-2">
                            <a class="text-white hover:text-utc-gold-500" href="';
                            echo $instagram; 
                            echo '" target="_self" aria-label="Find us on Instagram" title="Find us on Instagram">
                                <span class="fa fa-instagram fa-2x"></span>
                            </a>
                        </li>';
                    }
                    if ( ! empty( $facebook ) ) {
                        echo '<li class="inline horizontal px-2">
                            <a class="text-utc-blue-500 hover:text-utc-gold-500" href="';
                             echo $facebook; 
                             echo '" target="_self" aria-label="Find us on facebook" title="Find us on facebook">
                             <span class="fa fa-facebook fa-2x"></span>
                            </a>
                        </li>
                    </ul>
                 </div>
            <div>';
                    }
            if ( (! empty( $days )) || (! empty( $hours )) ) {
                echo '<h3 class="text-2xl mt-4 mb-0">Department Hours</h3><div class="text-lg mt-2"><strong>'; 
                echo $days; 
                echo ':</strong> ';
                echo $hours;
            }
        ?>
        </div>
	</div>
