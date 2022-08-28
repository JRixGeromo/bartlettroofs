<?php
function bartlettroofs_register_styles() {
	wp_enqueue_style('bartlettroofs-fonts-googleapis','https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&amp;display=swap', array());
	wp_enqueue_style('bartlettroofs-bundle-ui',get_template_directory_uri().'/assets/css/bundle/bundle.ui.defaultb8cd.css', array(),'1.0','all');
}
add_action('wp_enqueue_scripts', 'bartlettroofs_register_styles');

function bartlettroofs_register_scripts() {
	
	wp_enqueue_script('bartlettroofs-kit-fontawesome', get_template_directory_uri().'/assets/kit.fontawesome.com/7b3b8fd08c.js', array(),'1.0');
	wp_enqueue_script('bartlettroofs-bundle-ui-jquery', get_template_directory_uri().'/assets/js/bundle/bundle.ui.jquery.minb8cd.js', array(),'1.0');
	wp_enqueue_script('bartlettroofs-bundle-ui-bootstrap',get_template_directory_uri().'/assets/js/bundle/bundle.ui.bootstrap.minb8cd.js', array(),'1.0');
	wp_enqueue_script('bartlettroofs-bundle-ui-styling', get_template_directory_uri().'/assets/js/bundle/bundle.ui.styling.minb8cd.js', array(),'1.0');
	wp_enqueue_script('bartlettroofs-bundle-bundle-ui-seo', get_template_directory_uri().'/assets/js/bundle/bundle.ui.seo.minb8cd.js', array(),'1.0', true);
	wp_enqueue_script('bartlettroofs-bundle-bundle-ui-customizationsb8cd', get_template_directory_uri().'/assets/js/bundle/bundle.ui.customizationsb8cd.js', array(),'1.0', true);
	wp_enqueue_script('bartlettroofs-custom', get_template_directory_uri().'/assets/js/custom.js', array(),'1.0', true);
}
add_action('wp_enqueue_scripts', 'bartlettroofs_register_scripts');
?>
