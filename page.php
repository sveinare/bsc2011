<? get_header(); ?>

		<!-- From: page.php -->

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
			<div <?php post_class(); ?>>
			
				<h1><?php the_title(); ?></h1>
				<!-- p class="info"><?php the_time(); ?> by <?php the_author(); ?></p -->
				<?php the_content('Read More &raquo;'); ?>
				
			</div>
			
			<?php endwhile; ?>
			
		<?php else : ?>
		
			<h2>Sorry...</h2>
			<p>No posts were found.</p>
			
		<?php endif; ?>
		

<? get_footer(); ?>