<?php get_header(); ?>

<div class="content">

	<?php if (have_posts()) : ?>

    <h2 class="page-content-title"><?php single_tag_title(__('Tag archives for: '), true); ?></h2>
        
                        
        	<?php while (have_posts()) : the_post(); ?>
                                    
                     
			<h2><a href="<?php the_permalink(); ?>" class="category-title-link"><?php the_title(); ?></a></h2>
                            
		<div class="category-post">
                                                        
			<small>Posted on <?php the_date(get_option('date_format')); ?> at <?php the_time(get_option('time_format')); ?> by <?php the_author_posts_link(); ?></small>
                                                
        	<?php the_excerpt(); ?>

		</div>

			<?php if (has_tag()) : ?>

				<p class="tags"><?php the_tags('', ' '); ?></p>

			<?php else : ?>
			<?php endif; ?>

			<a href="<?php the_permalink(); ?>" class="btn btn-blue btn-block">Read More</a>
                    
            <?php endwhile; ?>
                        
			<?php else : ?>

                     
				<h1>No posts were found.</h1>

             <?php endif; ?>
                      
</div>

<?php get_footer(); ?>