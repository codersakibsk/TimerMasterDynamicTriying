<?php
  
  function calling_resources(){

      add_theme_support('title-tag');
      add_theme_support('post-thumbnails');
  }
add_action( 'after_setup_theme', 'calling_resources' );

// /** Register Custom Navigation Walker */
// if ( ! file_exists( get_template_directory() . '/class-wp-bootstrap-navwalker.php' ) ) {
//   // File does not exist... return an error.
//   return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'WP-Bootstrap-Navwalker' ) );
// } else {
//   // File exists... require it.
//   require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
// }
// //////////////

// Excerpt Function
function new_excerpt_more($more) {
  global $post;
  return '  <a href="'. get_permalink($post->ID) . '">continue reading</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');
//
//Custom Excerpt
// function cExcerpt( $limit = 25 ){
//   $limit = $limit + 2;
//   $content = get_the_content();
//   $make_index = explode( " ", $content );
//   $index_slice = array_slice( $make_index, 0, $limit );
  
//   echo implode( " ", $index_slice );
// }


// widgets sidebar--
function timermaster_sidebar(){
  register_sidebar(array(
    'name' => 'Footer One',
    'id'   => 'footer_one',
    'before_widgts' => '<div class="befor_f_wrap">',
    'after_widgets' => '</div>',
    'before_title' => '<h4 class="bef_foot_oneTitle">',
    'after_title' => '</h4>',
    'description' => 'this is footer One sidebar'
  ));
  register_sidebar(array(
    'name' => 'Footer Two',
    'id'   => 'footer_two',
    'before_widgts' => '<div class="befor_f_wrap">',
    'after_widgets' => '</div>',
    'before_title' => '<h4 class="bef_foot_oneTitle">',
    'after_title' => '</h4>',
    'description' => 'This is footer Two sidebar'
  ));
  register_sidebar(array(
    'name' => 'Footer Three',
    'id'   => 'footer_three',
    'before_widgts' => '<div class="befor_f_wrap">',
    'after_widgets' => '</div>',
    'before_title' => '<h4 class="bef_foot_oneTitle">',
    'after_title' => '</h4>',
    'description' => 'This is footer Three sidebar'
  ));
}
add_action( 'widgets_init', 'timermaster_sidebar' );

function blog_sidebar(){
  register_sidebar(array(
    'name' => 'Blog Sidebar One',
    'id' => 'b_sidebar_one',
    'befor_widgets' => '<div class="search widget">',
    'after_widgets' => '</div>',
    'before_title' => '<form action="" method="get" class="searchform" role="search">',
    'after_title' => '</form>',
    'description' => 'This is Blog sidebar One'
  ));
  register_sidebar(array(
    'name' => 'Blog Sidebar Two',
    'id' => 'b_sidebar_two',
    'before_widgets' => '<div class="author widget">',
    'after_widgets' => '</div>',
    'description' => 'This is Blog sidebar Two'
  ));
  register_sidebar(array(
    'name' => 'Blog Sidebar Three',
    'id' => 'b_sidebar_three',
    'befor_widgets' => '<div class="categories widget">',
    'after_widgets' => '</div>',
    'before_title' => '<h3 class="widget-head">',
    'after_title' => '</h3>',
    'description' => 'This is Blog sidebar Three'
  ));
  register_sidebar(array(
    'name' => 'Blog Sidebar Four',
    'id' => 'b_sidebar_four',
    'before_widgets' => '<div class="recent-post widget">',
    'after_widgets' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
    'description' => 'This is Blog sidebar Four'
  ));
}
add_action('widgets_init', 'blog_sidebar');

  //

  //Calling files
  include_once('inc/navwalker.php');
  include_once('inc/custom-post.php');
  include_once('inc/css-js.php');
  require_once('inc/cmb2-custom-fields.php');
  require_once('inc/redux-framework-master/redux-framework.php');
  require_once('inc/timer-themeoption.php');













  



