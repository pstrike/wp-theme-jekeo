<div class="full orange quote-bg light">
  <div class="section-title">
    <div class="row">
      <div class="large-9 large-centered columns">
        <h3 class="sub-title"><?php echo esc_html(blahlab_value($this->instance, 'options.title')) ?></h3>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="large-centered large-9 columns">
      <p class="case-quote"><?php echo esc_html(blahlab_value($this->instance, 'options.quote')) ?></p>
      <p class="case-quote-author">
        <?php 
          $author = blahlab_value($this->instance, 'options.author');
          $position = blahlab_value($this->instance, 'options.position');
        ?>
        <?php echo esc_html(blahlab_value($author)) ?><?php echo blahlab_value($position) ? ',' : '' ?>
        <?php echo esc_html(blahlab_value($position)) ?>
      </p>
    </div>

  </div>
</div>