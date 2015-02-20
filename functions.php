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

  /*
   * We'll be using post thumbnails for custom header images on posts and pages.
   * We want them to be the size of the header image that we just defined.
   * Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
   */
  set_post_thumbnail_size( $custom_header_support['width'], $custom_header_support['height'], true );


  $defaults = array(
      'default-image' => get_stylesheet_directory_uri() . '/images/header.png',
      'width' => 930,
      'height' => 260,
      'uploads' => true,

  );

  add_theme_support( 'custom-header', $defaults);

}
endif; // base setup

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

function jme_filter_categories( $query ) {

  // Don't show anything besides announcements on home page
  if ($query->is_home() && $query->is_main_query()) {
    $category = get_category_by_slug('announcements')->term_id;
    $query->set('cat', $category);
  } else {
    $query->set('orderby', 'name');
    $query->set('order', 'ASC');
    $query->set('nopaging', 'true');
  }
}

add_action('pre_get_posts', 'jme_filter_categories');



require_once('includes/attractions.php');

?>
