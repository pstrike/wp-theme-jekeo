<?php get_header(); ?>
<?php the_post(); ?>

<div class="full white">
  <div class="post single">
    <div class="top-section">
      <div class="row">
        <div class="large-10 large-centered columns">
          <p class='info wow slideInUp hide' data-wow-delay="0.3s">
            <span><?php echo get_the_date(''); ?></span>
            /
            <span>
              <?php esc_html_e("by", "jekeo-by-honryou") ?>
              <a href="#"><?php echo get_the_author() ?></a>
            </span>
<!--               /
            <span>
              In
              <?php echo get_the_category_list(', '); ?>
            </span>
            /
            <span>
              <?php comments_popup_link(esc_html__('Leave a comment', 'jekeo-by-honryou'), esc_html__('1 Comment', 'jekeo-by-honryou'), esc_html__('Comments %', 'jekeo-by-honryou')); ?>
            </span> -->
          </p>
          <h2 class="wow" data-wow-delay="0.3s" class="inline-wow"><?php echo get_the_title(); ?></h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="large-10 large-centered columns">
        <?php the_content(); ?>
        <div class="tags">
          <?php echo the_tags(); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php if (comments_open() && get_comments_number() != 0): ?>
  <div class="full dark light">
    <div class="row">
      <div class="large-10 large-centered columns">
        <?php comments_template('', true); ?>
      </div>
    </div>
  </div>
<?php endif; ?>

<div class="full red no-padding">
  <div class="row">
    <?php if (comments_open()): ?>
      <div class="large-10 large-centered columns">
        <div class='four spacing'></div>
        <div id='comments-form'>
          <h2><?php esc_html_e("Your comment", 'jekeo-by-honryou') ?></h2>
          <?php
            comment_form(
              array(
                'fields' => array(
                  'author' => '<p class="name"><input type="text" placeholder="Name" name="author" class="input-text required"></p>',
                  'email' => '<p class="email"><input type="text" placeholder="Email" name="email" class="input-text required"></p>',
                ),
                'comment_notes_before' => '',
                'comment_notes_after' => '',
                'comment_field' => '<p class="message"><textarea placeholder="Message" cols="80" rows="5" name="comment" class="required"></textarea><div class="spacing"></div>',
                'label_submit' => esc_html__('Post Comment', 'jekeo-by-honryou'),
                'title_reply' => ''
              )
            );
          ?>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>

<?php get_footer(); ?>