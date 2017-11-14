<?php

  $clients = blahlab_value($this->instance, 'options.clients', array());

?>


<div class="full">
  <div class="section-title">
    <div class="row">
      <div class="large-6 columns">
        <h3 class="sub-title"><?php echo esc_html(blahlab_value($this->instance, 'options.small_title')) ?></h3>
        <h2 class="dot"><?php echo esc_html(blahlab_value($this->instance, 'options.title')) ?></h2>
      </div>
    </div>
  </div>
  <div class="four spacing"></div>
  <div class="full no-padding">
    <div class="clients">
      <div class="row">
        <?php foreach ($clients as $index => $client): ?>
          <?php
            $end_class = $index == count($clients) - 1 ? 'end' : '';
          ?>
          <div class='small-3 columns <?php echo esc_attr(blahlab_value($end_class)) ?>'>
            <div class="client">
              <a href=""><img alt='<?php echo esc_url(blahlab_value($client, 'name')) ?>' src="<?php echo esc_url(blahlab_value($client, 'logo')) ?>" /></a>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </div>
    <div class="four spacing"></div>
  </div>
</div>