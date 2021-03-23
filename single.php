<?php get_header(); ?>

<?php do_action('dt_single_before_main_content'); ?>

<?php
$dt_enable_blog_sidebar = esc_attr(get_theme_mod('dt_enable_blog_sidebar', DT_ENABLE_BLOG_SIDEBAR));
$dt_blog_sidebar_position = esc_attr(get_theme_mod('dt_blog_sidebar_position', DT_BLOG_SIDEBAR_POSITION));
$dt_blog_sidebar_position_mobile = esc_attr(get_theme_mod('dt_blog_sidebar_position_mobile', DT_BLOG_SIDEBAR_POSITION_MOBILE));

if ($dt_enable_blog_sidebar == '1') {
	$content_class = 'col-lg-8 col-md-9';
	$content_class .= $dt_blog_sidebar_position == 'right' ? ' order-md-first' : ' order-md-last';
	$content_class .= $dt_blog_sidebar_position_mobile == 'bottom' ? ' order-first' : ' order-last';
} else {
	$content_class = 'col-lg-12';
}
?>
<div class="<?php if(get_theme_mod('dt_container_full', DT_CONTAINER_FULL)){echo 'container-fluid';}else{ echo "container";}?> py-4">
	<div class="row">
		<section class="<?php echo $content_class; ?>">
			<div class="content-single">
				<?php if (!have_posts()) : ?>
					<div class="alert-error">
						<p><?php _e('Sorry, no results were found.', 'directory-starter'); ?></p>
					</div>
					<?php get_search_form(); ?>
				<?php endif; ?>
				<?php
				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( 'template-parts/content/content' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

					// Previous/next post navigation.
					the_post_navigation( array(
							'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'directory-starter' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Next post:', 'directory-starter' ) . '</span> ' .
									'<span class="post-title">%title</span>',
							'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'directory-starter' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Previous post:', 'directory-starter' ) . '</span> ' .
									'<span class="post-title">%title</span>',
					) );

					// End the loop.
				endwhile;
				?>
			</div>
		</section>
		<?php if ( $dt_enable_blog_sidebar == '1' ) { ?>
			<aside class="col-lg-4 col-md-3">
				<div class="sidebar blog-sidebar page-sidebar">
					<?php get_sidebar(); ?>
				</div>
			</aside>
		<?php } ?>
	</div>
</div>


<?php do_action('dt_single_after_main_content'); ?>

<?php get_footer(); ?>