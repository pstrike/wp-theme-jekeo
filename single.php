<?php get_header(); ?>
<?php the_post(); ?>

<div class="full page-header parallax top-shift grey">
  <div class="row">
    <div class="large-9 large-centered columns">
      <p class='info'>
        <span><?php echo get_the_date('') ?></span>
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
      <h1 class=""><?php echo get_the_title(); ?></h1>

    </div>
  </div>
</div>

<div class="full whole-post">
  <div class="row">
    <div class="large-9 large-centered columns">
      <?php the_content(); ?>
      <?php 
        wp_link_pages( array(
          'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'wrap-by-honryou' ),
          'after'       => '</div>',
          'link_before' => '<span class="page-number">',
          'link_after'  => '</span>',
        ) );
      ?>
      <div class="tags">
        <?php echo the_tags('Tags: ', ', ', ''); ?>
      </div>
      <div class="two spacing"></div>
    </div>
  </div>
</div>


<div class="full grey less-padding">
  <nav class='wrapper'>
    <div class="row">  
      <?php     
        $blahlab_previous = get_previous_post();
        $blahlab_next = get_next_post();
      ?>
        
      <div class="small-6 columns">
        <?php if ($blahlab_previous): ?>
          <a class="previous button boxed black" href='<?php echo esc_attr(get_permalink($blahlab_previous)); ?>'>
            <i class='fa fa-angle-left'></i> Previous
          </a>
        <?php endif ?>
      </div>
      
      <div class="small-6 columns">
        <?php if ($blahlab_next): ?>          
          <a class="next button boxed black" href='<?php echo esc_attr(get_permalink($blahlab_next)); ?>'>
            Next <i class='fa fa-angle-right'></i>
          </a>          
        <?php endif ?>
      </div>

    </div>
  </nav>
</div>


<?php if ( get_comments_number() != 0 || comments_open() ): ?>
  
  <div class="full">
    <?php if ( get_comments_number() != 0 ): ?> 
      <div class="row">
        <div class="large-9 large-centered columns">
          <h3><?php echo esc_html__('Comments', 'jekeo-by-honryou') ?></h3>
        </div>
      </div>
      <div class="row">
        <div class="large-9 large-centered columns">
          <a href="#comments"></a>        
          <?php comments_template('', true); ?>
        </div>
      </div>
      <div class="two spacing"></div>
    <?php endif; ?>

    <?php if (comments_open()): ?>  
      <div class="row">
        <div class="large-9 large-centered columns">
          <h3>
            Leave a comment
          </h3>
        </div>
      </div>
      <div class="row">
        <div class="large-9 large-centered columns">
          <div class='two spacing'></div>
          <div id='comments-form'>
            <?php
              comment_form(
                array(
                  'fields' => array(
                    'author' => "<p class='name'><input class='input-text required' id='name' name='author' type='text' placeholder='Name'></p>",
                    'email' => "<p class='email'><input class='input-text required' id='email' name='email' type='text' placeholder='Email'></p>",
                  ),
                  'comment_notes_before' => '',
                  'comment_notes_after' => '',
                  'comment_field' => "<p class='message'><textarea class='required' cols='80' id='message' name='comment' rows='5' placeholder='Comment'></textarea></p>",
                  'label_submit' => esc_html__('Post Comment', 'jekeo-by-honryou'),
                  'title_reply' => '',
                  'class_form' => 'dark',
                  // 'title_reply_to' => ''
                )
              );
            ?>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>

<?php endif ?>



<?php get_footer(); ?>