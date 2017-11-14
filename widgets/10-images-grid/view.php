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

<?php 
  
  $images = blahlab_value($this->instance, 'options.images');

  foreach ($images as $index => $image) {
    $name = 'image_' . ($index + 1);
    $$name = $image;
  }
?>

<div class="full no-padding">
  <div class="studio-images">
    <div class="row">
      <div class="large-6 columns">
        <img src="<?php echo esc_attr(blahlab_value($image_1, 'url')) ?>" alt="image">
      </div>
      <div class="large-6 columns">
        <div class="row">
          <div class="large-6 columns">
            <img src="<?php echo esc_attr(blahlab_value($image_2, 'url')) ?>" alt="image">
          </div>
          <div class="large-6 columns">
            <img src="<?php echo esc_attr(blahlab_value($image_3, 'url')) ?>" alt="image">
          </div>
        </div>
        <div class="row">
          <div class="large-4 columns">
            <img src="<?php echo esc_attr(blahlab_value($image_4, 'url')) ?>" alt="image">
          </div>
          <div class="large-4 columns">
            <img src="<?php echo esc_attr(blahlab_value($image_5, 'url')) ?>" alt="image">
          </div>
          <div class="large-4 columns">
            <img src="<?php echo esc_attr(blahlab_value($image_6, 'url')) ?>" alt="image">
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="large-6 columns">
        <div class="large-4 columns">
          <img src="<?php echo esc_attr(blahlab_value($image_7, 'url')) ?>" alt="image">
        </div>
        <div class="large-4 columns">
          <img src="<?php echo esc_attr(blahlab_value($image_8, 'url')) ?>" alt="image">
        </div>
        <div class="large-4 columns">
          <img src="<?php echo esc_attr(blahlab_value($image_9, 'url')) ?>" alt="image">
        </div>
      </div>
      <div class="large-6 columns">
        <div class="large-12 columns">
          <img src="<?php echo esc_attr(blahlab_value($image_10, 'url')) ?>" alt="image">
        </div>
      </div>

    </div>
  </div>
</div>