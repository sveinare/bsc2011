<? get_header(); ?>


		<div><h1>Nyheter</h1></div>
		
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
			<div <?php post_class(); ?>>
			
				<!--h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1-->

				<h2><?php the_title(); ?></h2>
				<!-- p class="info"><?php the_time(); ?> by <?php the_author(); ?></p -->
				<?php the_content('Les mer &raquo;'); ?>
				
			</div>
			
			<?php endwhile; ?>
			
			<div class="posts-nav">
				<span class="previous-posts"><?php previous_posts_link( '&laquo; Nyere artikler' ) ?></span>
				<span class="next-posts"><?php next_posts_link( 'Tidligere artikler &raquo;' ) ?></span>
			</div>
			
		<?php else : ?>
		
			<h2>Sorry...</h2>
			<p>No posts were found.</p>
			
		<?php endif; ?>
		

<? get_footer(); ?>