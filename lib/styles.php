<?php
//styles generated by customizer
function directory_theme_customize_css()
{
	?>
	<style type="text/css">
		.container, .geodir-common, .geodir-breadcrumb, .geodir_full_page .widget {
			padding-right:<?php echo get_theme_mod('dt_container_padding_right', DT_CONTAINER_PADDING_RIGHT); ?>;
			padding-left:<?php echo get_theme_mod('dt_container_padding_left', DT_CONTAINER_PADDING_LEFT); ?>;
			margin-right:<?php echo get_theme_mod('dt_container_margin_right', DT_CONTAINER_MARGIN_RIGHT); ?>;
			margin-left:<?php echo get_theme_mod('dt_container_margin_left', DT_CONTAINER_MARGIN_LEFT); ?>;
		}
		@media (min-width: 1200px) {
			.container, .geodir-common, .geodir-breadcrumb, .geodir_full_page .widget {
				width: <?php echo get_theme_mod('dt_container_width', DT_CONTAINER_WIDTH); ?>;
			}
		}
		.site-logo-wrap .site-logo {
			margin-right:<?php echo get_theme_mod('dt_logo_margin_right', DT_LOGO_MARGIN_RIGHT); ?>;
			margin-left:<?php echo get_theme_mod('dt_logo_margin_left', DT_LOGO_MARGIN_LEFT); ?>;
			margin-top:<?php echo get_theme_mod('dt_logo_margin_top', DT_LOGO_MARGIN_TOP); ?>;
			margin-bottom:<?php echo get_theme_mod('dt_logo_margin_bottom', DT_LOGO_MARGIN_BOTTOM); ?>;
		}
		body {
			font-family:<?php echo get_theme_mod('dt_font_family', DT_FONT_FAMILY); ?>;
			font-size:<?php echo get_theme_mod('dt_font_size', DT_FONT_SIZE); ?>;
			line-height:<?php echo get_theme_mod('dt_line_height', DT_LINE_HEIGHT); ?>;
			background-color:<?php echo get_theme_mod('dt_background_color', DT_BACKGROUND_COLOR); ?>;
			color:<?php echo get_theme_mod('dt_body_color', DT_BODY_COLOR); ?>;
		}
		.content-box, .content .entry, #geodir_content, .sidebar .widget, .geodir-content-right .geodir-company_info, .geodir_full_page .geodir-category-list-in, .geodir_full_page .geodir-loc-bar {
			background-color: <?php echo get_theme_mod('dt_content_bg', DT_CONTENT_BG); ?>;
			border-color: <?php echo get_theme_mod('dt_content_border', DT_CONTENT_BORDER); ?>;
			box-shadow: 0 1px 1px <?php echo get_theme_mod('dt_content_shadow', DT_CONTENT_SHADOW); ?>;
		}
		.alert-help {
			background-color:<?php echo get_theme_mod('dt_alert_yellow', DT_ALERT_YELLOW); ?>;
		}
		.alert-info {
			background-color:<?php echo get_theme_mod('dt_alert_blue', DT_ALERT_BLUE); ?>;
		}
		.alert-error{
			background-color:<?php echo get_theme_mod('dt_alert_red', DT_ALERT_RED); ?>;
		}
		.alert-success {
			background-color:<?php echo get_theme_mod('dt_alert_green', DT_ALERT_GREEN); ?>;
		}
		h1, .h1, h2, .h2, h3, .h3, h4, .h4, h5, .h5, h6, .h6 {
			color: <?php echo get_theme_mod('dt_h1toh6_color', DT_H1TOH6_COLOR); ?>;
		}
		a, a:visited {
			color: <?php echo get_theme_mod('dt_link_color', DT_LINK_COLOR); ?>;
		}
		a:hover,
		a:focus,
		a:active {
			color: <?php echo darken_color(get_theme_mod('dt_link_color', DT_LINK_COLOR), 9); ?>;
		}
		#primary-nav ul li {
			padding-right: <?php echo get_theme_mod('dt_p_nav_padding_right', DT_P_NAV_PADDING_RIGHT); ?>;
		}
		#primary-nav ul li a {
			height: <?php echo get_theme_mod('dt_p_nav_height', DT_P_NAV_HEIGHT); ?>;
			line-height: <?php echo get_theme_mod('dt_p_nav_line_height', DT_P_NAV_LINE_HEIGHT); ?>;
		}
		.dt-btn, button, input[type=button], input[type=reset], input[type=submit], p.edit-link, .reply .gd_comment_replaylink #gd_comment_replaylink, #buddypress form#whats-new-form input[type=submit], #buddypress .standard-form div.submit input, #buddypress .comment-reply-link, #buddypress button, #buddypress div.generic-button a, #buddypress input[type=button], #buddypress input[type=reset], #buddypress input[type=submit], #buddypress ul.button-nav li a, #buddypress input[type=submit]#notification-bulk-manage {
			color:<?php echo get_theme_mod('dt_btn_text_color', DT_BTN_TEXT_COLOR); ?>;
			background-color:<?php echo get_theme_mod('dt_btn_bg_color', DT_BTN_BG_COLOR); ?>;
			border: 1px solid <?php echo get_theme_mod('dt_btn_border_color', DT_BTN_BORDER_COLOR); ?>;
		}
		.dt-btn:hover, button:hover, input[type=button]:hover, input[type=reset]:hover, input[type=submit]:hover, p.edit-link:hover, .reply .gd_comment_replaylink #gd_comment_replaylink:hover, #buddypress form#whats-new-form input[type=submit]:hover, #buddypress .standard-form div.submit input:hover, #buddypress .comment-reply-link:hover, #buddypress button:hover, #buddypress div.generic-button a:hover, #buddypress input[type=button]:hover, #buddypress input[type=reset]:hover, #buddypress input[type=submit]:hover, #buddypress ul.button-nav li a:hover, #buddypress input[type=submit]#notification-bulk-manage:hover {
			background-color:<?php echo darken_color(get_theme_mod('dt_btn_bg_color', DT_BTN_BG_COLOR), 9); ?>;
		}
		.footer-widgets {
			background-color: <?php echo get_theme_mod('dt_footer_widget_bg', DT_FW_BG); ?>;
		}
		.copyright {
			background-color: <?php echo get_theme_mod('dt_copyright_bg', DT_COPYRIGHT_BG); ?>;
			border-top: 1px solid #151515;
			border-top-color: <?php echo get_theme_mod('dt_copyright_border_color', DT_COPYRIGHT_BORDER_COLOR); ?>;
		}
		.copyright .container {
			padding-top: <?php echo get_theme_mod('dt_copyright_padding_top', DT_COPYRIGHT_PADDING_TOP); ?>;
			padding-bottom: <?php echo get_theme_mod('dt_copyright_padding_bottom', DT_COPYRIGHT_PADDING_BOTTOM); ?>;
		}
		.site-header {
			height: <?php echo get_theme_mod('dt_header_height', DT_HEADER_HEIGHT); ?>;px;
			background-color: <?php echo get_theme_mod('dt_header_bg_color', DT_HEADER_BG_COLOR); ?>;
		}
	</style>
	<?php
}
add_action( 'wp_head', 'directory_theme_customize_css');