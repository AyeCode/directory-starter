<article <?php post_class(); ?>>
	<header>
		<?php 
			if ( is_singular() ) {
				the_title( '<h1 class="entry-title h1 text-secondary">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title h2"><a class="text-primary" href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
			}
		?>
	</header>
	<div class="entry-content entry-summary">
		<?php
		if (is_singular() || (function_exists('is_bbpress') && is_bbpress())) {
			the_content();
		} else {
			directory_theme_post_thumbnail();
			the_excerpt();
		}
		?>
		<?php
		wp_link_pages( array(
			'before'      => '<nav aria-label="post navigation">
								<ul class="pagination ml-0">
									<li class="page-item disabled">
										<span class="page-link">
											' . __( 'Pages:', 'directory-starter' ) . '
										</span>
									</li>',
			'after'       => '</ul></nav>',
			'link_before' => '<span class="page-link">',
			'link_after'  => '</span>',
		) );
		?>
	</div>
	<footer class="entry-footer">
		<?php directory_theme_entry_meta(); ?>
		<?php edit_post_link( __( 'Edit', 'directory-starter' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>
</article>