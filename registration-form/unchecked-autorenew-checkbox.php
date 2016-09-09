<?php
/**
 * This will make the Auto Renew checkbox unchecked by default
 * on the registration form.
 */

// Remove the default checkbox
function jp_override_autonew_checkbox() {
	remove_action( 'rcp_before_registration_submit_field', 'rcp_add_auto_renew' );
	add_action( 'rcp_before_registration_submit_field', 'jp_add_auto_renew' );
}
add_action( 'plugins_loaded', 'jp_override_autonew_checkbox' );

// Add back an unchecked checkbox
function jp_add_auto_renew( $levels = array() ) {
	if( '3' == rcp_get_auto_renew_behavior() ) :
?>
		<p id="rcp_auto_renew_wrap">
			<input name="rcp_auto_renew" id="rcp_auto_renew" type="checkbox" />
			<label for="rcp_auto_renew"><?php echo apply_filters ( 'rcp_registration_auto_renew', __( 'Auto Renew', 'rcp' ) ); ?></label>
		</p>
<?php
	endif;
}