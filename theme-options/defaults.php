<?php 
  
  // https://developer.wordpress.org/themes/customize-api/the-customizer-javascript-api/#focusing-ui-objects
  // deep-linking /wp-admin/customize.php?autofocus[section]=theme_options
  // specify the defautls for theme options control
  return array(
    'footer' => array(
      'address' => '',
      'phone' => '',
      'email' => '',
      'copyright_message' => '',
      'socials' => array(
        array( 'id' => '', 'url' => '' ),
        array( 'id' => '', 'url' => '' ),
        array( 'id' => '', 'url' => '' )
      )
    ),
    'logo' => '',
    'homepage_site_title_color' => '#000',
    'inner_page_site_title_color' => '#000',
    'blog_section_title' => '',
    'blog_section_small_title' => '',
    'page_scroll_effect' => 'enabled'
  );

?>