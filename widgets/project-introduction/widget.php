<?php

class Blahlab_ProjectIntroduction_Widget extends Blahlab_Vue_Widget {

  public $widget_title = "Project Introduction";
  public $widget_id = 'project-introduction';
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
      'desc' => '',
      'images' => array(
        array( 'url' => '', 'wide' => false, 'animation' => 'none' ),
        array( 'url' => '', 'wide' => false, 'animation' => 'none' ),
        array( 'url' => '', 'wide' => false, 'animation' => 'none' )
      ),
      'gallery_type' => 'none',
      'bg_color' => '#fff'
    );

    parent::__construct();

  }

}

add_action( 'wp_ajax_blahlab_widget_ajax_project_introduction', array( 'Blahlab_ProjectIntroduction_Widget', 'ajax' ) );
add_action( 'wp_ajax_nopriv_blahlab_widget_ajax_project_introduction', array( 'Blahlab_ProjectIntroduction_Widget', 'ajax' ) );

?>