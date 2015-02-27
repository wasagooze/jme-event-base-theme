<?php


add_action( 'pre_get_posts', 'add_attractions_to_query' );

// Category pages display Attractions too
function add_attractions_to_query( $query ) {
  if ( is_category() && $query->is_main_query() )
    $query->set( 'post_type', array( 'post', 'attraction') );
  return $query;
}

add_action( 'init', 'create_attraction_post_type' );

// Create an Attraction post type to contain this information
function create_attraction_post_type() {
  register_post_type( 'attraction',
    array(
      'labels' => array(
        'name' => __( 'Attractions' ),
        'singular_name' => __( 'Attractions' ),
        'add_new_item' => __( 'Add New Attraction' )
      ),
      'public' => true,
      'taxonomies' => array('category'),
      'description' => 'Workshops, Vendors, Performers, etc',
      'supports' => array('title','editor','thumbnail','custom-fields'),
      'has_archive' => true,
    )
  );
}

add_action('add_meta_boxes', 'attraction_meta_boxes');

// Create meta boxes on Create/Edit Attraction page
function attraction_meta_boxes() {
  add_meta_box( 
        'attraction_website',
        __( 'Website', 'jme_event_base_theme' ),
        'attraction_website_meta_box',
        'attraction',
        'side',
        'default'
    );

   add_meta_box( 
      'attraction_facebook',
      __( 'Facebook Page Url', 'jme_event_base_theme' ),
      'attraction_facebook_meta_box',
      'attraction',
      'side',
      'default'
    );

  add_meta_box( 
    'attraction_twitter',
    __( 'Twitter Feed', 'jme_event_base_theme' ),
    'attraction_twitter_meta_box',
    'attraction',
    'side',
    'default'
  );

  add_meta_box(
    'attraction_tumblr',
    __( 'Tumblr Username', 'jme_event_base_theme' ),
    'attraction_tumblr_meta_box',
    'attraction',
    'side',
    'default'
  );

  add_meta_box(
    'attraction_etsy',
    __( 'Etsy Url', 'jme_event_base_theme' ),
    'attraction_etsy_meta_box',
    'attraction',
    'side',
    'default'
  );

  add_meta_box(
    'attraction_bandcamp',
    __( 'Bandcamp Url', 'jme_event_base_theme' ),
    'attraction_bandcamp_meta_box',
    'attraction',
    'side',
    'default'
  );

  add_meta_box(
    'attraction_reverbnation',
    __( 'Reverbnation Url', 'jme_event_base_theme' ),
    'attraction_reverbnation_meta_box',
    'attraction',
    'side',
    'default'
  );
  
  add_meta_box(
    'attraction_video',
    __( 'Video Reel', 'jme_event_base_theme' ),
    'attraction_video_meta_box',
    'attraction',
    'side',
    'default'
  );
}

function attraction_website_meta_box($object, $box) {
  attraction_meta_box_helper($object, 'attraction_website', 'Website URL');
}

function attraction_twitter_meta_box($object, $box) {
  attraction_meta_box_helper($object, 'attraction_twitter', 'Twitter Handle');
}

function attraction_facebook_meta_box($object, $box) {
  attraction_meta_box_helper($object, 'attraction_facebook', 'Facebook Page URL');
}

function attraction_tumblr_meta_box($object, $box) {
  attraction_meta_box_helper($object, 'attraction_tumblr', 'Tumblr Username');
}

function attraction_etsy_meta_box($object, $box) {
  attraction_meta_box_helper($object, 'attraction_etsy', 'Etsy URL');
}

function attraction_bandcamp_meta_box($object, $box) {
  attraction_meta_box_helper($object, 'attraction_bandcamp', 'Bandcamp URL');
}

function attraction_reverbnation_meta_box($object, $box) {
  attraction_meta_box_helper($object, 'attraction_reverbnation', 'Reverbnation URL');
}

function attraction_video_meta_box($object, $box) {
  attraction_meta_box_helper($object, 'attraction_video', 'Video Reel URL');
}

function attraction_meta_box_helper($object, $id, $label) {
  wp_nonce_field( basename( __FILE__ ), $id . '_nonce' );

  $value = esc_attr( get_post_meta( $object->ID, $id, true ) ); 

  echo '<p>';
  echo '<label for="' . $id . '">' . $label . '</label>';
  echo '<br />';
  echo '<input class="widefat" type="text" name="' . $id . '" id="' . $id . '" value="' . $value . '" />';
  echo '</p>';
}

/* Save post meta on the 'save_post' hook. */
add_action( 'save_post', 'attraction_save_website_meta', 10, 2 );
add_action( 'save_post', 'attraction_save_facebook_meta', 10, 2 );
add_action( 'save_post', 'attraction_save_twitter_meta', 10, 2 );
add_action( 'save_post', 'attraction_save_tumblr_meta', 10, 2 );
add_action( 'save_post', 'attraction_save_etsy_meta', 10, 2 );
add_action( 'save_post', 'attraction_save_bandcamp_meta', 10, 2 );
add_action( 'save_post', 'attraction_save_reverbnation_meta', 10, 2 );
add_action( 'save_post', 'attraction_save_video_meta', 10, 2 );

// Save Attraction Meta
function attraction_save_meta_helper($post_id, $post, $meta_key, $nonce_key) {

  /* Verify the nonce before proceeding. */
  if ( !isset( $_POST[$nonce_key] ) || !wp_verify_nonce( $_POST[$nonce_key], basename( __FILE__ ) ) )
    return $post_id;

  /* Get the post type object. */
  $post_type = get_post_type_object( $post->post_type );

  /* Check if the current user has permission to edit the post. */
  if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;

  /* Get the posted data and sanitize it for use as an HTML class. */
  $new_meta_value = ( isset( $_POST[$meta_key] ) ? $_POST[$meta_key] : '' );

  /* Get the meta value of the custom field key. */
  $meta_value = get_post_meta( $post_id, $meta_key, true );

  /* If a new meta value was added and there was no previous value, add it. */
  if ( $new_meta_value && '' == $meta_value )
    add_post_meta( $post_id, $meta_key, $new_meta_value, true );

  /* If the new meta value does not match the old value, update it. */
  elseif ( $new_meta_value && $new_meta_value != $meta_value )
    update_post_meta( $post_id, $meta_key, $new_meta_value );

  /* If there is no new meta value but an old value exists, delete it. */
  elseif ( '' == $new_meta_value && $meta_value )
    delete_post_meta( $post_id, $meta_key, $meta_value );
}

function attraction_save_website_meta($post_id, $post) {

  /* Get the meta key. */
  $meta_key = 'attraction_website';
  $nonce_key = 'attraction_website_nonce';
  attraction_save_meta_helper($post_id, $post, $meta_key, $nonce_key);
}

function attraction_save_facebook_meta($post_id, $post) {

  /* Get the meta key. */
  $meta_key = 'attraction_facebook';
  $nonce_key = 'attraction_facebook_nonce';
  attraction_save_meta_helper($post_id, $post, $meta_key, $nonce_key);
}

function attraction_save_twitter_meta($post_id, $post) {

  /* Get the meta key. */
  $meta_key = 'attraction_twitter';
  $nonce_key = 'attraction_twitter_nonce';
  attraction_save_meta_helper($post_id, $post, $meta_key, $nonce_key);
}

function attraction_save_tumblr_meta($post_id, $post) {

  /* Get the meta key. */
  $meta_key = 'attraction_tumblr';
  $nonce_key = 'attraction_tumblr_nonce';
  attraction_save_meta_helper($post_id, $post, $meta_key, $nonce_key);
}

function attraction_save_etsy_meta($post_id, $post) {

  /* Get the meta key. */
  $meta_key = 'attraction_etsy';
  $nonce_key = 'attraction_etsy_nonce';
  attraction_save_meta_helper($post_id, $post, $meta_key, $nonce_key);
}

function attraction_save_bandcamp_meta($post_id, $post) {

  /* Get the meta key. */
  $meta_key = 'attraction_bandcamp';
  $nonce_key = 'attraction_bandcamp_nonce';
  attraction_save_meta_helper($post_id, $post, $meta_key, $nonce_key);
}

function attraction_save_reverbnation_meta($post_id, $post) {

  /* Get the meta key. */
  $meta_key = 'attraction_reverbnation';
  $nonce_key = 'attraction_reverbnation_nonce';
  attraction_save_meta_helper($post_id, $post, $meta_key, $nonce_key);
}
function attraction_save_video_meta($post_id, $post) {

  /* Get the meta key. */
  $meta_key = 'attraction_video';
  $nonce_key = 'attraction_video_nonce';
  attraction_save_meta_helper($post_id, $post, $meta_key, $nonce_key);
}

?>