<div class="full no-padding video-bg no-overflow fullscreen-header top-shift">
  <!-- https://webkit.org/blog/6784/new-video-policies-for-ios/ -->
  <video autoplay loop muted playsinline class="no-overflow" id='fullscreen-video' poster="">
    <?php 
      $blahlab_jekeo_video_url = blahlab_value($this->instance, 'options.video');

      if ( defined('WP_DEBUG') && WP_DEBUG ) {        
        $blahlab_jekeo_video_url = add_query_arg(array( 'ver' => time() ), $blahlab_jekeo_video_url);
      }
      
    ?>
    <source src='<?php echo esc_url($blahlab_jekeo_video_url) ?>' type='video/mp4'>
    <source src='<?php echo esc_url(blahlab_value($this->instance, 'options.webm_video')) ?>' type='video/webm'>
  </video>
  <div class="header-intro">
    <div class="row">
      <div class="large-12 columns">
        <h1 class="">
          <?php echo wp_kses(blahlab_value($this->instance, 'options.title'), array( 'br' => array() )) ?>
        </h1>
        <p class="sub-title"><?php echo wp_kses(blahlab_value($this->instance, 'options.desc'), array( 'br' => array() )) ?></p>
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
          <?php $scroll_hint = blahlab_value($this->instance, 'options.scroll_hint') ?>
          <?php if ( $scroll_hint ): ?>
            <?php echo esc_html($scroll_hint); ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php return; ?>

<div class='full no-padding parallax home-video-wrapper' id="<?php echo $this->id ?>-content">
  <div class='fullscreen'>

    <video autoplay='autoplay' id='fullscreen-video' loop='loop'>
      <?php if ( blahlab_jekeo_is_previewing() ): ?>

        <?php 
          $custom_js = "
            (function($) {

              $(document).ready(function() {

                \$video = \$('#" . $this->id . "-content .fullscreen video');

                \$mp4_source = \$('<source>').attr({ type: 'video/mp4', src: '" . esc_url(blahlab_value($this->instance, 'options.video')) .  "' });
                \$webm_source = \$('<source>').attr({ type: 'video/webm', src: '" . esc_url(blahlab_value($this->instance, 'options.webm_video')) . "' });

                \$video.append(\$mp4_source);
                \$video.append(\$webm_source);

              });

            })(jQuery)
          ";

          wp_add_inline_script('blahlab-jekeo-app.js', $custom_js);
        ?>

      <?php else: ?>
        <source src='<?php echo esc_url(blahlab_value($this->instance, 'options.video')) ?>' type='video/mp4'>
        <source src='<?php echo esc_url(blahlab_value($this->instance, 'options.webm_video')) ?>' type='video/webm'>
      <?php endif; ?>
    </video>

    <div class='overlay'></div>
    <div class='layer'>
      <p class="small-title"><?php echo esc_html(blahlab_value($this->instance, 'options.small_title')) ?></p>
      <h1 class='thin' id="to-be-update">
        <?php echo wp_kses(blahlab_value($this->instance, 'options.title'), array( 'br' => array() )) ?>
      </h1>
      <h2 class='thin'>
        <?php echo wp_kses(blahlab_value($this->instance, 'options.desc'), array( 'br' => array() )) ?>
        <?php
          $link_text = blahlab_value($this->instance, 'options.link.text');
          $link_url = blahlab_value($this->instance, 'options.link.url');
        ?>
        <?php
          if ($link_text && $link_url) {
        ?>
          <a href='<?php echo esc_url($link_url) ?>'><?php echo esc_html($link_text); ?></a>
        <?php
          }
        ?>
      </h2>
    </div>
  </div>
</div>