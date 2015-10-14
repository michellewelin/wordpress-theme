<?php
/* Template Name: Sidebar */
 get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?> 
 
				<div class="posts">
					<h2><?php the_title(); ?></h2>
					<div class="content">
			
						<?php the_content(); ?>
					</div>
					<div class="featured-image">	
						<?php 
						if(has_post_thumbnail()){
							the_post_thumbnail('mobile-thumb');
						}
						?>
					</div>
					
				</div>

					<?php
				
	?>


<?php endwhile; ?>

<div class="sidebar">
	<?php get_sidebar('main-sidebar'); ?>
</div>


<?php get_footer();?>