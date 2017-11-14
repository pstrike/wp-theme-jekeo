<?php

$blahlab_widget_ready = false;

define('BLAHLAB_THEME_VERSION', '1.0');

function blahlab_jekeo_get_builder_templates() {

  $theme = wp_get_theme();
  $templates = $theme->get_page_templates();
  $builder_templates = array();

  foreach ($templates as $file => $name) {
    if ( strpos($file, 'blahlab-builder-') === 0 ) {
      $builder_templates[] = $file;
    }
  }

  return $builder_templates;

}

require_once get_template_directory() . '/misc/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/misc/menu.php';
require_once get_template_directory() . '/misc/lib-functions.php';

if ( ! isset( $content_width ) )
  $content_width = 1120; /* pixels */

add_action( 'tgmpa_register', 'blahlab_jekeo_register_required_plugins' );
function blahlab_jekeo_register_required_plugins() {

  $blahlab_jekeo_plugins = array(
    array(
      'name'               => esc_html__('Blahlab Framework', 'jekeo-by-honryou'),
      'slug'               => 'blahlab-framework',
      'source'             => get_template_directory() . '/plugins/blahlab-framework.zip', // The plugin source.
      'required'           => true,
      'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
      'force_activation'   => false,
      'force_deactivation' => false,
      'external_url'       => '', // If set, overrides default API URL and points to an external URL.
      'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
    )
  );

  $blahlab_jekeo_config = array(
    'id'           => 'wrap',                 // Unique ID for hashing notices for multiple instances of TGMPA.
    'default_path' => '',                      // Default absolute path to bundled plugins.
    'menu'         => 'tgmpa-install-plugins', // Menu slug.
    'has_notices'  => true,                    // Show admin notices or not.
    'dismissable'  => false,                    // If false, a user cannot dismiss the nag message.
    'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
    'is_automatic' => true,                   // Automatically activate plugins after installation or not.
    'message'      => '',                      // Message to output right before the plugins table.
  );

  tgmpa( $blahlab_jekeo_plugins, $blahlab_jekeo_config );

}

// Backup widgets pre-theme switch
add_action( 'pre_set_theme_mod_sidebars_widgets', 'blahlab_jekeo_backup_sidebars_widgets' );

function blahlab_jekeo_backup_sidebars_widgets() {
  $blahlab_jekeo_sidebars_widgets = wp_get_sidebars_widgets();
  update_option('blahlab_' . get_template(), $blahlab_jekeo_sidebars_widgets);
}

add_action('after_switch_theme', 'blahlab_jekeo_setup_sidebars_widgets');

function blahlab_jekeo_setup_sidebars_widgets() {
  $blahlab_jekeo_widgets = get_option('blahlab_' . get_template(), array());
  update_option('sidebars_widgets', $blahlab_jekeo_widgets );
}


add_action( 'after_setup_theme' , 'blahlab_jekeo_theme_setup', 10 );
function blahlab_jekeo_theme_setup() {
  global $pagenow;

  add_theme_support('html5');
  add_theme_support('title-tag');
  add_theme_support('widget-customizer');
  add_theme_support( 'post-thumbnails' );

  load_theme_textdomain('jekeo-by-honryou', get_template_directory() . '/languages');

  add_theme_support( 'site-logo', array(
    'header-text' => array(
      'sitetitle',
      'tagline',
    ),
    'size' => 'medium',
  ) );

  add_theme_support( 'automatic-feed-links' );
}

add_action('admin_enqueue_scripts', 'blahlab_jekeo_admin_scripts');
function blahlab_jekeo_admin_scripts() {
  wp_enqueue_style(
    'blahlab-jekeo' . '-' . 'admin.css' ,
    get_template_directory_uri() . '/assets/css/admin.css',
    array() ,
    BLAHLAB_THEME_VERSION
  );
}

add_action( 'wp_enqueue_scripts' , 'blahlab_jekeo_frontend_scripts' );
function blahlab_jekeo_frontend_scripts() {

  $blahlab_jekeo_assets_version = defined('WP_DEBUG') && WP_DEBUG ?  time() : BLAHLAB_THEME_VERSION;

  // ----------------------
  // HOOK Javascripts
  // ----------------------

  wp_enqueue_script(
    'blahlab-jekeo-modernizr.js',
    get_template_directory_uri() . '/bower_components/modernizr/modernizr.js',
    array(),
    BLAHLAB_THEME_VERSION,
    false
  );

  wp_enqueue_script( 'blahlab-jekeo-app', get_theme_file_uri('assets/js/app.js'), array( 'jquery', 'jquery-foundation', 'jquery-waypoints', 'jquery-count-to', 
      'jquery-appear', 'jquery-wow', 'jquery-slick', 'jquery-superslides' ), $blahlab_jekeo_assets_version, true );
  wp_enqueue_script( 'blahlab-jekeo-wp', get_theme_file_uri('assets/js/wp.js'), array( 'jquery' ), $blahlab_jekeo_assets_version, true );
  wp_enqueue_script( 'blahlab-jekeo-patch', get_theme_file_uri('assets/js/patch.js'), array( 'jquery' ), $blahlab_jekeo_assets_version, true );

  $blahlab_page_scroll_effect = blahlab_jekeo_get_option('page_scroll_effect');
  if ( $blahlab_page_scroll_effect != 'disabled' ) {
    wp_enqueue_script( 'blahlab-jekeo-page_scroll_effect', get_theme_file_uri('assets/js/page_scroll_effect.js'), array( 'jquery', 'jquery-wow' ), $blahlab_jekeo_assets_version, true );
  }


  // third party
  wp_enqueue_script( 'jquery-validate', get_theme_file_uri('assets/js/jquery.validate.js'), array( 'jquery' ), $blahlab_jekeo_assets_version, true );
  wp_enqueue_script( 'jquery-wow', get_theme_file_uri('assets/js/wow.min.js'), array( 'jquery' ), $blahlab_jekeo_assets_version, true );
  wp_enqueue_script( 'jquery-slick', get_theme_file_uri('assets/js/slick.min.js'), array( 'jquery' ), $blahlab_jekeo_assets_version, true );
  wp_enqueue_script( 'jquery-superslides', get_theme_file_uri('assets/js/jquery.superslides.min.js'), array( 'jquery' ), $blahlab_jekeo_assets_version, true );
  wp_enqueue_script( 'jquery-foundation', get_theme_file_uri('bower_components/foundation/js/foundation.min.js'), array( 'jquery' ), $blahlab_jekeo_assets_version, true );
  wp_enqueue_script( 'jquery-waypoints', get_theme_file_uri('bower_components/waypoints/lib/jquery.waypoints.min.js'), array( 'jquery' ), $blahlab_jekeo_assets_version, true );
  wp_enqueue_script( 'jquery-count-to', get_theme_file_uri('bower_components/countto/jquery.countTo.js'), array( 'jquery' ), $blahlab_jekeo_assets_version, true );
  wp_enqueue_script( 'jquery-appear', get_theme_file_uri('bower_components/appear/jquery.appear.js'), array( 'jquery' ), $blahlab_jekeo_assets_version, true );

  // wordpress bundled

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  } // Comment reply script

  // ----------------------
  // HOOK Stylesheets
  // ----------------------

  wp_enqueue_style( 'app', get_theme_file_uri('assets/css/app.css'), array(), $blahlab_jekeo_assets_version );
  wp_enqueue_style( 'style', get_theme_file_uri('assets/css/style.css'), array(), $blahlab_jekeo_assets_version );
  wp_enqueue_style( 'responsive', get_theme_file_uri('assets/css/responsive.css'), array(), $blahlab_jekeo_assets_version );
  wp_enqueue_style( 'patch', get_theme_file_uri('assets/css/patch.css'), array(), $blahlab_jekeo_assets_version );
  wp_enqueue_style( 'wp', get_theme_file_uri('assets/css/wp.css'), array(), $blahlab_jekeo_assets_version );

  // third party
  wp_enqueue_style( 'animate', get_theme_file_uri('assets/css/animate.css'), array(), $blahlab_jekeo_assets_version );
  wp_enqueue_style( 'font-awesome', get_theme_file_uri('assets/css/font-awesome.css'), array(), $blahlab_jekeo_assets_version );
  wp_enqueue_style( 'linea-styles', get_theme_file_uri('assets/css/linea-styles.css'), array(), $blahlab_jekeo_assets_version );
  wp_enqueue_style( 'linea-arrows-styles', get_theme_file_uri('assets/css/linea-arrows-styles.css'), array(), $blahlab_jekeo_assets_version );
  wp_enqueue_style( 'levirebrushed', get_theme_file_uri('assets/css/levirebrushed.css'), array(), $blahlab_jekeo_assets_version );
  wp_enqueue_style( 'superslides', get_theme_file_uri('assets/css/superslides.css'), array(), $blahlab_jekeo_assets_version );
  wp_enqueue_style( 'slick-theme', get_theme_file_uri('assets/css/slick-theme.css'), array(), $blahlab_jekeo_assets_version );
  wp_enqueue_style( 'slick', get_theme_file_uri('assets/css/slick.css'), array(), $blahlab_jekeo_assets_version );

  wp_enqueue_style(
    'blahlab-jekeo' . '-google-fonts' ,
    blahlab_jekeo_google_fonts_url(),
    array() ,
    BLAHLAB_THEME_VERSION
  );

}


function blahlab_jekeo_google_fonts_url() {
  // https://themeshaper.com/2014/08/13/how-to-add-google-fonts-to-wordpress-themes/
  $fonts_url = '';

  $font_families = array();

  $fonts = array(
    array(
      'switch' => _x( 'on', 'Raleway font: on or off', 'jekeo-by-honryou' ),
      'query' => 'Raleway:400,700,300'
    ),
    array(
      'switch' => _x( 'off', 'Open Sans font: on or off', 'jekeo-by-honryou' ),
      'query' => 'Open Sans:700italic,400,800,600'
    ),
    array(
      'switch' => _x( 'off', 'Poppinns font: on or off', 'jekeo-by-honryou' ),
      'query' => 'Poppins:300,400,500,600,700'
    ),
    array(
      'switch' => _x( 'on', 'Montserrat font: on or off', 'jekeo-by-honryou' ),
      'query' => 'Montserrat:400,700'
    ),
    array(
      'switch' => _x( 'on', 'Lora font: on or off', 'jekeo-by-honryou' ),
      'query' => 'Lora:400,400i,700,700i'
    ),
  );

  foreach ($fonts as $font) {
    if ( 'off' != $font['switch'] ) {
      $font_families[] = $font['query'];
    }
  }

  $query_args = array(
    'family' => urlencode( implode( '|', $font_families ) ),
    'subset' => urlencode( 'latin,latin-ext' ),
  );

  $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

  return esc_url_raw( $fonts_url );
}

add_filter('get_the_excerpt', 'blahlab_jekeo_trim_excerpt');
function blahlab_jekeo_trim_excerpt($blahlab_jekeo_text) {
  $blahlab_jekeo_text = str_replace('[&hellip;]', '', $blahlab_jekeo_text);
  return $blahlab_jekeo_text;
}

// priority 21 after the ob-ox-lay-ers-builder-* sidebars
add_action('widgets_init', 'blahlab_jekeo_register_sidebars', 21);
function blahlab_jekeo_register_sidebars() {

  register_sidebar( array(
    'id'        => 'blahlab-builder-sidebar',
    'name'      => esc_html__( 'Blog Sidebar' , 'jekeo-by-honryou' ),
    'before_widget' => '<aside id="%1$s" class="content well push-bottom-large widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h5 class="section-nav-title">',
    'after_title'   => '</h5>',
  ) );

  register_sidebar( array(
    'id'        => 'blahlab-builder-footer',
    'name'      => esc_html__( 'Footer' , 'jekeo-by-honryou' ),
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '',
    'after_title'   => '',
  ) );

  register_sidebar( array(
    'id'        => 'blahlab-builder-index',
    'name'      => esc_html__( 'Index' , 'jekeo-by-honryou' ),
    'before_widget' => '<aside id="%1$s" class="content well push-bottom-large widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h5 class="section-nav-title">',
    'after_title'   => '</h5>',
  ) );


  register_sidebar( array(
    'id'    => 'blahlab-portfolio-item-sidebar',
    'name'    => esc_html__( 'Portfolio Item Sidebar' , 'jekeo-by-honryou' ),
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '',
    'after_title' => '',
  ) );

}

add_action( 'admin_enqueue_scripts', 'blahlab_jekeo_admin_print_styles' , 50 );
function blahlab_jekeo_admin_print_styles(){

  wp_enqueue_style( 'wp-color-picker' );

}

add_filter( 'admin_body_class', 'blahlab_jekeo_admin_body_class_modifier' );
function blahlab_jekeo_admin_body_class_modifier($classes) {
   global $pagenow, $post;
  // BLAHLAB HACKS
  if ( 'post.php' === $pagenow && in_array( basename( get_page_template() ), blahlab_jekeo_get_builder_templates() ) ) {
    return "$classes no_postdivrich";
  } else {
    return $classes;
  }
}

if (defined("WP_DEBUG") && WP_DEBUG) {
  add_filter( 'comment_flood_filter',     '__return_false',    30, 3 );
}

function blahlab_jekeo_is_previewing() {
  return isset($GLOBALS['wp_customize']) ? true : false;
}

function blahlab_jekeo_body_classes($classes) {
  $body_class = array();
  if ( is_singular('portfolio') ) {
    $body_class[] = 'work-single-nav';
  }

  if ( is_single() || is_page_template('blog.php') ) {
    $body_class[] = 'blog-nav';
  }

  if ( !is_page_template('blahlab-builder-onepage.php') ) {
    $body_class[] = 'default';
  }

  return array_merge( $classes, $body_class );
}

function blahlab_jekeo_after_head() {
  wp_enqueue_style( 'blahlab-jekeo-inline-style', get_template_directory_uri() . '/assets/css/inline.css', array(), BLAHLAB_THEME_VERSION );
}

add_action( 'blahlab_jekeo_after_head', 'blahlab_jekeo_after_head' );

function blahlab_jekeo_move_comment_field_to_bottom( $fields ) {
  $comment_field = $fields['comment'];
  unset( $fields['comment'] );
  $fields['comment'] = $comment_field;
  return $fields;
}

add_filter( 'comment_form_fields', 'blahlab_jekeo_move_comment_field_to_bottom' );

function blahlab_jekeo_protected_title_format($format, $post) {
  $format = __('<span class="fa fa-lock"></span> %s', 'jekeo-by-honryou');

  return $format;
}

add_filter( 'protected_title_format', 'blahlab_jekeo_protected_title_format', 10, 2 );

function blahlab_jekeo_show_posts_nav() {
  global $wp_query;
  return ($wp_query->max_num_pages > 1);
}

?>