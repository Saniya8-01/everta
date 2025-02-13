<?php
/**
 * Everta functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Everta
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function everta_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Everta, use a find and replace
		* to change 'everta' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'everta', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'everta' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'everta_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'everta_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function everta_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'everta_content_width', 640 );
}
add_action( 'after_setup_theme', 'everta_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function everta_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'everta' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'everta' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'everta_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function everta_scripts() {
	wp_enqueue_style( 'everta-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'everta-style', 'rtl', 'replace' );

	wp_enqueue_script( 'everta-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'everta_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Template Setting - functions.php
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'  => 'Theme General Settings',
        'menu_title'  => 'Theme Settings',
        'menu_slug'   => 'theme-general-settings',
        'capability'  => 'edit_posts',
        'redirect'    => false
    ));
    acf_add_options_sub_page(array(
        'page_title'  => 'Theme Header Settings',
        'menu_title'  => 'Header Update',
        'parent_slug' => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title'  => 'Theme Footer Settings',
        'menu_title'  => 'Footer Update',
        'parent_slug' => 'theme-general-settings',
    ));
}


//News Post
register_post_type( 'news-post', array('labels' => array(
    'name' => __( 'News Post' ),
    'singular_name' => __( 'news-post' )),
    'public' => true,
    'has_archive' => true,
    'menu_icon' => 'dashicons-format-image',
    'type' => 'select',
    'supports'=> array( 'title', 'thumbnail', 'page-attributes', 'editor'),
	'rewrite' => array( 'slug' => 'news-post' ),
));

$labels = array(
    'name'              => __( 'News Categories'),
    'singular_name'     => __( 'NewsPost'),
    'search_items'      => __( 'Search NewsCategories'),
    'all_items'         => __( 'All News Categories'),
    'parent_item'       => __( 'Parent News Categories'),
    'edit_item'         => __( 'Edit News Categories'),
    'update_item'       => __( 'Update News Categories'),
    'add_new_item'      => __( 'Add New News Categories'),
    'new_item_name'     => __( 'New News Categories Name'),
    'menu_name'         => __( 'News Categories'),
);
register_taxonomy('news_categories',array('news-post'), array(
    'hierarchical'  => true,
    'show_admin_column' => true,
    'labels'        => $labels,
    'show_ui'       => true,
    'query_var'     => true,
    'rewrite'       => array( 'slug' => 'news_categories' ),
));

//Product Post

register_post_type( 'products', array('labels' => array(
    'name' => __( 'Products' ),
    'singular_name' => __( 'products' )),
    'public' => true,
    'has_archive' => true,
    'menu_icon' => 'dashicons-format-image',
    'type' => 'select',
    'supports'=> array( 'title', 'thumbnail', 'page-attributes', 'editor'),
	'rewrite' => array( 'slug' => 'products' ),
));

$labels = array(
    'name'              => __( 'Products Categories'),
    'singular_name'     => __( 'Products'),
    'search_items'      => __( 'Search ProductsCategories'),
    'all_items'         => __( 'All Products Categories'),
    'parent_item'       => __( 'Parent Products Categories'),
    'edit_item'         => __( 'Edit Products Categories'),
    'update_item'       => __( 'Update Products Categories'),
    'add_new_item'      => __( 'Add New Products Categories'),
    'new_item_name'     => __( 'New Products Categories Name'),
    'menu_name'         => __( 'Products Categories'),
);
register_taxonomy('products_categories',array('products'), array(
    'hierarchical'  => true,
    'show_admin_column' => true,
    'labels'        => $labels,
    'show_ui'       => true,
    'query_var'     => true,
    'rewrite'       => array( 'slug' => 'products_categories' ),
));

//Career Post

register_post_type( 'career', array('labels' => array(
    'name' => __( 'Career' ),
    'singular_name' => __( 'career' )),
    'public' => true,
    'has_archive' => true,
    'menu_icon' => 'dashicons-format-image',
    'type' => 'select',
    'supports'=> array( 'title', 'thumbnail', 'page-attributes', 'editor'),
));
$labels = array(
    'name'              => __( 'Career Categories'),
    'singular_name'     => __( 'careerPost'),
    'search_items'      => __( 'Search careerCategories'),
    'all_items'         => __( 'All career Categories'),
    'parent_item'       => __( 'Parent career Categories'),
    'edit_item'         => __( 'Edit career Categories'),
    'update_item'       => __( 'Update career Categories'),
    'add_new_item'      => __( 'Add New career Categories'),
    'new_item_name'     => __( 'New career Categories Name'),
    'menu_name'         => __( 'career Categories'),
);
register_taxonomy('career_categories',array('career'), array(
    'hierarchical'  => true,
    'show_admin_column' => true,
    'labels'        => $labels,
    'show_ui'       => true,
    'query_var'     => true,
    'rewrite'       => array( 'slug' => 'career_categories' ),
));


function estimate_reading_time($post_id) {
    $word_count = str_word_count(strip_tags(get_post_field('post_content', $post_id)));
    $reading_speed = 200; // Average words per minute
    $reading_time = ceil($word_count / $reading_speed);
    return $reading_time;
}

function register_my_menus() {
    register_nav_menus(array(
        'primary-menu' => __('Primary Menu'), // Register the menu location
    ));
}
add_action('after_setup_theme', 'register_my_menus');

add_filter('wpcf7_autop_or_not', '__return_false');

