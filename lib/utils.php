<?php

function dt_body_classes( $classes ) {
    $classes[] = 'bsui';
    return $classes;
}
add_filter( 'body_class','dt_body_classes' );

function dt_header_image() {
	$style = '';
	if ($url = esc_url( get_header_image() )) {
		$style = 'background: url('.$url.') top / cover no-repeat scroll;';
	}
	return $style;
}

// Replaces the excerpt "more" text by a link
function dt_excerpt_more( $more ) {
    return sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
          esc_url( get_permalink( get_the_ID() ) ),
          sprintf( __( 'Read more %s', 'directory-starter' ), '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )
    );
}
add_filter( 'excerpt_more', 'dt_excerpt_more' );