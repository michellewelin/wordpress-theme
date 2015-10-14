<?php get_header(); ?>

<div class="content">

	<?php
			if(have_posts()){
				while (have_posts()) {
					the_post();
					?>
					<div class="featured-image">
					<?php the_post_thumbnail('featured-image'); ?>
					</div>

				<div class="posts">
					<div class="wrap">
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<div class="excerpt">
							<?php the_content(); ?>
						</div>
					</div>
					
				</div>

			<?php
				}
			}
	?>
</div>

<?php

if ( !is_404() ) {
echo do_shortcode('[pagelist_ext 
  parent="'.get_the_ID().'" 
  show_image="1"
  show_content="1"
  image_width="1200" 
  image_height="1200"   
  show_title="1" 
  limit_content="100000" 
  strip_tags="0"
  strip_shortcodes="0" 
  show_meta_key="background-color"]'
 );
}

?>

<?php get_footer(); ?>