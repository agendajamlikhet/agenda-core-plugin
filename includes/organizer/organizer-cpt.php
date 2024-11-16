<?php
// Register Organizer Custom Post Type
add_action('init', 'create_organizer_cpt', 0);
function create_organizer_cpt()
{

    $labels = array(
        'name' => __('Organisations', 'Post Type General Name', 'agenda-core'),
        'singular_name' => __('Organisation', 'Post Type Singular Name', 'agenda-core'),
        'menu_name' => __('Organisations', 'agenda-core'),
        'name_admin_bar' => __('Organisation', 'agenda-core'),
        'archives' => __('Organisation Archives', 'agenda-core'),
        'attributes' => __('Organisation Attributes', 'agenda-core'),
        'parent_item_colon' => __('Parent Organisation:', 'agenda-core'),
        'all_items' => __('All Organisations', 'agenda-core'),
        'add_new_item' => __('Add New Organisation', 'agenda-core'),
        'add_new' => __('Add New', 'agenda-core'),
        'new_item' => __('New Organisation', 'agenda-core'),
        'edit_item' => __('Edit Organisation', 'agenda-core'),
        'update_item' => __('Update Organisation', 'agenda-core'),
        'view_item' => __('View Organisation', 'agenda-core'),
        'view_items' => __('View Organisations', 'agenda-core'),
        'search_items' => __('Search Organisation', 'agenda-core'),
        'not_found' => __('Not found', 'agenda-core'),
        'not_found_in_trash' => __('Not found in Trash', 'agenda-core'),
        'featured_image' => __('Featured Image', 'agenda-core'),
        'set_featured_image' => __('Set featured image', 'agenda-core'),
        'remove_featured_image' => __('Remove featured image', 'agenda-core'),
        'use_featured_image' => __('Use as featured image', 'agenda-core'),
        'insert_into_item' => __('Insert into organisation', 'agenda-core'),
        'uploaded_to_this_item' => __('Uploaded to this organisation', 'agenda-core'),
        'items_list' => __('Organisations list', 'agenda-core'),
        'items_list_navigation' => __('Organisations list navigation', 'agenda-core'),
        'filter_items_list' => __('Filter organisations list', 'agenda-core'),
    );
    $args = array(
        'label' => __('Organisation', 'agenda-core'),
        'description' => __('Custom Post Type for Organisations', 'agenda-core'),
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
        'menu_icon' => 'dashicons-groups',
        'rewrite' => [
            'slug' => __('organisations', 'agenda-core'),
        ],
    );
    register_post_type('organisation', $args);
}
