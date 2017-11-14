<?php

class Blahlab_VideoHeader_Widget extends Blahlab_Vue_Widget {

  public $widget_title = "Video Header";
  public $widget_id = 'video-header';
  public $post_type = '';
  public $taxonomy = '';
  public $classname = '';

  public $defaults = array(
    'video' => '',
    'webm_video' => '',
    'title' => '',
    'desc' => '',
    'scroll_hint' => ''
  );

}

?>