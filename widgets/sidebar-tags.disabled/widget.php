<?php

class Blahlab_SidebarTags_Widget extends WP_Widget_Tag_Cloud {

  function __construct() {

    $this->widget_title = "Sidebar Tags";
    $this->widget_id = 'sidebar-tags';

    $reflection = new ReflectionObject($this);
    $this->root = dirname($reflection->getFileName());

    $this->view = blahlab_join_paths($this->root, 'view.php');
    $this->form = blahlab_join_paths($this->root, 'form.php');
    $this->slug = 'blahlab-widget-' . $this->widget_id;

    $this->widget_ops = array(
      'classname' => isset($this->classname) && !empty($this->classname) ? $this->classname : 'blahlab-' . $this->widget_id . '-widget',
      'description' => esc_html__( 'This widget is used to display your ', 'jekeo-by-honryou' ) . $this->widget_title . '.'
    );

    $this->control_ops = array( 'width' => isset($this->width) ? $this->width : 160, 'height' => NULL, 'id_base' => $this->slug );

    WP_Widget::__construct($this->slug, $this->widget_title, $this->widget_ops, $this->control_ops);
  }

  public function widget( $args, $instance ) {
    $current_taxonomy = $this->_get_current_taxonomy($instance);
    if ( !empty($instance['title']) ) {
      $title = $instance['title'];
    } else {
      if ( 'post_tag' == $current_taxonomy ) {
        $title = esc_html__('Tags', 'jekeo-by-honryou');
      } else {
        $tax = get_taxonomy($current_taxonomy);
        $title = $tax->labels->name;
      }
    }

    /** This filter is documented in wp-includes/default-widgets.php */
    $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

    echo '<div class="links">';
    if ( $title ) {
      echo '<h3>' . $title . '</h3>';
    }
    echo '<ul>';

    /**
     * Filter the taxonomy used in the Tag Cloud widget.
     *
     * @since 2.8.0
     * @since 3.0.0 Added taxonomy drop-down.
     *
     * @see wp_tag_cloud()
     *
     * @param array $current_taxonomy The taxonomy to use in the tag cloud. Default 'tags'.
     */

    $query_defaults = array(
      'smallest' => 8, 'largest' => 22, 'unit' => 'pt', 'number' => 45,
      'format' => 'flat', 'separator' => "\n", 'orderby' => 'name', 'order' => 'ASC',
      'exclude' => '', 'include' => '', 'link' => 'view', 'taxonomy' => 'post_tag', 'post_type' => '', 'echo' => true
    );

    $tags = get_terms( 'post_tag', array_merge( $query_defaults, array( 'orderby' => 'count', 'order' => 'DESC' ) ) );

    // var_dump($tags);

    foreach ($tags as $index => $tag) {
      ?>
        <li><a href="<?php echo esc_url(get_term_link( intval($tag->term_id), $tag->taxonomy )); ?>"><?php echo blahlab_value($tag->name); ?></a></li>
      <?php
    }

    // wp_tag_cloud( apply_filters( 'widget_tag_cloud_args', array(
    //   'taxonomy' => $current_taxonomy
    // ) ) );

    echo "</ul>";
    echo '</div>';
  }


  public function form( $instance ) {
    $current_taxonomy = $this->_get_current_taxonomy($instance);
?>
  <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title:', 'jekeo-by-honryou') ?></label>
  <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php if (isset ( $instance['title'])) {echo esc_attr( $instance['title'] );} ?>" /></p>
  <!-- <p><label for="<?php echo $this->get_field_id('taxonomy'); ?>"><?php esc_html_e('Taxonomy:', 'jekeo-by-honryou') ?></label> -->
<!--   <select class="widefat" id="<?php echo $this->get_field_id('taxonomy'); ?>" name="<?php echo $this->get_field_name('taxonomy'); ?>">
  <?php foreach ( get_taxonomies() as $taxonomy ) :
        $tax = get_taxonomy($taxonomy);
        if ( !$tax->show_tagcloud || empty($tax->labels->name) )
          continue;
  ?>
    <option value="<?php echo esc_attr($taxonomy) ?>" <?php selected($taxonomy, $current_taxonomy) ?>><?php echo $tax->labels->name; ?></option>
  <?php endforeach; ?>
  </select> --></p><?php
  }

}

?>