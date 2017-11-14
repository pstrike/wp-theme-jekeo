<?php 

  $background_url = blahlab_value($this->instance, 'options.bg_image');
  $bg_color = blahlab_value($this->instance, 'options.bg_color');
  $title_color = blahlab_value($this->instance, 'options.title_color');

  $custom_css = "
    #{$widget_id}-inner {
      background-image: url({$background_url});
      background-color: {$bg_color};
    }

    #{$widget_id}-inner h1 {
      color: {$title_color};
    }
  ";

  wp_add_inline_style( 'blahlab-jekeo-inline-style', $custom_css);

?>

<div class="full page-header parallax top-shift works-bg" id="<?php echo $widget_id ?>-inner">
  <div class="row">
    <div class="large-12 columns">
      <h1><?php echo wp_kses(blahlab_value($this->instance, 'options.title'), array( 'br' => array() )) ?></h1>
    </div>
  </div>
</div>