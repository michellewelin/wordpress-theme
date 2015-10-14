<?php
/* Template Name: Portfolio */
 
 
get_header(); 
 
query_posts('post_type=portfolio&posts_per_page=9');
 
?>
 <div id="portfolio" class="group"> 
  <div class="wrap">
<h1>Portfolio</h1>
 
<div class="group">
 
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
 
    <?php
        $title= str_ireplace('"', '', trim(get_the_title()));
        $desc= str_ireplace('"', '', trim(get_the_content()));
    ?>   
 
    <div class="item">
                <div class="img">
                <?php the_post_thumbnail(); ?>
                </div>
                <p><strong><?=$title?>:</strong> <?php print get_the_excerpt(); ?> 
                
                <?php $site= get_post_custom_values('projLink'); 
                    if($site[0] != ""){
                 
                ?>
                    <p><a target="_blank" href="<?=$site[0]?>">Visit the Site</a></p>
                     
                <?php }else{ ?>
                    <p><em>Live Link Unavailable</em></p>
                <?php } ?>
            </div>
 
         
<?php endwhile; endif; ?>
 
</div>
</div>
</div>

<div class="pop-up">
    <i class="fa fa-times"></i>
</div>
<div class="overlay"></div>

<?php get_footer(); ?>
 