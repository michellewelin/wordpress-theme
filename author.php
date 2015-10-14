<?php get_header(); ?>

<div class="content">

	<?php
			if(have_posts()){
				while (have_posts()) {
					the_post();
					?>
				<div class="posts">
					<h1><?php the_title(); ?></h1>
				
			
						<?php the_content(); ?>
				
					<div class="featured-image">	
						<?php 
						if(has_post_thumbnail()){
							the_post_thumbnail('featured-image');
						}
						?>
					</div>
					
						<p><?php the_tags(); ?></p>
				</div>

					<?php
				}
			}
	?>

</div>

<?php comments_template();?>

<?php get_footer(); ?>