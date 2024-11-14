<?php
// Register Event Custom Post Type
add_action('init', 'create_event_cpt', 0);
function create_event_cpt()
{

    $labels = array(
        'name' => __('Events', 'Post Type General Name', 'agenda-core'),
        'singular_name' => __('Event', 'Post Type Singular Name', 'agenda-core'),
        'menu_name' => __('Events', 'agenda-core'),
        'name_admin_bar' => __('Event', 'agenda-core'),
        'archives' => __('Event Archives', 'agenda-core'),
        'attributes' => __('Event Attributes', 'agenda-core'),
        'parent_item_colon' => __('Parent Event:', 'agenda-core'),
        'all_items' => __('All Events', 'agenda-core'),
        'add_new_item' => __('Add New Event', 'agenda-core'),
        'add_new' => __('Add New', 'agenda-core'),
        'new_item' => __('New Event', 'agenda-core'),
        'edit_item' => __('Edit Event', 'agenda-core'),
        'update_item' => __('Update Event', 'agenda-core'),
        'view_item' => __('View Event', 'agenda-core'),
        'view_items' => __('View Events', 'agenda-core'),
        'search_items' => __('Search Event', 'agenda-core'),
        'not_found' => __('Not found', 'agenda-core'),
        'not_found_in_trash' => __('Not found in Trash', 'agenda-core'),
        'featured_image' => __('Featured Image', 'agenda-core'),
        'set_featured_image' => __('Set featured image', 'agenda-core'),
        'remove_featured_image' => __('Remove featured image', 'agenda-core'),
        'use_featured_image' => __('Use as featured image', 'agenda-core'),
        'insert_into_item' => __('Insert into event', 'agenda-core'),
        'uploaded_to_this_item' => __('Uploaded to this event', 'agenda-core'),
        'items_list' => __('Events list', 'agenda-core'),
        'items_list_navigation' => __('Events list navigation', 'agenda-core'),
        'filter_items_list' => __('Filter events list', 'agenda-core'),
    );
    $args = array(
        'label' => __('Event', 'agenda-core'),
        'description' => __('Custom Post Type for Events', 'agenda-core'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail', 'revisions', 'custom-fields', 'excerpt'),
        'taxonomies' => array('category', 'post_tag'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'show_in_rest' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'menu_icon' => 'dashicons-calendar-alt',
    );
    register_post_type('events', $args);

}
