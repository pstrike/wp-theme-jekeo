<?php get_header(); ?>
<?php the_post(); ?>

<?php
  $blahlab_jekeo_slider_images_metabox->the_meta();
  $blahlab_jekeo_options = json_decode($blahlab_jekeo_slider_images_metabox->get_the_value('options'), true);
  $blahlab_jekeo_slider_images = blahlab_jekeo_value($blahlab_jekeo_options, 'slider_images');
  $blahlab_jekeo_slider_bg = blahlab_jekeo_value($blahlab_jekeo_options, 'slider_bg');
  $blahlab_jekeo_previous = get_previous_post();
  $blahlab_jekeo_next = get_next_post();
  $blahlab_jekeo_meta_options = json_decode($blahlab_jekeo_portfolio_meta_metabox->get_the_value('options'), true);

  $blahlab_jekeo_client = blahlab_jekeo_value($blahlab_jekeo_meta_options, 'client');
  $blahlab_jekeo_duration = blahlab_jekeo_value($blahlab_jekeo_meta_options, 'duration');
  $blahlab_jekeo_link = blahlab_jekeo_value($blahlab_jekeo_meta_options, 'link');
  $blahlab_jekeo_services = blahlab_jekeo_value($blahlab_jekeo_meta_options, 'services', array());
  $blahlab_jekeo_header_text_color = blahlab_value($blahlab_jekeo_meta_options, 'header_text_color');
  $blahlab_jekeo_header_title_color = blahlab_value($blahlab_jekeo_meta_options, 'header_title_color');
  $blahlab_jekeo_header_client_color = blahlab_value($blahlab_jekeo_meta_options, 'header_client_color');

  $blahlab_jekeo_date = blahlab_jekeo_value($blahlab_jekeo_meta_options, 'date');
  $blahlab_jekeo_category = blahlab_jekeo_value($blahlab_jekeo_meta_options, 'category');
  $blahlab_jekeo_layout = blahlab_jekeo_value($blahlab_jekeo_meta_options, 'layout');
  $blahlab_jekeo_header_bg = blahlab_jekeo_value($blahlab_jekeo_meta_options, 'header_bg');
  $blahlab_jekeo_tagline = blahlab_jekeo_value($blahlab_jekeo_meta_options, 'tagline');
  $blahlab_jekeo_bg = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'full') );
  $blahlab_jekeo_categories = get_the_terms($post->ID, 'portfolio_category');


  $blahlab_jekeo_portfolio_header = blahlab_jekeo_get_option('portfolio_header');


  $blahlab_jekeo_category_names = array();
  $blahlab_jekeo_terms = get_the_terms($post->ID, 'portfolio_category');
  $blahlab_jekeo_category_names = array();
  $blahlab_jekeo_category_slugs = array();
  if($blahlab_jekeo_terms) {
    foreach($blahlab_jekeo_terms as $blahlab_jekeo_term) {
      $blahlab_jekeo_category_slugs[] = strtolower(str_replace(' ', '-', $blahlab_jekeo_term->name));
      $blahlab_jekeo_category_names[] = strtolower($blahlab_jekeo_term->name);
    }
  }


  $blahlab_jekeo_items = blahlab_jekeo_value($blahlab_jekeo_meta_options, 'related_projects');

  $blahlab_jekeo_query = array(
    'posts_per_page' => -1,
    'orderby' => 'date',
    'post_type' => 'portfolio'
  );

  $blahlab_jekeo_query['include'] = $blahlab_jekeo_items;

  if (count($blahlab_jekeo_items) > 0) {
    $blahlab_jekeo_related_projects = get_posts($blahlab_jekeo_query);
  } else {
    $blahlab_jekeo_related_projects = array();
  }

  // var_dump($blahlab_jekeo_items);

  wp_reset_postdata();

?>

<?php 

  $blahlab_jekeo_bg_url = get_the_post_thumbnail_url();
  $blahlab_jekeo_the_id = get_the_ID();

  $custom_css = "
    #portfolio-header-{$blahlab_jekeo_the_id} {
      background-image: url({$blahlab_jekeo_bg_url});
      color: {$blahlab_jekeo_header_text_color};
    }
    #portfolio-header-{$blahlab_jekeo_the_id} .sub-title {
      color: {$blahlab_jekeo_header_client_color};
    }
    #portfolio-header-{$blahlab_jekeo_the_id} h2 {
      color: {$blahlab_jekeo_header_title_color};
    }
  ";

  wp_add_inline_style( 'blahlab-jekeo-inline-style', $custom_css);

?>

<div class="full work-header top-shift no-padding">
  <div class="case" id="portfolio-header-<?php echo esc_attr($blahlab_jekeo_the_id) ?>">
    <div class="case-intro">
      <div class="row">
        <div class="large-12 columns">
          <h3 class="sub-title light-grey"><?php echo esc_html($blahlab_jekeo_client) ?></h3>
        </div>
      </div>
      <div class="row">
        <div class="large-7 columns">
          <div class="inner">
            <h2><?php echo get_the_title(); ?></h2>
            <?php the_content(); ?>
          </div>
        </div>
      </div>
      <div class="four spacing"></div>
      <div class="row">
        <div class="large-12 columns">
          <div class="keep-scroll">
            <a href="#" class="scroll-down">
              <span class="sdInner">
                <span class="sdRoller">
                </span>
              </span>
            </a>
            keep cruising
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php

  if (is_active_sidebar( 'blahlab-builder-' . $post->ID ) || true) {
    dynamic_sidebar( 'blahlab-builder-' . $post->ID );
  }

?>


<?php get_footer(); ?>