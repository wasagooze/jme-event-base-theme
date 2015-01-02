<?php

// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) )
	$content_width = 584;

/*
 * Tell WordPress to run jme_event_base_setup() when the 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'jme_event_base_setup' );

if ( ! function_exists( 'jme_event_base_setup' ) ):

function jme_event_base_setup() {

	  /*
   * Make Twenty Eleven available for translation.
   * Translations can be added to the /languages/ directory.
   * If you're building a theme based on Twenty Eleven, use
   * a find and replace to change 'twentyeleven' to the name
   * of your theme in all the template files.
   */
  load_theme_textdomain( 'twentyeleven', get_template_directory() . '/languages' );

  // This theme styles the visual editor with editor-style.css to match the theme style.
  add_editor_style();

  // Add default posts and comments RSS feed links to <head>.
  add_theme_support( 'automatic-feed-links' );

  // This theme uses wp_nav_menu() in one location.
  register_nav_menu( 'primary', __( 'Primary Menu', 'twentyeleven' ) );

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
      'default-image' => get_template_directory_uri() . '/images/header.png'
  );

  add_theme_support( 'custom-header', $defaults);

}
endif; // base setup

if ( ! function_exists( 'twentyeleven_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * Referenced via add_theme_support('custom-header') in twentyeleven_setup().
 *
 * @since Twenty Eleven 1.0
 */
function twentyeleven_admin_header_style() {
?>
	<style type="text/css" id="twentyeleven-admin-header-css">
	.appearance_page_custom-header #headimg {
		border: none;
	}
	#headimg h1,
	#desc {
		font-family: "Helvetica Neue", Arial, Helvetica, "Nimbus Sans L", sans-serif;
	}
	#headimg h1 {
		margin: 0;
	}
	#headimg h1 a {
		font-size: 32px;
		line-height: 36px;
		text-decoration: none;
	}
	#desc {
		font-size: 14px;
		line-height: 23px;
		padding: 0 0 3em;
	}
	<?php
		// If the user has set a custom color for the text use that
		if ( get_header_textcolor() != HEADER_TEXTCOLOR ) :
	?>
		#site-title a,
		#site-description {
			color: #<?php echo get_header_textcolor(); ?>;
		}
	<?php endif; ?>
	#headimg img {
		max-width: 1000px;
		height: auto;
		width: 100%;
	}
	</style>
<?php
}
endif; // twentyeleven_admin_header_style

if ( ! function_exists( 'twentyeleven_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * Referenced via add_theme_support('custom-header') in twentyeleven_setup().
 *
 * @since Twenty Eleven 1.0
 */
function twentyeleven_admin_header_image() { ?>
	<div id="headimg">
		<?php
		$color = get_header_textcolor();
		$image = get_header_image();
		if ( $color && $color != 'blank' )
			$style = ' style="color:#' . $color . '"';
		else
			$style = ' style="display:none"';
		?>
		<h1 class="displaying-header-text"><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<div id="desc" class="displaying-header-text"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></div>
		<?php if ( $image ) : ?>
			<img src="<?php echo esc_url( $image ); ?>" alt="" />
		<?php endif; ?>
	</div>
<?php }
endif; // twentyeleven_admin_header_image

/**
 * Set the post excerpt length to 40 words.
 *
 * To override this length in a child theme, remove
 * the filter and add your own function tied to
 * the excerpt_length filter hook.
 *
 * @since Twenty Eleven 1.0
 *
 * @param int $length The number of excerpt characters.
 * @return int The filtered number of characters.
 */
function twentyeleven_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'twentyeleven_excerpt_length' );

if ( ! function_exists( 'twentyeleven_continue_reading_link' ) ) :
/**
 * Return a "Continue Reading" link for excerpts
 *
 * @since Twenty Eleven 1.0
 *
 * @return string The "Continue Reading" HTML link.
 */
function twentyeleven_continue_reading_link() {
	return ' <a href="'. esc_url( get_permalink() ) . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) . '</a>';
}
endif; // twentyeleven_continue_reading_link

/**
 * Replace "[...]" in the Read More link with an ellipsis.
 *
 * The "[...]" is appended to automatically generated excerpts.
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 *
 * @since Twenty Eleven 1.0
 *
 * @param string $more The Read More text.
 * @return The filtered Read More text.
 */
function twentyeleven_auto_excerpt_more( $more ) {
	return ' &hellip;' . twentyeleven_continue_reading_link();
}
add_filter( 'excerpt_more', 'twentyeleven_auto_excerpt_more' );

/**
 * Add a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 *
 * @since Twenty Eleven 1.0
 *
 * @param string $output The "Continue Reading" link.
 * @return string The filtered "Continue Reading" link.
 */
function twentyeleven_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= twentyeleven_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'twentyeleven_custom_excerpt_more' );

/**
 * Show a home link for the wp_nav_menu() fallback, wp_page_menu().
 *
 * @since Twenty Eleven 1.0
 *
 * @param array $args The page menu arguments. @see wp_page_menu()
 * @return array The filtered page menu arguments.
 */
function twentyeleven_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'twentyeleven_page_menu_args' );

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

  unregister_widget('WP_Widget_Calendar'); //removes calendar widget
  unregister_widget('WP_Widget_Recent_Comments'); // removes recent comments widget 
}
add_action( 'widgets_init', 'jme_widgets_init' );

/**
 * Return the first link from the post content. If none found, the
 * post permalink is used as a fallback.
 *
 * @since Twenty Eleven 1.0
 *
 * @uses get_url_in_content() to get the first URL from the post content.
 *
 * @return string The first link.
 */
function twentyeleven_get_first_url() {
	$content = get_the_content();
	$has_url = function_exists( 'get_url_in_content' ) ? get_url_in_content( $content ) : false;

	if ( ! $has_url )
		$has_url = twentyeleven_url_grabber();

	/** This filter is documented in wp-includes/link-template.php */
	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}

/**
 * Return the URL for the first link found in the post content.
 *
 * @since Twenty Eleven 1.0
 *
 * @return string|bool URL or false when no link is present.
 */
function twentyeleven_url_grabber() {
	if ( ! preg_match( '/<a\s[^>]*?href=[\'"](.+?)[\'"]/is', get_the_content(), $matches ) )
		return false;

	return esc_url_raw( $matches[1] );
}

/**
 * Count the number of footer sidebars to enable dynamic classes for the footer.
 *
 * @since Twenty Eleven 1.0
 */
function twentyeleven_footer_sidebar_class() {
	$count = 0;

	if ( is_active_sidebar( 'sidebar-3' ) )
		$count++;

	if ( is_active_sidebar( 'sidebar-4' ) )
		$count++;

	if ( is_active_sidebar( 'sidebar-5' ) )
		$count++;

	$class = '';

	switch ( $count ) {
		case '1':
			$class = 'one';
			break;
		case '2':
			$class = 'two';
			break;
		case '3':
			$class = 'three';
			break;
	}

	if ( $class )
		echo 'class="' . $class . '"';
}

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

?>
