<?php

if ( ! isset( $content_width ) ) {
	$content_width = 660;
}

function directory_theme_setup(){
	/*
	 * Make Directory Theme available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 *
	 * You may need this tool. https://poedit.net/
	 */
	load_theme_textdomain('directory-starter', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Post thumbnails
	add_theme_support( 'post-thumbnails' );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );

	// GeoDirectory
	add_theme_support( 'geodirectory' );
	add_theme_support( 'geodirectory-sidebar','sidebar-gd' );
	add_theme_support( 'geodirectory-sidebar-top','sidebar-gd-top' );
	add_theme_support( 'geodirectory-sidebar-bottom','sidebar-gd-bottom' );

	add_theme_support( 'title-tag' );

	$default_color = trim( DT_BACKGROUND_COLOR, '#' );

	add_theme_support( 'custom-background', apply_filters( 'directory_theme_custom_background_args', array(
		'default-color'      => $default_color,
		'default-attachment' => 'fixed',
	) ) );

	//add_editor_style( get_template_directory_uri() . '/assets/css/editor-style.css' );

	$args = array(
		'default-text-color'      => 'FFFFFF',
		'height'                 => DT_HEADER_HEIGHT,
		'width'                  => DT_HEADER_WIDTH
	);

	add_theme_support( 'custom-header', $args );

	// Filters the oEmbed process to run the dt_responsive_embed() function
	// don't fire if GD core is wrapping it
	if(!function_exists('geodir_responsive_embeds')){
		add_filter('embed_oembed_html', 'dt_responsive_embed', 10, 3);
	}

	add_filter('tiny_mce_before_init','dt_theme_editor_dynamic_styles',10,1);

	// Registers theme support for various WooCommerce features.
	if ( class_exists( 'WooCommerce' ) ) {
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
	}
}
add_action('after_setup_theme', 'directory_theme_setup');


/**
 * Add dynamic styles to the WYSIWYG editor.
 *
 * @param $mceInit
 * @since 1.1.0
 * @return mixed
 */
function dt_theme_editor_dynamic_styles( $mceInit ) {
	ob_start();
	?>
	body.mce-content-body {
	font-family: <?php echo str_replace('"',"'", get_theme_mod('dt_font_family', DT_FONT_FAMILY)); ?>;
	font-size: <?php echo esc_attr(get_theme_mod('dt_font_size', DT_FONT_SIZE)); ?>;
	line-height: <?php echo esc_attr(get_theme_mod('dt_line_height', DT_LINE_HEIGHT)); ?>;
	color: <?php echo esc_attr(get_theme_mod('dt_body_color', DT_BODY_COLOR)); ?>;
	}

	p {
	line-height: <?php echo esc_attr(get_theme_mod('dt_line_height', '22px')); ?>;
	margin: 0 0 5px;
	}

	h1, .h1, h2, .h2, h3, .h3, h4, .h4, h5, .h5, h6, .h6 {
	color: <?php echo esc_attr(get_theme_mod('dt_h1toh6_color', DT_H1TOH6_COLOR)); ?>;
	}

	a {
	color: <?php echo esc_attr(get_theme_mod('dt_link_color', DT_LINK_COLOR)); ?>;
	}
	a:hover,
	a:visited:hover,
	a:focus,
	a:active {
	color: <?php echo esc_attr(get_theme_mod('dt_link_hover', DT_LINK_HOVER)); ?>;
	}

	a:visited {
	color: <?php echo esc_attr(get_theme_mod('dt_link_visited', DT_LINK_VISITED)); ?>;
	}

	.dt-btn, button, input[type=button], input[type=reset], input[type=submit], p.edit-link, #buddypress form#whats-new-form input[type=submit], #buddypress .standard-form div.submit input, #buddypress .comment-reply-link, #buddypress button, #buddypress div.generic-button a, #buddypress input[type=button], #buddypress input[type=reset], #buddypress input[type=submit], #buddypress ul.button-nav li a, #buddypress input[type=submit]#notification-bulk-manage {
	color: <?php echo esc_attr(get_theme_mod('dt_btn_text_color', DT_BTN_TEXT_COLOR)); ?>;
	background-color: <?php echo esc_attr(get_theme_mod('dt_btn_bg_color', DT_BTN_BG_COLOR)); ?>;
	border: 1px solid <?php echo esc_attr(get_theme_mod('dt_btn_border_color', DT_BTN_BORDER_COLOR)); ?>;
	}
	.dt-btn:hover, button:hover, input[type=button]:hover, input[type=reset]:hover, input[type=submit]:hover, p.edit-link:hover, .reply .gd_comment_replaylink #gd_comment_replaylink:hover, #buddypress form#whats-new-form input[type=submit]:hover, #buddypress .standard-form div.submit input:hover, #buddypress .comment-reply-link:hover, #buddypress button:hover, #buddypress div.generic-button a:hover, #buddypress input[type=button]:hover, #buddypress input[type=reset]:hover, #buddypress input[type=submit]:hover, #buddypress ul.button-nav li a:hover, #buddypress input[type=submit]#notification-bulk-manage:hover {
	background-color: <?php echo esc_attr(get_theme_mod('dt_btn_hover_color', DT_BTN_HOVER_COLOR)); ?>;
	}

	ul, ol {
	margin: 0 0 20px 20px;
	padding: 0;
	}

	<?php
	$styles = preg_replace( "/\r|\n/", " ", ob_get_clean()); // seems to need line breaks removed
	if ( isset( $mceInit['content_style'] ) ) {
		$mceInit['content_style'] .= ' ' . $styles . ' ';
	} else {
		$mceInit['content_style'] = $styles . ' ';
	}

	return $mceInit;
}

add_action( 'dt_footer_copyright', 'dt_footer_copyright_default', 10 );
function dt_footer_copyright_default() {
	$dt_disable_footer_credits = esc_attr(get_theme_mod('dt_disable_footer_credits', DT_DISABLE_FOOTER_CREDITS));
	if ($dt_disable_footer_credits != '1') {
		$theme_name = "Directory Starter";
		$theme_url = "https://wordpress.org/themes/directory-starter/";

		$wp_link = '<a href="https://wordpress.org/" target="_blank" title="' . esc_attr__('WordPress', 'directory-starter') . '"><span>' . __('WordPress', 'directory-starter') . '</span></a>';
		$default_footer_value = sprintf(__('Copyright &copy; %1$s %2$s %3$s Theme %4$s', 'directory-starter'),date('Y'),"<a href='$theme_url' target='_blank' title='$theme_name'>", $theme_name, "</a>");
		$default_footer_value .= sprintf(__(' - Powered by %s.', 'directory-starter'), $wp_link);

		echo $default_footer_value;

	}else{
		echo esc_attr( get_theme_mod( 'dt_copyright_text', DT_COPYRIGHT_TEXT ) );
	}
}

/**
 * Set a default favicon if none set.
 *
 * This can improve speed by preventing a 302 redirect to the WP default.
 *
 * @param $url
 * @param $size
 * @param $blog_id
 *
 * @return string
 */
function dt_default_site_icon_url($url, $size, $blog_id){

	if(empty($url)){
		if($size=='32'){
			$url = get_template_directory_uri()  . '/assets/images/icon-32.png';
		}elseif($size=='180'){
			$url = get_template_directory_uri()  . '/assets/images/icon-180.png';
		}elseif($size=='192'){
			$url = get_template_directory_uri()  . '/assets/images/icon-192.png';
		}elseif($size=='270'){
			$url = get_template_directory_uri()  . '/assets/images/icon-270.png';
		}else{
			$url = get_template_directory_uri()  . '/assets/images/icon.png';
		}
	}
	return $url;
}
add_filter('get_site_icon_url','dt_default_site_icon_url',10,3);
