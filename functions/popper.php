<?php

function wpsp_functionality() {
	global $wpsp_config;
	?>
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
		$(function(){
			$('.wpsp_overlay').delay(<?php echo $wpsp_config['wpsp_delay']; ?>).fadeIn(400);
			$('.wpsp_slidein').delay(<?php echo $wpsp_config['wpsp_delay'] + 400; ?>).animate({left:0});
			$('.wpsp_box, #wpsp_close').delay(<?php echo $wpsp_config['wpsp_delay'] + 400; ?>).fadeIn(750);
			$('#wpsp_close, .wpsp_overlay').click(function(){
				$('.wpsp_overlay, .wpsp_box, #wpsp_close, .wpsp_slidein').fadeOut(400);
				Cookies.set('wpsp_silent', 'true', { expires: <?php echo $wpsp_config['wpsp_recurring']; ?> });
			});
		});
	</script>
	<?php
}
if ( ($wpsp_config['wpsp_active'] == "on") && !$_COOKIE['wpsp_silent'] ) {
	add_action( 'wp_footer', 'wpsp_functionality' );
}
?>
