<?php

class Blahlab_TextIntroduction_Widget extends Blahlab_Vue_Widget {

  public $widget_title = "Text Introduction";
  public $widget_id = 'text-introduction';
  public $post_type = '';
  public $taxonomy = '';
  public $classname = '';

  public $defaults = array(
    'small_title' => '',
    'title' => '',
    'desc' => '',
    'bg_image' => '',
    'button_1' => array( 'text' => '', 'url' => '' ),
    'button_2' => array( 'text' => '', 'url' => '' )
  );

}

?>