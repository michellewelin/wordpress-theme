<?php

function knf_property_init() {
		$args = array(
			'label'		=> 'Fastighet',
			'public'	=> true,
			'show_ui'	=> true,
			'capability_type' => 'page',
			'hierarchical' => false,
			'menu_icon' => 'dashicons-admin-home',
			'supports' => array('title', 'editor', 'thumbnail', 'page-attributes')	
			);
		register_post_type('property', $args);

}

add_action( 'init', 'knf_property_init' );

/*---------------------------------------*/
/*---------------Metabox-----------------*/

function setup_property_metabox(){

add_meta_box( 'property-info', 'Information om fastigheten', 'show_prop_info', 'property', 'side', 'high' );

}

add_action('add_meta_boxes', 'setup_property_metabox' );

function show_prop_info(){
	global $post;
	$gatuadress = get_post_meta( $post->ID, 'knf-gatuadress', true);
	$gatunummer = get_post_meta( $post->ID, 'knf-gatunummer', true);
	?>

	Gatuadress:<br>
	<input type="text" name="knf-gatuadress" value="<?php echo $gatuadress; ?>"> 
	Gatunummer:<br>
	<input type="number" name="knf-gatunummer" value="<?php echo $gatunummer; ?>"> 

	<?php
}

function save_prop_info($post_id) {
	update_post_meta($post_id, "knf-gatuadress", $_POST["knf-gatuadress"]);
	update_post_meta($post_id, "knf-gatunummer", $_POST["knf-gatunummer"]);
}

add_action('save_post', 'save_prop_info');

?>