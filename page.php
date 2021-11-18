<?php
/**
 * Page
 *
 * @package      EAGenesisChild
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/

// Breadcrumbs before page title
add_action( 'genesis_entry_header', 'genesis_do_breadcrumbs', 8 );
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );


genesis();
if(get_the_ID()=="57452"){ ?>
<script type="text/javascript">
	jQuery( document ).ready(function() {
		jQuery('.module').css('display','none');
   
});
</script>
<?php
}