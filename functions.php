<?php
// Configuration du thème
function mpt_theme_setup() {
    // Support du <title> automatique
    add_theme_support('title-tag');

    // Support des images à la une
    add_theme_support('post-thumbnails');

    // Menus
    register_nav_menus(array(
        'primary' => __('Menu principal', 'mon-theme'),
    ));

    // Support HTML5
    add_theme_support('html5', array('search-form','comment-form','comment-list','gallery','caption'));
}
add_action('after_setup_theme', 'mpt_theme_setup');

// Charger les fichiers CSS/JS
function mpt_enqueue_assets() {
    wp_enqueue_style('mpt-style', get_stylesheet_uri(), array(), '1.0');
    // Bootstrap 5 CSS
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');
    // Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.0/css/all.min.css');
    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
    // Bootstrap 5 JS
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'mpt_enqueue_assets');


function custom_post_type() {

    $vous_etes = array(
        'name'                => _x( 'Vous etes', 'Vous etes', 'vousetes' ),
        'singular_name'       => _x( 'Vous etes', 'Vous etes', 'vousetes' ),
        'menu_name'           => __( 'Vous etes', 'vous etes' ),
        //'parent_item_colon'   => __( 'Parent Item:', 'fdfd_issue' ),
        'all_items'           => __( 'All vous etes', 'vousetes' ),
        'view_item'           => __( 'View vous etes', 'view_vousetes' ),
        'add_new_item'        => __( 'New vous ete', 'add_new_vousete' ),
        'add_new'             => __( 'New vous ete', 'text_domain' ),
        'edit_item'           => __( 'Edit vousete', 'text_domain' ),
        'update_item'         => __( 'Update vousete', 'text_domain' ),
        'search_items'        => __( 'Search vousete', 'text_domain' ),
        'not_found'           => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
    );
    $vous_etes_args = array(
        'label'               => __( 'vous etes', 'text_domain' ),
        'description'         => __( 'Post type for fdfd issue', 'text_domain' ),
        'labels'              => $vous_etes,
        'supports'            => array('title', 'editor', 'author', 'custom-fields', 'excerpt', 'thumbnail' ),
        'taxonomies'          => array('category'),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_rest'        => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => '',
        'can_export'          => true,
        'rewrite'             => array('slug' => 'question'),
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
    register_post_type( 'vous_etes', $vous_etes_args );

    $question = array(
        'name'                => _x( 'Questions', 'Questions', 'question' ),
        'singular_name'       => _x( 'Question', 'Question', 'question' ),
        'menu_name'           => __( 'Questions', 'question' ),
        //'parent_item_colon'   => __( 'Parent Item:', 'fdfd_issue' ),
        'all_items'           => __( 'All questions', 'question' ),
        'view_item'           => __( 'View question', 'view_question' ),
        'add_new_item'        => __( 'New question', 'add_new_question' ),
        'add_new'             => __( 'New question', 'text_domain' ),
        'edit_item'           => __( 'Edit question', 'text_domain' ),
        'update_item'         => __( 'Update question', 'text_domain' ),
        'search_items'        => __( 'Search question', 'text_domain' ),
        'not_found'           => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
    );
    $question_args = array(
        'label'               => __( 'question', 'text_domain' ),
        'description'         => __( 'Post type for fdfd issue', 'text_domain' ),
        'labels'              => $question,
        'supports'            => array('title', 'editor', 'author', 'custom-fields', 'excerpt', 'thumbnail' ),
        'taxonomies'          => array('category'),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_rest'        => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => '',
        'can_export'          => true,
        'rewrite'             => array('slug' => 'question'),
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
    register_post_type( 'question', $question_args );

}
add_action( 'init', 'custom_post_type', 0 );
