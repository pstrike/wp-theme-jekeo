<?php get_header(); ?>

<div class="full page-header parallax top-shift grey blog-bg">
  <div class="row">
    <div class="large-12 columns">
      <?php if(is_day()): ?>
        <h1>
          <?php echo esc_html__('Daily archives:', 'jekeo-by-honryou'); ?>
          <br />
          <?php echo get_the_date(); ?>
        </h1>
      <?php elseif(is_month()): ?>
        <h1>
          <?php echo esc_html__('Monthly archives:', 'jekeo-by-honryou') ?>
          <br />
          <?php echo get_the_date(_x('F Y', 'monthly archives date format', 'jekeo-by-honryou')) ?>
        </h1>
      <?php elseif(is_year()): ?>
        <h1>
          <?php echo esc_html__('Yearly archives:', 'jekeo-by-honryou') ?>
          <br />
          <?php echo get_the_date(_x('Y', 'yearly archives date format', 'jekeo-by-honryou')); ?>
        </h1>
      <?php elseif(is_tag()): ?>
        <h1>
          <?php esc_html_e('Tag:', 'jekeo-by-honryou') ?>
          <br />
          <?php echo single_tag_title('', false) ?>
        </h1>
      <?php elseif(is_category()): ?>
        <h1>
          <?php esc_html_e('Category:', 'jekeo-by-honryou') ?>
          <br />
          <?php echo single_cat_title('', false) ?>
        </h1>
      <?php elseif(is_search()): ?>
        <h1>
          <?php esc_html_e('Search results:', 'jekeo-by-honryou') ?>
          <br />
          <?php echo esc_html(blahlab_jekeo_value($_GET['s'])); ?>
        </h1>
      <?php else: ?>
        <h1>
          <?php esc_html_e('Blog Archives', 'jekeo-by-honryou'); ?>
        </h1>
      <?php endif; ?>
    </div>
  </div>
</div>

<div class='full no-padding'>
  <?php if ( have_posts() ): ?>
    
    <div class="full no-overflow">
      <div class="posts">
        
        <?php if ( is_search() ): ?>

          <div class="row">
            
            <?php while(have_posts()): ?>     
              <div class="large-12 columns">
                <div class="post">
                  <?php the_post(); ?>
          
                  <div class="post-content">
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
                        <?php comments_popup_link(esc_html__('Leave a comment', 'jekeo-by-honryou'), esc_html__('1 Comment', 'jekeo-by-honryou'), esc_html__('% Comments', 'jekeo-by-honryou')); ?>
                      </span>
                    </p>
                    <h3 class="deco"><a href="<?php echo esc_url(get_permalink()); ?>"><?php echo get_the_title(); ?></a></h3>
                    <div class="three spacing"></div>
                    <a href="<?php echo esc_url(get_permalink()); ?>" class="button small boxed yellow">
                      <?php esc_html_e('Read more', 'jekeo-by-honryou') ?>
                    </a>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>            
          </div>

        <?php else: ?>

          <?php while(have_posts()): ?>
            <?php 
              the_post(); 
              if ( !is_sticky() ) {
                continue;
              }
            ?>

            <div class="row">
              <div class="large-12 columns">
                <div class="post is-sticky">
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
            </div>

            <div class="two spacing"></div>

          <?php endwhile; ?>
          
          <div class="row">
            <div class="large-12 columns">
              <ul class="medium-block-grid-3 large-block-grid-3">
                <?php while(have_posts()): ?>
                  
                  <?php 
                    the_post(); 
                    if ( is_sticky() ) {
                      continue;
                    }
                  ?>

                  <li>              
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
                        <p class="read-more"><a href="<?php echo esc_url(get_permalink()); ?>" class="button boxed red tiny">Read more</a></p>
                      </div>
                    </div>

                  </li>

                <?php endwhile; ?>
              </ul>
            </div>
          </div>
          
        <?php endif ?>

        <?php if ( blahlab_jekeo_show_posts_nav() ): ?>
          <div class="row">
            <div class="large-12 columns">

              <div class="four spacing"></div>
              <div class="four spacing"></div>
              
              <?php
                function add_class_to_previous_posts_link() { return 'class="newer button small"'; }
                function add_class_to_next_posts_link() { return 'class="older button small"'; }
                add_filter('previous_posts_link_attributes', 'add_class_to_previous_posts_link');
                add_filter('next_posts_link_attributes', 'add_class_to_next_posts_link');
              ?>
              <div class="pager">
                <?php posts_nav_link(' ', esc_html__('Newer Entries ', 'jekeo-by-honryou') . '<i class="fa fa-angle-double-right"></i>', '<i class="fa fa-angle-double-left"></i>' . esc_html__(' Older Entries', 'jekeo-by-honryou')); ?>
              </div>

              <!-- <a href="#" class="load-posts">Load more <i class="fa fa-long-arrow-right"></i></a> -->
            </div>
          </div>          
        <?php endif ?>

      </div>
    </div>
  
  <?php else: ?>

    <div class="full">
      <div class="row">
        <div class="large-12 columns">
          <h2><?php esc_html_e('Nothing found.', 'jekeo-by-honryou') ?></h2>
          <p><?php esc_html_e("Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.", 'jekeo-by-honryou') ?></p>
          <p><?php esc_html_e("Go to ", 'jekeo-by-honryou') ?><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e("home page", 'jekeo-by-honryou') ?></a>?</p>
        </div>
      </div>
      <div class="four spacing"></div>
      <div class="row">
        <div class="large-12 columns">
          <?php get_search_form(); ?>
        </div>
      </div>
    </div>
      
  <?php endif; ?>
</div>


<?php get_footer();