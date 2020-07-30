<?php
/**
 * Custom ADS
 *
 * @package      COR
 * @author       Mark Corpuz
 * @since        1.0.0
 * @license      GPL-2.0+
**/

/**
 * Display Ads After Header
 * 
 */

add_action( 'genesis_after_header', 'ads_wide_after_header' );
function ads_wide_after_header() {

	if (is_single()) {
		echo '<div class="item ads below-header">';
		echo '<div class="wrap"><div style="height:300px;background-color:#eee;text-align:center;">GOOGLE ADS</div></div>';
		echo '</div>';
	}

}
add_action( 'genesis_before_footer', 'ads_wide_before_footer' );
function ads_wide_before_footer() {

	if (is_single()) {
		echo '<div class="item ads above-footer">';
		echo '<div class="wrap"><div style="height:300px;background-color:#eee;text-align:center;">GOOGLE ADS</div></div>';
		echo '</div>';
	}

}



// Display add area
//add_action( 'genesis_before', 'ads_wide_top' );
function ads_wide_top() {

	echo '<div class="item ads above-header">';
	echo '<div class="wrap" style="background-color: #eee;margin:1rem auto;max-width: 1168px;height:200px;">GOOGLE ADS</div>';
	echo '</div>';

}

// Display add area
//add_action( 'genesis_before_header', 'ads_wide_before_header' );
function ads_wide_before_header() {

	if (is_front_page()) {
		echo '<div class="item ads above-header">';
		echo '<h2 style="color:#eee;">LARGE GOOGLE ADS</h2>';
		echo '</div>';
	}

}