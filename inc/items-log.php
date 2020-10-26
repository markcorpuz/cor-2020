<?php
/**
 * ITEMS-LOG
 *
 * @package      SETUP-BE
 * @author       Mark Corpuz
 * @since        1.0.3
 * @license      GPL-2.0+
**/

/**
 * NOTE: To see the constantly evolving structure, visit the link below
 * https://www.dropbox.com/s/rl5rogga8aip9kl/SETUP_layout-structure-overview.svg?dl=0
 */


// OVERVIEW OF HTML STRUCTURE
// 
// DATE
// <div class="item log date"></div>


/**
 * DATE
 *
 */

function setup_be_log_date() {
	$log_date = get_field( 'log_date' );
	if( !empty( $log_date ) )
		echo '<div class="item log date">' . date( 'd M Y', strtotime( $log_date ) ) . '</div>';	
}


/**
 * TIME
 *
 */

function setup_be_log_time() {
	$log_time = get_field( 'log_time' );
	if( !empty( $log_time ) )
		echo '<div class="item log code">' . date( 'd M Y', strtotime( $log_time ) ) . '</div>';	
}


/**
 * CODE
 *
 */

function setup_be_log_code() {
	$log_code = get_field( 'log_code' );
	if( !empty( $log_code ) )
		echo '<div class="item log code">' . $log_code . '</div>';
}


/**
 * LABEL
 *
 */

function setup_be_log_label() {
	$log_label = get_field( 'log_label' );
	if( !empty( $log_label ) )
		echo '<div class="item log label">' . $log_label . '</div>';
}


/**
 * TITLE
 *
 */

function setup_be_log_title() {
	$log_title = get_field( 'log_title' );
	if( !empty( $log_title ) )
		echo '<div class="item log title">' . $log_title . '</div>';
}


/**
 * SUMMARY
 *
 */

function setup_be_log_summary() {
	$log_summary = get_field( 'log_summary' );
	if( !empty( $log_summary ) )
		echo '<div class="item log summary">' . $log_summary . '</div>';
}


/**
 * INFO
 *
 */

function setup_be_log_info() {
	$log_info = get_field( 'log_info' );
	if( !empty( $log_info ) )
		echo '<div class="item log info">' . $log_info . '</div>';
}


/**
 * USER
 *
 */

function setup_be_log_user() {
	$log_user = get_field( 'log_user' );
	if( !empty( $log_user ) )
		echo '<div class="item log user">' . $log_user . '</div>';
}