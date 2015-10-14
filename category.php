<?php get_header(); ?> 

<section id="primary" class="site-content">
	<div id="content" role="main">

		<?php if ( have_posts() ) : ?>
			<div class="posts">

			<h1 class="archive-title">Category: <?php single_cat_title( '', true ); ?></h1>

				<?php if ( category_description() ) : ?>
				<div class="archive-meta"><?php echo category_description(); ?></div>
				<?php endif; ?>

				<?php while ( have_posts() ) : the_post();?>
					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					<small><?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?></small>

			<div class="entry">
				<?php the_content(); ?>

				<p class="postmetadata"><?php
		  			comments_popup_link( 'Inga kommentarer', '1 kommentar', '% kommentarer');?></p>
			</div>

			<?php endwhile; 

			else: ?>
				<p>Inga poster</p>

				</div>
		<?php endif; ?>

</div>

</section>


<?php get_footer(); ?>