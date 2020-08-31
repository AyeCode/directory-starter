<?php

// Adding bootstrap class to the menu items.
function directory_theme_nav_class( $classes, $item, $args ) {
	$classes[] = "nav-item";
    return $classes;
}
add_filter( 'nav_menu_css_class' , 'directory_theme_nav_class' , 10, 4 );

// Adding bootstrap class to the menu item's link.
function directory_theme_add_class_to_all_menu_anchors( $atts ) {
    $atts['class'] = 'nav-link';
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'directory_theme_add_class_to_all_menu_anchors', 10 );

$menus = array(
		'primary-menu' => __( 'Primary Menu', 'directory-starter' ),   // main menu for header
		'footer-links' => __( 'Footer Links', 'directory-starter' )    // links menu for footer
);
$enable_header_top = esc_attr(get_theme_mod('dt_enable_header_top', DT_ENABLE_HEADER_TOP));
if ($enable_header_top == '1') {
	$menus['header-top'] = __( 'Header Top', 'directory-starter' );
}
// register nav menus
register_nav_menus($menus);
