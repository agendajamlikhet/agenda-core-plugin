<?php
// Register Event Taxonomies

// Event city taxonomy
function create_event_city_taxonomy()
{
    $labels = array(
        'name' => __('Cities', 'agenda-core'),
        'singular_name' => __('City', 'agenda-core'),
        'search_items' => __('Search Cities', 'agenda-core'),
        'all_items' => __('All Cities', 'agenda-core'),
        'parent_item' => __('Parent City', 'agenda-core'),
        'parent_item_colon' => __('Parent City:', 'agenda-core'),
        'edit_item' => __('Edit City', 'agenda-core'),
        'update_item' => __('Update City', 'agenda-core'),
        'add_new_item' => __('Add New City', 'agenda-core'),
        'new_item_name' => __('New City Name', 'agenda-core'),
        'menu_name' => __('Cities', 'agenda-core'),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_in_rest' => true,
        'show_tagcloud' => true,
    );

    register_taxonomy('event_city', array('events'), $args);
}
add_action('init', 'create_event_city_taxonomy');
