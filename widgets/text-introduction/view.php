<?php 
  $bg_image = blahlab_value($this->instance, 'options.bg_image');

  if ( $bg_image ) {

    $custom_css = "
      #{$widget_id}-inner {
        background-image: url({$bg_image});
      }
    ";

    wp_add_inline_style( 'blahlab-jekeo-inline-style', $custom_css);
  }

?>

<div class="full intro-bg parallax" id="<?php echo esc_attr($widget_id) ?>-inner">
    <div class="row">
      <div class="large-12 columns">
        <h3 class="sub-title"><?php echo esc_html(blahlab_value($this->instance, 'options.small_title')) ?></h3>
      </div>
    </div>
    <div class="row">
      <div class="large-6 columns">
        <div class="studio-intro">
          <div class="section-title">
            <h2><?php echo wp_kses(blahlab_value($this->instance, 'options.title'), array( 'br' => array() )) ?></h2>
          </div>
        </div>
      </div>
      <div class="large-6 columns">
        <div class="studio-intro">
          <?php echo wpautop(blahlab_value($this->instance, 'options.desc'), array( 'br' => array() )) ?>
          <div class="four spacing"></div>
          <?php 
            $button_1_text = blahlab_value($this->instance, 'options.button_1.text');
            $button_1_url = blahlab_value($this->instance, 'options.button_1.url');

            $button_2_text = blahlab_value($this->instance, 'options.button_2.text');
            $button_2_url = blahlab_value($this->instance, 'options.button_2.url');
          ?>

          <?php if ( $button_1_text && $button_1_url ): ?>
            <a href="<?php echo esc_url($button_1_url) ?>"><?php echo esc_html($button_1_text) ?> <i class="fa fa-long-arrow-right"></i></a>
          <?php endif; ?>
          <?php if ( $button_2_text && $button_2_url ): ?>
            <a href="<?php echo esc_url($button_2_url) ?>"><?php echo esc_html($button_2_text) ?> <i class="fa fa-long-arrow-right"></i></a>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <div class="four spacing"></div>
</div>

<?php return; ?>

<div class='full'>
  <div class='row'>
    <div class='large-8 columns large-centered'>
      <div class="section-title">
        <p class="small-title"><?php echo esc_html(blahlab_value($this->instance, 'options.small_title')) ?></p>
        <h2><?php echo wp_kses(blahlab_value($this->instance, 'options.title'), array( 'br' => array() )) ?></h2>
        <p class="big-size"><?php echo wp_kses(blahlab_value($this->instance, 'options.desc'), array( 'br' => array() )) ?></p>
        <div class="four spacing"></div>
        <img src="<?php echo esc_url(blahlab_value($this->instance, 'options.bottom_image')) ?>" alt='image'>
      </div>
    </div>
    <div class="four spacing"></div>
  </div>
</div>