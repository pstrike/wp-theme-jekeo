  <?php 

    if (is_active_sidebar( 'blahlab-builder-footer' )) {
      dynamic_sidebar( 'blahlab-builder-footer' );
    }
    
  ?>


  <?php
    $blahlab_jekeo_footer_copyright_message = blahlab_jekeo_get_option('footer.copyright_message');
    $blahlab_jekeo_footer_address = blahlab_jekeo_get_option('footer.address');
    $blahlab_jekeo_footer_phone = blahlab_jekeo_get_option('footer.phone');
    $blahlab_jekeo_footer_email = blahlab_jekeo_get_option('footer.email');

    $blahlab_jekeo_footer_socials = blahlab_jekeo_get_option('footer.socials', array());
  ?>

  <?php if ( $blahlab_jekeo_footer_copyright_message || $blahlab_jekeo_footer_address || $blahlab_jekeo_footer_phone || $blahlab_jekeo_footer_email || count($blahlab_jekeo_footer_socials) > 0 ): ?>
    <div class="full footer no-padding">
      <div class="row">
        <div class="large-6 columns">
          <ul class="socials bounceInDown">
            <?php 
              foreach ($blahlab_jekeo_footer_socials as $social) {
            ?>
              <li><a target="_blank" href="<?php echo esc_url(blahlab_value($social, 'url')) ?>"><i class='fa fa-<?php echo esc_attr(blahlab_value($social, 'id')) ?>'></i></a></li>
            <?php
              }

            ?>
          </ul>
        </div>
        <div class="large-6 columns">
          <ul>
            <?php if ( $blahlab_jekeo_footer_address ): ?>
              <li><?php echo esc_html(blahlab_value($blahlab_jekeo_footer_address)); ?></li>
            <?php endif ?>
            <?php if ( $blahlab_jekeo_footer_phone ): ?>
              <li><?php echo esc_html(blahlab_value($blahlab_jekeo_footer_phone)); ?></li>
            <?php endif ?>
            <?php if ( $blahlab_jekeo_footer_email ): ?>
              <li><a href="mailto:<?php echo esc_attr(blahlab_value($blahlab_jekeo_footer_email)); ?>"><?php echo esc_html(blahlab_value($blahlab_jekeo_footer_email)); ?></a></li>
            <?php endif ?>
          </ul>
          <div class="two spacing"></div>
          <?php if ( $blahlab_jekeo_footer_copyright_message ): ?>
            <p><?php echo esc_html(blahlab_value($blahlab_jekeo_footer_copyright_message)); ?></p>
          <?php endif ?>
        </div>

      </div>
    </div>
  <?php endif; ?>
  
  <?php wp_footer(); ?>
</body>
</html>