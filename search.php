<?php get_header(); ?>

<?php function search_results($query) {
    if ($query->is_search) {
      
        $query->set('post_type', array('page', 'post'));
    
        $query->set('post__not_in', array(25,27,29,31,33,291));
    }
    return $query;
}

add_filter('pre_get_posts','search_results'); ?>


<div class="content">
    <h1>Search Results: &quot;<?php echo get_search_query(); ?>&quot;</h1>

    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
                
                <div class="posts">
                    <h2><?php the_title();  ?></h2>
                    <p><?php the_excerpt(); ?></p>
                    <p> <a href="<?php the_permalink(); ?>">View</a> </p>
                </div>
        <?php endwhile; ?>
    
    <?php else : ?>
            <h1>No Results Found.</h1>
</div>
    
    <?php endif; ?>


<?php get_footer(); ?>