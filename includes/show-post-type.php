<?php

add_action( 'init', 'create_show_post_type' );

// Create an Event type
function create_show_post_type() {
  register_post_type( 'shows',
    array(
      'labels' => array(
        'name' => __( 'Shows' ),
        'singular_name' => __( 'Show' ),
        'add_new_item' => __( 'Add New Show' )
      ),
      'public' => true,
      'taxonomies' => array('location', 'timeslot', 'post_tags', 'category', 'day'),
      'description' => 'A show -- music, dance, performance art, etc.',
      'supports' => array('title','editor','thumbnail','custom-fields'),
      'has_archive' => true,
    )
  );
}

function jme_show_dropdown($selected) {
  return jme_post_type_dropdown("shows", $selected, "All Shows");
}

add_action('add_meta_boxes', 'show_meta_boxes');

// Create meta boxes on Create/Edit Attraction page
function show_meta_boxes() {

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
    'attraction_pinterest',
    __( 'Pinterest Url', 'jme_event_base_theme' ),
    'attraction_pinterest_meta_box',
    'attraction',
    'side',
    'default'
  );

  add_meta_box(
    'attraction_deviantart',
    __( 'DeviantArt Url', 'jme_event_base_theme' ),
    'attraction_deviantart_meta_box',
    'attraction',
    'side',
    'default'
  );

  add_meta_box(
    'attraction_instagram',
    __( 'Instagram Url', 'jme_event_base_theme' ),
    'attraction_instagram_meta_box',
    'attraction',
    'side',
    'default'
  );

  add_meta_box(
    'attraction_soundcloud',
    __( 'Soundcloud Url', 'jme_event_base_theme' ),
    'attraction_soundcloud_meta_box',
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

  add_meta_box(
    'attraction_fetlife',
    __( 'Fetlife Link', 'jme_event_base_theme' ),
    'attraction_fetlife_meta_box',
    'attraction',
    'side',
    'default'
  );

}

?>