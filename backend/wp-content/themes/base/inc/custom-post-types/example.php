<?php

/*
**  This is an example custom post type, use this as a template to add
**  additional post types
*/

// NOTE: You should delete this file before production

$labels = [
    'name'                => _x( 'Examples', 'Examples General Name', 'text_domain' ),
    'singular_name'       => _x( 'Example', 'Examples Singular Name', 'text_domain' ),
    'menu_name'           => __( 'Examples', 'text_domain' ),
    'name_admin_bar'      => __( 'Examples', 'text_domain' ),
    'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
    'all_items'           => __( 'All Examples', 'text_domain' ),
    'add_new_item'        => __( 'Add New Example', 'text_domain' ),
    'add_new'             => __( 'Add New', 'text_domain' ),
    'new_item'            => __( 'New Example', 'text_domain' ),
    'edit_item'           => __( 'Edit Example', 'text_domain' ),
    'update_item'         => __( 'Update Example', 'text_domain' ),
    'view_item'           => __( 'View Example', 'text_domain' ),
    'search_items'        => __( 'Search Examples', 'text_domain' ),
    'not_found'           => __( 'No Example found', 'text_domain' ),
    'not_found_in_trash'  => __( 'No Example found', 'text_domain' )
];

$args = [
    'label'               => __( 'Example', 'text_domain' ),
    'description'         => __( 'Example Description', 'text_domain' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'thumbnail', 'page-attributes' ),
    'taxonomies'          => array(''),
    'hierarchical'        => false,
    'public'              => false,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_position'       => 6,
    'menu_icon'           => 'dashicons-admin-post',
    'show_in_admin_bar'   => true,
    'show_in_nav_menus'   => false,
    'can_export'          => false,
    'has_archive'         => false,
    'exclude_from_search' => true,
    'publicly_queryable'  => false,
    'capability_type'     => 'post',
    'show_in_graphql'     => true,
    'graphql_single_name' => 'example',
    'graphql_plural_name' => 'examples'
];

register_post_type( 'examples', $args );


?>
