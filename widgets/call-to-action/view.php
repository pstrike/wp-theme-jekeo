<?php 
  $excluded_from = blahlab_value($this->instance, 'options.excluded_from', array());

  if ( in_array( 'blahlab-portfolio-single', $excluded_from ) ) {
    if ( is_singular( 'portfolio' ) ) {
      return;
    }
  }

  foreach ($excluded_from as $page_id) {
    if ( $page_id != 'blahlab-portfolio-single' ) {
      if ( is_page( $page_id ) ) {
        return;
      }
    }
  }

?>

<div class="full footer-contact no-padding ">
  <video autoplay='autoplay' class="no-overflow" id='' loop='loop' muted='muted' poster="">
    <source src='<?php echo esc_url(blahlab_value($this->instance, 'options.video')) ?>' type='video/mp4'>
    <source src='<?php echo esc_url(blahlab_value($this->instance, 'options.webm_video')) ?>' type='video/webm'>
  </video>
  <div class="contact-wrapper-overlay">
  </div>
  <div class="contact-wrapper centered-text">
    <div class="row">
      <div class="large-12 columns">
        <p class="sub-title white wow slideInUp"><?php echo esc_html(blahlab_value($this->instance, 'options.sub_title')) ?></p>
        <h2 class="white wow slideInUp"><?php echo esc_html(blahlab_value($this->instance, 'options.title')) ?></h2>

        <div class="four spacing"></div>

        <?php 
          $button_text = blahlab_value($this->instance, 'options.button.text');
          $button_url = blahlab_value($this->instance, 'options.button.url');
        ?>
        <?php 
          if ( $button_url && $button_text ) {
        ?>
          <a href="<?php echo esc_url(blahlab_value($button_url)) ?>" class="button small boxed"><?php echo esc_html(blahlab_value($button_text)) ?></a>
        <?php
          }
        ?>
      </div>
    </div>
  </div>
</div>
