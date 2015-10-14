<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?> 
 
				<div class="posts">
					<h2><?php the_title(); ?></h2>
					<div class="content">
							<small><?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?></small>
						<?php the_content(); ?>
					</div>
					<div class="featured-image">	
						<?php 
						if(has_post_thumbnail()){
							the_post_thumbnail('mobile-thumb');
						}
						?>
					</div>

						<p><?php the_tags(); ?></p>
					
				</div>

					<?php
				
	?>


<?php endwhile; ?>


<?php get_footer();?>