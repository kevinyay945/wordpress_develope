<?php
/*
	==================================
	Include scripts
	==================================
 */
function my_script_enqueue()
{
	//css
	wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/asset/css/bootstrap.css',  array() , '4.1.3', 'all' );
	wp_enqueue_style( 'mycss', get_template_directory_uri() . '/asset/css/mycss.css',  array() , $ver = '1.0.0', $media = 'all' );
	//js
	wp_enqueue_script( 'bootstrap_js', $src = get_template_directory_uri() . '/asset/js/bootstrap.js', $deps = array(), $ver = '4.1.3', $in_footer = true );
	wp_enqueue_script( 'myjs', $src = get_template_directory_uri() . '/asset/js/myjs.js', $deps = array(), $ver = '1.0.0', $in_footer = true );
}
add_action( 'wp_enqueue_scripts', 'my_script_enqueue' );

/*
	==================================
	Activate menus
	==================================
 */

function my_theme_setup()
{
	add_theme_support( 'menus' );

	register_nav_menu( $location = 'header', $description = '這個是上面的menu' );
	register_nav_menu( $location = 'footer', $description = '這個是下面的menu' );
}
add_action( 'init', $function_to_add = 'my_theme_setup' );
/*
	==================================
	Add menu filter
	==================================
 */

function atg_menu_classes($classes, $item, $args) {
  if($args->theme_location == 'header') {
    $classes[] = 'nav-item';
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'atg_menu_classes', 1, 3);

function add_menuclass($ulclass) {
   return preg_replace('/<a/', '<a class="nav-link"', $ulclass);
}
add_filter('wp_nav_menu','add_menuclass');


/*
	==================================
	Add theme support
	==================================
 */
add_theme_support( 'custom-background' );
add_theme_support( 'custom-header' );
add_theme_support( 'post-thumbnails' );
add_theme_support('html5',array('search-form'));

add_theme_support( 'post-formats' ,array('aside','video','image'));

/*
	==================================
	Sidebar function
	==================================
 */
function my_widget_setup(){
	/**
	 * Creates a sidebar
	 * @param string|array  Builds Sidebar based off of 'name' and 'id' values.
	 */
	$args = array(
		'name'          => __( 'my firstSidebar name', 'text-domain' ),
		'id'            => 'sidebar-1',// ID should be LOWERCASE  ! ! !
		'description'   => 'this is the description',
		'class'         => '',
		'before_widget' => '<li id="%1" class="widget %2">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
	);
	
	register_sidebar( $args );
	
}
add_action( 'widgets_init', 'my_widget_setup' );

require get_template_directory() . '/inc/walker.php';

/*
	==================================
	Include Post Type
	==================================
 */
require get_template_directory() . '/inc/custom_post_type.php';


