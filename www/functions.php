<?php 

function create_posttype() {
    register_post_type( 'tech',
        array(
            'labels' => array(
                'name' => __( 'Tech Posts' ),
                'singular_name' => __( 'Tech Post' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'tech'),
            'menu_icon' => 'dashicons-format-aside',
            'supports' => array('title', 'editor', 'thumbnail')
        )
    );
    register_post_type( 'photo',
        array(
            'labels' => array(
                'name' => __( 'Photo Posts' ),
                'singular_name' => __( 'Photo Post' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'photography'),
            'menu_icon' => 'dashicons-camera',
            'supports' => array('title', 'editor', 'thumbnail')
        )
    );
}

add_action( 'init', 'create_posttype' );
add_theme_support( 'post-thumbnails' );

?>