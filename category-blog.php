<?php
/**
 * Main template file
 *
 */

$args = array( 'post_type' => 'post', 'category_name' => 'blog');

$query = new WP_Query( $args );

get_header();
require_once( 'content-index.php' );

get_sidebar();
get_footer(); 
