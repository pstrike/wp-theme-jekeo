<?php get_header(); ?>


<div class="full page-header parallax top-shift blog-bg">
  <div class="row">
    <div class="large-12 columns">
      <h1>
        <?php esc_html_e("404 error:", 'jekeo-by-honryou') ?>
        <br/>
        <?php esc_html_e("page not found", 'jekeo-by-honryou') ?>
      </h1>
    </div>
  </div>
</div>

<div class="full grey">
  <div class="row">
    <div class="large-12 columns">
      <p><?php esc_html_e("Sorry, we don't know what you are looking for.", 'jekeo-by-honryou') ?></p>
      <div class="spacing"></div>
      <a href="<?php echo esc_url(home_url('/')) ?>" class="button small">
        <?php esc_html_e("Go back home", 'jekeo-by-honryou') ?>
      </a>
    </div>
  </div>

</div>


<?php get_footer(); ?>