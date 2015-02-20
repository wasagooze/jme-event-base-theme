<?php

add_action( 'init', 'create_attraction_post_type' );
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
        'attraction_twitter',
        __( 'Twitter Feed', 'jme_event_base_theme' ),
        'attraction_twitter_meta_box',
        'attraction',
        'side',
        'default'
    );
}

function attraction_website_meta_box($object, $box) { 

  wp_nonce_field( basename( __FILE__ ), 'attraction_website_nonce' ); 

  $value = esc_attr( get_post_meta( $object->ID, 'attraction_website', true ) );
  echo '<p>';
  echo '<label for="attraction-website">URL to official website</label><br />';
  echo '<input placeholder="http://" class="widefat" type="url" name="attraction-website" id="attraction-website" value="' . $value . '"';
  echo '</p>';

}

function attraction_twitter_meta_box() {

  wp_nonce_field( basename( __FILE__ ), 'attraction_twitter_nonce' );


  $value = esc_attr( get_post_meta( $object->ID, 'attraction_twitter', true ) ); 
  echo '<p>';
  echo '<label for="attraction-twitter">Twitter Handle</label>';
  echo '<br />';
  echo '<input class="widefat" type="text" name="attraction-twitter" id="attraction-twitter" value="' . $value . '" />';
  echo '</p>';

}

/* Save post meta on the 'save_post' hook. */
add_action( 'save_post', 'attraction_save_website_meta', 10, 2 );
add_action( 'save_post', 'attraction_save_twitter_meta', 10, 2 );

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
  $new_meta_value = ( isset( $_POST[$meta_key] ) ? sanitize_html_class( $_POST[$meta_key] ) : '' );


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

function attraction_save_twitter_meta($post_id, $post) {

  /* Get the meta key. */
  $meta_key = 'attraction_twitter';
  $nonce_key = 'attraction_twitter_nonce';
  attraction_save_meta_helper($post_id, $post, $meta_key, $nonce_key);
}

?>