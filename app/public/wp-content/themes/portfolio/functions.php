<?php 
include( get_stylesheet_directory() . '/inc-functions/CPT/case-study.php' );
// include( get_stylesheet_directory() . '/inc-functions/CPT/projects.php' );


function my_theme_enqueue_styles() {

  $parent_style = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

  wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
  wp_enqueue_style( 'child-style',
      get_stylesheet_directory_uri() . '/style.css',
      array( $parent_style ),
      wp_get_theme()->get('Version')
  );
  wp_enqueue_style( 'compiled-child-style', 
  get_stylesheet_directory_uri() .'/dist/style.min.css',
  array(), //important
  filemtime(get_stylesheet_directory() .'/dist/style.min.css'), 
  'all'
  );
}

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
