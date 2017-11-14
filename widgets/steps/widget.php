<?php

class Blahlab_Steps_Widget extends Blahlab_Vue_Widget {

  public $widget_title = "Steps";
  public $widget_id = 'steps';
  public $post_type = '';
  public $taxonomy = '';
  public $classname = '';
  
  public $defaults = array(
    'small_title' => '',
    'title' => '',
    'steps' => array(
      array( 'title' => '', 'icon' => '', 'desc' => '' ),
      array( 'title' => '', 'icon' => '', 'desc' => '' ),
      array( 'title' => '', 'icon' => '', 'desc' => '' )
    )
  );

}

?>