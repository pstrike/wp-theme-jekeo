<?php 

  $background_url = blahlab_value($this->instance, 'options.bg_image');

  $custom_css = "
    #{$widget_id}-inner {
      background-image: url({$background_url});
    }
  ";

  wp_add_inline_style( 'blahlab-jekeo-inline-style', $custom_css);

?>

<div class="full no-overflow no-padding parallax" id="<?php echo esc_attr($widget_id) ?>-inner">
  <div class="right-half">
    <div class="two spacing"></div>
    <div class="section-header alt white">
      <h2><?php echo esc_html(blahlab_value($this->instance, 'options.title')) ?></h2>
    </div>

    <div class="light">
      <?php echo wpautop(blahlab_value($this->instance, 'options.desc')) ?>
    </div>    

    <div class="two spacing"></div>
    <?php 
      $button_text = blahlab_value($this->instance, 'options.button.text');
      $button_url = blahlab_value($this->instance, 'options.button.url');
    ?>
    <?php 
      if ( $button_url && $button_text ) {
    ?>
      <a href="<?php echo esc_url(blahlab_value($button_url)) ?>" class="button small"><?php echo esc_html(blahlab_value($button_text)) ?></a>
    <?php
      }
    ?>
    
    <div class="three spacing"></div>
  </div>
</div>