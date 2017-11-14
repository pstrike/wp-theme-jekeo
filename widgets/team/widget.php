<?php

class Blahlab_Team_Widget extends Blahlab_Vue_Widget {

  public $widget_title = "Team";
  public $widget_id = 'team';
  public $post_type = '';
  public $taxonomy = '';
  public $classname = '';

  public $defaults;

  // dynamically initialize $this->defaults
  // PHP properties have to be a constant value
  // http://php.net/manual/en/language.oop5.properties.php
  public function __construct() {

    $section = array(
      'image' => '',
      'number' => '',
      'title' => ''
    );

    $this->defaults = array(
      'small_title' => '',
      'title' => '',
      'sections' => array(
        $section, 
        $section
      ),
      'link' => array( 'text' => '', 'url' => '' )
    );

    parent::__construct();

  }

}

add_action( 'wp_ajax_blahlab_widget_ajax_members', array( 'Blahlab_Team_Widget', 'ajax' ) );
add_action( 'wp_ajax_nopriv_blahlab_widget_ajax_members', array( 'Blahlab_Team_Widget', 'ajax' ) );

?>