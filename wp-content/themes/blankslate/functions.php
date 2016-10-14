<?php
add_action( 'after_setup_theme', 'blankslate_setup' );
function blankslate_setup(){
  // Add Menu Support
  add_theme_support('menus');

  // Add Thumbnail Theme Support
  add_theme_support('post-thumbnails');
  set_post_thumbnail_size( 1980, 990, array( 'center', 'center') ); // default Post Thumbnail dimensions (cropped)
  add_image_size('wide', 1280, '', true);
  add_image_size('large', 1024, '', true); // Large Thumbnail
  add_image_size('medium', 768, '', true); // Medium Thumbnail
  add_image_size('small', 480, '', true); // Small Thumbnail
  add_theme_support( 'title-tag' );

  register_nav_menus(array( // Using array to specify more menus if needed
    'header-menu' => __('Header Menu', 'blankslate'), // Main Navigation
    'sidebar-menu' => __('Sidebar Menu', 'blankslate'), // Sidebar Navigation
    'footer-menu' => __('Footer Menu', 'blankslate') // Extra Navigation if needed (duplicate as many as you need!)
  ));
}


add_action( 'widgets_init', 'blankslate_widgets_init' );
function blankslate_widgets_init()
{
  register_sidebar( array (
  'name' => __( 'Sidebar Widget Area', 'blankslate' ),
  'id' => 'primary-widget-area',
  'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
  'after_widget' => "</li>",
  'before_title' => '<h3 class="widget-title">',
  'after_title' => '</h3>',
  ) );
}



// Load any external files you have here

/*------------------------------------*\
Theme Support
\*------------------------------------*/

// Debug info
function debug($data) {
  //if(WP_ENV == 'local') {
  echo "<pre>";
  print_r($data);
  echo "</pre>";
  //  }
}

if (!isset($content_width))
{
  $content_width = 900;
}

/*------------------------------------*\
Functions
\*------------------------------------*/

// Register blankslate Blank Navigation
function register_blankslate_menu()
{
  register_nav_menus(array( // Using array to specify more menus if needed
    'header-menu' => __('Header Menu', 'blankslate'), // Main Navigation
    'sidebar-menu' => __('Sidebar Menu', 'blankslate'), // Sidebar Navigation
    'extra-menu' => __('Extra Menu', 'blankslate') // Extra Navigation if needed (duplicate as many as you need!)
  ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
  $args['container'] = false;
  return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
  return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
  return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add body class
function add_slug_to_body_class($classes) {
  global $post;

  // Add page slug to body class, love this - Credit: Starkers Wordpress Theme
  if (is_home()) {
    $key = array_search('blog', $classes);
    if ($key > -1) {
      unset($classes[$key]);
    }
  } elseif (is_page()) {
    $classes[] = sanitize_html_class($post->post_name);
  } elseif (is_singular()) {
    $classes[] = sanitize_html_class($post->post_name);
  }

  // add sidebar classes
  $type = get_post_type();
  $global_left = array();
  $global_right = array();

  if(function_exists('get_field')) {
    $global_left = get_field('remove_left_sidebar_global', 'option');
    $global_right = get_field('remove_right_sidebar_global', 'option');
  }

  if ( ( is_active_sidebar( 'left-sidebar' ) && in_array($type, $global_left) == FALSE ) && ( !is_active_sidebar( 'right-sidebar' ) || in_array($type, $global_right) == TRUE ) ) {
    $classes[] = 'one-sidebar';
    $classes[] = 'left-sidebar';
  } elseif ( ( is_active_sidebar( 'right-sidebar' ) && in_array($type, $global_right) == FALSE ) && (!is_active_sidebar( 'left-sidebar' ) || in_array($type, $global_left) == TRUE )) {
    $classes[] = 'one-sidebar';
    $classes[] = 'right-sidebar';
  } elseif ( is_active_sidebar( 'left-sidebar' ) && in_array($type, $global_left) == FALSE  && is_active_sidebar( 'right-sidebar' ) && in_array($type, $global_right) == FALSE) {
    $classes[] = 'two-sidebars';
  } else {
    $classes[] = 'no-sidebars';
  }

  return $classes;
}

/**
* Determine which post types should NOT display the sidebars
*/
function registered_sidebar($sidebar) {
  $type = get_post_type();

  if(is_active_sidebar( $sidebar ) && isset($type) ) {

    $global_left = array();
    $global_right = array();

    if(function_exists('get_field')) {
      $global_left = get_field('remove_left_sidebar_global', 'option');
      $global_right = get_field('remove_right_sidebar_global', 'option');
    }

    if($sidebar == 'left-sidebar' && in_array($type, $global_left) == FALSE) {
      get_sidebar('left');
    }

    if ($sidebar == 'right-sidebar' && in_array($type, $global_right) == FALSE) {
      get_sidebar('right');
    }
  }
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
  // Define Sidebar Widget Area 1
  register_sidebar(array(
    'name' => __('Left Sidebar', 'blankslate'),
    'description' => __('Description for this widget-area...', 'blankslate'),
    'id' => 'left-sidebar',
    'before_widget' => '<div id="%1$s" class="%2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>'
  ));

  // Define Sidebar Widget Area 2
  register_sidebar(array(
    'name' => __('Right Sidebar', 'blankslate'),
    'description' => __('Description for this widget-area...', 'blankslate'),
    'id' => 'right-sidebar',
    'before_widget' => '<div id="%1$s" class="%2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>'
  ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function blankslate_pagination()
{
  global $wp_query;
  $big = 999999999;
  echo paginate_links(array(
    'base' => str_replace($big, '%#%', get_pagenum_link($big)),
    'format' => '?paged=%#%',
    'current' => max(1, get_query_var('paged')),
    'total' => $wp_query->max_num_pages
  ));
}

// Custom Excerpts
function blankslate_index($length) // Create 20 Word Callback for Index page Excerpts, call using blankslate_excerpt('blankslate_index');
{
  return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using blankslate_excerpt('blankslate_custom_post');
function blankslate_custom_post($length)
{
  return 40;
}

// Create the Custom Excerpts callback
function blankslate_excerpt($length_callback = '', $more_callback = '')
{
  global $post;
  if (function_exists($length_callback)) {
    add_filter('excerpt_length', $length_callback);
  }
  if (function_exists($more_callback)) {
    add_filter('excerpt_more', $more_callback);
  }
  $output = get_the_excerpt();
  $output = apply_filters('wptexturize', $output);
  $output = apply_filters('convert_chars', $output);
  $output = '<p>' . $output . '</p>';
  echo $output;
}

// Remove Admin bar
function remove_admin_bar()
{
  return false;
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
  $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
  return $html;
}

/*------------------------------------*\
Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions




add_action('init', 'blankslate_pagination'); // Add our blankslate Pagination


// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images
add_filter('add_sidebar_class', 'add_sidebar_class');
add_filter( 'jpeg_quality', create_function( '', 'return 100;' ) );

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether


$blank_includes = [
  /**
  * BC Extensions
  */

  'lib/bs/bc-protected-name.php',           // Protected name function

  'lib/bs/bc-query-controller.php',         // Control all queries

  'lib/bs/bc-truncate.php',                 // Truncate text

  'lib/bs/bc-set-images.php',               // Set responsive imageries

  'lib/bs/bc-wp-core.php',                  // Custom tweaks on wordpress

  /**
  * ACF - Advanced Custom Fields ~ Pro
  */
  'lib/acf/options.php'                     // Custom tweaks on wordpress

];

foreach ($blank_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'blankslate'), $file), E_USER_ERROR);
  }

  require_once $filepath;
} unset($file, $filepath);

function pageWidth() {
  $full_width_or_fixed = get_field('full_width_or_fixed', 'option');
  echo $full_width_or_fixed;
}
