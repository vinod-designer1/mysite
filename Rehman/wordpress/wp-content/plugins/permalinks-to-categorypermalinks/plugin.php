<?php
/*
Plugin Name: Permalinks to Category/Permalinks
Plugin URI: http://orbisius.com/
Description: if you have an existing site and you want to add category to the links of your posts (e.g. by using this as permalinks /%category%/%postname%/) then you will into page not found errors. This plugin checks for such post links and redirects the visitor using 301 to the correct /Category/Permalink link.
Version: 1.0.1
Author: Svetoslav Marinov (Slavi)
Author URI: http://orbisius.com
*/

/*  Copyright 2012 Svetoslav Marinov (Slavi) <slavi@orbisius.com>

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// Set up plugin
add_action('template_redirect', 'orbisius_perma2catperma');
add_action('admin_menu', 'orbisius_perma2catperma_setup_admin');
add_action('wp_footer', 'orbisius_perma2catperma_add_plugin_credits', 1000); // be the last in the footer

/**
 * @package Permalinks to Category/Permalinks
 * @since 1.0
 *
 * Searches through posts to see if any matches the REQUEST_URI.
 * Also searches tags
 */
function orbisius_perma2catperma() {
	if (!is_404()) {
		return;
	}

    // e.g. http://site.com/site
    $site_url = get_site_url();

    // i.e. no domain e.g. /site
    $wp_web_dir = preg_replace('#https?://.*?/#si', '/', $site_url);

	// /post-asfiafoijasfasf-asfalkjhflajsfasf-fajsfh -> /category/post-asfiafoijasfasf-asfalkjhflajsfasf-fajsfh
	$req_url = $_SERVER["REQUEST_URI"];
	$req_url = preg_replace('#\?.*#si', '', $req_url);
	$req_url = str_replace($wp_web_dir, '', $req_url);

    $slug = $req_url;

    // different structure. skip it
    if (!preg_match('#^/[\w-]+/?$#', $slug)) {
        return ;
    }

    // Search for a post with exact name (slig) and then redirect if one is found
    // See: http://codex.wordpress.org/Template_Tags/get_posts
    // limiting the search .. this should be fast instead of looking for all of the posts.
    $posts = get_posts(array("name" => $slug, "post_type" => "post" , 'post_status' => 'publish', 'numberposts' => 2));

    if (!empty($posts) && count($posts) == 1) {
        $post = $posts[0];
        $redir = get_permalink($post->ID); // will include the correct url IF the permalinks are setup

        wp_redirect($redir, 301);

        exit();
    }
}

/**
 * Set up administration
 *
 * @package Permalinks to Category/Permalinks
 * @since 0.1
 */
function orbisius_perma2catperma_setup_admin() {
	add_options_page( 'Permalinks to Category/Permalinks', 'Permalinks to Category/Permalinks', 5, __FILE__, 'orbisius_perma2catperma_options_page' );
}

/**
 * Options page
 *
 * @package Permalinks to Category/Permalinks
 * @since 1.0
 */
function orbisius_perma2catperma_options_page() {
    $permalink_structure = get_option('permalink_structure');
	?>
	<div class="wrap">
        <h2>Permalinks to Category/Permalinks</h2>
        <p>Currently, the plugin does not require any configuration options.
            <br/> The plugin will automatically redirect your links e.g. <strong>/link-to-your-post/</strong> to <strong>/category/link-to-your-post/</strong></p>

        <?php if ($permalink_structure != '/%category%/%postname%/') : ?>
            <p class="error-message">Your current permalink settings do not match the expected format!</p>
            <p>Note: Please make sure that your permalinks (Settings &gt; Permalinks) are set to <strong>/%category%/%postname%/</strong></p>
            Current permalinks settings: <h2><?php echo $permalink_structure; ?></h2>
        <?php endif; ?>

        <h2>Mailing List</h2>
        <p>
            Get the latest news and updates about this and future cool <a href="http://profiles.wordpress.org/lordspace/"
                                                                            target="_blank" title="Opens a page with the pugins we developed. [New Window/Tab]">plugins we develop</a>.
        </p>

        <p>
            <!-- // MAILCHIMP SUBSCRIBE CODE \\ -->
            1) <a href="http://eepurl.com/guNzr" target="_blank">Subscribe to our newsletter</a>
            <!-- \\ MAILCHIMP SUBSCRIBE CODE // -->
        </p>
        <p>OR</p>
        <p>
            2) Subscribe using our QR code. [Scan it with your mobile device].<br/>
            <img src="<?php echo plugin_dir_url(__FILE__); ?>/i/guNzr.qr.2.png" alt="" />
        </p>

        <h2>Support</h2>
        <p>
            Suggest ideas to <a href="mailto:help@orbisius.com?subject=WordPress permalinks Contact"
                                            target="_blank">help@orbisius.com</a>
            or visit our web site <a href="http://orbisius.com" target="_blank">orbisius.com</a> and call.
        </p>

        <?php 
            $app_link = 'http://wordpress.org/extend/plugins/permalinks-to-categorypermalinks/';
            $app_title = 'Permalinks to Category/Permalinks';
            $app_descr = 'The plugin automatically redirects users who have accessed a blog post link without the category to the one which has the category and therefore avoiding page not found (404) errors.';
        ?>
        <h2>Share</h2>
        <p>
            <!-- AddThis Button BEGIN -->
            <div class="addthis_toolbox addthis_default_style addthis_32x32_style">
                <a class="addthis_button_facebook" addthis:url="<?php echo $app_link?>" addthis:title="<?php echo $app_title?>" addthis:description="<?php echo $app_descr?>"></a>
                <a class="addthis_button_twitter" addthis:url="<?php echo $app_link?>" addthis:title="<?php echo $app_title?>" addthis:description="<?php echo $app_descr?>"></a>
                <a class="addthis_button_google_plusone" g:plusone:count="false" addthis:url="<?php echo $app_link?>" addthis:title="<?php echo $app_title?>" addthis:description="<?php echo $app_descr?>"></a>
                <a class="addthis_button_linkedin" addthis:url="<?php echo $app_link?>" addthis:title="<?php echo $app_title?>" addthis:description="<?php echo $app_descr?>"></a>
                <a class="addthis_button_email" addthis:url="<?php echo $app_link?>" addthis:title="<?php echo $app_title?>" addthis:description="<?php echo $app_descr?>"></a>
                <a class="addthis_button_myspace" addthis:url="<?php echo $app_link?>" addthis:title="<?php echo $app_title?>" addthis:description="<?php echo $app_descr?>"></a>
                <a class="addthis_button_google" addthis:url="<?php echo $app_link?>" addthis:title="<?php echo $app_title?>" addthis:description="<?php echo $app_descr?>"></a>
                <a class="addthis_button_digg" addthis:url="<?php echo $app_link?>" addthis:title="<?php echo $app_title?>" addthis:description="<?php echo $app_descr?>"></a>
                <a class="addthis_button_delicious" addthis:url="<?php echo $app_link?>" addthis:title="<?php echo $app_title?>" addthis:description="<?php echo $app_descr?>"></a>
                <a class="addthis_button_stumbleupon" addthis:url="<?php echo $app_link?>" addthis:title="<?php echo $app_title?>" addthis:description="<?php echo $app_descr?>"></a>
                <a class="addthis_button_tumblr" addthis:url="<?php echo $app_link?>" addthis:title="<?php echo $app_title?>" addthis:description="<?php echo $app_descr?>"></a>
                <a class="addthis_button_favorites" addthis:url="<?php echo $app_link?>" addthis:title="<?php echo $app_title?>" addthis:description="<?php echo $app_descr?>"></a>
                <a class="addthis_button_compact"></a>
            </div>
            <!-- The JS code is in the footer -->

            <script type="text/javascript">
            var addthis_config = {"data_track_clickback":true};
            var addthis_share = {
              templates: { twitter: 'Check out {{title}} @ {{lurl}} (from @orbisius)' }
            }
            </script>
            <!-- AddThis Button START part2 -->
            <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=lordspace"></script>
            <!-- AddThis Button END part2 -->
        </p>

	</div>
	<?php
}

/**
* adds some HTML comments in the page so people would know that this plugin powers their site.
*/
function orbisius_perma2catperma_add_plugin_credits() {
    printf(PHP_EOL . PHP_EOL . '<!-- ' . PHP_EOL . ' Powered by Permalinks to Category/Permalinks Plugin | Author URL: http://orbisius.com ' . PHP_EOL . '-->' . PHP_EOL . PHP_EOL);
}
