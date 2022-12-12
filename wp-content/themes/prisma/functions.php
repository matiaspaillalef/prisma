<?php

/**
 * Prisma functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Prisma
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function prisma_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Prisma, use a find and replace
		* to change 'prisma' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('prisma', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'prisma'),
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
			'prisma_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

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
add_action('after_setup_theme', 'prisma_setup');

if (function_exists('acf_add_options_page')) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function prisma_content_width()
{
	$GLOBALS['content_width'] = apply_filters('prisma_content_width', 640);
}
add_action('after_setup_theme', 'prisma_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function prisma_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'prisma'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'prisma'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'prisma_widgets_init');


function prisma_enqueue_asset($name, $src, $deps = array(), $var_name = '', $var_values = array())
{
	// Get the theme data.
	static $theme_version;
	static $base_local_path;
	static $base_path;

	if (!isset($theme_version)) {
		$theme_version   = wp_get_theme()->get('Version');
		$base_local_path = get_stylesheet_directory();
		$base_path       = get_stylesheet_directory_uri();
	}

	$file_version = $theme_version . '.' . filemtime($base_local_path . $src);
	if ('.css' === substr($src, -4)) {
		wp_enqueue_style($name, $base_path . $src, $deps, $file_version);
	} else {
		wp_enqueue_script($name, $base_path . $src, $deps, $file_version, true);

		if (!empty($var_name) && !empty($var_values)) {
			wp_localize_script($name, $var_name, $var_values);
		}
	}
}

/**
 * Enqueue scripts and styles.
 */
function prisma_scripts()
{
	wp_enqueue_style('prisma-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('prisma-style', 'rtl', 'replace');

	wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.7.0/css/all.css');
	wp_enqueue_style('swiper', 'https://unpkg.com/swiper@7/swiper-bundle.min.css', array(), true);
	wp_enqueue_style('icon-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css');
	wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css');
	prisma_enqueue_asset('prisma-styles', '/assets/css/style.css');
	prisma_enqueue_asset('icomoon', '/assets/icomoon/style.css');
	//wp_enqueue_style('gfont-opensans', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,800&display=swap');
	wp_enqueue_style('gfont-prisma', 'https://fonts.googleapis.com/css2?family=Gothic+A1:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Source+Sans+Pro:wght@200;300;400;600;700;900&display=swap');


	wp_deregister_script('jquery');
	wp_enqueue_script('ajax', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js');
	wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.6.0.min.js');
	wp_enqueue_script('swiper', 'https://unpkg.com/swiper@7/swiper-bundle.min.js', array(), true, false);
	wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js');
	wp_enqueue_script('countimator', get_template_directory_uri() . '/assets/js/jquery.sticky.js'); /* sticky */
	wp_enqueue_script('countimator', get_template_directory_uri() . '/assets/js/jquery.countimator.min.js', array()); /* animación contador */
	wp_enqueue_script('prisma-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
	prisma_enqueue_asset('prisma-script', '/assets/js/main.js', array(), 'prisma_global_vars', array(
		'ajax_url' => admin_url('admin-ajax.php'),
	));

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'prisma_scripts');


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
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Eliminar editor Gutenberg.
add_filter('use_block_editor_for_post', '__return_false', 10);
// Eliminar editor Gutenberg zona widget.
add_filter('gutenberg_use_widgets_block_editor', '__return_false');
add_filter('use_widgets_block_editor', '__return_false');





//Filtro menu prisma
function prisma_filter_menu_items($menuArray, $parentID)
{
	return array_filter($menuArray, function ($item) use ($parentID) {
		return $item->menu_item_parent == $parentID;
	});
}


//Custom Size
add_image_size('480x347', 480, 347, array('center', 'top'));
add_image_size('380x485', 380, 485, array('center', 'top'));



function prisma_wpcf7_form_elements($html)
{
	function prisma_replace_include_blank($name, $text, &$html)
	{
		$matches = false;
		preg_match('/<select name="' . $name . '"[^>]*>(.*)<\/select>/iU', $html, $matches);
		if ($matches) {
			$select = str_replace('<option value="">---</option>', '<option value="" disabled selected>' . $text . '</option>', $matches[0]);
			$html = preg_replace('/<select name="' . $name . '"[^>]*>(.*)<\/select>/iU', $select, $html);
		}
	}
	prisma_replace_include_blank('acf-motivo', __('Asunto', 'prisma'), $html);
	return $html;
}
add_filter('wpcf7_form_elements', 'prisma_wpcf7_form_elements');
