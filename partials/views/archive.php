<?php
/**
 * Archive partial
 *
 * @package      SETUP-BE
 * @author       Mark Corpuz
 * @since        1.0.0
 * @license      GPL-2.0+
**/

echo '<article class="module post-summary">';

	// FEATURED IMAGE
	setup_be_image();
	//setup_be_image_nolink();
	//setup_be_bgimage();
	//setup_be_bgimage_nolink();
	//setup_be_bgimage_wtitle();
	//setup_be_bgimage_wtitle_nolink();

	echo '<div class="items info">';

		// OVERLINE
		setup_be_overline();
		//setup_be_overline_nolink();
		
		// TITLE
		setup_be_title();
		//setup_be_title_nolink();
		//setup_be_title_only();

		// AUTHOR
		//setup_be_author();
		//setup_be_author_nolink();
		//setup_be_author_by();
		//setup_be_author_by_nolink();
		//setup_be_author_icon();
		//setup_be_author_icon_nolink();
		//setup_be_author_gravatar();
		
		// DATE
		//setup_be_date();
		//setup_be_date_mdy();
		//setup_be_date_day_mdy();
		//setup_be_date_mdy_time();

		// DATE & AUTHOR
		setup_be_dateauthor();
		//setup_be_dateauthor_nolink();

		// EXCERPT
		setup_be_excerpt();
		//setup_be_excerpt_maxwords();

		// ADMIN
		//setup_be_edit();
		setup_be_edit_date_modified();

	echo '</div>';

echo '</article>';

/*
	Examples:
	setup_be_image('large');
	setup_be_bgimage_wtitle( null, 'Custom Text Inputed');
	setup_be_bgimage_wtitle( null, setup_be_excerpt() );
	setup_be_bgimage_wtitle( 'thumbnail' , setup_be_title_only() );
 */