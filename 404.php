<?php get_header(); ?>

<div id="post-0" class="error404">
  	
  	<h1 class="entry-title"><?php _e( 'Not Found', 'your-theme' ); ?></h1>
     	
     	<div class="entry-content">
              
            <p><?php _e( 'Sorry but you were looking for something thats not there.<br> Try the search form:' ); ?></p>

<?php get_search_form(); ?>
    </div>

</div>

<?php get_footer(); ?>