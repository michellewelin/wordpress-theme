<?php get_header(); ?>

<?php
$term =	$wp_query->queried_object;
echo '<h1>'.$term->name.'</h1>'; ?>

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


<?php get_footer();?>