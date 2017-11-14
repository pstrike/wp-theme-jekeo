<?php

  $items = blahlab_value($this->instance, 'options.items', array());

  $item_ids = array();

  foreach ($items as $index => $item) {
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

  $the_works = array();

  foreach ($items as $item) {
    foreach ($works as $work) {
      if ( $item['id'] == $work->ID ) {
        $the_works[] = $work;
        break;
      }
    }
  }

  $works = $the_works;

  $featured_works = array();
  $other_works = array();

  function blahlab_jekeo_is_featured($items, $work) {
    foreach ($items as $item) {
      if ( $item['id'] == $work->ID ) {
        return $item['featured'];
      }
    }

    return false;
  }

  foreach ($works as $index => $work) {
    if ( blahlab_jekeo_is_featured($items, $work) ) {
      $featured_works[] = $work;
    } else {
      $other_works[] = $work;
    }
  }

  $other_works = array_chunk( $other_works, 2 );

  wp_reset_postdata();

?>

<div class="full no-overflow no-padding">
  <div id="case-studies">
    <div class="cases-container">
      <?php 
        foreach ($featured_works as $index => $work) {
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
            #{$widget_id}-case-{$work->ID} {
              background-image: url({$bg_url});
              color: {$text_color};
            }
            #{$widget_id}-case-{$work->ID} .sub-title {
              color: {$client_color};
            }
            #{$widget_id}-case-{$work->ID} .sub-title span {
              color: {$number_color};
            }
            #{$widget_id}-case-{$work->ID} h2 {
              color: {$title_color};
            }
          ";

          wp_add_inline_style( 'blahlab-jekeo-inline-style', $custom_css);

      ?>
        <div class="case" id="<?php echo esc_attr($widget_id) ?>-case-<?php echo esc_attr($work->ID) ?>">
          <div class="row">
            <div class="large-12 columns">
              <h3 class="sub-title light-grey"><?php echo esc_html($blahlab_jekeo_client) ?></h3>
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

      <div class="small-cases">
        <?php foreach($other_works as $index => $group): ?>
          <?php $odd_line_class = $index % 2 == 0 ? 'odd-line' : '' ?>
          <div class="row">
            <?php foreach($group as $work): ?>
              <?php 
                global $blahlab_jekeo_portfolio_meta_metabox;
                $blahlab_jekeo_portfolio_meta_metabox->the_meta($work->ID);
                $blahlab_jekeo_meta_options = json_decode($blahlab_jekeo_portfolio_meta_metabox->get_the_value('options'), true);
                $blahlab_jekeo_client = blahlab_jekeo_value($blahlab_jekeo_meta_options, 'client');
              ?>
              <div class="large-6 columns">
                <div class="case small-case <?php echo esc_attr($odd_line_class) ?>">
                  <h3 class="sub-title orange"><?php echo esc_html($blahlab_jekeo_client) ?></h3>
                  <div class="inner">
                    <h2><?php echo esc_html(get_the_title($work)) ?></h2>
                    <p><?php echo esc_html($work->post_content); ?></p>
                    <div class="spacing"></div>
                    <a href="<?php echo esc_url(get_permalink($work)); ?>" class="">View case study <i class="fa fa-long-arrow-right"></i></a>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>