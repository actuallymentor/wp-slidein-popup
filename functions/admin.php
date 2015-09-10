<?php
add_action( 'admin_menu', 'wpsp_menu' );

function wpsp_menu() {
	add_options_page( 'wpsp Options', 'wpsp', 'manage_options', 'wpsp-settings', 'wpsp_options' );
	add_action( 'admin_init', 'register_wpsp_settings' );
}

function register_wpsp_settings() { // whitelist options
	register_setting( 'wpsp_settings', 'wpsp_formcode' );
	register_setting( 'wpsp_settings', 'wpsp_custom_css' );
	register_setting( 'wpsp_settings', 'wpsp_delay' );
	register_setting( 'wpsp_settings', 'wpsp_title' );
	register_setting( 'wpsp_settings', 'wpsp_convincer' );
	register_setting( 'wpsp_settings', 'wpsp_recurring' );
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
			
			<p>Form html</p>
			<textarea type="text" name="wpsp_formcode"><?php echo esc_attr( get_option('wpsp_formcode') ); ?></textarea>
			<p>Custom css</p>
			<textarea type="text" name="wpsp_custom_css"><?php echo esc_attr( get_option('wpsp_custom_css') ); ?></textarea>
			<p>Delay in ms</p>
			<input type="number" name="wpsp_delay" value="<?php echo esc_attr( get_option('wpsp_delay') ); ?>" />
			<p>Title of popup</p>
			<input type="text" name="wpsp_title" value="<?php echo esc_attr( get_option('wpsp_title') ); ?>" />
			<p>Popup description</p>
			<input type="text" name="wpsp_convincer" value="<?php echo esc_attr( get_option('wpsp_convincer') ); ?>" />
			<p>Show optin every how many days?</p>
			<input type="number" name="wpsp_recurring" value="<?php echo esc_attr( get_option('wpsp_recurring') ); ?>" />
			<?php submit_button(); ?>
		
		</form>
	</div>
</div>

<?php
}
?>