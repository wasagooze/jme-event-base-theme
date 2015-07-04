<?php

// Custom taxonomies -- Presenter for workshops and Location for vendors/etc

add_action( 'init', 'create_presenter_taxonomy' );
function create_presenter_taxonomy() {
  register_taxonomy(
    'presenter',
    array('workshop', 'events'),
    array(
      'label' => 'Presenter',
      'hierarchical' => true,
      'labels' => array(
        'name' => 'Presenters',
        'singular_name' => 'Presenter',
        'search_items' => 'Search Presenters',
        'all_items' => 'All Presenters',
        'edit_item' => 'Edit Presenters',
        'update_item' => 'Update Presenter',
        'add_new_item' => 'Add New Presenter',
        'new_item_name' => 'New Presenter Name',
        'menu_name' => 'Presenter',
        'view_item' => 'View Presenter',
        'popular_items' => 'Popular Presenters',
        'separate_items_with_commas' => 'Separate Presenters with commas',
        'add_or_remove_items' => 'Add or remove Presenters',
        'choose_from_most_used' => 'Choose from the most used presenters',
        'not_found' => 'No presenters found'
      )
    )
  );
}

add_action( 'init', 'create_location_taxonomy' );
function create_location_taxonomy() {
  register_taxonomy(
    'location',
    array('workshops','events','attraction'),
    array(
      'label' => 'Location',
      'hierarchical' => true,
      'labels' => array(
        'name' => 'Locations',
        'singular_name' => 'Venue Location',
        'search_items' => 'Search Locations',
        'all_items' => 'All Locations',
        'edit_item' => 'Edit Locations',
        'update_item' => 'Update Locations',
        'add_new_item' => 'Add New Location',
        'new_item_name' => 'New Location Name',
        'menu_name' => 'Location',
        'view_item' => 'View Location',
        'popular_items' => 'Popular Locations',
        'separate_items_with_commas' => 'Separate locations with commas',
        'add_or_remove_items' => 'Add or remove locations',
        'choose_from_most_used' => 'Choose from the most used locations',
        'not_found' => 'No locations found'
      )
    )
  );
}

add_action('init', 'create_day_taxonomy');
function create_day_taxonomy() {
  register_taxonomy(
    'day',
    array('events','workshops'),
    array(
      'label' => 'Day',
      'hierarchical' => true,
      'labels' => array(
        'name' => 'Days',
        'singular_name' => 'Day',
        'search_items' => 'Search Days',
        'all_items' => 'All Days',
        'edit_item' => 'Edit Days',
        'update_item' => 'Update Days',
        'add_new_item' => 'Add New Day',
        'new_item_name' => 'New Day Name',
        'menu_name' => 'Day',
        'view_item' => 'View Day',
        'popular_items' => 'Popular Days',
        'separate_items_with_commas' => 'Separate days with commas',
        'add_or_remove_items' => 'Add or remove days',
        'choose_from_most_used' => 'Choose from the most used days',
        'not_found' => 'No days found'
      )
    )
  );
}

add_action('init', 'create_timeslot_taxonomy');
function create_timeslot_taxonomy() {
  register_taxonomy(
    'timeslot',
    array('events','workshops'),
    array(
      'label' => 'Timeslot',
      'hierarchical' => true,
    )
  );
}

?>