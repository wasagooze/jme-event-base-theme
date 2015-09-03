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

function post_type_tags_fix($request) {
    if ( isset($request['tag']) && !isset($request['post_type']) )
    $request['post_type'] = 'any';
    return $request;
} 

add_filter('request', 'post_type_tags_fix');

if ( ! function_exists( 'twentyeleven_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentyeleven_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Eleven 1.0
 *
 * @param object $comment The comment object.
 * @param array  $args    An array of comment arguments. @see get_comment_reply_link()
 * @param int    $depth   The depth of the comment.
 */
function twentyeleven_comment( $comment, $args, $depth ) {
  $GLOBALS['comment'] = $comment;
  switch ( $comment->comment_type ) :
    case 'pingback' :
    case 'trackback' :
  ?>
  <li class="post pingback">
    <p><?php _e( 'Pingback:', 'twentyeleven' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?></p>
  <?php
      break;
    default :
  ?>
  <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
    <article id="comment-<?php comment_ID(); ?>" class="comment">
      <footer class="comment-meta">
        <div class="comment-author vcard">
          <?php
            /* translators: 1: comment author, 2: date and time */
            printf( __( '%1$s on %2$s <span class="says">said:</span>', 'twentyeleven' ),
              sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
              sprintf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
                esc_url( get_comment_link( $comment->comment_ID ) ),
                get_comment_time( 'c' ),
                /* translators: 1: date, 2: time */
                sprintf( __( '%1$s at %2$s', 'twentyeleven' ), get_comment_date(), get_comment_time() )
              )
            );
          ?>

          <?php edit_comment_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
        </div><!-- .comment-author .vcard -->

        <?php if ( $comment->comment_approved == '0' ) : ?>
          <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentyeleven' ); ?></em>
          <br />
        <?php endif; ?>

      </footer>

      <div class="comment-content"><?php comment_text(); ?></div>

      <div class="reply">
        <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'twentyeleven' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
      </div><!-- .reply -->
    </article><!-- #comment-## -->

  <?php
      break;
  endswitch;
}
endif; // ends check for twentyeleven_comment()

require_once('includes/custom-taxonomies.php');

require_once('includes/attraction-post-type.php');
require_once('includes/event-post-type.php');
require_once('includes/show-post-type.php');
require_once('includes/vendor-post-type.php');
require_once('includes/workshop-post-type.php');


?>
