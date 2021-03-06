<?php
add_action( 'admin_menu', 'wpsp_menu' );

function wpsp_menu() {
	add_options_page( 'WPSP Options', 'WP Slidein Popup', 'manage_options', 'wpsp-settings', 'wpsp_options' );
	add_action( 'admin_init', 'register_wpsp_settings' );
}

function register_wpsp_settings() { // whitelist options
	register_setting( 'wpsp_settings', 'wpsp_formcode' );
	register_setting( 'wpsp_settings', 'wpsp_custom_css' );
	register_setting( 'wpsp_settings', 'wpsp_delay' );
	register_setting( 'wpsp_settings', 'wpsp_title' );
	register_setting( 'wpsp_settings', 'wpsp_convincer' );
	register_setting( 'wpsp_settings', 'wpsp_recurring' );
	register_setting( 'wpsp_settings', 'wpsp_active' );
}

function wpsp_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	?>
	<div class="wrap">
		<h2>WPSP - WordPress Slider Popup</h2>
		<p>Fill in the options below.</p>
		<form class="wpsp_admin" id="wpsp_form" method="post" action="options.php"> 
			<?php settings_fields( 'wpsp_settings' ); ?>
			<?php do_settings_sections( 'wpsp_settings' ); ?>
			

			<p>Switch optin on and off:</p>
			<select name="wpsp_active">
				<option value="on" <?php if ( esc_attr( get_option('wpsp_active') ) == "on" ) { echo "selected"; }; ?> >On</option>
				<option value="off" <?php if ( esc_attr( get_option('wpsp_active') ) != "on" ) { echo "selected"; }; ?> >Off</option>
			<select>
			<p>How long before the optin should show? This is in ms, so 1000 means 1 second.</p>
			<input type="number" name="wpsp_delay" value="<?php echo esc_attr( get_option('wpsp_delay') ); ?>" />
			<p>Show optin every how many days?</p>
			<input type="number" name="wpsp_recurring" value="<?php echo esc_attr( get_option('wpsp_recurring') ); ?>" />
			<p>Title of the optin (top text):</p>
			<input type="text" name="wpsp_title" value="<?php echo esc_attr( get_option('wpsp_title') ); ?>" />
			<p>Description of the optin (text left of form):</p>
			<input type="text" name="wpsp_convincer" value="<?php echo esc_attr( get_option('wpsp_convincer') ); ?>" />
			<p>Form html (you can use any html form here):</p>
			<textarea type="text" name="wpsp_formcode"><?php echo esc_attr( get_option('wpsp_formcode') ); ?></textarea>
			<p>Custom CSS styles:</p>
			<textarea type="text" name="wpsp_custom_css"><?php echo esc_attr( get_option('wpsp_custom_css') ); ?></textarea>
			
			
			<?php submit_button(); ?>
		
		</form>
	</div>
</div>

<?php
}
?>