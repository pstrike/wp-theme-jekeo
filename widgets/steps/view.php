<?php

  $steps = blahlab_value($this->instance, 'options.steps', array());

?>

<div class="full no-padding">
  <div class="row">
    <div class="large-12 columns">
      <h3 class="sub-title"><?php echo esc_html(blahlab_value($this->instance, 'options.small_title')) ?></h3>
    </div>
  </div>
  <div class="superbig-title">
    <h2 class="wow slideInUp"><?php echo esc_html(blahlab_value($this->instance, 'options.title')) ?></h2>
  </div>
</div>

<div class="full grey">
  <div class="row">
    
    <?php foreach ($steps as $index => $step): ?>
      <?php 
        $end_class = $index == count($steps) - 1 ? 'end' : '';
      ?>
      <div class="large-4 columns <?php echo esc_attr($end_class) ?>">
        <div class="icon-text wow fadeInLeft">
          <span class="icon-bg orange"><i class="icon-basic-<?php echo esc_attr(blahlab_value($step, 'icon')) ?>"></i></span>
          <h4><span>0<?php echo $index + 1 ?>.</span> <?php echo blahlab_value($step, 'title') ?></h4>
          <p><?php echo esc_html(blahlab_value($step, 'desc')) ?></p>
        </div>
      </div>
    <?php endforeach; ?>

  </div>
</div>

