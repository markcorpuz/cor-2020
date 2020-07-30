<?php
/**
 * WIDGETS
 *
 * @package      SETUP-BE
 * @author       Mark Corpuz
 * @since        1.0.1
 * @license      GPL-2.0+
**/


// HOOK-CSWBEFORE (SINGLE POST)
add_action( 'genesis_before_content_sidebar_wrap', 'swp_hook_cswbefore' );
	function swp_hook_cswbefore() {
		?>
		<div class="hook-cswbefore"><div class="hook-wrap">
			<div class="item-ad-top">
				<?php echo do_shortcode( '[spk_adsbygoogle_js]' ); ?>
			</div>
			<div id="subscribeto" class="item-subscribeto"></div>
			<div id="booksto" class="item-booksto"></div>
		</div></div>
		<?php
	}

// HOOK-CSWAFTER (SINGLE POST)
add_action( 'genesis_after_content_sidebar_wrap', 'swp_hook_cswafter' );
	function swp_hook_cswafter() {
		?>
		<div class="hook-cswafter"><div class="hook-wrap">
			<div class="item-ad-bottom">
				<?php echo do_shortcode( '[spk_adsbygoogle_js]' ); ?>
			</div>
		</div></div>
		<?php
	}

// FEATURERIGHT (HOMEPAGE)
// FEATURELEFT (HOMEPAGE)
// FEATUREMAIN (HOMEPAGE)
add_action( 'genesis_after_loop', 'base226_belowloophome' );
	function base226_belowloophome() {
		if (is_front_page()) {
			genesis_widget_area( 'featureleft', array(
				'before' => '<div class="featureleft featurearea feature-60x60"><div class="areawrap">',
				'after' => '</div></div>',
			) );
			genesis_widget_area( 'featureright', array(
				'before' => '<div class="featureright featurearea feature-60x60"><div class="areawrap">',
				'after' => '</div></div>',
			) );
			genesis_widget_area( 'featuremain', array(
				'before' => '<div class="featuremain featurearea feature-150x150"><div class="areawrap">',
				'after' => '</div></div>',
			) );
		} else {
			// nothing
		}
	}

// FEATUREINPOST (SINGLE POST)
add_action( 'genesis_entry_footer', 'base226_entryfooter' );
	function base226_entryfooter() {
	    if (is_single()) {
		    genesis_widget_area( 'featureinpost', array(
				'before' => '<div class="featureinpost featurearea feature-150x150"><div class="areawrap">',
				'after' => '</div></div>',	    	
	    	) ); 
		} else {
			// nothing
		}
	}

// FEATURELEFT (HOMEPAGE)
//* Register widget area - featureleft
genesis_register_sidebar( array(
	'id'            => 'featureleft',
	'name'          => __( 'Feature Left', 'basic-226' ),
	'description'   => __( 'This is a widget area that displays the left feature area', 'basic-226' ),
) );

// FEATURERIGHT (HOMEPAGE)
//* Register widget area - featureright
genesis_register_sidebar( array(
	'id'            => 'featureright',
	'name'          => __( 'Feature Right', 'basic-226' ),
	'description'   => __( 'This is a widget area that displays the right feature area', 'basic-226' ),
) );

// FEATUREMAIN (HOMEPAGE)
//* Register widget area - featuremain
genesis_register_sidebar( array(
	'id'            => 'featuremain',
	'name'          => __( 'Feature Main', 'basic-226' ),
	'description'   => __( 'This is a widget area that displays the main feature area', 'basic-226' ),
) );

// FEATUREINPOST (SINGLE POST)
//* Register widget area - featureinpost
genesis_register_sidebar( array(
	'id'            => 'featureinpost',
	'name'          => __( 'Feature Inpost', 'basic-226' ),
	'description'   => __( 'This is a widget area that displays the feature area after post entries', 'basic-226' ),
) );