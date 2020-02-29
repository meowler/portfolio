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


function acf_register_block_types() {
		
		// register a intro block
		acf_register_block(array(
			'name'				=> 'intro',
			'title'				=> __('Intro Block'),
      'description'		=> __('Project summary description'),
      'render_template'   => 'template-parts/blocks/project-intro-block.php',
			'category'			=> 'common',
			'icon'				=> 'align-center',
			'keywords'			=> array( 'intro', 'summary' ),
    ));
    
    // register a test block
		acf_register_block(array(
			'name'				=> 'test',
			'title'				=> __('Test Block'),
      'description'		=> __('Test'),
      'render_template'   => 'template-parts/blocks/test-block.php',
			'category'			=> 'common',
			'icon'				=> 'align-center',
			'keywords'			=> array( 'test' ),
    ));

}

if ( function_exists ('acf_register_block') ) {
    add_action('acf/init', 'acf_register_block_types');
}

?>