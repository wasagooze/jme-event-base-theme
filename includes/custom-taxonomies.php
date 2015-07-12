<?php

// Custom taxonomies -- Presenter for workshops and Location for vendors/etc

add_action( 'init', 'create_presenter_taxonomy' );
function create_presenter_taxonomy() {
  register_taxonomy(
    'presenter',
    array('workshops', 'events'),
    array(
      'label' => 'Presenter',
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
    array('workshops','events','shows'),
    array(
      'label' => 'Location',
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
    array('events','workshops', 'shows'),
    array(
      'label' => 'Day',
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
    array('events','workshops', 'shows'),
    array(
      'label' => 'Timeslot'
    )
  );
}


add_action('init', 'create_start_time_taxonomy');
function create_start_time_taxonomy() {
  register_taxonomy(
    'start_time',
    array('events','workshops', 'shows'),
    array(
      'hierarchical' => true,
      'label' => 'Start Time',
      'labels' => array(
        'name' => 'Start Times',
        'singular_name' => 'Start Time',
        'search_items' => 'Search Start Times',
        'all_items' => 'All Start Times',
        'edit_item' => 'Edit Start Times',
        'update_item' => 'Update Start Times',
        'add_new_item' => 'Add New Start Time',
        'new_item_name' => 'New Start Time Name',
        'menu_name' => 'Start Time',
        'view_item' => 'View Start Times',
        'popular_items' => 'Popular Start Times',
        'separate_items_with_commas' => 'Separate Start Times with commas',
        'add_or_remove_items' => 'Add or remove Start Times',
        'choose_from_most_used' => 'Choose from the most used Start Times',
        'not_found' => 'No Start Times found'
      )
    )
  );
}

add_action('init', 'create_end_time_taxonomy');
function create_end_time_taxonomy() {
  register_taxonomy(
    'end_time',
    array('events','workshops', 'shows'),
    array(
      'label' => 'End Time',      
      'hierarchical' => true,
      'labels' => array(
        'name' => 'End Times',
        'singular_name' => 'End Time',
        'search_items' => 'Search End Times',
        'all_items' => 'All End Times',
        'edit_item' => 'Edit End Times',
        'update_item' => 'Update End Times',
        'add_new_item' => 'Add New End Time',
        'new_item_name' => 'New End Time Name',
        'menu_name' => 'End Time',
        'view_item' => 'View End Times',
        'popular_items' => 'Popular End Times',
        'separate_items_with_commas' => 'Separate End Times with commas',
        'add_or_remove_items' => 'Add or remove End Times',
        'choose_from_most_used' => 'Choose from the most used End Times',
        'not_found' => 'No End Times found'
      )
    )
  );
}

?>