<?php while(have_posts()): ?>
  <?php the_post(); ?>

  <div class="large-4 medium-4 columns">
    <div class="post">
      <?php the_post_thumbnail(); ?>
      <div class="post-content">
        <p class='info'>
          <span><?php echo get_the_date('') ?></span>
          /
          <span>
            by
            <?php the_author_link(); ?>
          </span>
          /
          <span>
            In
            <?php echo get_the_category_list(', ') ?>
          </span>
          /
          <span>
            <?php comments_popup_link(esc_html__('Leave a comment', 'jekeo-by-honryou'), esc_html__('1 Comment', 'jekeo-by-honryou'), esc_html__('Comments %', 'jekeo-by-honryou')); ?>
          </span>
        </p>
        <h3><a href="<?php echo esc_url(get_permalink()); ?>"><?php echo get_the_title(); ?></a></h3>
        <div class="three spacing"></div>
        <p><a href="<?php echo esc_url(get_permalink()); ?>" class="button boxed red tiny">Read more</a></p>
      </div>
    </div>
  </div>

<?php endwhile; ?>