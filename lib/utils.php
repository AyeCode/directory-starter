<?php
function directory_theme_paginate() {
	global $wp_query;
	$big_num = 999999999;
	if ( $wp_query->max_num_pages <= 1 )
		return;
	echo '<nav class="pagination">';
	echo paginate_links( array(
		'base'         => str_replace( $big_num, '%#%', esc_url( get_pagenum_link($big_num) ) ),
		'format'       => '',
		'current'      => max( 1, get_query_var('paged') ),
		'total'        => $wp_query->max_num_pages,
		'prev_text'    => '&larr;',
		'next_text'    => '&rarr;',
		'type'         => 'list',
		'end_size'     => 3,
		'mid_size'     => 3
	) );
	echo '</nav>';
}

function dt_header_image() {
	$style = '';
	if ($url = esc_url( get_header_image() )) {
		$style = 'background: url('.$url.') no-repeat scroll top;background-size: cover;';
	}
	return $style;
}

/**
 * Filters the string in the "more" link displayed after a trimmed excerpt.
 *
 * @since 2.0
 *
 * @param string $more_string The string shown within the more link.
 * @return string Read more link.
 */
function dt_excerpt_more( $more_string ) {
	global $post;

	if ( ! empty( $post ) ) {
		$more_string = ' <a class="moretag" href="'. esc_url( get_permalink( $post->ID ) ) . '">' . __( 'Read more...', 'directory-starter' ) . '</a>';
	}

	return $more_string;
}
add_filter( 'excerpt_more', 'dt_excerpt_more', 10, 1 );

function dt_content_classes(){
	$classes = array();

	// settings
	$classes[] = get_theme_mod('dt_content_border_show', DT_CONTENT_BORDER_SHOW);
	$classes[] = get_theme_mod('dt_content_shadow', DT_CONTENT_SHADOW);
	$classes[] = get_theme_mod('dt_content_corners', DT_CONTENT_CORNERS);
	
	
	// constants
	$classes[] = DT_CONTENT_PADDING;
	$classes[] = DT_CONTENT_MARGINS;

	return implode(" ",$classes);
}