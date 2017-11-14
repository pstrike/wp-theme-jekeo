<?php
/**
 * TemplateDisabled Name: Jekeo Blog Template
 *
 */

get_header();
global $post;

$blahlab_jekeo_queried_object = get_queried_object();

if ( $blahlab_jekeo_queried_object->ID == get_option('page_for_posts') ) {
  $post = $blahlab_jekeo_queried_object;
  setup_postdata( $post );
}

query_posts(array(
  'post_type' => 'post',
  'paged' => $paged,
));

if ( post_password_required() ) { ?>
  <section id="post-<?php the_ID(); ?>">
    <div class="row">
      <div class="twelve columns">
        <?php echo get_the_password_form(); ?>
      </div>
    </div>
  </section>
<?php } else {
?>

  <?php
    $blahlab_jekeo_blog_section_small_title = blahlab_jekeo_get_option('blog_section_small_title');
    $blahlab_jekeo_blog_section_title = blahlab_jekeo_get_option('blog_section_title');
  ?>

  <div class='full'>
    <div class='row'>
      <div class='large-8 columns large-centered'>
        <div class="section-title">
          <?php if ( $blahlab_jekeo_blog_section_small_title ): ?>
            <p class="small-title"><?php echo esc_html(blahlab_jekeo_value($blahlab_jekeo_blog_section_small_title)) ?></p>
          <?php endif; ?>
          <?php if ($blahlab_jekeo_blog_section_title): ?>
            <h2><?php echo esc_html(blahlab_jekeo_value($blahlab_jekeo_blog_section_title)) ?></h2>
          <?php endif; ?>  
        </div>
      </div>
    </div>
  </div>

  <div class='full no-padding'>
    <div class='row'>
      <div class='large-9 columns'>
        <?php while(have_posts()): ?>
          <?php the_post(); ?>
          <div class='big mod modBlogPost no_bg'>
            <?php
              global $blahlab_jekeo_featured_images_metabox;
              $blahlab_jekeo_featured_images_metabox->the_meta();
              $blahlab_jekeo_options = json_decode($blahlab_jekeo_featured_images_metabox->get_the_value('options'), true);
              $blahlab_jekeo_featured_images = blahlab_jekeo_value($blahlab_jekeo_options, 'featured_images');
            ?>
            <?php if ( $blahlab_jekeo_featured_images ): ?>
              <?php if ( count($blahlab_jekeo_featured_images) == 1 ): ?>
                <div class="image">
                  <a href="<?php echo esc_url(get_permalink()); ?>">
                    <img src="<?php echo esc_url(blahlab_esc($blahlab_jekeo_featured_images[0])); ?>" alt='image' />
                  </a>
                </div>
              <?php else: ?>
                <div class="images">
                  <?php foreach( $blahlab_jekeo_featured_images as $blahlab_jekeo_url ): ?>
                    <div class='images'>
                      <div class='image'><img src="<?php echo esc_url(blahlab_jekeo_value($blahlab_jekeo_url)); ?>" alt='image' /></div>
                    </div>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>
            <?php endif; ?>
            <div class='content'>
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
              <?php echo the_excerpt(); ?>
              <div class='spacing'></div>
              <a href="<?php echo esc_url(get_permalink()); ?>" class="button small boxed yellow">Read more</a>
            </div>
          </div>
          <hr />
          <div class="two spacing"></div>
        <?php endwhile; ?>


        <?php
          function add_class_to_previous_posts_link() { return 'class="newer button boxed black"'; }
          function add_class_to_next_posts_link() { return 'class="older button boxed black"'; }
          add_filter('previous_posts_link_attributes', 'add_class_to_previous_posts_link');
          add_filter('next_posts_link_attributes', 'add_class_to_next_posts_link');
        ?>
        <div class="pager">
          <?php posts_nav_link(' ', esc_html__('Newer Entries ', 'jekeo-by-honryou') . '<i class="fa fa-angle-double-right"></i>', '<i class="fa fa-angle-double-left"></i>' . esc_html__(' Older Entries', 'jekeo-by-honryou')); ?>
        </div>
        <div class='four spacing'></div>  
      </div>
      <div class="large-3 columns" id="sidebar">
        <?php
          if (is_active_sidebar( 'blahlab-builder-sidebar' )) {
            dynamic_sidebar( 'blahlab-builder-sidebar' );
          }
        ?>
      </div>
    </div>
  </div>

<?php
}

get_footer();