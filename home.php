<?php get_header(); ?>

<div class="content">
	<div class="blogposts">

		<?php
		if(have_posts()){
			while (have_posts()) {
				the_post();
				?>
			<div class="posts">
				<h1><?php the_title(); ?></h1>
				<small><?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?></small><br>
				<div class="excerpt">
					<?php 
						if(has_post_thumbnail()){
							the_post_thumbnail('mobile-thumb');
						}
					?>

					<?php the_excerpt(); ?>
					<p class="postmetadata"><?php
		  			comments_popup_link( 'Inga kommentarer', '1 kommentar', '% kommentarer');?></p>
				</div>
				
				<div class="readmore">
					<a href="<?php the_permalink(); ?>">Läs mer</a>
				</div>


			</div>

				<?php
			}
		}
				?>

	</div>

	<?php get_sidebar('startpage-sidebar'); ?>

</div>


<?php
get_footer();
?>