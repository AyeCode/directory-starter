<?php
/**
 * Template Name: Blank (for page builders)
 *
 * @package Directory_Starter
 * @since 2.1.0.4
 */

get_header(); 

do_action('dt_page_before_main_content'); ?>
<section class="">
		<?php if (!have_posts()) : ?>
			<div class="alert alert-warning">
				<?php _e('Sorry, no results were found.', 'directory-starter'); ?>
			</div>
			<?php get_search_form(); ?>
		<?php endif; ?>
		<?php
		while ( have_posts() ) : the_post();

			the_content();

		endwhile;
		?>
</section>

<?php do_action('dt_page_after_main_content'); ?>

<?php get_footer(); ?>