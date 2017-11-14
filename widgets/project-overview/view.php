<?php 

  $background_url = blahlab_value($this->instance, 'options.bg_image');

  $custom_css = "
    #{$widget_id}-inner {
      background-image: url({$background_url});
    }
  ";

  wp_add_inline_style( 'blahlab-jekeo-inline-style', $custom_css);

?>

<div class="full intro-bg-grey" id="<?php echo esc_attr($widget_id) ?>-inner">
  <div class="row">
    <div class="large-8 columns">
      <div class="section-title">
        <div class="row">
          <div class="large-12 columns">
            <h3 class="sub-title"><?php echo esc_html(blahlab_value($this->instance, 'options.small_title')) ?></h3>
            <h2><?php echo esc_html(blahlab_value($this->instance, 'options.title')) ?></h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="large-12 columns">
          <p><?php echo esc_html(blahlab_value($this->instance, 'options.desc')) ?></p>
        </div>
      </div>
    </div>
    <div class="large-3 columns">
      <?php
        global $blahlab_jekeo_client, $blahlab_jekeo_services, $blahlab_jekeo_duration, $blahlab_jekeo_link;
      ?>
      <?php if ( $blahlab_jekeo_client ): ?>
        <h4 class="metadata-title">Client</h4>
        <ul class="metadata-list">
          <li><?php echo esc_html($blahlab_jekeo_client) ?></li>
        </ul>
      <?php endif; ?>
      <?php if ( count($blahlab_jekeo_services) > 0 ): ?>
        <h4 class="metadata-title">Main services</h4>
        <ul class="metadata-list">
          <?php foreach ($blahlab_jekeo_services as $service): ?>
            <li><?php echo esc_html(blahlab_value($service, 'name')) ?></li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
      <?php if ( $blahlab_jekeo_duration ): ?>
        <h4 class="metadata-title">Duration</h4>
        <ul class="metadata-list">
          <li><?php esc_html($blahlab_jekeo_duration) ?></li>
        </ul>
      <?php endif; ?>
      <?php if ( blahlab_jekeo_value($blahlab_jekeo_link) ): ?>
        <?php
          $blahlab_jekeo_link_text = blahlab_jekeo_value($blahlab_jekeo_link, 'text');
          $blahlab_jekeo_link_url = blahlab_jekeo_value($blahlab_jekeo_link, 'url');
        ?>
        <?php if ( $blahlab_jekeo_link_url && $blahlab_jekeo_link_text ): ?>
          <h4 class="metadata-title">Link</h4>
          <ul class="metadata-list">
            <li><a href='<?php echo esc_url($blahlab_jekeo_link_url); ?>' target="_blank"><?php echo blahlab_esc($blahlab_jekeo_link_text); ?></a></li>
          </ul>          
        <?php endif; ?>
      <?php endif; ?>

    </div>
  </div>
</div>