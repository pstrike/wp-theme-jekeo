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

  $images = blahlab_value($this->instance, 'options.images', array());
  $features = blahlab_value($this->instance, 'options.features', array());

?>


<div class="full no-overflow grey">
  <div class="section-title">
    <div class="row">
      <div class="large-6 columns">
        <h3 class="sub-title"><?php echo esc_html(blahlab_value($this->instance, 'options.small_title')) ?></h3>
        <h2><?php echo wp_kses(blahlab_value($this->instance, 'options.title'), array( 'br' => array() )) ?></h2>
      </div>
    </div>
  </div>
  <div class="four spacing"></div>
  <div class="row">
    <div class="large-6 columns">
      <ul class="shapes-overlap">
        <?php foreach ($images as $index => $image): ?>
          <?php  
            $blahlab_jekeo_overlap_id = $widget_id . "-overlap-" . $index; 

            $background_image = blahlab_value($image, 'url');
            $top = 130 * $index;
            $transition_delay = $index == 0 ? 0 : 0.5 * ($index + 1);
            $transform = $index == 0 ? false : 'rotateX(66deg)';

            $custom_css = "
              #{$blahlab_jekeo_overlap_id} {
                background-image: url({$background_image});
                top: {$top}px;
                transition-delay: {$transition_delay}s;
              }
            ";

            wp_add_inline_style( 'blahlab-jekeo-inline-style', $custom_css);

            if ( $transform ) {
              $transform_css = "
                #{$blahlab_jekeo_overlap_id} {
                  transform: {$transform};
                }
              ";

              wp_add_inline_style( 'blahlab-jekeo-inline-style', $transform_css);
            }

            

          ?>
          <!-- <li id="<?php echo esc_attr($blahlab_jekeo_overlap_id) ?>" class="overlap overlap-<?php echo $index + 1 ?>"></li> -->
          <li id="<?php echo esc_attr($blahlab_jekeo_overlap_id) ?>" class="overlap overlap-<?php echo $index + 1 ?>"></li>
        <?php endforeach ?>
      </ul>
    </div>
    <div class="large-6 columns">
      <?php foreach ($features as $index => $feature): ?>
        <?php
          $class = $index == 0 ? 'slideInDown' : 'fadeIn';
        ?>

        <div class="principle wow <?php echo $class ?>" data-wow-delay="<?php echo 0.6 * $index ?>s">
          <h4><span>0<?php echo $index + 1 ?>.</span> <?php echo blahlab_value($feature, 'title') ?></h4>
          <p><?php echo blahlab_value($feature, 'desc') ?></p>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</div>

<?php return; ?>

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