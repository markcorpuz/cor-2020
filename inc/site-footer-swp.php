<?php
/**
 * SITE-FOOTER
 *
 * @package      SETUP-BE
 * @author       Mark Corpuz
 * @since        1.0.0
 * @license      GPL-2.0+
**/

/**
 * SITE-FOOTER
 * 
 * Module: Copyright
 * Module: Credit
 */
function setup_be_site_footer() {

	echo '<div class="module copyright">';
	echo '<div class="item logo"></div>';
	echo '<div class="item info">Copyright &copy; ' . date( 'Y' ) . ' ' . get_bloginfo( 'name' ) . '®. All Rights Reserved | <a href="' . home_url( 'privacy-policy' ) . '">Privacy Policy</a> | <a href="' . home_url( 'terms' ) . '">Terms</a> | <a href="#main-content">Back To Top</a></div>';
	echo '</div>';

	echo '<div class="module credit">';
	echo '<div class="item info">Site Design by <a href="https://smarterwebpackages.com/">SmarterWebPackages.com</a></div>';
 //  echo '<div class="item logo"><a href="https://smarterwebpackages.com/"><img src="' . get_stylesheet_directory_uri() . '/assets/images/brand-smarterwebpackages.png.webp" alt="SmarterWebPackages.com" width="130px" height="33px" loading="lazy"></a>';
	//echo '</div>';

}
add_action( 'genesis_footer', 'setup_be_site_footer' );
remove_action( 'genesis_footer', 'genesis_do_footer' );
