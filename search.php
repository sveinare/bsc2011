<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

	<div id="content" class="narrowcolumn">

		<?php if (have_posts()) : ?>

			<h2 class="pagetitle">S&oslash;keresultater</h2>

			<?php while (have_posts()) : the_post(); ?>

				<div <?php post_class() ?>>
					<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				</div>

			<?php endwhile; ?>

		<?php else : ?>

			<h2 class="center">Ingen treff p&aring; ditt s&oslash;k.</h2>
			<?php get_search_form(); ?>

		<?php endif; ?>
		
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>