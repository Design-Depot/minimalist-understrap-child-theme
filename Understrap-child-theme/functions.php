<?php
require_once( get_stylesheet_directory() . '/inc/custom-functions.php');

function my_theme_enqueue_styles() {
	$parent_style = 'understrap-styles';
	$parent_theme = wp_get_theme("understrap");
	wp_enqueue_style( 'understrap-styles', get_template_directory_uri() . '/css/theme.min.css', array(), $parent_theme->get( 'Version' ) );
	wp_enqueue_style( 'child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( $parent_style ),
		wp_get_theme()->get('Version')
	);
	wp_enqueue_style( 'my_css', get_stylesheet_directory_uri() . '/css/main.css' );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );


function theme_js() {
	wp_enqueue_script('my_js', get_stylesheet_directory_uri(). '/js/my_js.js', array('jquery'), '', true);
}

//Call the JS include function we just declared
add_action('wp_enqueue_scripts', 'theme_js');
?>