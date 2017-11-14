<?php if(get_comments_number() > 0): ?>
  <div class="comments-wrapper">
<!--     <h3 class="comments-count">
      <?php echo get_comments_number() ?>
      <?php esc_html_e('Comments', 'jekeo-by-honryou') ?>
    </h3> -->
    <?php if(post_password_required()): ?>
      <p class="nopassword">
        <?php esc_html_e('This post is password protected. Enter the password to view any comments.', 'jekeo-by-honryou'); ?>
      </p>
      </div>
      <?php return; ?>
    <?php endif; ?>
    <?php if(have_comments()): ?>
      <ul class="comments">
        <?php wp_list_comments(array('callback' => 'blahlab_jekeo_custom_comment', 'short_ping' => true)); ?>
      </ul>
    <?php elseif(!comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')): ?>
      <p class="nocomments">
        <?php esc_html_e('Comments are closed.', 'jekeo-by-honryou'); ?>
      </p>
    <?php endif; ?>
  </div>
<?php endif; ?>
