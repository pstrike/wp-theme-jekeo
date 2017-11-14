<?php

  $items = blahlab_value($this->instance, 'options.items');

  $item_ids = array();

  foreach ((array)$items as $index => $item) {
    $item_ids[] = $item['id'];
  }

  $query = array(
    'posts_per_page' => -1,
    'orderby' => 'post__in',
    'post_type' => 'portfolio'
  );

  $query['post__in'] = $item_ids;

  if (count($items) > 0) {
    $works = get_posts($query);
  } else {
    $works = array();
  }

  wp_reset_postdata();

?>

<div class="full no-padding no-overflow no-bg">
  <div class="superbig-title">
    <h2 class="wow slideInUp"><?php echo esc_html(blahlab_value($this->instance, 'options.title')) ?></h2>
  </div>
  <div id="slides">
    <div class="slides-container">
      
      <?php 
        foreach ($works as $index => $work) {
          global $blahlab_jekeo_portfolio_meta_metabox;
          $blahlab_jekeo_portfolio_meta_metabox->the_meta($work->ID);
          $blahlab_jekeo_meta_options = json_decode($blahlab_jekeo_portfolio_meta_metabox->get_the_value('options'), true);
          $blahlab_jekeo_client = blahlab_jekeo_value($blahlab_jekeo_meta_options, 'client');


          $bg_url = get_the_post_thumbnail_url($work);
          $text_color = blahlab_value($items[$index], 'text_color');
          $number_color = blahlab_value($items[$index], 'number_color');
          $title_color = blahlab_value($items[$index], 'title_color');
          $client_color = blahlab_value($items[$index], 'client_color');

          $custom_css = "
            .{$widget_id}-slide-{$work->ID} {
              background-image: url({$bg_url});
              color: {$text_color};
            }
            .{$widget_id}-slide-{$work->ID} .sub-title {
              color: {$client_color};
            }
            .{$widget_id}-slide-{$work->ID} .sub-title span {
              color: {$number_color};
            }
            .{$widget_id}-slide-{$work->ID} h2 {
              color: {$title_color};
            }
          ";

          wp_add_inline_style( 'blahlab-jekeo-inline-style', $custom_css);

      ?>
        <!-- use class because if use id the slide pagination dots won't work -->
        <div class="slide <?php echo esc_attr($widget_id) ?>-slide-<?php echo esc_attr($work->ID) ?>" id="">
          <div class="row">
            <div class="large-12 columns">
              <h3 class="sub-title"><span>0<?php echo esc_html($index+1) ?>.</span> <?php echo esc_html($blahlab_jekeo_client) ?> </h3>
            </div>
          </div>
          <div class="row">
            <div class="large-7 columns">
              <div class="inner">
                <h2><?php echo esc_html(get_the_title($work)) ?></h2>
                <p><?php echo esc_html($work->post_content); ?></p>
                <div class="three spacing"></div>
                <a href="<?php echo esc_url(get_permalink($work)); ?>" class="button small">View case study</a>
              </div>
            </div>
          </div>
        </div>
      <?php
        }
      ?>
    </div>
    <nav class="slides-navigation">
      <a href="#" class="next"><i class="icon-arrows-right"></i></a>
      <a href="#" class="prev"><i class="icon-arrows-left"></i></a>
    </nav>
  </div>
</div>
