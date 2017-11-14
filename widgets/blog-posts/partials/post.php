<?php setup_postdata( $post ); ?>

<?php
  $class = "post";

  if ($index % 2 == 1) {
    $class .= " alt";
  }

  $bg = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'full') );

  if ($bg) {
    $class .= " bg";
  }

?>

<div <?php post_class($class) ?> style="background-image: url(<?php echo $bg ?>);">
  <?php if (is_sticky()): ?>
    <div class="featured-post wow flipInX" data-wow-delay="1s">
      <p>Featured</p>
    </div>
  <?php endif ?>
  <p class='info'>
    <span><?php echo get_the_date('M j, Y') ?></span>
    /
    <span>
      by
      <a href="#"><?php echo get_the_author(); ?></a>
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
  <h3><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
  <div class="three spacing"></div>
  <p><a href="<?php echo get_permalink(); ?>" class="button boxed red tiny">Read more</a></p>
</div>