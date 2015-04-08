<?php
/**
 * Main template file
 *
 */

$args = array( 'post_type' => 'post', 'category_name' => 'announcements');

$query = new WP_Query( $args );

get_header(); 

get_template_part( 'content', 'index' );

get_sidebar();
get_footer(); 

?>