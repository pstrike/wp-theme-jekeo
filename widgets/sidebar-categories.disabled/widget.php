<?php

class Blahlab_SidebarCategories_Widget extends WP_Widget_Categories {

  function __construct() {

    $this->widget_title = "Sidebar Categories";
    $this->widget_id = 'sidebar-categories';

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
    static $first_dropdown = true;

    /** This filter is documented in wp-includes/default-widgets.php */
    $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? esc_html__( 'Categories' , 'jekeo-by-honryou') : $instance['title'], $instance, $this->id_base );

    $c = ! empty( $instance['count'] ) ? '1' : '0';
    $h = ! empty( $instance['hierarchical'] ) ? '1' : '0';
    $d = ! empty( $instance['dropdown'] ) ? '1' : '0';

    echo '<div class="links">';
    if ( $title ) {
      echo '<h3>' . $title . '</h3>';
    }

    $cat_args = array(
      'orderby'      => 'name',
      'show_count'   => $c,
      'hierarchical' => $h
    );

    if ( $d ) {
      $dropdown_id = ( $first_dropdown ) ? 'cat' : "{$this->id_base}-dropdown-{$this->number}";
      $first_dropdown = false;

      echo '<label class="screen-reader-text" for="' . esc_attr( $dropdown_id ) . '">' . $title . '</label>';

      $cat_args['show_option_none'] = esc_html__( 'Select Category' , 'jekeo-by-honryou');
      $cat_args['id'] = $dropdown_id;

      /**
       * Filter the arguments for the Categories widget drop-down.
       *
       * @since 2.8.0
       *
       * @see wp_dropdown_categories()
       *
       * @param array $cat_args An array of Categories widget drop-down arguments.
       */
      wp_dropdown_categories( apply_filters( 'widget_categories_dropdown_args', $cat_args ) );
?>

<?php 

  $custom_js = '/* <![CDATA[ */
(function() {
  var dropdown = document.getElementById( "' . esc_js( $dropdown_id ) . '" );
  function onCatChange() {
    if ( dropdown.options[ dropdown.selectedIndex ].value > 0 ) {
      location.href = "' . home_url('/') . '/?cat=" + dropdown.options[ dropdown.selectedIndex ].value;
    }
  }
  dropdown.onchange = onCatChange;
})();
/* ]]> */';

  wp_add_inline_script('blahlab-jekeo-app.js', $custom_js);

?>

<?php
    } else {
?>
    <ul>
<?php
    $cat_args['title_li'] = '';

    /**
     * Filter the arguments for the Categories widget.
     *
     * @since 2.8.0
     *
     * @param array $cat_args An array of Categories widget options.
     */
    wp_list_categories( apply_filters( 'widget_categories_args', $cat_args ) );
?>
    </ul>
<?php
    }

    echo '</div>';
  }

  public function form( $instance ) {
    //Defaults
    $instance = wp_parse_args( (array) $instance, array( 'title' => '') );
    $title = esc_attr( $instance['title'] );
    $count = isset($instance['count']) ? (bool) $instance['count'] :false;
    $hierarchical = isset( $instance['hierarchical'] ) ? (bool) $instance['hierarchical'] : false;
    $dropdown = isset( $instance['dropdown'] ) ? (bool) $instance['dropdown'] : false;
?>
    <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e( 'Title:' , 'jekeo-by-honryou'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

<!--     <p><input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('dropdown'); ?>" name="<?php echo $this->get_field_name('dropdown'); ?>"<?php checked( $dropdown ); ?> />
    <label for="<?php echo $this->get_field_id('dropdown'); ?>"><?php esc_html_e( 'Display as dropdown' , 'jekeo-by-honryou'); ?></label><br />

    <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>"<?php checked( $count ); ?> />
    <label for="<?php echo $this->get_field_id('count'); ?>"><?php esc_html_e( 'Show post counts' , 'jekeo-by-honryou'); ?></label><br />

    <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('hierarchical'); ?>" name="<?php echo $this->get_field_name('hierarchical'); ?>"<?php checked( $hierarchical ); ?> />
    <label for="<?php echo $this->get_field_id('hierarchical'); ?>"><?php esc_html_e( 'Show hierarchy' , 'jekeo-by-honryou'); ?></label></p> -->
<?php
  }

}

?>