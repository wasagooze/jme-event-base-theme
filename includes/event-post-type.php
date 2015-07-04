<?php

add_action( 'init', 'create_event_post_type' );

// Create an Event type
function create_event_post_type() {
  register_post_type( 'events',
    array(
      'labels' => array(
        'name' => __( 'Social Events' ),
        'singular_name' => __( 'Social Event' ),
        'add_new_item' => __( 'Add New Social Event' )
      ),
      'public' => true,
      'taxonomies' => array('category', 'post_tags'),
      'description' => 'A special event (such as a game or catered event)',
      'supports' => array('title','editor','thumbnail','custom-fields'),
      'has_archive' => true,
    )
  );
}

function jme_event_dropdown($selected) {
  return jme_post_type_dropdown("events", $selected, "All Events");
}

add_action('add_meta_boxes', 'event_meta_boxes');

// Create meta boxes on Create/Edit Attraction page
function event_meta_boxes() {

  add_meta_box( 
        'attraction_website',
        __( 'Website', 'jme_event_base_theme' ),
        'attraction_website_meta_box',
        'events',
        'side',
        'default'
    );

  add_meta_box(
    'attraction_fetlife',
    __( 'Fetlife Link', 'jme_event_base_theme' ),
    'attraction_fetlife_meta_box',
    'events',
    'side',
    'default'
  );
}

?>