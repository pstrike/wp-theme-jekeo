<?php

class Blahlab_SidebarArchives_Widget extends WP_Widget_Archives {

  function __construct() {

    $this->widget_title = "Sidebar Archives";
    $this->widget_id = 'sidebar-archives';

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

  public function form( $instance ) {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'count' => 0, 'dropdown' => '') );
    $title = strip_tags($instance['title']);
    $count = $instance['count'] ? 'checked="checked"' : '';
    $dropdown = $instance['dropdown'] ? 'checked="checked"' : '';
?>
    <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title:', 'jekeo-by-honryou'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
    <p>
      <!--
        <input class="checkbox" type="checkbox" <?php echo $dropdown; ?> id="<?php echo $this->get_field_id('dropdown'); ?>" name="<?php echo $this->get_field_name('dropdown'); ?>" /> <label for="<?php echo $this->get_field_id('dropdown'); ?>"><?php esc_html_e('Display as dropdown', 'jekeo-by-honryou'); ?></label>
        <br/>
      -->
      <input class="checkbox" type="checkbox" <?php echo $count; ?> id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" /> <label for="<?php echo $this->get_field_id('count'); ?>"><?php esc_html_e('Show post counts', 'jekeo-by-honryou'); ?></label>
    </p>
<?php
  }


  public function widget( $args, $instance ) {
    $c = ! empty( $instance['count'] ) ? '1' : '0';
    $d = ! empty( $instance['dropdown'] ) ? '1' : '0';

    /** This filter is documented in wp-includes/default-widgets.php */
    $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? esc_html__( 'Archives' , 'jekeo-by-honryou') : $instance['title'], $instance, $this->id_base );

    echo '<div class="links">';
    if ( $title ) {
      echo '<h3>' . $title . '</h3>';
    }

    if ( $d ) {
      $dropdown_id = "{$this->id_base}-dropdown-{$this->number}";
?>
    <label class="screen-reader-text" for="<?php echo esc_attr( $dropdown_id ); ?>"><?php echo $title; ?></label>
    <select id="<?php echo esc_attr( $dropdown_id ); ?>" name="archive-dropdown" onchange='document.location.href=this.options[this.selectedIndex].value;'>
      <?php
      /**
       * Filter the arguments for the Archives widget drop-down.
       *
       * @since 2.8.0
       *
       * @see wp_get_archives()
       *
       * @param array $args An array of Archives widget drop-down arguments.
       */
      $dropdown_args = apply_filters( 'widget_archives_dropdown_args', array(
        'type'            => 'monthly',
        'format'          => 'option',
        'show_post_count' => $c
      ) );

      switch ( $dropdown_args['type'] ) {
        case 'yearly':
          $label = esc_html__( 'Select Year' , 'jekeo-by-honryou');
          break;
        case 'monthly':
          $label = esc_html__( 'Select Month' , 'jekeo-by-honryou');
          break;
        case 'daily':
          $label = esc_html__( 'Select Day' , 'jekeo-by-honryou');
          break;
        case 'weekly':
          $label = esc_html__( 'Select Week' , 'jekeo-by-honryou');
          break;
        default:
          $label = esc_html__( 'Select Post' , 'jekeo-by-honryou');
          break;
      }
      ?>

      <option value=""><?php echo esc_attr( $label ); ?></option>
      <?php wp_get_archives( $dropdown_args ); ?>

    </select>
<?php
    } else {
?>
    <ul>
<?php
    /**
     * Filter the arguments for the Archives widget.
     *
     * @since 2.8.0
     *
     * @see wp_get_archives()
     *
     * @param array $args An array of Archives option arguments.
     */
    wp_get_archives( apply_filters( 'widget_archives_args', array(
      'type'            => 'monthly',
      'show_post_count' => $c
    ) ) );
?>
    </ul>
<?php
    }

    echo '</div>';
  }


}

?>