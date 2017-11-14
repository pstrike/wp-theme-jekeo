<?php

class Blahlab_ProjectOverview_Widget extends Blahlab_Vue_Widget {

  public $widget_title = "Project Overview";
  public $widget_id = 'project-overview';
  public $post_type = '';
  public $taxonomy = '';
  public $classname = '';

  public $defaults = array(
    'small_title' => '',
    'title' => '',
    'desc' => '',
    'bg_image' => ''
  );

}

?>