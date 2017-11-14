<div class="full">
  <div class="section-title">
    <div class="row">
      <div class="large-6 columns">
        <h3 class="sub-title"><?php echo esc_html(blahlab_value($this->instance, 'options.small_title')) ?></h3>
        <h2 class="dot"><?php echo esc_html(blahlab_value($this->instance, 'options.title')) ?></h2>
      </div>
    </div>
  </div>

  <div class="row">        
    <?php 
      $services = blahlab_value($this->instance, 'options.services');  

      foreach ($services as $index => $service) {
        $service_id = $this->id . '-' . $index;

        $end_class = $index == count($services) - 1 ? 'end' : '';

    ?>
      <div class="large-4 medium-4 columns <?php echo esc_attr(blahlab_value($end_class)) ?>">
        <div class="icon-text">
          <span class="icon-bg"><i class="icon-basic-<?php echo esc_attr(blahlab_value($service, 'icon')) ?>"></i></span>
          <h4><?php echo esc_html(blahlab_value($service, 'title')) ?></h4>
          <ul>
            <?php 
              $subs = blahlab_value($service, 'subs', array());
              foreach ($subs as $sub) {
            ?>
              <li><?php echo esc_html(blahlab_value($sub, 'text')); ?></li>
            <?php
              }
            ?>              
          </ul>
        </div>
      </div>
    <?php
      }
    ?>
  </div>
</div>