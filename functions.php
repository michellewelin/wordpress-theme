<?php


load_theme_textdomain('michelletheme', get_template_directory() . '/languages'); //language

require_once('library/cpt-projects.php'); //projects, custom post type

require_once (  get_stylesheet_directory(  ) . '/page-list.php'   ); //onepage

if ( function_exists( 'add_theme_support' ) ) { 
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 900, 592, true ); // Normal post thumbnails
    add_image_size( 'screen-shot', 800, 1065, true); // Full size screen
}

register_nav_menus(array( //Menyn visas
	'main_menu' => __('Head menu', 'michelletheme')
	));

register_sidebar(array( // Registerar sidebar
	'id' => 'main-sidebar',
	'name' => __('Header sidebar', 'michelletheme'),
	'desc' => 'sidebar som syns på sidebar-template/blog'
	));


register_sidebar(array( //add top-widget
	'id' => 'top-widget-area',
	'name' => __('Top widget', 'michelletheme'),
	'desc' => 'Widget som dyker upp i toppen på sidan',
	'class' => 'top-widget',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>'
	));

add_theme_support( 'post-thumbnails' );
add_image_size( 'mobile-thumb', 300, 400, true );
add_image_size( 'featured-image', 800, 550, true); 


add_theme_support( 'custom-header' );//add custom-header
$args = array(
	'flex-width'    => true,
	'width'         => 1200,
	'flex-height'    => true,
	'height'        => 600,
	'default-image' => get_template_directory_uri() . '/img/venice.jpg',
);
add_theme_support( 'custom-header', $args );

//add mordernizer script
add_action( 'wp_enqueue_scripts', 'child_add_modernizr_scripts' );

function child_add_modernizr_scripts() {
wp_register_script('modernizr', get_stylesheet_directory_uri() . '/js/modernizr-custom.js', false, '1.0', true );

wp_enqueue_script( 'modernizr' );
}


/**
 * Add scripts and styles
 */
function theme_name_scripts() {

//add JS script
wp_enqueue_script( 'michelletheme', get_template_directory_uri() . '/js/basic.js', array( 'jquery' ), '2015-04-02', true );


// Add Roboto font
wp_enqueue_style( 'Roboto', 'http://fonts.googleapis.com/css?family=Roboto:400,300,500,700,400italic,300italic,100', array(), null );

// Add Alegreya
wp_enqueue_style( 'Alegreya', 'https://fonts.googleapis.com/css?family=Alegreya:400,400italic,700,700italic', array(), null );

//Add font awesome
wp_enqueue_style('font awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css', array(), null);

wp_enqueue_style('CSS', get_template_directory_uri(). "/css/style.css");


}

add_action( 'wp_enqueue_scripts', 'theme_name_scripts' ); 

//längden på excerpt på custom post type
add_filter('excerpt_length', 'my_excerpt_length');
 
function my_excerpt_length($length) {
 
    return 100; 
 
}
 
add_filter('excerpt_more', 'new_excerpt_more');  
 
function new_excerpt_more($text){  
 
    return ' ';  
 
}  
 
function portfolio_thumbnail_url($pid){ //tumbnail för portfolio
    $image_id = get_post_thumbnail_id($pid);  
    $image_url = wp_get_attachment_image_src($image_id,'screen-shot');  
    return  $image_url[0];  
}

// Shortcode function to show portfolio on startpage
function showPortfolio() {
	query_posts('post_type=portfolio&posts_per_page=9');
 
?>
 <div id="portfolio" class="group"> 
 <div class="wrap">
<div class="group">
 
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
 
    <?php
        $title= str_ireplace('"', '', trim(get_the_title()));
        $desc= str_ireplace('"', '', trim(get_the_content()));
    ?>   
    <div class="item">
	   
		    <span class="titel-main"><?=$title?></span>
                <div class="img">
	                <div class="gradient">
                		<?php the_post_thumbnail(); ?>
	                </div>
                </div> 
	               
                 <div class="pic-hover"></div>
                 <div class="title-wrap">
	             	<div class="show-title"></div>
	             </div>
                <div class="project-text">
	                
                	<p><span class="project-title"><?=$title?></span><br><?php print get_the_excerpt(); ?> </p>
						<?php $site= get_post_custom_values('projLink'); 
						if($site[0] != ""){
                 
                		?>
                    <p><a target="_blank" href="<?=$site[0]?>">Visit the Site</a></p>
                     
					<?php }else{ ?>
                    	<p><em>Live Link Unavailable</em></p>
						<?php } ?>
                </div>
    </div>
         
<?php endwhile; endif; ?>
 
</div>
</div>
</div>

<div class="pop-up">
    <i class="fa fa-times close-popup"></i>
    <div class="pop-up-inner"></div>
</div>
<div class="overlay"></div>
<?php
}
add_shortcode('show-portfolio','showPortfolio');

//theme settings
add_action("admin_menu", "theme_settings_setup");


function theme_settings_setup(){
    add_theme_page('Settings', __('Theme settings', 'michelletheme'), 'administrator', 'mt_theme_settings', 'print_theme_settings_page');
}

function print_theme_settings_page(){

?>
    <h1><?php _e('Theme settings'); ?></h1>

      <?php  if(isset($_POST["update_settings"])){
        update_option('header_bg_color', $_POST["bgcolor"]);
    ?>
        <div class="updated settings-error"><p>Sparat</p></div>
        <?php 
    }

$bgcolor = get_option('header_bg_color');
    ?>

    <form method="post" action="">
        <label for="bgcolor"> <?php _e('Choose color for header'); ?></label><br>
        <input type="text" id="bgcolor" class="regular-text" name="bgcolor" value="<?php echo $bgcolor; ?>"> <br>

        <input type="submit" value="Spara" name="update_settings" class="button button-primary">

    </form> 
    <?php
}

//Custom styles till editorn
function my_theme_add_editor_styles() {
    add_editor_style( '/css/custom-editor-style.css' );
}

add_action( 'admin_init', 'my_theme_add_editor_styles' );
?>