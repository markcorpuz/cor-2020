<?php


/**
 * BGIMAGE
 * + TITLE
 * _LINK
 * 
 */
function cor_bgimage_wtitle_main( $size = 'medium' , $text = NULL ) {

	$pid = get_the_ID();
	
	// Native WP
	$img_bg = get_the_post_thumbnail_url( $pid, $size );
	
	/*
	// Custom Field (ACF) - replace with actual field label
	// Uncomment the next 2 lines to use a custom field
	$field = 'customfield_bgimage';
	$img_bg = wp_get_attachment_image_url( get_post_meta( $pid, $field, TRUE ), $size );
	*/

	if( empty( $text ) ) {
		// if no text is passed, use the post title as default text link
		$text = get_the_title( $pid );
	}

	// check if variable has content
	if( !empty( $img_bg ) ) {
		// handle the display
		?>
		<div class="module mainfeature">
			<a class="item bgimage link" style="background-image:url( '<?php echo $img_bg; ?>' )" href="<?php echo get_permalink(); ?>"></a>
			<a class="item title link" href="<?php echo get_permalink(); ?>"><?php echo $text; ?></a>
		</div>
		<?php
	}

	// Excerpt
	$excerpt = get_the_excerpt( $pid );
	if( !empty( $excerpt ) ) {

		// not trimmed
		?><div class="item excerpt"><?php
			echo $excerpt;
		?><span> <a class="item link" href="<?php echo get_permalink(); ?>">Read Full Article</a></span></div><?php

		// trimmed
		/*$max_words = 20;
		?><div class="item exceprt"><?php
			echo wp_trim_words( $excerpt, $max_words );
		?></div><?php
		*/
	}

}
/**
 * IMAGE
 * + TITLE
 * _LINK
 * + EXCERPT
 */
function cor_image_wtitle_main( $size = 'medium' , $text = NULL ) {

	$pid = get_the_ID();
	
	// Native WP
	$img_bg = get_the_post_thumbnail_url( $pid, $size );
	
	/*
	// Custom Field (ACF) - replace with actual field label
	// Uncomment the next 2 lines to use a custom field
	$field = 'customfield_bgimage';
	$img_bg = wp_get_attachment_image_url( get_post_meta( $pid, $field, TRUE ), $size );
	*/

	if( empty( $text ) ) {
		// if no text is passed, use the post title as default text link
		$text = get_the_title( $pid );
	}

	// check if variable has content
	if( !empty( $img_bg ) ) {
		// handle the display
		?>
		<div class="module mainfeature">
			<a class="item bgimage link" href="<?php echo get_permalink(); ?>" tabindex="-1" aria-hidden="true"  >
				<?php echo $img_bg; ?>
			</a>
			<a class="item title link" href="<?php echo get_permalink(); ?>"><?php echo $text; ?></a>
		</div>
		<?php
	}

	// Excerpt
	$excerpt = get_the_excerpt( $pid );
	if( !empty( $excerpt ) ) {

		// not trimmed
		?><div class="item excerpt"><?php
			echo $excerpt;
		?><span> <a class="item link" href="<?php echo get_permalink(); ?>">Read Full Article</a></span></div><?php

		// trimmed
		/*$max_words = 20;
		?><div class="item exceprt"><?php
			echo wp_trim_words( $excerpt, $max_words );
		?></div><?php
		*/
	}

}