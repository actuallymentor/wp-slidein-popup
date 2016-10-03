<?php

function wpsp_functionality() {
	global $wpsp_config;
	?>
	<?php if ( is_single() ): ?>
	<div class="wpsp_overlay"></div>
	<div class="wpsp_slidein"></div>
	<a id="wpsp_close">[X] Close</a>
	<div class="wpsp_box">
		<p id="wpsp_title"><?php echo $wpsp_config['wpsp_title']; ?></p>
		<p id="wpsp_motivation"><?php echo $wpsp_config['wpsp_convincer']; ?></p>
		<?php echo $wpsp_config['wpsp_formcode']; ?>
	</div>
	<style>
		#wpsp_close {
			position: fixed;
			display: none;
			top: 10px;
			right: 10px;
			font-weight: bold;
			z-index: 9003;
		}
		.wpsp_overlay {
			position: fixed;
			display: none;
			top: 0;
			left: 0;
			background-color: rgba(0,0,0,0.5);
			height: 100%;
			width: 100%;
			z-index: 9000;
		}
		.wpsp_slidein {
			position: fixed;
			top: 0;
			left: -55%;
			background-color: #dc3e29;
			width: 55%;
			height: 100%;
			z-index: 9001;
		}
		@media screen and (max-width: 768px) {
			.wpsp_slidein {
				width: 100%;
				left: -100%;
			}
		}
		.wpsp_box {
			position: fixed;
			display: none;
			right: 0;
			left: 0;
			top: 50%;
			transform: translateY(-50%);
			text-align: center;
			width: 100%;
			z-index: 9002;
		}
		.wpsp_box #wpsp_motivation, .wpsp_box form {
			display: inline-block;
			padding: 0 5px;
		}
		<?php echo $wpsp_config['wpsp_custom_css']; ?>
	</style>

	

	<script>
	var wpsp_slidein = {
		delay: <?php echo $wpsp_config['wpsp_delay']; ?>,
		expires: <?php echo $wpsp_config['wpsp_recurring']; ?>
	}
	</script>

<?php endif ?>

	<?php
}

if ( ($wpsp_config['wpsp_active'] == "on") && !$_COOKIE['wpsp_silent'] ) {
	add_action( 'wp_footer', 'wpsp_functionality' );
}
?>
