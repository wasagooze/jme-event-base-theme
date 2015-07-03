<?php

add_action( 'init', 'create_event_post_type' );

// Create an Event type
function create_event_post_type() {
  register_post_type( 'event',
    array(
      'labels' => array(
        'name' => __( 'Events' ),
        'singular_name' => __( 'Event' ),
        'add_new_item' => __( 'Add New Event' )
      ),
      'public' => true,
      'taxonomies' => array('category', 'post_tag'),
      'description' => 'A timeslotted event in the schedule -- workshops, performances, etc.',
      'supports' => array('title','editor','thumbnail','custom-fields'),
      'has_archive' => true,
    )
  );
}

?>