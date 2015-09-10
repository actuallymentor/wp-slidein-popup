<?php
add_action('admin_head', 'wpsp_admin_css');
function wpsp_admin_css() {
	?>
	<style>
	.wpsp_admin textarea, .wpsp_admin input[type=text] {
    	max-width: 100%;
    	width: 400px;
	}
	.wpsp_admin textarea {
    	min-height: 100px;
	}
	</style>
	<?php
}

?>