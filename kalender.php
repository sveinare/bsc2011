<? 

/**
 * @package WordPress
 * @subpackage Default_Theme
 */
/*
Template Name: Kalender
*/

get_header(); 

?>

		<!-- From: page.php -->

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
			<div <?php post_class(); ?>>
			
				<h1><?php the_title(); ?></h1>
				<!-- p class="info"><?php the_time(); ?> by <?php the_author(); ?></p -->
				<?php the_content('Read More &raquo;'); ?>
				
				<div id="fullKalenderDiv"></div>
				
			</div>
			
			<?php endwhile; ?>
			
		<?php endif; ?>
		

<? get_footer(); ?>