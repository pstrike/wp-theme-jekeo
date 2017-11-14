<?php

  $testimonials = blahlab_value($this->instance, 'options.testimonials', array());

  $col_left = array();
  $col_right = array();

  foreach ($testimonials as $index => $t) {
    if ($index % 2 == 0) {
      $col_left[] = $t;
    } else {
      $col_right[] = $t;
    }
  }

?>

<div class="full">
  <div class="section-title">
    <div class="row">
      <div class="large-6 columns">
        <h3 class="sub-title"><?php echo esc_html(blahlab_value($this->instance, 'options.small_title')) ?></h3>
        <h2><?php echo esc_html(blahlab_value($this->instance, 'options.title')) ?></h2>
      </div>
    </div>
  </div>
  <div class="four spacing"></div>
  <div class="row">
    <div class="large-6 columns">
      <?php foreach ($col_left as $index => $testimonial): ?>        
        <div class='item moveup' data-delay='<?php echo 100 + 200 * $index ?>'>
          <div class="quote">
            <i class='fa fa-quote-left'></i>
            <?php echo wpautop(blahlab_value($testimonial, 'quote'), array( 'br' => array() )) ?>
          </div>
          <div class='author'>
            <p class='author-avatar'>
              <img width="80" height="80" alt='image' src="<?php echo esc_url(blahlab_value($testimonial, 'avatar')) ?>" />
            </p>
            <p class='author-name'>
              <strong>
                <?php echo esc_html(blahlab_value($testimonial, 'author')) ?>
              </strong>
            </p>
            <p>
              <?php echo esc_html(blahlab_value($testimonial, 'position')) ?>
            </p>
           </div>
        </div>
      <?php endforeach; ?>
    </div>
   <div class="large-6 columns">
      <?php foreach ($col_left as $index => $testimonial): ?>        
        <div class='item moveup' data-delay='<?php echo 200 + 200 * $index ?>'>
          <div class='author'>
            <p class='author-avatar'>
              <img width="80" height="80" alt='image' src="<?php echo esc_url(blahlab_value($testimonial, 'avatar')) ?>" />
            </p>
            <p class='author-name'>
              <strong>
                <?php echo esc_html(blahlab_value($testimonial, 'author')) ?>
              </strong>
            </p>
            <p>
              <?php echo esc_html(blahlab_value($testimonial, 'position')) ?>
            </p>
           </div>
          <div class="quote reverse">
            <i class='fa fa-quote-left'></i>
            <?php echo wpautop(blahlab_value($testimonial, 'quote'), array( 'br' => array() )) ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div> 
   </div>
  </div>

</div>
