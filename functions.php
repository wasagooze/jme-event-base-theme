<?php

/*
 * Tell WordPress to run jme_event_base_setup() when the 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'jme_event_base_setup' );

if ( ! function_exists( 'jme_event_base_setup' ) ):

function jme_event_base_setup() {

  // This theme uses wp_nav_menu() in one location.
  register_nav_menu( 'primary', __( 'Primary Menu', 'jme-event-base-theme' ) );

  // Add support for custom backgrounds.
  add_theme_support( 'custom-background', array(
    /*
     * Let WordPress know what our default background color is.
     * This is dependent on our current color scheme.
     */
    'default-image' => get_stylesheet_directory_uri() . '/images/background.jpg'
  ) );

  // This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
  add_theme_support( 'post-thumbnails' );

  $custom_header_support = array(
      'default-image' => get_stylesheet_directory_uri() . '/images/header.png',
      'width' => 970,
      'height' => 470,
      'uploads' => true,

  );

    /*
   * We'll be using post thumbnails for custom header images on posts and pages.
   * We want them to be the size of the header image that we just defined.
   * Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
   */
  set_post_thumbnail_size( $custom_header_support['width'], $custom_header_support['height'], true );


  add_theme_support( 'custom-header', $custom_header_support);


}
endif; // base setup

function jme_enqueue_scripts() {
    wp_enqueue_script( 'attractions', get_template_directory_uri() . '/js/attractions.js', array('jquery'));
}

add_action( 'wp_enqueue_scripts', 'jme_enqueue_scripts' );
/**
 * Register sidebars and widgetized areas.
 */
function jme_widgets_init() {

	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'jme-event-base-theme' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area One', 'jme-event-base-theme' ),
		'id' => 'footer-sidebar-1',
		'description' => __( 'An optional widget area for your site footer', 'jme-event-base-theme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area Two', 'jme-event-base-theme' ),
		'id' => 'footer-sidebar-2',
		'description' => __( 'An optional widget area for your site footer', 'jme-event-base-theme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area Three', 'jme-event-base-theme' ),
		'id' => 'footer-sidebar-3',
		'description' => __( 'An optional widget area for your site footer', 'jme-event-base-theme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

  register_sidebar( array(
    'name' => __( 'Footer Copyright Info', 'jme-event-base-theme' ),
    'id' => 'footer-copyright',
    'before_widget' => '<div id="copyright">',
    'after_widget' => "</div>"
  ) );


  register_sidebar( array(
    'name' => '404 Template',
    'id' => '404-template'
  ) );

  unregister_widget('WP_Widget_Calendar'); //removes calendar widget
  unregister_widget('WP_Widget_Recent_Comments'); // removes recent comments widget 
}
add_action( 'widgets_init', 'jme_widgets_init' );

function jme_post_type_dropdown($post_type, $selected, $all_option) {
  if ($selected == null) {
    $selected = 0;
  }

  if ($all_option == null) {
    $all_option = "All";
  }
  
  $select = "<select name='".$post_type."-dropdown' id='".$post_type."-dropdown' class='postform'>";
  $select .= "<option value=0>".$all_option."</option>";

  $args = array( 
    'posts_per_page' => 100, 
    'post_type' => $post_type,
    'orderby'=> 'title', 
    'order' => 'ASC'
  );

  $posts = get_posts( $args );

  foreach( $posts as $post ) {
    $select .= "<option ";
    if ($post->ID == $selected) {
      $select .= "selected ";
    }
    $select .= "value='" . get_the_permalink($post->ID) . "'>" . $post->post_title . "</option>";
  }

  $select.= "</select>";

  return $select;
}


if ( ! function_exists( 'get_presenter_list' ) ) :
function get_presenter_list() {

  $presenters = get_the_terms(get_the_ID(), 'presenter');
  if (!empty($presenters )) {
    echo "<ul class='presenter-list'>";
      foreach ($presenters as $presenter) {
        $term_link = get_term_link($presenter, 'presenter');
        echo "<li><a href='$term_link'>$presenter->name</a></li>";
      }
    echo "</ul>";
    }
}
endif;

if ( ! function_exists( 'post_type_tags_fix' ) ) :

function post_type_tags_fix($request) {
    if ( isset($request['tag']) && !isset($request['post_type']) )
    $request['post_type'] = 'any';
    return $request;
} 

endif;

add_filter('request', 'post_type_tags_fix');

// Alphabetize post type archive pages
// TODO: let user choose a sort order?
function jme_alphabetize_post_type( $query ) {
    if ( $query->is_post_type_archive() && $query->is_main_query()) {
        $query->set( 'orderby', 'title' );
        $query->set( 'order', 'ASC' );
    }
}
add_action( 'pre_get_posts', 'jme_alphabetize_post_type' );


// Misc helper functions
if ( ! function_exists( 'has_taxonomy' ) ) :
function has_taxonomy($post_type, $taxonomy) {
  if ($post_type == null) {
    return false;
  }
  $obj = get_post_type_object($post_type);
  return in_array($taxonomy, $obj->taxonomies);
}
endif;

if ( ! function_exists( 'jme_define_page_header_title' ) ) :
function jme_define_page_header_title() {
  // if it's a single page view OR in the loop
  if (is_single() || in_the_loop()) {
    return get_the_title();
  }
  // is an author page, get the author name
  if (is_author()) {
    return get_the_author();
  } 

  // if it's a post type archive and NOT in the loop, return the post type title
  if (is_post_type_archive()) {
    return post_type_archive_title('', false);
  }
  // if it's a category or tag, return that
  if (is_tax()) {
    return single_term_title('', false);
  }

  // default to title
  return get_the_title();
}
endif;

require_once('includes/custom-taxonomies.php');

require_once('includes/attraction-post-type.php');
require_once('includes/event-post-type.php');
require_once('includes/show-post-type.php');
require_once('includes/vendor-post-type.php');
require_once('includes/workshop-post-type.php');


?>
