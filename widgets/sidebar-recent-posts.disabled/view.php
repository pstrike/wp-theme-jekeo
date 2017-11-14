<?php

  $posts = blahlab_value($this->instance, 'options.posts');

  $query = array(
    'posts_per_page' => -1,
    'orderby' => 'date',
  );

  $query['include'] = $posts;

  if (count($posts) > 0) {
    $posts = get_posts($query);
  } else {
    $posts = array();
  }

  wp_reset_postdata();

?>

<div class='links'>
  <h3><?php echo esc_html(blahlab_value($this->instance, 'options.title')) ?></h3>
  <ul>
    <?php foreach ($posts as $index => $post): ?>
      <?php setup_postdata( $post ); ?>
      <li>
        <a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php echo get_the_title($post) ?></a>
      </li>
    <?php endforeach ?>
  </ul>
</div>