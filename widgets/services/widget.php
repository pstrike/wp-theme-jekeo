<?php

class Blahlab_Services_Widget extends Blahlab_Vue_Widget {

  public $widget_title = "Services";
  public $widget_id = 'services';
  public $post_type = '';
  public $taxonomy = '';
  public $classname = '';

  public function __construct() {

    $sub_item = array(
      'text' => ''
    );

    $this->defaults = array(
      'small_title' => '',
      'title' => '',
      'services' => array(
        array( 'icon' => '', 'title' => '', 'desc' => '', 'subs' => array($sub_item, $sub_item, $sub_item) ),
        array( 'icon' => '', 'title' => '', 'desc' => '', 'subs' => array($sub_item, $sub_item, $sub_item) ),
        array( 'icon' => '', 'title' => '', 'desc' => '', 'subs' => array($sub_item, $sub_item, $sub_item) )
      )
    );

    parent::__construct();

  }

}

add_action( 'wp_ajax_blahlab_widget_ajax_services', array( 'Blahlab_Services_Widget', 'ajax' ) );
add_action( 'wp_ajax_nopriv_blahlab_widget_ajax_services', array( 'Blahlab_Services_Widget', 'ajax' ) );

?>