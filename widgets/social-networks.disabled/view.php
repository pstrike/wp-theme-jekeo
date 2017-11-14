<?php

  $socials = blahlab_value($this->instance, 'options.socials');
  $logo = blahlab_value($this->instance, 'options.image');

  $background_url = blahlab_value($this->instance, 'options.bg');

  $custom_css = "
    #{$widget_id}-inner {
      background-image: url({$background_url});
      color: #fff;
    }
  ";

  wp_add_inline_style( 'blahlab-jekeo-inline-style', $custom_css);
?>

<div class='full parallax' id="<?php echo $widget_id ?>-inner">
  <div class='two spacing'></div>
  <div class='row'>
    <?php foreach ((array)$socials as $index => $social): ?>
      <?php 
        $end_class = $index == count($socials) - 1 ? 'end' : '';
      ?>
      <div class='medium-3 columns <?php echo esc_attr(blahlab_value($end_class)) ?>'>
        <div class='big-social'>
          <a href='<?php echo esc_url(blahlab_value($social, 'url')) ?>' target="_blank">
            <i class='fa fa-<?php echo esc_attr(blahlab_value($social, 'id')) ?>'></i>
          </a>
          <h4 class="white"><?php echo esc_html(blahlab_value($social, 'title')) ?></h4>
          <p><?php echo esc_html(blahlab_value($social, 'sub_title')) ?></p>
        </div>
        <div class='two spacing'></div>
      </div>
    <?php endforeach ?>
  </div>
  <div class='two spacing'></div>
</div>