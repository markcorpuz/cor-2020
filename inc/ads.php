<?php

// Place Wide Ads Below Header Area
add_action( 'genesis_before_content_sidebar_wrap', 'urc_adsbygoogles_top' );
function urc_adsbygoogles_top() {
    global $wp;
    if(preg_match('/^members-section|free-ebook/', $wp->request))
    {
        return;
    }

    echo '<div class="padding-bottom">'.urc_adsbygoogles_script().'</div>';
}


// Place Wide Ads Before Footer Area
add_action( 'genesis_after_content_sidebar_wrap', 'urc_adsbygoogles_bottom' );
function urc_adsbygoogles_bottom() {
    global $wp;
    if(preg_match('/^members-section|free-ebook/', $wp->request))
    {
        return;
    }

	echo '<div class="padding-top">'.urc_adsbygoogles_script().'</div>';
}


// Place Shortcodes for Ads on Homepage
function urc_adsbygoogle_home_inbetween() { 
 
// Advertisement code pasted inside a variable
$string = '<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-0947746501358966"
		     crossorigin="anonymous"></script>
		<!-- Page & Post Article Body Resposive Ad -->
		<ins class="adsbygoogle"
		     style="display:block"
		     data-ad-client="ca-pub-0947746501358966"
		     data-ad-slot="7597430493"
		     data-ad-format="auto"
		     data-full-width-responsive="true"></ins>
		<script>
		     (adsbygoogle = window.adsbygoogle || []).push({});
		</script>';
 
// Ad code returned
return $string; 
 
}
// Register shortcode
add_shortcode('spk_adsbygoogle_js', 'urc_adsbygoogle_home_inbetween');


// Actual Ad Placement Script
function urc_adsbygoogles_script() {

	return '<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-0947746501358966"
		     crossorigin="anonymous"></script>
		<!-- Page & Post Article Body Resposive Ad -->
		<ins class="adsbygoogle"
		     style="display:block"
		     data-ad-client="ca-pub-0947746501358966"
		     data-ad-slot="7597430493"
		     data-ad-format="auto"
		     data-full-width-responsive="true"></ins>
		<script>
		     (adsbygoogle = window.adsbygoogle || []).push({});
		</script>';

}
