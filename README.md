# UTChattanooga WordPress Theme

Theme Name: UTC

Theme URI: https://github.com/UTCWeb/utc-tailwind-genesis-theme

Description: This is a custom theme created for the University of Tennessee Chattanooga using the Genesis Framework with TailwindCSS. It is based off the Genesis Sample theme.

Author: Bridget Hornsby

Author URI: https://www.utc.edu

Tags: accessibility-ready, block-styles, custom-colors, custom-logo, custom-menu, editor-style, featured-images, footer-widgets, full-width-template, left-sidebar, one-column, right-sidebar, rtl-language-support, sticky-post, theme-options, threaded-comments, translation-ready, two-columns, wide-blocks

Template: genesis

License: GPL-2.0-or-later | 
License URI: https://www.gnu.org/licenses/gpl-2.0.html

## Text Domain: utc

Requires at least: 5.4 | 
Requires PHP: 5.6 | 

## Requires:

node.js v14.16.1 | 
npm v6.14.12 | 
Webpack v5.38.1 | 
Webpack CLI v4.7.2 | 
Genesis v3.3.4 | 

## Dependencies:

autoprefixer v10.3.1 | 
cross-env v7.0.3 | 
laravel-mix v6.0.27 | 
postcss v8.3.6 | 
tailwindcss v2.2.7 | 

## Required plugins:

Font Awesome v4.0.0-rc23 | 
Genesis Block v1.2.5 (replaces Atomic Blocks) | 
Genesis Custom Blocks v1.3.0 | 
Simple Social Icons v3.0.2 | 
WP Database Backup v5.8.1 | 


## Before installing the new theme, take note:
1. Current list of sidebar widgets, less the "Meta" widget.
2. Current primary menu links.
3. You will need the department locale/contact information.

## Database setup:
1. Check to see if your primary menu is correct. If not, designate it by checking "Primary Menu" in Appearance > Menus and adding the appropriate links. In the rare occasion where the blog does not have a primary menu (ie., Gretchen E Potts, Phd.), you will need to add a blank primary menu and check checkbox "Primary Menu" and save it in order for the secondary menu to show up.

2. The secondary menu, which contains the "I am..." and the "Quick Links", is to be attached to an empty secondary menu.
    Under Appearance > Menus
    --Create a new menu. 
    --Name it (ex. Secondary Menu Placeholder).
    --Do not add any links to it. This will be done for you.
    --Check checkbox "Secondary Menu."
    --Save.

3. Add/Remove Appearance > Widgets
    --Place categories, archive and/or any other widgets present in the sidebar. 
        Regarding categories, archives, and tags: do not select dropdown option.

    --Onboarding should take care of this for you, but you may need to place a Block widget under "Above the Footer: Department
        Information". Place the HTML code below in the block.
        (The code below is just a template. Whether the information is onboarded or whether you have to manually input the code, you will need to replace the default UTC information with the department information.)

        (NOTE: A plugin is currently under development to add as a custom block during onboarding.)

        `<div class="department-footer bg-utc-blue-100 text-center mt-12" style="padding-top:36px;padding-bottom:36px;">
        <h2 class="text-3xl">The University of Tennessee at Chattanooga</h2>
        <div>
        <address class="flex-list not-italic text-lg">
        <div id="dpt-building" class="utc-dpt dpt-building separate">100 Founders Hall</div>
        <div id="dpt-mail-code" class="utc-dpt dpt-mail-code separate">5605</div>
        <div id="dpt-address" class="utc-dpt dpt-address separate"><a href="https://explore.utc.edu/" title="Go to the UTC map." class="dpt-link text-utc-blue-500 hover:bg-white">615 McCallie Ave, Chattanooga, TN 37403</a></div><div id="dpt-phone" class="utc-dpt dpt-phone separate"><i class="fas fa-phone"></i>&nbsp;<a class="dpt-link text-utc-blue-500 hover:bg-white" href="tel:423-425-4111">423-425-4111</a></div>			
        </address>
        </div>	
        <div class="mt-6">
        <ul class="inline horizontal">
        <li class="inline horizontal px-2">
        <a class="text-utc-blue-500 hover:text-utc-gold-500" href="https://www.utc.edu" target="_self" aria-label="Go to our departmental homepage" title="Go to our departmental homepage">
        <span class="fa fa-home fa-2x"></span>
        </a>
        </li>
        <li class="inline horizontal px-2">
        <a class="text-utc-blue-500 hover:text-utc-gold-500" href="https://blog.utc.edu/news/" target="_self" aria-label="Follow our Blog/News" title="Follow our Blog/News">
        <span class="fa fa-blog fa-2x"></span>
        </a>
        </li>
        <li class="inline horizontal px-2">
        <a class="text-utc-blue-500 hover:text-utc-gold-500" href="https://www.linkedin.com/school/27384/" target="_self" aria-label="Find us on LinkedIn" title="Find us on LinkedIn">
        <span class="fa fa-linkedin fa-2x"></span>
        </a>
        </li>
        <li class="inline horizontal px-2">
        <a class="text-utc-blue-500 hover:text-utc-gold-500" href="https://www.youtube.com/UTChattanooga" target="_self" aria-label="Find us on YouTube" title="Find us on YouTube">
        <span class="fa fa-youtube fa-2x"></span>
        </a>
        </li>
        <li class="inline horizontal px-2">
        <a class="text-utc-blue-500 hover:text-utc-gold-500" href="https://www.twitter.com/UTChattanooga" target="_self" aria-label="Find us on Twitter" title="Find us on Twitter">
        <span class="fa fa-twitter fa-2x"></span>
        </a>
        </li>
        <li class="inline horizontal px-2">
        <a class="text-utc-blue-500 hover:text-utc-gold-500" href="https://www.instagram.com/utchattanooga" target="_self" aria-label="Find us on Instagram" title="Find us on Instagram">
        <span class="fa fa-instagram fa-2x"></span>
        </a>
        </li>
        </ul>
        </div>
        </div>`
    
    --Remove the following widgets:
        Search
        Meta: Site Tools (or just Meta)

3. Add Appearance > Customize > Site Identity > Site Icon
    Onboarding should automatically add the favicon, but if it doesn't you can find the 512x512 power-c.png file in the theme's images file and upload it here.

4. The homepage h1 tage of the blog is automatically populated with the blog's name, meaning you may have two headings on the homepage. 
    Remove the extra one by going to "Edit Page" and removing it.

5. In some cases, the home page notes that it is a "Blog Except" with instructions to not remove. With this new theme, we will show the latest blog posts instead of this page. Go to Settings > Reading > and check "Your latest posts".