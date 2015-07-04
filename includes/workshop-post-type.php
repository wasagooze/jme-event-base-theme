<?php

add_action( 'init', 'create_workshop_post_type' );

// Create an Event type
function create_workshop_post_type() {
  register_post_type( 'workshops',
    array(
      'labels' => array(
        'name' => __( 'Workshops' ),
        'singular_name' => __( 'Workshop' ),
        'add_new_item' => __( 'Add New Workshop' )
      ),
      'public' => true,
      'taxonomies' => array('post_tag', 'presenter'),
      'description' => 'A workshop, with a presenter',
      'supports' => array('title','editor','thumbnail','custom-fields'),
      'has_archive' => true,
    )
  );
}

function jme_presenter_dropdown($selected) {

  if ($selected == null) {
    $selected = 0;
  }

  $args = array( 
    'orderby' => 'slug',
    'selected'=> $selected,
    'show_option_all' => 'All Workshops',
    'taxonomy' => 'presenter',
    'echo' => 0,
    'id' => 'presenter-dropdown',
    'value_field' => 'slug'
  );

  $select = wp_dropdown_categories( $args );

  return $select;
}

function jme_workshop_dropdown($selected) {

  return jme_post_type_dropdown("workshops", $selected, "All Workshops");
}

add_action('add_meta_boxes', 'workshop_meta_boxes');

// Create meta boxes on Create/Edit Attraction page
function workshop_meta_boxes() {

  add_meta_box( 
        'attraction_website',
        __( 'Website', 'jme_event_base_theme' ),
        'attraction_website_meta_box',
        'vendors',
        'side',
        'default'
    );

   add_meta_box( 
      'attraction_facebook',
      __( 'Facebook Page Url', 'jme_event_base_theme' ),
      'attraction_facebook_meta_box',
      'vendors',
      'side',
      'default'
    );

  add_meta_box( 
    'attraction_twitter',
    __( 'Twitter Feed', 'jme_event_base_theme' ),
    'attraction_twitter_meta_box',
    'vendors',
    'side',
    'default'
  );
  
  add_meta_box(
    'attraction_video',
    __( 'Video Reel', 'jme_event_base_theme' ),
    'attraction_video_meta_box',
    'vendors',
    'side',
    'default'
  );

  add_meta_box(
    'attraction_fetlife',
    __( 'Fetlife Link', 'jme_event_base_theme' ),
    'attraction_fetlife_meta_box',
    'vendors',
    'side',
    'default'
  );
}

?>