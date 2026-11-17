<?php
/**
 * Theme setup. Built by Lucas.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function wordpress_site_for_dulce_vida_bakery_0000_assets() {
    wp_enqueue_style( 'wordpress-site-for-dulce-vida-bakery-0000-fonts', 'https://fonts.googleapis.com/css2?family=Fraunces:ital,wght@0,500;0,700;1,500&family=Nunito+Sans:wght@400;600;700&display=swap', array(), null );
    wp_enqueue_style( 'wordpress-site-for-dulce-vida-bakery-0000-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'wordpress_site_for_dulce_vida_bakery_0000_assets' );

function wordpress_site_for_dulce_vida_bakery_0000_editor_styles() {
    add_theme_support( 'editor-styles' );
    add_editor_style( 'https://fonts.googleapis.com/css2?family=Fraunces:ital,wght@0,500;0,700;1,500&family=Nunito+Sans:wght@400;600;700&display=swap' );
    add_editor_style( 'style.css' );
}
add_action( 'after_setup_theme', 'wordpress_site_for_dulce_vida_bakery_0000_editor_styles' );

// Create the site's pages the first time the theme runs. Each page uses its own
// design from templates/page-<slug>.html; the owner can edit it in Site Editor.
function wordpress_site_for_dulce_vida_bakery_0000_create_pages() {
    if ( get_option( 'wordpress_site_for_dulce_vida_bakery_0000_pages_created' ) ) {
        return;
    }
    $pages = array(
    array( 'slug' => 'menu', 'title' => 'Menu' ),
    array( 'slug' => 'about', 'title' => 'About' ),
    array( 'slug' => 'contact', 'title' => 'Contact' ),
    );
    foreach ( $pages as $page ) {
        if ( ! get_page_by_path( $page['slug'] ) ) {
            wp_insert_post( array(
                'post_type'   => 'page',
                'post_status' => 'publish',
                'post_title'  => $page['title'],
                'post_name'   => $page['slug'],
            ) );
        }
    }
    update_option( 'wordpress_site_for_dulce_vida_bakery_0000_pages_created', 1 );
}
add_action( 'init', 'wordpress_site_for_dulce_vida_bakery_0000_create_pages' );
