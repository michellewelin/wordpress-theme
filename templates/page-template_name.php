<?php
/**
 * Template Name: Big top image
 *
 * @package Posh Industries
 * @subpackage PACKAGE NAME
 * @since PACKAGE VERSION
 */
get_header();
?>

<?php
if(have_posts()) {
	while(have_posts()) {
		the_post();
	}
}
?>

<?php get_footer(); ?>