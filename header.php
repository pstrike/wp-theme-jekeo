<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<?php do_action('blahlab_jekeo_after_head'); ?>
<body <?php body_class(); ?>>
  <?php
    $blahlab_jekeo_sidebars_widgets = wp_get_sidebars_widgets();
  ?>

  <div class='contain-to-grid sticky transparent'>
    <nav class='top-bar onepage' data-options='sticky_on: large' data-topbar=''>
      <ul class='title-area'>
        <li class='name'>
          <h1>
            <a href='<?php echo esc_url(home_url('/')) ?>'>
              <?php
                $blahlab_jekeo_logo = blahlab_jekeo_get_option( 'logo', null );
                $blahlab_jekeo_homepage_site_title_color = blahlab_jekeo_get_option( 'homepage_site_title_color', '#000' );
                $blahlab_jekeo_inner_page_site_title_color = blahlab_jekeo_get_option( 'inner_page_site_title_color', '#000' );
                $blahlab_jekeo_site_title_color = is_front_page() ? $blahlab_jekeo_homepage_site_title_color : $blahlab_jekeo_inner_page_site_title_color;

                $blahlab_jekeo_custom_css = "
                  .top-bar .name h1 a {
                    color: {$blahlab_jekeo_site_title_color};
                  }
                ";

                wp_add_inline_style('blahlab-jekeo-inline-style', $blahlab_jekeo_custom_css)

              ?>
              <?php if (blahlab_jekeo_value($blahlab_jekeo_logo)): ?>
                <img src="<?php echo esc_url(blahlab_jekeo_value($blahlab_jekeo_logo)); ?>" alt='image'>
              <?php else: ?>
                <?php echo esc_html(get_bloginfo('name')); ?>
              <?php endif ?>
            </a>
          </h1>
        </li>
      </ul>
      <div class="menu-toggler right">
        <a href='#'>
          <i class="fa fa-bars"></i>
        </a>
      </div>
    </nav>
  </div>


  <header class=" ">
    <div class='contain-to-grid sticky transparent'>
      <nav class='top-bar onepage' data-options='sticky_on: large' data-topbar=''>
        <ul class='title-area'>
          <li class='name'>
            <h1>
              <a href='<?php echo esc_url(home_url('/')) ?>'>
                <?php
                  $blahlab_jekeo_logo = blahlab_jekeo_get_option( 'logo', null );
                ?>
                <?php if (blahlab_jekeo_value($blahlab_jekeo_logo)): ?>
                  <img src="<?php echo esc_url(blahlab_jekeo_value($blahlab_jekeo_logo)); ?>" alt='image'>
                <?php else: ?>
                  <?php echo esc_html(get_bloginfo('name')); ?>
                <?php endif ?>
              </a>
            </h1>
          </li>
        </ul>
        <div class="menu-toggler right">
          <a href='#'>
            <i class="fa fa-close"></i>
          </a>
        </div>
      </nav>
    </div>
    <div class="four spacing"></div>
    <div class="row">
      <div class="large-12 columns">
        <?php

          if ( has_nav_menu('header-menu') ) {
            wp_nav_menu(array(
              'theme_location' => 'header-menu',
              'menu_class' => 'centered-text menu',
              'fallback_cb' => false,
              'container' => '',
              'depth' => 2,
              'walker' => new Blahlab_Jekeo_Main_Menu_Nav_Menu_Walker()
            ));
          } else {
        ?>
          <p class="menu-note">
            <?php esc_html_e('Please set your menu in the admin area', 'jekeo-by-honryou'); ?>
          </p>
        <?php          
          }

        ?>
      </div>
    </div>
  </header>