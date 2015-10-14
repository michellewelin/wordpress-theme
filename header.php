<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Michelle Welin
 * @subpackage michelletheme
 * @since 1.0
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
	
	<link rel="Shortcut Icon" href="http://www.michellewelin.com/wp-content/themes/michelletheme/img/favicon.ico" type="image/x-icon">

	<style>
	.header{
		background-color: <?php echo get_option('header_bg_color'); ?>;
	}

	</style>

</head>

<body <?php body_class(); ?>>

	<nav class="primary-nav">
		<div class="menu-header">Menu</div>
		<i class="fa fa-times close-nav"></i>

		<?php // visar huvudmenyn
		wp_nav_menu(array(
			'theme_location' => 'main_menu',
			'menu_class'      => 'menu-primary',
			));
		?>

	</nav>


	<div id="wrapper">

		<header class="header">	
			<div class="logo">
				<a src="http://www.michellewelin.com"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png"></a>
			</div>
			<div class="click-menu"><i class="fa fa-bars"></i>
			</div>
		</header>

		<div class="header-img" style="background-image:url(<?php echo( get_header_image() ); ?>)">
			

			<div class="top-widget-area-wrap">
				<?php //visar widget längst uppe på sidan
					if(is_active_sidebar('top-widget-area')) {
					dynamic_sidebar('top-widget-area');
					}
				?>
				
			</div>
			<div class="animated bounce"><i class="fa fa-arrow-down"></i></div></div>
		</div>