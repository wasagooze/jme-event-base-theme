<?php

add_action( 'init', 'create_vendor_post_type' );

// Create an Event type
function create_vendor_post_type() {
  register_post_type( 'vendors',
    array(
      'labels' => array(
        'name' => __( 'Vendors' ),
        'singular_name' => __( 'Vendor' ),
        'add_new_item' => __( 'Add New Vendor' )
      ),
      'public' => true,
      'taxonomies' => array('vendor_tags'),
      'description' => 'A vendor or merchant',
      'supports' => array('title','editor','thumbnail','custom-fields'),
      'has_archive' => true,
    )
  );
}

function jme_vendor_dropdown($selected) {
  return jme_post_type_dropdown("vendors", $selected, "All Vendors");
}


add_action('add_meta_boxes', 'vendor_meta_boxes');

// Create meta boxes on Create/Edit Attraction page
function vendor_meta_boxes() {

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
    'attraction_tumblr',
    __( 'Tumblr Username', 'jme_event_base_theme' ),
    'attraction_tumblr_meta_box',
    'vendors',
    'side',
    'default'
  );

  add_meta_box(
    'attraction_etsy',
    __( 'Etsy Url', 'jme_event_base_theme' ),
    'attraction_etsy_meta_box',
    'vendors',
    'side',
    'default'
  );

  add_meta_box(
    'attraction_pinterest',
    __( 'Pinterest Url', 'jme_event_base_theme' ),
    'attraction_pinterest_meta_box',
    'vendors',
    'side',
    'default'
  );

  add_meta_box(
    'attraction_deviantart',
    __( 'DeviantArt Url', 'jme_event_base_theme' ),
    'attraction_deviantart_meta_box',
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