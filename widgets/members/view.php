<?php

  $members = blahlab_value($this->instance, 'options.members');

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
  <div class="two spacing"></div>
  <div class="members">
    <div class="row">
      
      <?php foreach ((array)$members as $index => $member): ?>
        <?php 
          $end_class = $index == count($members) - 1 ? 'end' : '';
        ?>
        <div class="large-4 medium-6 columns <?php echo esc_attr(blahlab_value($end_class)) ?>">
          <div class='member slideInUp'>
            <img src="<?php echo esc_url(blahlab_value($member, 'avatar')) ?>" alt='image' class="avatar">
            <h4><?php echo esc_html(blahlab_value($member, 'name')) ?></h4>
            <p class='position'><?php echo esc_html(blahlab_value($member, 'position')) ?></p>
            <?php
              $socials = blahlab_value($member, 'socials', array());
            ?>
            <ul class='socials'>
              <?php foreach ($socials as $index => $social): ?>
                <li>
                  <a href='<?php echo esc_url(blahlab_value($social, 'url')) ?>' target="_blank">
                    <i class='fa fa-<?php echo esc_attr(blahlab_value($social, 'id')) ?>'></i>
                  </a>
                </li>
              <?php endforeach ?>
            </ul>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</div>