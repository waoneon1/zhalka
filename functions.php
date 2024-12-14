<?php
/**
 * Media JT functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Media_JT
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
function mjt_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Media JT, use a find and replace
		* to change 'mjt' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'mjt', get_template_directory() . '/languages' );

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
	// register_nav_menus(
	// 	array(
	// 		'menu-1' => esc_html__( 'Primary', 'mjt' ),
	// 	)
	// );

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'mjt_custom_background_args',
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

	add_theme_support( 'responsive-embeds' );
}
add_action( 'after_setup_theme', 'mjt_setup' );

/**
 * Image Size Crops
 */
if ( ! function_exists( 'mjt_add_image_size' ) ) :
	function mjt_add_image_size() {

    add_image_size( 'mjt_client', 225, 100, true );
    add_image_size( 'mjt_client@2x', 450, 200, true );

    add_image_size( 'mjt_project', 454, 480, true );
    add_image_size( 'mjt_project@2x', 908, 960, true );

    add_image_size( 'mjt_thumbnail', 600, 600, true);

	}
endif;
add_action( 'after_setup_theme', 'mjt_add_image_size' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mjt_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mjt_content_width', 640 );
}
add_action( 'after_setup_theme', 'mjt_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mjt_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'mjt' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'mjt' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'mjt_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mjt_scripts() {
	wp_enqueue_style( 'mjt-aos', get_template_directory_uri() . '/assets/vendor/aos/aos.css', array(), _S_VERSION);
	wp_enqueue_style( 'mjt-tailwind', get_template_directory_uri() . '/assets/css/tailwind-output.css', array(), _S_VERSION);
	wp_enqueue_style( 'mjt-style', get_stylesheet_uri(), array(), _S_VERSION );

  wp_enqueue_script( 'mjt-jquery', get_template_directory_uri() . '/assets/vendor/jquery.min.js', array(), _S_VERSION, false );
	wp_enqueue_script( 'mjt-slick', get_template_directory_uri() . '/assets/vendor/slick/slick.min.js', array(), '1.0', true );
	wp_enqueue_script( 'mjt-aos', get_template_directory_uri() . '/assets/vendor/aos/aos.js', array(), '1.0', true );
	wp_enqueue_script( 'mjt-js', get_template_directory_uri() . '/assets/js/main.js', array(), _S_VERSION, true );

	wp_register_script( 'mjt-func', get_template_directory_uri() . '/assets/vendor/loadmore/ajax-loadmore.js', array(), _S_VERSION, true );
	wp_localize_script( 'mjt-func', 'ajax_posts', array(
    'ajaxurl' => admin_url( 'admin-ajax.php' ),
    'noposts' => __('No older posts found', 'alterrav3'),
	));
	wp_enqueue_script( 'mjt-func' );
}
add_action( 'wp_enqueue_scripts', 'mjt_scripts' );

function mjt_admin_style() {
  //wp_enqueue_style('mjt-admin-style', get_template_directory_uri() . '/assets/css/admin-style.css');
	wp_enqueue_script('mjt-admin-script', get_template_directory_uri() . '/assets/js/custom-admin.js', array('jquery'), _S_VERSION, true);
}
add_action('admin_enqueue_scripts', 'mjt_admin_style');


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
 * ACF QUERY CUSTOMIZER
 */
require get_template_directory() . '/inc/acf-customizer.php';

/**
 * AJAX
 */
require get_template_directory() . '/assets/vendor/loadmore/ajax-loadmore.php';


/**
 * POST TYPE
 */
// require get_template_directory() . '/inc/post-type-menu.php';
// require get_template_directory() . '/inc/post-type-event.php';
// require get_template_directory() . '/inc/post-type-promo.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


// Option Setting
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

// Remove scaled delimiter 2560px
add_filter( 'big_image_size_threshold', '__return_false' );

// ====================================================================
// Utitlitis ==========================================================
// ====================================================================
function isExternalLink($url) {
  // Get the current domain
  $currentDomain = $_SERVER['HTTP_HOST'];

  // Parse the URL
  $parsedUrl = parse_url($url);

  // Check if the parsed URL has a host and if it's different from the current domain
  if ($parsedUrl && isset($parsedUrl['host']) && $parsedUrl['host'] != $currentDomain) {
      return true; // It's an external link
  }

  return false; // It's not an external link
}

// END: Utitlitis ===========================================================
// ==========================================================================


// =========================================================================
// TEMPLATE ================================================================
// =========================================================================
