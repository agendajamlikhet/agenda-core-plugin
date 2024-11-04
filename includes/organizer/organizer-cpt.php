<?php
// Register Organizer Custom Post Type
add_action('init', 'create_organizer_cpt', 0);
function create_organizer_cpt()
{

    $labels = array(
        'name' => __('Organizers', 'Post Type General Name', 'agenda-core'),
        'singular_name' => __('Organizer', 'Post Type Singular Name', 'agenda-core'),
        'menu_name' => __('Organizers', 'agenda-core'),
        'name_admin_bar' => __('Organizer', 'agenda-core'),
        'archives' => __('Organizer Archives', 'agenda-core'),
        'attributes' => __('Organizer Attributes', 'agenda-core'),
        'parent_item_colon' => __('Parent Organizer:', 'agenda-core'),
        'all_items' => __('All Organizers', 'agenda-core'),
        'add_new_item' => __('Add New Organizer', 'agenda-core'),
        'add_new' => __('Add New', 'agenda-core'),
        'new_item' => __('New Organizer', 'agenda-core'),
        'edit_item' => __('Edit Organizer', 'agenda-core'),
        'update_item' => __('Update Organizer', 'agenda-core'),
        'view_item' => __('View Organizer', 'agenda-core'),
        'view_items' => __('View Organizers', 'agenda-core'),
        'search_items' => __('Search Organizer', 'agenda-core'),
        'not_found' => __('Not found', 'agenda-core'),
        'not_found_in_trash' => __('Not found in Trash', 'agenda-core'),
        'featured_image' => __('Featured Image', 'agenda-core'),
        'set_featured_image' => __('Set featured image', 'agenda-core'),
        'remove_featured_image' => __('Remove featured image', 'agenda-core'),
        'use_featured_image' => __('Use as featured image', 'agenda-core'),
        'insert_into_item' => __('Insert into organizer', 'agenda-core'),
        'uploaded_to_this_item' => __('Uploaded to this organizer', 'agenda-core'),
        'items_list' => __('Organizers list', 'agenda-core'),
        'items_list_navigation' => __('Organizers list navigation', 'agenda-core'),
        'filter_items_list' => __('Filter organizers list', 'agenda-core'),
    );
    $args = array(
        'label' => __('Organizer', 'agenda-core'),
        'description' => __('Custom Post Type for Organizers', 'agenda-core'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail', 'revisions', 'custom-fields'),
        'taxonomies' => array('category', 'post_tag'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'menu_icon' => 'dashicons-groups',
    );
    register_post_type('organizer', $args);
}
