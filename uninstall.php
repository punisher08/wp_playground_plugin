<?php

/**
 * Trigger this file on Pugin Unisntall
 * 
 * @package playground
 */

if( ! defined( 'WP_UNINSTALL_PLUGIN' ) ){
    die;
}

//clear database stored data
// $playgrounds = get_posts( array( 'post_type' => 'playground', 'numberposts' => -1));
// foreach($playgrounds as $playground){
//     wp_delete_post($books->ID, true);
// }

//SQL database access
global $wpdb;

 $wpdb->query("DELETE FROM wp_posts WHERE post_type = 'playgorund'");
 $wpdb->query("DELETE FROM wp_postmeta WHERE post_id NOT IN(SELECT id FROM wp_posts)");
 $wpdb->query("DELETE FROM wp_term_relationships WHERE object_id NOT IN(SELECT id FROM wp_posts)");
