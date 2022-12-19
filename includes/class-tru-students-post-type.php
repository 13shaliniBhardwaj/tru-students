<?php
namespace Tru_Students\Tru_Students_Post_Type;

/**
 * Registering custom post type
 */

Class Tru_Students_Custom_Post_Type{
    public function register_custom_post_type()
    {
        register_post_type(
            'tru-students',
            array(
                'labels'            => array(
                    'name'          => __('TRU Studensts', 'tru-students'),
                    'all_items'     => __('All TRU Studensts', 'tru-students'),
                    'singular_name' => __('TRU Studensts', 'tru-students'),
                    'menu_name' => __('TRU Studensts', 'tru-students'),
                    'view_item' => __('View TRU Student', 'tru-students'),
                    'add_new_item' => __('Add TRU Student', 'tru-students'),
                    'add_new' => __('New TRU Student', 'tru-students'),
                    'edit_item' => __('Edit TRU Student', 'tru-students'),
                    'update_item' => __('Update TRU Student', 'tru-students'),
                    'search_items' => __('Search TRU Student', 'tru-students'),
                    'not_found' => __('Empty', 'tru-students'),
                    'not_found_in_trash' => __('Empty', 'tru-students'),
                ),
                'hierarchical'      => true,
                'show_ui'           => true,
                'public'            => true,
                'has_archive'       => true,
                'rewrite'           => array( 'slug' => __( 'tru-students', 'tru-students') ),
                'show_in_rest'      => true,
                'menu_position'     => 4,
                'capability_type' => 'post',
                'publicly_queryable'  => true,
                'menu_icon' => 'dashicons-groups',
                'supports'            => array(
                    'thumbnail',
                    'title',
                    'editor',
                    'revisions',
                    'comments',
                    'class',
                    'author',
                    'custom-fields'
                ),
            )

        );
        register_taxonomy(
            'class',
            'tru-students',
            array(
                'hierarchical' => true,
                'labels'       => array(
                    'name'                  => __('Class', 'tru-student'),
                    'all_items'             => __('All Classes', 'tru-student'),
                    'singular_name'         => __('Class', 'tru-student'),
                    'menu_name'             => __('Classes', 'tru-student'),
                    'view_item'             => __('View Class', 'tru-student'),
                    'add_new_item'          => __('Add Class', 'tru-student'),
                    'add_new'               => __('New Class', 'tru-student'),
                    'edit_item'             => __('Edit Class', 'tru-student'),
                    'update_item'           => __('Update Class', 'tru-student'),
                    'search_items'          => __('Search Class', 'tru-student'),
                    'not_found'             => __('Empty', 'tru-student'),
                    'not_found_in_trash'    => __('Empty', 'tru-student'),
                    'new_item_name'         => __('New name - departament', 'tru-student'),
                    'parent_item'           => __('Parent Class', 'tru-student'),
                    'parent_item_colon'     => __('Parent Class:', 'tru-student'),
                    'back_to_items'         => __('Back to Classes', 'tru-student'),
                ),
                'query_var' => true,
                'has_archive'       => true,
                'show_in_rest'      => true,
                'rewrite' => array('slug' => 'class'),
                'show_ui'           => true,
                'show_admin_column' => true,
                'capability_type' => 'class',
            )
        );
    }

    public function tru_acf_add_local_field_groups(){
        if( function_exists('acf_add_local_field_group') ){
            acf_add_local_field_group(array(
                'key' => 'group_63a06dd49995d',
                'title' => 'Class Field',
                'fields' => array(
                    array(
                        'key' => 'field_63a06dd564524',
                        'label' => 'Image',
                        'name' => 'image',
                        'aria-label' => '',
                        'type' => 'image',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'return_format' => 'array',
                        'library' => 'all',
                        'min_width' => '',
                        'min_height' => '',
                        'min_size' => '',
                        'max_width' => '',
                        'max_height' => '',
                        'max_size' => '',
                        'mime_types' => '',
                        'preview_size' => 'medium',
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'taxonomy',
                            'operator' => '==',
                            'value' => 'class',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
                'active' => true,
                'description' => '',
                'show_in_rest' => 0,
            ));
    
        }
    }

}