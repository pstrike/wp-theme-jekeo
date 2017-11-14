<?php

  $sections = blahlab_value($this->instance, 'options.sections', array());

?>

<div class="full grey">
  <div class="row">
    <div class="large-12 columns">
      <h3 class="sub-title"><?php echo esc_html(blahlab_value($this->instance, 'options.small_title')) ?></h3>
    </div>
  </div>
  <div class="superbig-title">
    <h2 class="wow slideInUp"><?php echo esc_html(blahlab_value($this->instance, 'options.title')) ?></h2>
  </div>
  <div class="team-members">
    <?php 
      foreach ($sections as $index => $section) {
        $end_class = $index == count($sections) - 1 ? 'end' : '';
    ?>
      <div class="large-6 columns <?php echo esc_attr(blahlab_value($end_class)) ?>">
        <?php if ( $index % 2 == 0 ): ?>
          <img src="<?php echo esc_url(blahlab_value($section, 'image')) ?>" alt="image">
          <div class='milestone align-right'>
            <div class='number' data-from='0' data-to='<?php echo esc_attr(blahlab_value($section, 'number')) ?>'>&nbsp;</div>
            <span><?php echo esc_html(blahlab_value($section, 'title')) ?></span>
          </div>
        <?php else: ?>
          <div class='milestone'>
            <div class='number' data-from='0' data-to='<?php echo esc_attr(blahlab_value($section, 'number')) ?>'>&nbsp;</div>
            <span><?php echo esc_html(blahlab_value($section, 'title')) ?></span>
          </div>
          <img src="<?php echo esc_url(blahlab_value($section, 'image')) ?>" alt="image">
        <?php endif; ?>

      </div>
    <?php
      } 
    ?>
  
    <?php 
      $link_text = blahlab_value($this->instance, 'options.link.text');
      $link_url = blahlab_value($this->instance, 'options.link.url');
    ?>
  
    <?php 
      if ( $link_text && $link_url ) {
    ?>
      <div class="row">
        <div class="large-12 columns">
          <a href="<?php esc_url($link_url) ?>" class="meet-team"><?php echo esc_html($link_text) ?> <i class="fa fa-long-arrow-right"></i></a>
        </div>
      </div>
    <?php
      } 
    ?>

  </div>
</div>