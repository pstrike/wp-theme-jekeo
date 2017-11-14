<?php

class Blahlab_ImageIntroduction_Widget extends Blahlab_Vue_Widget {

  public $widget_title = "Image Introduction";
  public $widget_id = 'image-introduction';
  public $post_type = '';
  public $taxonomy = '';
  public $classname = '';

  public $defaults = array(
    'title' => '',
    'desc' => '',
    'button' => array( 'text' => '', 'url' => '' ),
    'bg_image' => ''
  );

}

?>