<?php 
  $bg_color = blahlab_value($this->instance, 'options.bg_color');

  $custom_css = "
    #{$widget_id}-inner {
      background-color: {$bg_color};
    }
  ";

  wp_add_inline_style( 'blahlab-jekeo-inline-style', $custom_css);
?>

<div class="full" id="<?php echo esc_attr($widget_id) ?>-inner">
  <div class="section-title">
    <div class="row">
      <div class="large-9 large-centered columns">
        <h3 class="sub-title"><?php echo esc_html(blahlab_value($this->instance, 'options.small_title')) ?></h3>
        <h2><?php echo esc_html(blahlab_value($this->instance, 'options.title')) ?></h2>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="large-9 large-centered columns">
      <?php echo wpautop(blahlab_value($this->instance, 'options.desc')) ?>
    </div>
  </div>

  <?php 
    $gallery_type = blahlab_value($this->instance, 'options.gallery_type');
    $images = blahlab_value($this->instance, 'options.images');
    if ( $gallery_type == 'grid' ) {
  ?>
    <div class="two spacing"></div>
    <div class="case-images">
      <?php foreach( $images as $index => $image ): ?>
        <?php 
          $end_class = $index == count($images) - 1 ? 'end' : '';
          $animation_class = blahlab_value($image, 'animation');
          $width_class = blahlab_value($image, 'wide') ? 'large-12' : 'large-6'
        ?>
        <div class="<?php echo esc_attr($width_class) ?> columns no-padding wow <?php echo esc_attr($end_class) ?> <?php echo esc_attr($animation_class) ?>">
          <img src="<?php echo esc_url(blahlab_value($image, 'url')) ?>" alt="image">
        </div>
      <?php endforeach; ?>
    </div>
  <?php } elseif ( $gallery_type == 'slider' ) { ?>
    <div class='slides sites-apps'>
      <?php foreach( $images as $index => $image ): ?>
        <div class='slide'>
          <img alt="image" src="<?php echo esc_url(blahlab_value($image, 'url')) ?>" />
        </div>
      <?php endforeach; ?>
    </div>
  <?php
    }
  ?>

</div>