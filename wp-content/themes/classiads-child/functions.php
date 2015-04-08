<?php //Child theme's functions file runs before the parent theme's functions.php
//

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style') );
 
}
// register the about page sidebar
function vs_about_sb(){

			register_sidebar( array(
			'name'          => 'About Page Sidebar', 'agrg',
			'id'            => 'about-page',
			'description'   => 'This sidebar goes to the right of your about page', 'agrg',
		'before_widget' => '<div class="cat-widget"><div class="cat-widget-content">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="cat-widget-title"><h3>',
		'after_title'   => '</h3><div class="h3-seprator-sidebar"></div></div>',
		));
}
add_action('widgets_init', 'vs_about_sb' );


//no close 	PHP



