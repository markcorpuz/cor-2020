<?php


	// ++++++++++++++++++++++++++++ OTEC ================================

	// remove trash from wp_head

	//add_filter( 'wp_default_scripts', 'remove_jquery_migrate' );
	function remove_jquery_migrate( &$scripts){
		if(!is_admin()){
			$scripts->remove( 'jquery' );
//			$scripts->add( 'jquery', false, array( 'jquery-core' ), '1.2.1' );
		}
	}

//	remove_action( 'wp_head', 'wp_generator' );
//	remove_action( 'wp_head', 'wlwmanifest_link' );
//	remove_action( 'wp_head', 'rsd_link' );
//	remove_action('wp_head', 'wp_shortlink_wp_head');
//	remove_action('wp_head','adjacent_posts_rel_link_wp_head');
//	remove_action('wp_head','feed_links_extra', 3);
//	remove_action('xmlrpc_rsd_apis', 'rest_output_rsd');
//	remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
//	remove_action( 'wp_head', 'wp_oembed_add_host_js');
//	remove_action('wp_head', 'print_emoji_detection_script', 7);
//	remove_action('wp_print_styles', 'print_emoji_styles');
//	remove_action( 'wp_head', 'wp_resource_hints', 2 );


	if( 0 ){ //KP debuging adds
	//if( 'Disable REST API' ){
//		add_filter( 'rest_enabled', '__return_false' );
		remove_action( 'xmlrpc_rsd_apis', 'rest_output_rsd' );
		remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
		remove_action( 'template_redirect', 'rest_output_link_header', 11 );
		remove_action( 'auth_cookie_malformed', 'rest_cookie_collect_status' );
		remove_action( 'auth_cookie_expired', 'rest_cookie_collect_status' );
		remove_action( 'auth_cookie_bad_username', 'rest_cookie_collect_status' );
		remove_action( 'auth_cookie_bad_hash', 'rest_cookie_collect_status' );
		remove_action( 'auth_cookie_valid', 'rest_cookie_collect_status' );
		remove_filter( 'rest_authentication_errors', 'rest_cookie_check_errors', 100 );

		// if enable yoast master not work
//		remove_action( 'init', 'rest_api_init' );
//		remove_action( 'parse_request', 'rest_api_loaded' );

		remove_action( 'rest_api_init', 'rest_api_default_filters', 10 );
		remove_action( 'rest_api_init', 'wp_oembed_register_route'              );
		remove_filter( 'rest_pre_serve_request', '_oembed_rest_pre_serve_request', 10 );
		remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
		remove_action( 'wp_head', 'wp_oembed_add_host_js' );
	}

	add_filter( 'term_description', 'shortcode_unautop');
	add_filter( 'term_description', 'do_shortcode' );

	function wpassist_remove_block_library_css(){
		wp_dequeue_style( 'wp-block-library' );
	}
//	add_action( 'wp_enqueue_scripts', 'wpassist_remove_block_library_css' );

// end of remove trash from wp_head


	function remove_unused_styles (){
//		if ( is_page(17284) ){
		if ( is_front_page() ){
			wp_dequeue_style( 'mp-theme' );
			wp_dequeue_style( 'mp-login-css' );
			wp_dequeue_style( 'mp-account-css' );
			wp_deregister_style('mepr-jquery-ui-smoothness');
			wp_dequeue_style('mepr-jquery-ui-smoothness');
			wp_deregister_style( 'dashicons' );
			wp_deregister_style('mp-account-css');
			wp_dequeue_style( 'mp-signup' );
			wp_dequeue_style( 'mepr-zxcvbn-css' );
			wp_dequeue_style( 'mp-plans-css' );
//			echo 'remove_unused_styles8';
		}
	}
//	add_action( 'wp_enqueue_scripts', 'remove_unused_styles');




//	add_action( 'wp_print_scripts', 'de_script', 100 );
	function de_script() {
		wp_dequeue_script( 'jquery' );
		wp_deregister_script( 'jquery' );
	}


//	wp_enqueue_script( 'my-script', get_template_directory_uri() . '/js/my-script.js' );
//	add_filter( 'script_loader_tag', 'defer_my_script', 10, 3 );
	function defer_my_script( $tag, $handle, $src ) {
		if ( 'my-script' === $handle ) {
			return str_replace( ' src', ' defer src', $tag );
		}
		return $tag;
	}




//	add_filter( 'script_loader_tag', 'wsds_defer_scripts', 10, 3 );
	function wsds_defer_scripts( $tag, $handle, $src ) {
		// The handles of the enqueued scripts we want to defer
		$defer_scripts = array(
			'jquery',
			'underscore',
			'regenerator-runtime',
			'wp-polyfill',
			'hooks',
//			'et_monarch-custom-js',
//			'wpshout-js-cookie-demo',
//			'cookie',
//			'wpshout-no-broken-image',
//			'goodbye-captcha-public-script',
//			'devicepx',
//			'search-box-value',
//			'page-min-height',
//			'kamn-js-widget-easy-twitter-feed-widget',
//			'__ytprefs__',
//			'__ytprefsfitvids__',
//			'jquery-migrate',
//			'icegram',
//			'disqus',
		);
		if ( in_array( $handle, $defer_scripts ) ) {
			return '<script src="' . $src . '" defer="defer" type="text/javascript"></script>' . "\n";
		}
		return $tag;
	}



	// ++++++++++++++++++++++++++++ end OTEC ================================



/**
 * Functions
 *
 * @package      EAGenesisChild
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/

global $kp_mepr_free_article;
global $kp_mepr_free_article_duration;

/*
BEFORE MODIFYING THIS THEME:
Please read the instructions here (private repo): https://github.com/billerickson/EA-Starter/wiki
Devs, contact me if you need access
*/

/**
 * Set up the content width value based on the theme's design.
 *
 */
if ( ! isset( $content_width ) )
    $content_width = 768;

/**
 * Global enqueues
 *
 * @since  1.0.0
 * @global array $wp_styles
 */
function ea_global_enqueues() {

	// javascript
	if( ! ea_is_amp() ) {
		wp_enqueue_script( 'ea-global', get_stylesheet_directory_uri() . '/assets/js/global-min.js', array( 'jquery' ), filemtime( get_stylesheet_directory() . '/assets/js/global-min.js' ), true );

		// Move jQuery to footer
		if( ! is_admin() ) {
			wp_deregister_script( 'jquery' );
			wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
			wp_enqueue_script( 'jquery' );
		}

	}

	// css
	wp_dequeue_style( 'child-theme' );
	wp_enqueue_style( 'ea-fonts', setup_be_theme_fonts_url() );
	wp_enqueue_style( 'ea-style', get_stylesheet_directory_uri() . '/assets/css/main.css', array(), filemtime( get_stylesheet_directory() . '/assets/css/main.css' ) );
}
add_action( 'wp_enqueue_scripts', 'ea_global_enqueues' );

/**
 * Enqueue Non-Critical CSS
 *
 */
function ea_enqueue_noncritical_css() {
	wp_enqueue_style( 'wp-block-library' );
	wp_enqueue_style( 'ea-critical' );
	wp_enqueue_style( 'ea-style' );
	wp_enqueue_style( 'ea-fonts' );
}

/**
 * Gutenberg scripts and styles
 *
 */
function ea_gutenberg_scripts() {
	wp_enqueue_style( 'ea-fonts', setup_be_theme_fonts_url() );
	wp_enqueue_script( 'ea-editor', get_stylesheet_directory_uri() . '/assets/js/editor.js', array( 'wp-blocks', 'wp-dom' ), filemtime( get_stylesheet_directory() . '/assets/js/editor.js' ), true );
}
add_action( 'enqueue_block_editor_assets', 'ea_gutenberg_scripts' );

/**
 * Theme Fonts URL
 *
 */
function setup_be_theme_fonts_url() {
	//return false;
	wp_enqueue_style( 'setup_be_google-font', '//fonts.googleapis.com/css?family=Rubik:300,400,500,700,900|EB+Garamond:400;500;600;700', array(), genesis_get_theme_version() );
}

/**
 * Theme setup.
 *
 * Attach all of the site-wide functions to the correct hooks and filters. All
 * the functions themselves are defined below this setup function.
 *
 * @since 1.0.0
 */
function ea_child_theme_setup() {

	define( 'CHILD_THEME_VERSION', filemtime( get_stylesheet_directory() . '/assets/css/main.css' ) );

	// General cleanup
	include_once( get_stylesheet_directory() . '/inc/wordpress-cleanup.php' );
	include_once( get_stylesheet_directory() . '/inc/genesis-changes.php' );

	// Theme
	include_once( get_stylesheet_directory() . '/inc/markup.php' );
	include_once( get_stylesheet_directory() . '/inc/helper-functions.php' );
	include_once( get_stylesheet_directory() . '/inc/layouts.php' );
	//	include_once( get_stylesheet_directory() . '/inc/navigation-cor.php' );
	include_once( get_stylesheet_directory() . '/inc/loop.php' );
	include_once( get_stylesheet_directory() . '/inc/author-box.php' );
	include_once( get_stylesheet_directory() . '/inc/template-tags.php' );
	include_once( get_stylesheet_directory() . '/inc/items.php' );
	include_once( get_stylesheet_directory() . '/inc/items-urc.php' );
	include_once( get_stylesheet_directory() . '/inc/items-log.php' );
	include_once( get_stylesheet_directory() . '/inc/site-footer-swp.php' );

	// Editor
	include_once( get_stylesheet_directory() . '/inc/disable-editor.php' );
	include_once( get_stylesheet_directory() . '/inc/tinymce.php' );

	// Functionality
	include_once( get_stylesheet_directory() . '/inc/login-logo.php' );
	include_once( get_stylesheet_directory() . '/inc/block-area.php' );
	include_once( get_stylesheet_directory() . '/inc/social-links.php' );

	// Plugin Support
	include_once( get_stylesheet_directory() . '/inc/acf.php' );
	include_once( get_stylesheet_directory() . '/inc/amp.php' );
	include_once( get_stylesheet_directory() . '/inc/shared-counts.php' );
	include_once( get_stylesheet_directory() . '/inc/wpforms.php' );

	// ADS
	include_once( get_stylesheet_directory() . '/inc/ads.php' );

	// Editor Styles
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/editor-style.css' );

	// Image Sizes
	// add_image_size( 'ea_featured', 400, 100, true );

	// Gutenberg

	// -- Responsive embeds
	add_theme_support( 'responsive-embeds' );

	// -- Wide Images
	add_theme_support( 'align-wide' );

	// -- Disable custom font sizes
	//add_theme_support( 'disable-custom-font-sizes' );

	// -- Editor Font Styles
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name'      => __( 'Tiny', 'setup_be' ),
			'shortName' => __( 'T', 'setup_be' ),
			'size'      => 12,
			'slug'      => 'tiny'
		),
		array(
			'name'      => __( 'Smaller', 'setup_be' ),
			'shortName' => __( 'S2', 'setup_be' ),
			'size'      => 14,
			'slug'      => 'smaller'
		),
		array(
			'name'      => __( 'Base', 'setup_be' ),
			'shortName' => __( 'B', 'setup_be' ),
			'size'      => 16,
			'slug'      => 'base'
		),
		array(
			'name'      => __( 'Normal', 'setup_be' ),
			'shortName' => __( 'N', 'setup_be' ),
			'size'      => 18,
			'slug'      => 'normal'
		),
		array(
			'name'      => __( 'Small', 'setup_be' ),
			'shortName' => __( 'S', 'setup_be' ),
			'size'      => 20,
			'slug'      => 'small'
		),
		array(
			'name'      => __( 'Medium', 'setup_be' ),
			'shortName' => __( 'M', 'setup_be' ),
			'size'      => 24,
			'slug'      => 'medium'
		),
		array(
			'name'      => __( 'Large', 'setup_be' ),
			'shortName' => __( 'L', 'setup_be' ),
			'size'      => 36,
			'slug'      => 'large'
		),
		array(
			'name'      => __( 'Huge', 'setup_be' ),
			'shortName' => __( 'H', 'setup_be' ),
			'size'      => 48,
			'slug'      => 'huge'
		),
	) );

	// -- Disable Custom Colors
	//add_theme_support( 'disable-custom-colors' );

	// -- Editor Color Palette
	add_theme_support( 'editor-color-palette', array(
		array(
			'name'  => __( 'Purple', 'ea_genesis_child' ),
			'slug'  => 'purple',
			'color'	=> '#660099',
		),
		array(
			'name'  => __( 'Blue', 'ea_genesis_child' ),
			'slug'  => 'blue',
			'color'	=> '#0080ff',
		),
		array(
			'name'  => __( 'Teal', 'ea_genesis_child' ),
			'slug'  => 'teal',
			'color'	=> '#00ffff',
		),
		array(
			'name'  => __( 'Red', 'ea_genesis_child' ),
			'slug'  => 'red',
			'color'	=> '#FF0000',
		),
		array(
			'name'  => __( 'Orange', 'ea_genesis_child' ),
			'slug'  => 'orange',
			'color'	=> '#ff7f00',
		),
		array(
			'name'  => __( 'Yellow', 'ea_genesis_child' ),
			'slug'  => 'yellow',
			'color'	=> '#f2d600',
		),
		array(
			'name'  => __( 'Green', 'ea_genesis_child' ),
			'slug'  => 'green',
			'color'	=> '#61bd4f',
		),
		array(
			'name'  => __( 'Light Grey', 'ea_genesis_child' ),
			'slug'  => 'lightgrey',
			'color' => '#F5F5F5',
		),
		array(
			'name'  => __( 'Grey', 'ea_genesis_child' ),
			'slug'  => 'grey',
			'color' => '#BDBDBD',
		),
		array(
			'name'  => __( 'Dark Grey', 'ea_genesis_child' ),
			'slug'  => 'darkgrey',
			'color' => '#616161',
		),
	) );

}
add_action( 'genesis_setup', 'ea_child_theme_setup', 15 );

/**
 * Change the comment area text
 *
 * @since  1.0.0
 * @param  array $args
 * @return array
 */
function ea_comment_text( $args ) {
	$args['title_reply']          = __( 'Leave A Reply', 'ea_genesis_child' );
	$args['label_submit']         = __( 'Post Comment',  'ea_genesis_child' );
	$args['comment_notes_before'] = '';
	$args['comment_notes_after']  = '';
	return $args;
}
add_filter( 'comment_form_defaults', 'ea_comment_text' );


/**
 * Template Hierarchy
 *
 */
function ea_template_hierarchy( $template ) {
	if( is_home() )
		$template = get_query_template( 'archive' );
	return $template;
}
add_filter( 'template_include', 'ea_template_hierarchy' );


/**
 * Add Google Tag Manager code in <head>
 * 
 */

// Add Google Tag Manager code in <head>
add_action( 'wp_head', 'google_tag_manager_head', -1000 );
function google_tag_manager_head() { ?>
	
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl+ '<?php echo UNDREL_GTM_VAR;?>';f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WQFDBGR');</script>
<!-- End Google Tag Manager -->

<?php }

// Add Google Tag Manager code immediately below opening <body> tag
add_action( 'genesis_before', 'google_tag_manager_body' );
function google_tag_manager_body() { ?>
	
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WQFDBGR<?php echo UNDREL_GTM_VAR;?>"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<?php }


//////////////////////////////////////////////////////////////////
//
// Override the memberpress rules sometimes.
//
//////////////////////////////////////////////////////////////////
function kp_mepr_override_protection($protect, $uri, $delim)
{
    //error_log("kp mepr:");

    global $kp_mepr_free_article;
    global $kp_mepr_free_article_duration;

    // Check for VIP articles
    if( has_tag( 'vip' ) )
    {
        // VIP article, don't change the protection
        return $protect;
    }
   
    // if it's not a single, we leave it alone
    if(!is_single())
    {
        //error_log("kp mepr: not single");
        return $protect;
    }

    // Get the current user
    $user = MeprUtils::get_currentuserinfo();
    if($user)
    {
        // We have a user, so we will let MP handle it
        return $protect;
    }

    // Get the POST id
    global $post;
    $current_id = $post->ID;

    // Check the article count
    if(is_array($kp_mepr_free_article))
    {
        // We have a return user
        $seen_post = $kp_mepr_free_article;
        $len       = count($seen_post);

    //error_log("kp mepr: len      =$len");
    //$tmp_arr = print_r($seen_post, TRUE);
    //error_log("kp mepr: seen_post=$tmp_arr");

        if($len<10)
        {
            $protect = 0;
        }
        else
        {
            // This user has seen 10 articles
            $protect = 1;
        }
    }
    else
    {
        // This user doesn't have any free article data
        //error_log('kp mepr: kp_mepr_free_article not set');
    }

    // Default is to leave the protect as-is
    //error_log("kp mepr: Leaving with protect=$protect");

    return $protect;
}

add_filter('mepr-pre-run-rule-content', 'kp_mepr_override_protection', 10, 3);

function kp_mepr_override_protection_init()
{
    //error_log('kp init');

    global $kp_mepr_free_article;
    global $kp_mepr_free_article_duration;

    // Check for VIP articles
    if( has_tag( 'vip' ) )
    {
        // VIP article, don't change the protection
        //error_log("kp init. VIP tag.");
        return;
    }

    // if it's not a single, we leave it alone
    if(!is_single())
    {
        //error_log("kp init. not single");
        return;
    }

    // Get the current user
    $user = MeprUtils::get_currentuserinfo();
    if($user)
    {
        // We have a user, so we will let MP handle it
        //error_log("kp init. user:".print_r($user, TRUE));
        return;
    }

    // Get the POST id
    global $post;
    $current_id = $post->ID;

    //error_log("kp init. Entering COOKIE=".print_r($_COOKIE, TRUE));

    if(isset($_COOKIE['free_article']))
    {
        //error_log("kp init. cookie is set.");

        $kp_mepr_free_article  = json_decode($_COOKIE['free_article']);
        if(isset($_COOKIE['free_article_duration']))
        {
            $kp_mepr_free_article_duration  = $_COOKIE['free_article_duration'];
        }

        // We have a return user
        $seen_post = $kp_mepr_free_article;
        $len       = count($seen_post);

        if($len<10)
        {
            // This user has seen less than 10 articles
            if(!in_array($current_id, $seen_post))
            {
                array_push($seen_post,$current_id);
                $time=$kp_mepr_free_article_duration;
                setcookie('free_article', json_encode($seen_post),$time , "/");
            }
        }
    }
    else
    {
        // New cookie. First time anonymous user.
        //error_log("kp init. Creating new cookie.");
        $time=time() + (86400 * 7);
        $post_seen=array($current_id);

        $kp_mepr_free_article          = $post_seen;
        $kp_mepr_free_article_duration = $time;

        setcookie('free_article', json_encode($post_seen),$time , "/");
        setcookie('free_article_duration', $time,$time , "/");
    }

    //error_log("kp init. Leaving COOKIE=".print_r($_COOKIE, TRUE));
}

add_filter('wp', 'kp_mepr_override_protection_init', 1, 0);


function kp_undrel_init()
{
    $cookie1="unrel10233";
    $cookie2="io89";

    $user = wp_get_current_user();

    if (!$user instanceof WP_User)
        return;

    $allowed_roles = array('editor', 'administrator', 'author');
    if( array_intersect($allowed_roles, $user->roles ) )
    {
        if(!isset($_COOKIE[$cookie1]))
        {
            $time=time() + (86400 * 7);
            setcookie($cookie1, $cookie2, $time, "/");
        }
    }
}
add_action('init', 'kp_undrel_init');

add_filter('display_posts_shortcode_output','new_format_for_premium',10,11);
function new_format_for_premium($output, $original_atts, $image, $title, $date, $excerpt, $inner_wrapper, $content, $class, $author, $category_display_text){
	if ( has_tag( 'vip' ) ) {
			$output='<div class="border-premium"><span class="badge badge-primary">Premium</span></div>'.$output;
		}else{
			$output='<div class="border-premium"></div>'.$output;
		}
	return $output;

}

// KP: Register an analytics event.
function mepr_capture_new_member_signup_completed($event) {
  $user = $event->get_data();
  $txn_data = json_decode($event->args);

  wp_register_script( 'dummy-handle-footer', '', [], '', true );
  wp_enqueue_script( 'dummy-handle-footer'  );
  wp_add_inline_script( 'dummy-handle-footer', "gtag('event', 'sign_up', {
  'event_category' : 'engagement',
  'event_label' : 'method'
});" );
  
}
add_action('mepr-event-member-signup-completed', 'mepr_capture_new_member_signup_completed');
