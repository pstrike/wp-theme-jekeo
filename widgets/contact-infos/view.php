<div class="full grey">
  <div class="four spacing"></div>
  <div class="row">
    <?php $infos = blahlab_value($this->instance, 'options.contact_infos', array()) ?>

    <?php foreach ($infos as $index => $info): ?>
      <?php 
        $end_class = $index == count($infos) - 1 ? 'end' : '';
      ?>
      <div class="large-4 columns <?php echo esc_attr($end_class) ?>">
        <div class="contact-details wow slideInUp">
          <i class='icon-basic-<?php echo esc_attr(blahlab_value($info, 'icon')) ?>'></i>
          <h3><?php echo esc_html(blahlab_value($info, 'title')) ?></h3>
          <p><?php echo esc_html(blahlab_value($info, 'text')) ?>.</p>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  <div class="spacing"></div>
</div>