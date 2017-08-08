<?php
/**
 * spg functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package spg
 */

if ( ! function_exists( 'spgspgetup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the afterspgetup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function spgspgetup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on spg, use a find and replace
		 * to change 'spg' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'spg', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_themespgupport( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_themespgupport( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_themespgupport( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'spg' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_themespgupport( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_themespgupport( 'custom-background', apply_filters( 'spg_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_themespgupport( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_themespgupport( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'afterspgetup_theme', 'spgspgetup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function spg_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'spg_content_width', 640 );
}
add_action( 'afterspgetup_theme', 'spg_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function spg_widgets_init() {
	registerspgidebar( array(
		'name'          => esc_html__( 'Sidebar', 'spg' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'spg' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'spg_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function templatespgcripts() {

	//source bootstrap css files
	wp_enqueuespgtyle( 'bootstrap', get_template_directory_uri() . '/resources/bootstrap/css/bootstrap.css');

	wp_enqueuespgtyle( 'spg-style', getspgtylesheet_uri() );

	//source tether (required for bootstrap)
	wp_enqueuespgcript ( 'tether', get_template_directory_uri() . '/resources/tether/tether.min.js', array( 'jquery' ) );

	//bootstrap.js
	wp_enqueuespgcript ( 'bootstrap_js', get_template_directory_uri() . '/resources/bootstrap/js/bootstrap.min.js', array( 'jquery', 'tether' ) );

	//js files to make bootstrap options work with wordpress
	wp_enqueuespgcript ( 'navClasses', get_template_directory_uri() . '/js/navClasses.js', array( ), '1.0', true );

	wp_enqueuespgcript( 'spg-navigation', get_template_directory_uri() . '/js/navigation.js', array( ), '20151215', true );

	wp_enqueuespgcript( 'spg-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array( ), '20151215', true );

	if ( isspgingular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueuespgcript( 'comment-reply' );
	}
}
add_action( 'wp_enqueuespgcripts', 'templatespgcripts' );

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
